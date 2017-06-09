<?php

namespace App\Http\Controllers\Admin\Data;

use App\Models\SpreadPeopleModel;
use App\Models\SpreadRecordModel;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class WechatPeopleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->ajax()){

            $data = [
                    'levels'  => [],                                                     //记录当前文章有几个层级
                    'cate'    => [],                                                     //层级格式
                    'user'    => [],                                                     //存储openid对应的用户名
                    'data'    => [['name'=>'起点','symbolSize'=>30,'value'=>0]],         //网状图数据
                    'links'   => [],                                                     //阶层链接
            ];

            $res = SpreadRecordModel::select('openid','upper','source','level')
                                ->where('action','browse')
                                ->orderBy('created_at','asc')
                                ->groupBy('openid')
                                ->with([
                                    'user'=>function($query){
                                        $query->select('openid','name');
                                    }
                                ])->get();

            foreach ($res as $re){

                if (!in_array($re->level_name,$data['levels'])){

                    $data['levels'][] = $re->level_name;

                    $data['cate'][] = ['name'=>$re->level_name];

                }

                $data['user'][$re->openid] = $re->user->name;


                $data['data'][] = [

                    'name'     => $re->user->name,

                    'category' => $re->level_name,

                    'value'    => $re->level

                ];

                if ($re->upper){

                    $data['links'][] = [

                        'source' => $data['user'][$re->upper],

                        'target' => $re->user->name,

                    ];

                }else{

                    $data['links'][] = [

                        'source' => '起点',

                        'target' => $re->user->name,

                    ];

                }

            }

            return response()->json(['success'=>true,'data'=>$data]);

        }

        return view('modules.admin.data.wechat_people');

    }

    public function peoples(Request $request)
    {

        $people = SpreadPeopleModel::where('level',1)->paginate(10);

        return response($people);

    }

    public function onDown(Request $request)
    {
        $id = $request->input('id');

        $id = intval(ltrim($id,'s'));

        $current = SpreadPeopleModel::find($id);

        if ($current){

            $openids = SpreadRecordModel::select('openid')->where('level',$current->level+1)->where('upper',$current->openid)->groupBy('openid')->get();

            $ops = [];

            foreach ($openids as $op){

                $ops[] = $op->openid;

            }

            $res = SpreadPeopleModel::whereIn('openid',$ops)->get();

            $str = "";

            foreach ($res as $re){

                $margin = ($re->level-1)*10;

                if ($re->level_num){

                    $str .= "<tr><td id=s".$re->id."><i style='margin-left:".$margin."px;' class='glyphicon glyphicon-triangle-right'></i>$re->name</td><td>$re->level</td><td>".$re->level_num." / ".$re->people_num."</td><td>$re->read_num</td><td>$re->read_at</td><td>$re->sex_name</td><td>".$re->province.'-'.$re->city."</td></tr>";
                    
                }else{

                    $str .= "<tr><td id=s".$re->id."><i style='margin-left:".$margin."px;'></i>$re->name</td><td>$re->level</td><td>".$re->level_num." / ".$re->people_num."</td><td>$re->read_num</td><td>$re->read_at</td><td>$re->sex_name</td><td>".$re->province.'-'.$re->city."</td></tr>";
                    
                }

            }

            return response()->json(['success'=>true,'html'=>$str]);
            //找自己的下级，该表缺少一个upper的字段
//            SpreadPeopleModel::where('level',$current->level+1)->where('')

        }else{

            return response()->json(['success'=>false,'msg'=>'非法的请求！']);
        }

    }
}
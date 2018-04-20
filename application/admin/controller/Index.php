<?php
namespace app\admin\controller;
use app\admin\controller\Common;
class Index extends Common
{
    public function index()
    { 
        $type=db('admin')->find(session('type'));
        $a=db('admin')->find(session('id'));
        //dump($num_test);die;

        //判断用户调查表状态：已测评——1;未测评——2;已过期——3;未开始——4;
        $yonghuid=session('id');
        //dump($yonghuid);die;
        $yh_check=db("check")->field( 'a.worknum,a.status,b.* ' )->alias( 'a' )->join( 'gb_checktable b', 'a.sumid=b.id' )->join( 'gb_admin c', 'c.worknum=a.worknum' )->where("c.id",$yonghuid)->select();
        //dump($yh_check);
        $nowtime=time();
        foreach ($yh_check as $key => $value) {
            $timestart1=$value["timestart"];
            $timestart2=strtotime($timestart1);
            $timeend1=$value["timeend"];
            $timeend2=strtotime($timeend1)+86400;
            if($nowtime<$timestart2){
                $yh_check[$key]["status"]="4";
            }
            elseif ($nowtime>$timeend2) {
                $yh_check[$key]["status"]="3";
            }
            else{
                $yh_check[$key]["status"]="2";
            }
            db( 'check' )->where("sumid",$value["id"])->where("worknum",$value["worknum"])->update(['status' => $yh_check[$key]["status"]]);
        }

        //END
        $time=time();

        $artres = db("check")->field( 'a.worknum,a.status,b.* ' )->alias( 'a' )->where('a.allvote',"<>",0)->join( 'gb_checktable b', 'a.sumid=b.id' )->join( 'gb_admin c', 'c.worknum=a.worknum' )->where("c.id",$yonghuid)->select();
        
        $test_num = db("check")->field( 'a.worknum,a.status,b.* ' )->alias( 'a' )->where('a.allvote',"<>",0)->join( 'gb_checktable b', 'a.sumid=b.id' )->join( 'gb_admin c', 'c.worknum=a.worknum' )->where("c.id",$yonghuid)->count();

        //dump($artres);die;
        for($i = 0; $i < $test_num; $i++){
            $artres[$i]['sumid'] = $i+1;
        }

       //dump($sta);die;
        //dump($sta['mincall']);die;

        $num['all']=db('article')->count();
        $num['bsex']=db('article')->where('sex',"男")->count();
        $num['edubg']=db('article')->where("edubg like '%研究生%' ")->count();
        $num['ptitle']=db('article')->where("ptitle in ('教授','高级工程师','副教授','高级实验师','研究员','副研究员','高级讲师','高级会计师') ")->count();
        $num['politics']=db('article')->where("politics","中共党员")->count();
        /*if($num['all'] == 0) {
            $num['all'] = 1;
        }*/
        $per['bsex']=(int)(100*$num['bsex']/$num['all']);
        $per['gsex']=100-$per['bsex'];
        $per['edubg']=(int)(100*$num['edubg']/$num['all']);
        $per['fedubg']=100-$per['edubg'];
        $per['ptitle']=(int)(100*$num['ptitle']/$num['all']);
        $per['fptitle']=100-$per['ptitle'];
        $per['politics']=(int)(100*$num['politics']/$num['all']);
        $per['fpolitics']=100-$per['politics'];
        $message=db('message')->order('date desc')->where('worknum',0)->limit(2)->select();
        $area =db('login')->where('random',session('random'))->find();

      
        $approval=db('approval')->where('status',0)->count();
        $reply=db('message')->order('date desc')->where('worknum',session('worknum'))->limit(3)->select();
        //dump($a);
        //dump($sta);
            $this->assign(array('a'=>$a,'app'=>$approval,'message'=>$message,'per'=>$per,'artres'=>$artres,'test_num'=>$test_num,'num'=>$num,'area'=>$area['area'],'reply'=>$reply));
        return view();
    }
}

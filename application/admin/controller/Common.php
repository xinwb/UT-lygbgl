<?php
namespace app\admin\controller;
use think\Controller;
use think\Request;
class Common extends Controller
{
 
    public function _initialize(){
      //dump("qqq");die;
        if(!session('id') || !session('worknum')){
           $this->error('您尚未登录系统',url('login/index')); 
        }
        if(!db('admin')->where('random',session('random'))->find())
         { $this->error('您在别处登录',url('login/index')); }

        $auth=new Auth();
        $request=Request::instance();
        $con=$request->controller();
        $action=$request->action();
        $name=$con.'/'.$action;
        $notCheck=array('Index/index','Admin/lst','Admin/logout');
        $yonghuid=$request->session('id');
        $yonghuworknum=$request->session('worknum');
        $yonghuname=$request->session('name');

        $yonghutype=db("auth_group_access")->where('uid',$yonghuid)->find(); //title  权限
        // dump($yonghutype);die;
        // $yonghutype2=db("view_yonghu")->where('worknum',$yonghuworknum)->find(); 
        $yonghutype2 = db('admin')->where('id', $yonghuid)->find();
        //用户信息  worknum name type catename cateid
       
        if($art=db('admin')->where('id',$yonghuid)->find())
        $yonghutype2['artid']=$art['id'];
        $this->assign('yonghuid',$yonghuid);
        $this->assign('yonghuname',$yonghuname);
        $this->assign('yonghutype',$yonghutype);
        $this->assign('yonghutype2',$yonghutype2);

       //  if(session('id')!=1){
       //  	if(!in_array($name, $notCheck)){
       //  		if(!$auth->check($name,session('id'))){
		    	// $this->error('没有权限',url('index/index')); 
		    	// }
       //  	}
        	
       //  }
        
    }


}

<?php
namespace app\ admin\ controller;
use app\ admin\ model\ Cate as CateModel;
use app\ admin\ controller\ Common;
class Ceping extends Common {

	public
	function lst1() {
		//判断用户调查表状态：已测评——1;未测评——2;已过期——3;未开始——4;
		$yonghuid=session('id');
		//dump($yonghuid);die;
		$yh_check=db("check")->field( 'a.worknum,a.status,b.* ' )->alias( 'a' )->join( 'gb_checktable b', 'a.sumid=b.id' )->join( 'gb_admin c', 'c.worknum=a.worknum' )->where("c.id",$yonghuid)->select();
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
		$artres = db("check")->field( 'a.worknum,a.status,b.* ' )->alias( 'a' )->where('a.allvote',"<>",0)->join( 'gb_checktable b', 'a.sumid=b.id' )->join( 'gb_admin c', 'c.worknum=a.worknum' )->where("c.id",$yonghuid)->where("b.type","民主测评")->paginate( 10 );
		$this->assign( array(
			'artres' => $artres,
			'time' => $time,
			) );

		if ( request()->isPost() ) {

			$data = input( 'post.' );
			//dump($data);die;
			if($data["status"]=="1"){
				$artres = db("check")->field( 'a.worknum,a.status,b.* ' )->alias( 'a' )->where('a.allvote',"<>",0)->join( 'gb_checktable b', 'a.sumid=b.id' )->join( 'gb_admin c', 'c.worknum=a.worknum' )->where("c.id",$yonghuid)->where("b.type","民主测评")->where("a.status","1")->paginate( 10 );
				//dump($artres);die;
			}
			elseif($data["status"]=="2"){
				$artres = db("check")->field( 'a.worknum,a.status,b.* ' )->alias( 'a' )->where('a.allvote',"<>",0)->join( 'gb_checktable b', 'a.sumid=b.id' )->join( 'gb_admin c', 'c.worknum=a.worknum' )->where("c.id",$yonghuid)->where("b.type","民主测评")->where("a.status","2")->paginate( 10 );
			}
			elseif($data["status"]=="3"){
				$artres = db("check")->field( 'a.worknum,a.status,b.* ' )->alias( 'a' )->where('a.allvote',"<>",0)->join( 'gb_checktable b', 'a.sumid=b.id' )->join( 'gb_admin c', 'c.worknum=a.worknum' )->where("c.id",$yonghuid)->where("b.type","民主测评")->where("a.status","3")->paginate( 10 );
			}
			elseif($data["status"]=="4"){
				$artres = db("check")->field( 'a.worknum,a.status,b.* ' )->alias( 'a' )->where('a.allvote',"<>",0)->join( 'gb_checktable b', 'a.sumid=b.id' )->join( 'gb_admin c', 'c.worknum=a.worknum' )->where("c.id",$yonghuid)->where("b.type","民主测评")->where("a.status","4")->paginate( 10 );
			}
			else{
				$artres = db("check")->field( 'a.worknum,a.status,b.* ' )->alias( 'a' )->where('a.allvote',"<>",0)->join( 'gb_checktable b', 'a.sumid=b.id' )->join( 'gb_admin c', 'c.worknum=a.worknum' )->where("c.id",$yonghuid)->where("b.type","民主测评")->where("a.status","2")->paginate( 10 );
			}
			$time=time();
			$this->assign( array(
				'artres' => $artres,
				) );

			return view();
		}
		return view();
	}


	public function lst2() {
		//判断用户调查表状态：已测评——1;未测评——2;已过期——3;未开始——4;
		$yonghuid=session('id');
		$yh_check=db("check")->field( 'a.worknum,a.status,b.* ' )->alias( 'a' )->join( 'gb_checktable b', 'a.sumid=b.id' )->join( 'gb_admin c', 'c.worknum=a.worknum' )->where("c.id",$yonghuid)->select();
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
		$artres = db("check")->field( 'a.worknum,a.status,b.* ' )->alias( 'a' )->where('a.allvote',"<>",0)->join( 'gb_checktable b', 'a.sumid=b.id' )->join( 'gb_admin c', 'c.worknum=a.worknum' )->where("c.id",$yonghuid)->where("b.type","德的考核考察")->paginate( 10 );
		$this->assign( array(
			'artres' => $artres,
			'time' => $time,
			) );
		if ( request()->isPost() ) {
			$data = input( 'post.' );
			if($data["status"]=="1"){
				$artres = db("check")->field( 'a.worknum,a.status,b.* ' )->alias( 'a' )->where('a.allvote',"<>",0)->join( 'gb_checktable b', 'a.sumid=b.id' )->join( 'gb_admin c', 'c.worknum=a.worknum' )->where("c.id",$yonghuid)->where("b.type","德的考核考察")->where("a.status","1")->paginate( 10 );
			}
			elseif($data["status"]=="2"){
				$artres = db("check")->field( 'a.worknum,a.status,b.* ' )->alias( 'a' )->where('a.allvote',"<>",0)->join( 'gb_checktable b', 'a.sumid=b.id' )->join( 'gb_admin c', 'c.worknum=a.worknum' )->where("c.id",$yonghuid)->where("b.type","德的考核考察")->where("a.status","2")->paginate( 10 );
			}
			elseif($data["status"]=="3"){
				$artres = db("check")->field( 'a.worknum,a.status,b.* ' )->alias( 'a' )->where('a.allvote',"<>",0)->join( 'gb_checktable b', 'a.sumid=b.id' )->join( 'gb_admin c', 'c.worknum=a.worknum' )->where("c.id",$yonghuid)->where("b.type","德的考核考察")->where("a.status","3")->paginate( 10 );
			}
			elseif($data["status"]=="4"){
				$artres = db("check")->field( 'a.worknum,a.status,b.* ' )->alias( 'a' )->where('a.allvote',"<>",0)->join( 'gb_checktable b', 'a.sumid=b.id' )->join( 'gb_admin c', 'c.worknum=a.worknum' )->where("c.id",$yonghuid)->where("b.type","德的考核考察")->where("a.status","4")->paginate( 10 );
			}
			else{
				$artres = db("check")->field( 'a.worknum,a.status,b.* ' )->alias( 'a' )->where('a.allvote',"<>",0)->join( 'gb_checktable b', 'a.sumid=b.id' )->join( 'gb_admin c', 'c.worknum=a.worknum' )->where("c.id",$yonghuid)->where("b.type","德的考核考察")->where("a.status","2")->paginate( 10 );
			}
			$time=time();
			$this->assign( array(
				'artres' => $artres,
				'time' => $time,
				) );

			return view();
		}
		return view();
	}

	public function lst3() {
		//判断用户调查表状态：已测评——1;未测评——2;已过期——3;未开始——4;
		$yonghuid=session('id');
		$yh_check=db("check")->field( 'a.worknum,a.status,b.* ' )->alias( 'a' )->join( 'gb_checktable b', 'a.sumid=b.id' )->join( 'gb_admin c', 'c.worknum=a.worknum' )->where("c.id",$yonghuid)->select();
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
		$artres = db("check")->field( 'a.worknum,a.status,b.* ' )->alias( 'a' )->where('a.allvote',"<>",0)->join( 'gb_checktable b', 'a.sumid=b.id' )->join( 'gb_admin c', 'c.worknum=a.worknum' )->where("c.id",$yonghuid)->where("b.type","班子测评")->paginate( 10 );
		$this->assign( array(
			'artres' => $artres,
			'time' => $time,
			) );
		if ( request()->isPost() ) {
			$data = input( 'post.' );
			//dump($data);die;
			if($data["status"]=="1"){
				$artres = db("check")->field( 'a.worknum,a.status,b.* ' )->alias( 'a' )->where('a.allvote',"<>",0)->join( 'gb_checktable b', 'a.sumid=b.id' )->join( 'gb_admin c', 'c.worknum=a.worknum' )->where("c.id",$yonghuid)->where("b.type","班子测评")->where("a.status","1")->paginate( 10 );
			}
			elseif($data["status"]=="2"){
				$artres = db("check")->field( 'a.worknum,a.status,b.* ' )->alias( 'a' )->where('a.allvote',"<>",0)->join( 'gb_checktable b', 'a.sumid=b.id' )->join( 'gb_admin c', 'c.worknum=a.worknum' )->where("c.id",$yonghuid)->where("b.type","班子测评")->where("a.status","2")->paginate( 10 );
			}
			elseif($data["status"]=="3"){
				$artres = db("check")->field( 'a.worknum,a.status,b.* ' )->alias( 'a' )->where('a.allvote',"<>",0)->join( 'gb_checktable b', 'a.sumid=b.id' )->join( 'gb_admin c', 'c.worknum=a.worknum' )->where("c.id",$yonghuid)->where("b.type","班子测评")->where("a.status","3")->paginate( 10 );
			}
			elseif($data["status"]=="4"){
				$artres = db("check")->field( 'a.worknum,a.status,b.* ' )->alias( 'a' )->where('a.allvote',"<>",0)->join( 'gb_checktable b', 'a.sumid=b.id' )->join( 'gb_admin c', 'c.worknum=a.worknum' )->where("c.id",$yonghuid)->where("b.type","班子测评")->where("a.status","4")->paginate( 10 );
			}
			else{
				$artres = db("check")->field( 'a.worknum,a.status,b.* ' )->alias( 'a' )->where('a.allvote',"<>",0)->join( 'gb_checktable b', 'a.sumid=b.id' )->join( 'gb_admin c', 'c.worknum=a.worknum' )->where("c.id",$yonghuid)->where("b.type","班子测评")->where("a.status","2")->paginate( 10 );
			}
			$time=time();
			$this->assign( array(
				'artres' => $artres,
				'time' => $time,
				) );

			return view();
		}
		return view();
	}

	public
	function lst4() {
		//判断用户调查表状态：已测评——1;未测评——2;已过期——3;未开始——4;
		$yonghuid=session('id');

		$yh_check=db("check")->field( 'a.worknum,a.status,b.* ' )->alias( 'a' )->join( 'gb_checktable b', 'a.sumid=b.id' )->join( 'gb_admin c', 'c.worknum=a.worknum' )->where("c.id",$yonghuid)->select();

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
		$artres = db("check")->field( 'a.worknum,a.status,b.* ' )->alias( 'a' )->where('a.allvote',"<>",0)->join( 'gb_checktable b', 'a.sumid=b.id' )->join( 'gb_admin c', 'c.worknum=a.worknum' )->where("c.id",$yonghuid)->where("b.type","民主干部互评")->paginate( 10 );
        //dump($artres);die;
		$this->assign( array(
			'artres' => $artres,
			'time' => $time,
			) );
		if ( request()->isPost() ) {
			$data = input( 'post.' );
			//dump($data);die;
			if($data["status"]=="1"){
				$artres = db("check")->field( 'a.worknum,a.status,b.* ' )->alias( 'a' )->where('a.allvote',"<>",0)->join( 'gb_checktable b', 'a.sumid=b.id' )->join( 'gb_admin c', 'c.worknum=a.worknum' )->where("c.id",$yonghuid)->where("b.type","民主干部互评")->where("a.status","1")->paginate( 10 );
			}
			elseif($data["status"]=="2"){
				$artres = db("check")->field( 'a.worknum,a.status,b.* ' )->alias( 'a' )->where('a.allvote',"<>",0)->join( 'gb_checktable b', 'a.sumid=b.id' )->join( 'gb_admin c', 'c.worknum=a.worknum' )->where("c.id",$yonghuid)->where("b.type","民主干部互评")->where("a.status","2")->paginate( 10 );
			}
			elseif($data["status"]=="3"){
				$artres = db("check")->field( 'a.worknum,a.status,b.* ' )->alias( 'a' )->where('a.allvote',"<>",0)->join( 'gb_checktable b', 'a.sumid=b.id' )->join( 'gb_admin c', 'c.worknum=a.worknum' )->where("c.id",$yonghuid)->where("b.type","民主干部互评")->where("a.status","3")->paginate( 10 );
			}
			elseif($data["status"]=="4"){
				$artres = db("check")->field( 'a.worknum,a.status,b.* ' )->alias( 'a' )->where('a.allvote',"<>",0)->join( 'gb_checktable b', 'a.sumid=b.id' )->join( 'gb_admin c', 'c.worknum=a.worknum' )->where("c.id",$yonghuid)->where("b.type","民主干部互评")->where("a.status","4")->paginate( 10 );
			}
			else{
				$artres = db("check")->field( 'a.worknum,a.status,b.* ' )->alias( 'a' )->where('a.allvote',"<>",0)->join( 'gb_checktable b', 'a.sumid=b.id' )->join( 'gb_admin c', 'c.worknum=a.worknum' )->where("c.id",$yonghuid)->where("b.type","民主干部互评")->where("a.status","2")->paginate( 10 );
			}
			$time=time();
			$this->assign( array(
				'artres' => $artres,
				) );

			return view();
		}
		return view();
	}


	public function lst5() {
		//判断用户调查表状态：已测评——1;未测评——2;已过期——3;未开始——4;
		$yonghuid=session('id');
		//dump($yonghuid);die;
		$yh_check=db("check")->field( 'a.worknum,a.status,b.* ' )->alias( 'a' )->join( 'gb_checktable b', 'a.sumid=b.id' )->join( 'gb_admin c', 'c.worknum=a.worknum' )->where("c.id",$yonghuid)->select();
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
		$artres = db("check")->field( 'a.worknum,a.status,b.* ' )->alias( 'a' )->where('a.allvote',"<>",0)->join( 'gb_checktable b', 'a.sumid=b.id' )->join( 'gb_admin c', 'c.worknum=a.worknum' )->where("c.id",$yonghuid)->where("b.type","德的干部互评")->paginate( 10 );
		//dump($artres);die;
		$this->assign( array(
			'artres' => $artres,
			'time' => $time,
			) );
		if ( request()->isPost() ) {
			$data = input( 'post.' );
			if($data["status"]=="1"){
				$artres = db("check")->field( 'a.worknum,a.status,b.* ' )->alias( 'a' )->where('a.allvote',"<>",0)->join( 'gb_checktable b', 'a.sumid=b.id' )->join( 'gb_admin c', 'c.worknum=a.worknum' )->where("c.id",$yonghuid)->where("b.type","德的干部互评")->where("a.status","1")->paginate( 10 );
			}
			elseif($data["status"]=="2"){
				$artres = db("check")->field( 'a.worknum,a.status,b.* ' )->alias( 'a' )->where('a.allvote',"<>",0)->join( 'gb_checktable b', 'a.sumid=b.id' )->join( 'gb_admin c', 'c.worknum=a.worknum' )->where("c.id",$yonghuid)->where("b.type","德的干部互评")->where("a.status","2")->paginate( 10 );
			}
			elseif($data["status"]=="3"){
				$artres = db("check")->field( 'a.worknum,a.status,b.* ' )->alias( 'a' )->where('a.allvote',"<>",0)->join( 'gb_checktable b', 'a.sumid=b.id' )->join( 'gb_admin c', 'c.worknum=a.worknum' )->where("c.id",$yonghuid)->where("b.type","德的干部互评")->where("a.status","3")->paginate( 10 );
			}
			elseif($data["status"]=="4"){
				$artres = db("check")->field( 'a.worknum,a.status,b.* ' )->alias( 'a' )->where('a.allvote',"<>",0)->join( 'gb_checktable b', 'a.sumid=b.id' )->join( 'gb_admin c', 'c.worknum=a.worknum' )->where("c.id",$yonghuid)->where("b.type","德的干部互评")->where("a.status","4")->paginate( 10 );
			}
			else{
				$artres = db("check")->field( 'a.worknum,a.status,b.* ' )->alias( 'a' )->where('a.allvote',"<>",0)->join( 'gb_checktable b', 'a.sumid=b.id' )->join( 'gb_admin c', 'c.worknum=a.worknum' )->where("c.id",$yonghuid)->where("b.type","德的干部互评")->where("a.status","2")->paginate( 10 );
			}
			$time=time();
			$this->assign( array(
				'artres' => $artres,
				'time' => $time,
				) );

			return view();
		}
		return view();
	}

	public function lst6() {
		//判断用户调查表状态：已测评——1;未测评——2;已过期——3;未开始——4;
		$yonghuid=session('id');
		$yh_check=db("check")->field( 'a.worknum,a.status,b.* ' )->alias( 'a' )->join( 'gb_checktable b', 'a.sumid=b.id' )->join( 'gb_admin c', 'c.worknum=a.worknum' )->where("c.id",$yonghuid)->select();
		//dump($yh_check);die;
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
		$artres = db("check")->field( 'a.worknum,a.status,b.* ' )->alias( 'a' )->where('a.allvote',"<>",0)->join( 'gb_checktable b', 'a.sumid=b.id' )->join( 'gb_admin c', 'c.worknum=a.worknum' )->where("c.id",$yonghuid)->where("b.type","试用期干部测评")->paginate( 10 );
		//dump($artres);
		$this->assign( array(
			'artres' => $artres,
			'time' => $time,
			) );
		if ( request()->isPost() ) {
			$data = input( 'post.' );
			//dump($data);die;
			if($data["status"]=="1"){
				$artres = db("check")->field( 'a.worknum,a.status,b.* ' )->alias( 'a' )->where('a.allvote',"<>",0)->join( 'gb_checktable b', 'a.sumid=b.id' )->join( 'gb_admin c', 'c.worknum=a.worknum' )->where("c.id",$yonghuid)->where("b.type","试用期干部测评")->where("a.status","1")->paginate( 10 );
			}
			elseif($data["status"]=="2"){
				$artres = db("check")->field( 'a.worknum,a.status,b.* ' )->alias( 'a' )->where('a.allvote',"<>",0)->join( 'gb_checktable b', 'a.sumid=b.id' )->join( 'gb_admin c', 'c.worknum=a.worknum' )->where("c.id",$yonghuid)->where("b.type","试用期干部测评")->where("a.status","2")->paginate( 10 );
			}
			elseif($data["status"]=="3"){
				$artres = db("check")->field( 'a.worknum,a.status,b.* ' )->alias( 'a' )->where('a.allvote',"<>",0)->join( 'gb_checktable b', 'a.sumid=b.id' )->join( 'gb_admin c', 'c.worknum=a.worknum' )->where("c.id",$yonghuid)->where("b.type","试用期干部测评")->where("a.status","3")->paginate( 10 );
			}
			elseif($data["status"]=="4"){
				$artres = db("check")->field( 'a.worknum,a.status,b.* ' )->alias( 'a' )->where('a.allvote',"<>",0)->join( 'gb_checktable b', 'a.sumid=b.id' )->join( 'gb_admin c', 'c.worknum=a.worknum' )->where("c.id",$yonghuid)->where("b.type","试用期干部测评")->where("a.status","4")->paginate( 10 );
			}
			else{
				$artres = db("check")->field( 'a.worknum,a.status,b.* ' )->alias( 'a' )->where('a.allvote',"<>",0)->join( 'gb_checktable b', 'a.sumid=b.id' )->join( 'gb_admin c', 'c.worknum=a.worknum' )->where("c.id",$yonghuid)->where("b.type","试用期干部测评")->where("a.status","2")->paginate( 10 );
			}
			$time=time();
			$this->assign( array(
				'artres' => $artres,
				'time' => $time,
				) );

			return view();
		}
		return view();
	}
	public
	function lst7() {
		//判断用户调查表状态：已测评——1;未测评——2;已过期——3;未开始——4;
		$yonghuid=session('id');
		//dump($yonghuid);die;
		$yh_check=db("check")->field( 'a.worknum,a.status,b.* ' )->alias( 'a' )->join( 'gb_checktable b', 'a.sumid=b.id' )->join( 'gb_admin c', 'c.worknum=a.worknum' )->where("c.id",$yonghuid)->select();
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
		$artres = db("check")->field( 'a.worknum,a.status,b.* ' )->alias( 'a' )->where('a.allvote',"<>",0)->join( 'gb_checktable b', 'a.sumid=b.id' )->join( 'gb_admin c', 'c.worknum=a.worknum' )->where("c.id",$yonghuid)->where("b.type","领导对干部测评")->paginate( 10 );
		//dump($artres);die;
		$this->assign( array(
			'artres' => $artres,
			'time' => $time,
			) );

		if ( request()->isPost() ) {

			$data = input( 'post.' );
			//dump($data);die;
			if($data["status"]=="1"){
				$artres = db("check")->field( 'a.worknum,a.status,b.* ' )->alias( 'a' )->where('a.allvote',"<>",0)->join( 'gb_checktable b', 'a.sumid=b.id' )->join( 'gb_admin c', 'c.worknum=a.worknum' )->where("c.id",$yonghuid)->where("b.type","领导对干部测评")->where("a.status","1")->paginate( 10 );
			}
			elseif($data["status"]=="2"){
				$artres = db("check")->field( 'a.worknum,a.status,b.* ' )->alias( 'a' )->where('a.allvote',"<>",0)->join( 'gb_checktable b', 'a.sumid=b.id' )->join( 'gb_admin c', 'c.worknum=a.worknum' )->where("c.id",$yonghuid)->where("b.type","领导对干部测评")->where("a.status","2")->paginate( 10 );
			}
			elseif($data["status"]=="3"){
				$artres = db("check")->field( 'a.worknum,a.status,b.* ' )->alias( 'a' )->where('a.allvote',"<>",0)->join( 'gb_checktable b', 'a.sumid=b.id' )->join( 'gb_admin c', 'c.worknum=a.worknum' )->where("c.id",$yonghuid)->where("b.type","领导对干部测评")->where("a.status","3")->paginate( 10 );
			}
			elseif($data["status"]=="4"){
				$artres = db("check")->field( 'a.worknum,a.status,b.* ' )->alias( 'a' )->where('a.allvote',"<>",0)->join( 'gb_checktable b', 'a.sumid=b.id' )->join( 'gb_admin c', 'c.worknum=a.worknum' )->where("c.id",$yonghuid)->where("b.type","领导对干部测评")->where("a.status","4")->paginate( 10 );
			}
			else{
				$artres = db("check")->field( 'a.worknum,a.status,b.* ' )->alias( 'a' )->where('a.allvote',"<>",0)->join( 'gb_checktable b', 'a.sumid=b.id' )->join( 'gb_admin c', 'c.worknum=a.worknum' )->where("c.id",$yonghuid)->where("b.type","领导对干部测评")->where("a.status","2")->paginate( 10 );
			}
			$time=time();
			$this->assign( array(
				'artres' => $artres,
				) );

			return view();
		}
		return view();
	}
	public function lst8() {
		//判断用户调查表状态：已测评——1;未测评——2;已过期——3;未开始——4;
		$yonghuid=session('id');
		//dump($yonghuid);die;
		$yh_check=db("check")->field( 'a.worknum,a.status,b.* ' )->alias( 'a' )->join( 'gb_checktable b', 'a.sumid=b.id' )->join( 'gb_admin c', 'c.worknum=a.worknum' )->where("c.id",$yonghuid)->select();
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
		$artres = db("check")->field( 'a.worknum,a.status,b.* ' )->alias( 'a' )->where('a.allvote',"<>",0)->join( 'gb_checktable b', 'a.sumid=b.id' )->join( 'gb_admin c', 'c.worknum=a.worknum' )->where("c.id",$yonghuid)->where("b.type","科级干部互评")->paginate( 10 );
		//dump($artres);die;
		$this->assign( array(
			'artres' => $artres,
			'time' => $time,
			) );

		if ( request()->isPost() ) {

			$data = input( 'post.' );
			//dump($data);die;
			if($data["status"]=="1"){
				$artres = db("check")->field( 'a.worknum,a.status,b.* ' )->alias( 'a' )->where('a.allvote',"<>",0)->join( 'gb_checktable b', 'a.sumid=b.id' )->join( 'gb_admin c', 'c.worknum=a.worknum' )->where("c.id",$yonghuid)->where("b.type","科级干部互评")->where("a.status","1")->paginate( 10 );
			}
			elseif($data["status"]=="2"){
				$artres = db("check")->field( 'a.worknum,a.status,b.* ' )->alias( 'a' )->where('a.allvote',"<>",0)->join( 'gb_checktable b', 'a.sumid=b.id' )->join( 'gb_admin c', 'c.worknum=a.worknum' )->where("c.id",$yonghuid)->where("b.type","科级干部互评")->where("a.status","2")->paginate( 10 );
			}
			elseif($data["status"]=="3"){
				$artres = db("check")->field( 'a.worknum,a.status,b.* ' )->alias( 'a' )->where('a.allvote',"<>",0)->join( 'gb_checktable b', 'a.sumid=b.id' )->join( 'gb_admin c', 'c.worknum=a.worknum' )->where("c.id",$yonghuid)->where("b.type","科级干部互评")->where("a.status","3")->paginate( 10 );
			}
			elseif($data["status"]=="4"){
				$artres = db("check")->field( 'a.worknum,a.status,b.* ' )->alias( 'a' )->where('a.allvote',"<>",0)->join( 'gb_checktable b', 'a.sumid=b.id' )->join( 'gb_admin c', 'c.worknum=a.worknum' )->where("c.id",$yonghuid)->where("b.type","科级干部互评")->where("a.status","4")->paginate( 10 );
			}
			else{
				$artres = db("check")->field( 'a.worknum,a.status,b.* ' )->alias( 'a' )->where('a.allvote',"<>",0)->join( 'gb_checktable b', 'a.sumid=b.id' )->join( 'gb_admin c', 'c.worknum=a.worknum' )->where("c.id",$yonghuid)->where("b.type","科级干部互评")->where("a.status","2")->paginate( 10 );
			}
			$time=time();
			$this->assign( array(
				'artres' => $artres,
				) );

			return view();
		}
		return view();
	}

	function lst9() {
		//判断用户调查表状态：已测评——1;未测评——2;已过期——3;未开始——4;
		$yonghuid=session('id');
		//dump($yonghuid);die;
		$yh_check=db("check")->field( 'a.worknum,a.status,b.* ' )->alias( 'a' )->join( 'gb_checktable b', 'a.sumid=b.id' )->join( 'gb_admin c', 'c.worknum=a.worknum' )->where("c.id",$yonghuid)->select();
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
		$artres = db("check")->field( 'a.worknum,a.status,b.* ' )->alias( 'a' )->where('a.allvote',"<>",0)->join( 'gb_checktable b', 'a.sumid=b.id' )->join( 'gb_admin c', 'c.worknum=a.worknum' )->where("c.id",$yonghuid)->where("b.type","部门负责人测评")->paginate( 10 );
		$this->assign( array(
			'artres' => $artres,
			'time' => $time,
			) );

		if ( request()->isPost() ) {

			$data = input( 'post.' );
			//dump($data);die;
			if($data["status"]=="1"){
				$artres = db("check")->field( 'a.worknum,a.status,b.* ' )->alias( 'a' )->where('a.allvote',"<>",0)->join( 'gb_checktable b', 'a.sumid=b.id' )->join( 'gb_admin c', 'c.worknum=a.worknum' )->where("c.id",$yonghuid)->where("b.type","部门负责人测评")->where("a.status","1")->paginate( 10 );
			}
			elseif($data["status"]=="2"){
				$artres = db("check")->field( 'a.worknum,a.status,b.* ' )->alias( 'a' )->where('a.allvote',"<>",0)->join( 'gb_checktable b', 'a.sumid=b.id' )->join( 'gb_admin c', 'c.worknum=a.worknum' )->where("c.id",$yonghuid)->where("b.type","部门负责人测评")->where("a.status","2")->paginate( 10 );
			}
			elseif($data["status"]=="3"){
				$artres = db("check")->field( 'a.worknum,a.status,b.* ' )->alias( 'a' )->where('a.allvote',"<>",0)->join( 'gb_checktable b', 'a.sumid=b.id' )->join( 'gb_admin c', 'c.worknum=a.worknum' )->where("c.id",$yonghuid)->where("b.type","部门负责人测评")->where("a.status","3")->paginate( 10 );
			}
			elseif($data["status"]=="4"){
				$artres = db("check")->field( 'a.worknum,a.status,b.* ' )->alias( 'a' )->where('a.allvote',"<>",0)->join( 'gb_checktable b', 'a.sumid=b.id' )->join( 'gb_admin c', 'c.worknum=a.worknum' )->where("c.id",$yonghuid)->where("b.type","部门负责人测评")->where("a.status","4")->paginate( 10 );
			}
			else{
				$artres = db("check")->field( 'a.worknum,a.status,b.* ' )->alias( 'a' )->where('a.allvote',"<>",0)->join( 'gb_checktable b', 'a.sumid=b.id' )->join( 'gb_admin c', 'c.worknum=a.worknum' )->where("c.id",$yonghuid)->where("b.type","部门负责人测评")->where("a.status","2")->paginate( 10 );
			}
			$time=time();
			$this->assign( array(
				'artres' => $artres,
				) );

			return view();
		}
		return view();
	}

	
	public function checklst() {
		$id=input('id');
		$yonghuid=session('id');				//当前用户ID
		$user= db('admin')->where('id',$yonghuid)->find();
		//dump($user);die;
		$user_type = $user['type'];
		//dump($user_type);die;
		$yonghuinf=db("admin")->where("id",$yonghuid)->find();   //当前用户除密码外的信息
		$type= db('checktable')->field('type')->where('id',$id)->find();
		$yonghucateinf=db("cate")->where('id',$yonghuinf["cateid"])->find();//当前用户的部门信息
		// dump($yonghuinf);
		//dump($type);die;
		// dump($yonghucateinf);die;
		if($type["type"]=="班子测评")
		{
			$artres = db( 'checktable' )->field('a.name checkname,a.timestart,a.timeend,c.catename,b.cateid,a.type')->alias( 'a' )->join( 'gb_bechecked b', 'a.id=b.sumid' )->join( 'gb_cate c', 'c.id=b.cateid' )->where('c.id',$yonghuinf["cateid"])->where('a.id',$id)->select();
			if(!$artres){
				$this->error( '无候选部门信息！', url( 'lst3' ) );
			}
		//判断是否对此部门投过票
			foreach ($artres as $key => $value) {
				if(db("data")->where("sumid",$id)->where("worknum",$yonghuinf["worknum"])->where("cateid",$value["cateid"])->find()){
					$artres[$key]["status"]="1";
				}
				else{
					$artres[$key]["status"]="2";
				}
			}
		//END
			$department = db( 'cate' )->order( 'id' )->select();
			$checktable=db("checktable")->where("id",$id)->find();
			$this->assign( array(
				'type' => $type["type"],
				'artres' => $artres,
				'department' => $department,
				'id' => $id,
				'checktable' => $checktable,
				) );
			return view();
		}
		elseif($type["type"]=="领导对干部测评") {
			$artres = db( 'admin' )->field( 'a.worknum,a.name,a.type,a.cateid,b.*,c.catename,e.name checkname,e.timestart,e.timeend ' )->alias( 'a' )->join( 'gb_article b', 'a.worknum=b.adminid' )->join( 'gb_cate c', 'c.id=a.cateid' )->join( 'gb_bechecked d', 'd.worknum=a.worknum' )->join( 'gb_checktable e', 'e.id=d.sumid' )->where('e.id',$id)->where("a.type='中层干部' or a.type='科级干部'")->order( 'b.sort,a.worknum' )->select();
			$count = db( 'admin' )->field( 'a.worknum,a.name,a.type,a.cateid,b.*,c.catename,e.name checkname,e.timestart,e.timeend ' )->alias( 'a' )->join( 'gb_article b', 'a.worknum=b.adminid' )->join( 'gb_cate c', 'c.id=a.cateid' )->join( 'gb_bechecked d', 'd.worknum=a.worknum' )->join( 'gb_checktable e', 'e.id=d.sumid' )->where('e.id',$id)->where("a.type='中层干部' or a.type='科级干部'")->order( 'b.sort,a.worknum' )->count();
			if(!$artres){
				if($type["type"]=="领导对干部测评"){
					$this->error( '无候选人信息！', url( 'lst7' ) );
				}
			}
		//判断是否对此人投过票
			foreach ($artres as $key => $value) {
				if(db("data")->where("sumid",$id)->where("worknum",$yonghuinf["worknum"])->where("beworknum",$value["worknum"])->find()){
					$artres[$key]["status"]="1";
				}
				else{
					$artres[$key]["status"]="2";
				}
			}
		//END
			$department = db( 'cate' )->order( 'id' )->select();
			$checktable=db("checktable")->where("id",$id)->find();
			$this->assign( array(
				'type' => $type["type"],
				'artres' => $artres,
				'department' => $department,
				'id' => $id,
				'checktable' => $checktable,
				) );
			return view();
		}
		elseif($type["type"]=="民主测评")
		{	
			if($user_type == "科级干部"){
				$artres = db( 'admin' )->field( 'a.worknum,a.name,a.type,a.cateid,b.*,c.catename,e.name checkname,e.timestart,e.timeend ' )->alias( 'a' )->join( 'gb_article b', 'a.worknum=b.adminid' )->join( 'gb_cate c', 'c.id=a.cateid' )->join( 'gb_bechecked d', 'd.worknum=a.worknum' )->join( 'gb_checktable e', 'e.id=d.sumid' )->where('e.id',$id)->where("a.type='中层干部'")->where('a.cateid',$yonghuinf["cateid"])->order( 'b.sort,a.worknum' )->select();

			    $count = db( 'admin' )->field( 'a.worknum,a.name,a.type,a.cateid,b.*,c.catename,e.name checkname,e.timestart,e.timeend ' )->alias( 'a' )->join( 'gb_article b', 'a.worknum=b.adminid' )->join( 'gb_cate c', 'c.id=a.cateid' )->join( 'gb_bechecked d', 'd.worknum=a.worknum' )->join( 'gb_checktable e', 'e.id=d.sumid' )->where('e.id',$id)->where("a.type='中层干部'")->where('a.cateid',$yonghuinf["cateid"])->order( 'b.sort,a.worknum' )->count();
			}
			else{
				$artres = db( 'admin' )->field( 'a.worknum,a.name,a.type,a.cateid,b.*,c.catename,e.name checkname,e.timestart,e.timeend ' )->alias( 'a' )->join( 'gb_article b', 'a.worknum=b.adminid' )->join( 'gb_cate c', 'c.id=a.cateid' )->join( 'gb_bechecked d', 'd.worknum=a.worknum' )->join( 'gb_checktable e', 'e.id=d.sumid' )->where('e.id',$id)->where("a.type='中层干部' or a.type='科级干部'")->where('a.cateid',$yonghuinf["cateid"])->order( 'b.sort,a.worknum' )->select();//dump($artres);die;
			    $count = db( 'admin' )->field( 'a.worknum,a.name,a.type,a.cateid,b.*,c.catename,e.name checkname,e.timestart,e.timeend ' )->alias( 'a' )->join( 'gb_article b', 'a.worknum=b.adminid' )->join( 'gb_cate c', 'c.id=a.cateid' )->join( 'gb_bechecked d', 'd.worknum=a.worknum' )->join( 'gb_checktable e', 'e.id=d.sumid' )->where('e.id',$id)->where("a.type='中层干部' or a.type='科级干部'")->where('a.cateid',$yonghuinf["cateid"])->order( 'b.sort,a.worknum' )->count();
			    //dump($artres);
			    //dump($count);die;

			}
			//dump($artres);die;
			
			if(!$artres){
				$this->error( '无候选人信息！', url( 'lst1' ) );
				
			}
		//判断是否对此人投过票
			foreach ($artres as $key => $value) {
				if(db("data")->where("sumid",$id)->where("worknum",$yonghuinf["worknum"])->where("beworknum",$value["worknum"])->find()){
					$artres[$key]["status"]="1";
				}
				else{
					$artres[$key]["status"]="2";
				}
			}
		//END
			$department = db( 'cate' )->order( 'id' )->select();
			$checktable=db("checktable")->where("id",$id)->find();
			$this->assign( array(
				'type' => $type["type"],
				'artres' => $artres,
				'department' => $department,
				'id' => $id,
				'checktable' => $checktable,
				) );
			return view();
		}

		elseif($type['type']=="部门负责人测评"){
			//dump($yonghucateinf['keywords']);die;
			if($yonghucateinf['keywords'] == "教学部门")
			{
			$artres = db( 'admin' )->field( 'a.worknum,a.name,a.type,a.cateid,b.*,c.catename,e.name checkname,e.timestart,e.timeend ' )->alias( 'a' )->join( 'gb_article b', 'a.worknum=b.adminid' )->join( 'gb_cate c', 'c.id=a.cateid' )->join( 'gb_bechecked d', 'd.worknum=a.worknum' )->join( 'gb_checktable e', 'e.id=d.sumid' )->where('e.id',$id)->where("a.type='科级干部'")->where('a.cateid',$yonghuinf["cateid"])->order( 'b.sort,a.worknum' )->select();
			$count = db( 'admin' )->field( 'a.worknum,a.name,a.type,a.cateid,b.*,c.catename,e.name checkname,e.timestart,e.timeend ' )->alias( 'a' )->join( 'gb_article b', 'a.worknum=b.adminid' )->join( 'gb_cate c', 'c.id=a.cateid' )->join( 'gb_bechecked d', 'd.worknum=a.worknum' )->join( 'gb_checktable e', 'e.id=d.sumid' )->where('e.id',$id)->where("a.type='科级干部'")->where('a.cateid',$yonghuinf["cateid"])->order( 'b.sort,a.worknum' )->count();
			}
			else if($yonghucateinf['keywords'] == "机关部门"){
				$artres = db( 'admin' )->field( 'a.worknum,a.name,a.type,a.cateid,b.*,c.catename,e.name checkname,e.timestart,e.timeend ' )->alias( 'a' )->join( 'gb_article b', 'a.worknum=b.adminid' )->join( 'gb_cate c', 'c.id=a.cateid' )->join( 'gb_bechecked d', 'd.worknum=a.worknum' )->join( 'gb_checktable e', 'e.id=d.sumid' )->where('e.id',$id)->where("a.type='科级干部'")->where('a.cateid2',$yonghuinf["cateid2"])->order( 'b.sort,a.worknum' )->select();
				$count = db( 'admin' )->field( 'a.worknum,a.name,a.type,a.cateid,b.*,c.catename,e.name checkname,e.timestart,e.timeend ' )->alias( 'a' )->join( 'gb_article b', 'a.worknum=b.adminid' )->join( 'gb_cate c', 'c.id=a.cateid' )->join( 'gb_bechecked d', 'd.worknum=a.worknum' )->join( 'gb_checktable e', 'e.id=d.sumid' )->where('e.id',$id)->where("a.type='科级干部'")->where('a.cateid2',$yonghuinf["cateid2"])->order( 'b.sort,a.worknum' )->count();
			}
			if(!$artres){
					$this->error( '无候选人信息！', url( '/' ) );
			}
		//判断是否对此人投过票
			foreach ($artres as $key => $value) {
				if(db("data")->where("sumid",$id)->where("worknum",$yonghuinf["worknum"])->where("beworknum",$value["worknum"])->find()){
					$artres[$key]["status"]="1";
				}
				else{
					$artres[$key]["status"]="2";
				}
			}
		//END
			$department = db( 'cate' )->order( 'id' )->select();
			$checktable=db("checktable")->where("id",$id)->find();
			$this->assign( array(
				'type' => $type["type"],
				'artres' => $artres,
				'department' => $department,
				'id' => $id,
				'checktable' => $checktable,
				) );
			return view();

		}


		elseif($type["type"]=="民主干部互评")
		{
			$artres = db( 'admin' )->field( 'a.worknum,a.name,a.type,a.cateid,b.*,c.catename,e.name checkname,e.timestart,e.timeend ' )->alias( 'a' )->join( 'gb_article b', 'a.worknum=b.adminid' )->join( 'gb_cate c', 'c.id=a.cateid' )->join( 'gb_bechecked d', 'd.worknum=a.worknum' )->join( 'gb_checktable e', 'e.id=d.sumid' )->where('e.id',$id)->where("a.type='中层干部'")->order( 'b.sort' )->select();
			if(!$artres){

					$this->error( '无候选人信息！', url( 'lst4' ) );
				
			}
		//判断是否对此人投过票
			foreach ($artres as $key => $value) {
				if(db("data")->where("sumid",$id)->where("worknum",$yonghuinf["worknum"])->where("beworknum",$value["worknum"])->find()){
					$artres[$key]["status"]="1";
				}
				else{
					$artres[$key]["status"]="2";
				}
			}
		//END
			$department = db( 'cate' )->order( 'id' )->select();
			$checktable=db("checktable")->where("id",$id)->find();
			$this->assign( array(
				'type' => $type["type"],
				'artres' => $artres,
				'department' => $department,
				'id' => $id,
				'checktable' => $checktable,
				) );
			return view();
		}
		elseif($type["type"]=="科级干部互评")
		{
			$artres = db( 'admin' )->field( 'a.worknum,a.name,a.type,a.cateid,b.*,c.catename,e.name checkname,e.timestart,e.timeend ' )->alias( 'a' )->join( 'gb_article b', 'a.worknum=b.adminid' )->join( 'gb_cate c', 'c.id=a.cateid' )->join( 'gb_bechecked d', 'd.worknum=a.worknum' )->join( 'gb_checktable e', 'e.id=d.sumid' )->where('e.id',$id)->where("a.type='科级干部'")->order( 'b.sort,a.worknum' )->where('c.keywords','<>',$yonghucateinf['keywords'])->select();
			$count = db( 'admin' )->field( 'a.worknum,a.name,a.type,a.cateid,b.*,c.catename,e.name checkname,e.timestart,e.timeend ' )->alias( 'a' )->join( 'gb_article b', 'a.worknum=b.adminid' )->join( 'gb_cate c', 'c.id=a.cateid' )->join( 'gb_bechecked d', 'd.worknum=a.worknum' )->join( 'gb_checktable e', 'e.id=d.sumid' )->where('c.keywords','<>',$yonghucateinf['keywords'])->where('e.id',$id)->where("a.type='科级干部'")->order( 'b.sort,a.worknum' )->count();
			if(!$artres){
				if($type["type"]=="科级干部互评" ){
					$this->error( '无候选人信息！', url( 'lst8' ) );
				}
			}
		//判断是否对此人投过票
			foreach ($artres as $key => $value) {
				if(db("data")->where("sumid",$id)->where("worknum",$yonghuinf["worknum"])->where("beworknum",$value["worknum"])->find()){
					$artres[$key]["status"]="1";
				}
				else{
					$artres[$key]["status"]="2";
				}
			}
		//END
			$department = db( 'cate' )->order( 'id' )->select();
			$checktable=db("checktable")->where("id",$id)->find();
			$this->assign( array(
				'type' => $type["type"],
				'artres' => $artres,
				'department' => $department,
				'id' => $id,
				'checktable' => $checktable,
				) );
			return view();
		}
		elseif($type["type"]=="试用期干部测评" )
		{
			if($yonghucateinf["keywords"]=="机关部门"){
				$artres = db( 'admin' )->field( 'a.worknum,a.name,a.type,a.cateid,b.*,c.catename,e.name checkname,e.timestart,e.timeend ' )->alias( 'a' )->join( 'gb_article b', 'a.worknum=b.adminid' )->join( 'gb_cate c', 'c.id=a.cateid' )->join( 'gb_bechecked d', 'd.worknum=a.worknum' )->join( 'gb_checktable e', 'e.id=d.sumid' )->where('e.id',$id)->where('b.try',"是")->where('a.type',"中层干部")->where('c.keywords',$yonghucateinf["keywords"])->order( 'b.sort,a.worknum' )->select();
			}
			else{
				$artres = db( 'admin' )->field( 'a.worknum,a.name,a.type,a.cateid,b.*,c.catename,e.name checkname,e.timestart,e.timeend ' )->alias( 'a' )->join( 'gb_article b', 'a.worknum=b.adminid' )->join( 'gb_cate c', 'c.id=a.cateid' )->join( 'gb_bechecked d', 'd.worknum=a.worknum' )->join( 'gb_checktable e', 'e.id=d.sumid' )->where('e.id',$id)->where('b.try',"是")->where('a.type',"中层干部")->where('a.cateid',$yonghuinf["cateid"])->order( 'b.sort,a.worknum' )->select();
			}
			
			//dump($artres);die;
			if(!$artres){
				if($type["type"]=="试用期干部测评" ){
					$this->error( '无候选人信息！', url( 'lst1' ) );
				}
				elseif($type["type"]=="德的考核考察"){
					$this->error( '无候选人信息！', url( 'lst2' ) );
				}
			}
		//判断是否对此人投过票
			foreach ($artres as $key => $value) {
				if(db("data")->where("sumid",$id)->where("worknum",$yonghuinf["worknum"])->where("beworknum",$value["worknum"])->find()){
					$artres[$key]["status"]="1";
				}
				else{
					$artres[$key]["status"]="2";
				}
			}
		//END
			$department = db( 'cate' )->order( 'id' )->select();
			$checktable=db("checktable")->where("id",$id)->find();
			$this->assign( array(
				'type' => $type["type"],
				'artres' => $artres,
				'department' => $department,
				'id' => $id,
				'checktable' => $checktable,
				) );
			return view();
		}
	}

	public function cepin1() {
		//dump(input('param.page'));die;
		if(input('param.page')) {
			$page=input('param.page');
			session('cepin1page', $page);
		}
		$user_id = session('worknum');
		//dump($user_id);die;
		$user_type = db('admin')->where('worknum',$user_id)->value('type');

		$tableid=input("id");					//调查表ID
		if($tableid){
			session('tableid', $tableid );
		}
		$yonghuid=session('id');				//当前用户ID
		$yonghuinf=db("admin")->where("id",$yonghuid)->find();   //当前用户除密码外的信息
		//dump($yonghuinf);die;
		$use_cate=db("cate")->where('id',$yonghuinf['cateid'])->find();
		//dump($use_cate);die;
		$type5=db('checktable')->where('id', $tableid)->value('type');
		//dump($type5);die;
		if($type5=='领导对干部测评') {
			$pageCount = db( 'admin' )->field( 'a.worknum,a.name,a.type,a.cateid,b.*,c.catename,e.name checkname,e.timestart,e.timeend ' )->alias( 'a' )->join( 'gb_article b', 'a.worknum=b.adminid' )->join( 'gb_cate c', 'c.id=a.cateid' )->join( 'gb_bechecked d', 'd.worknum=a.worknum' )->join( 'gb_checktable e', 'e.id=d.sumid' )->where('e.id',$tableid)->where("a.type='中层干部' or a.type='科级干部'")->order( 'b.sort,a.worknum' )->count();
			session('pageCount', $pageCount);

		}
		elseif ($type5=='科级干部互评') {
		 	$pageCount = db( 'admin' )->field( 'a.worknum,a.name,a.type,a.cateid,b.*,c.catename,e.name checkname,e.timestart,e.timeend ' )->alias( 'a' )->join( 'gb_article b', 'a.worknum=b.adminid' )->join( 'gb_cate c', 'c.id=a.cateid' )->join( 'gb_bechecked d', 'd.worknum=a.worknum' )->join( 'gb_checktable e', 'e.id=d.sumid' )->where('c.keywords','<>',$use_cate['keywords'])->where('e.id',$tableid)->where("a.type='科级干部'")->order( 'b.sort,a.worknum' )->count();
		 	session('pageCount', $pageCount);
		 	//dump($pageCount);die;
		 
		}
		elseif($type5=="民主干部互评"){
            $pageCount = db( 'admin' )->field( 'a.worknum,a.name,a.type,a.cateid,b.*,c.catename,e.name checkname,e.timestart,e.timeend ' )->alias( 'a' )->join( 'gb_article b', 'a.worknum=b.adminid' )->join( 'gb_cate c', 'c.id=a.cateid' )->join( 'gb_bechecked d', 'd.worknum=a.worknum' )->join( 'gb_checktable e', 'e.id=d.sumid' )->where('e.id',$tableid)->where("a.type='中层干部'")->order( 'b.sort' )->count();
            session('pageCount', $pageCount);
		}
        
        elseif($type5=="部门负责人测评"){
        	//dump($use_cate);die;
        	$use_cateid2=db('admin') -> where('worknum',$user_id) -> value('cateid2');
        	if($use_cate['keywords'] == "机关部门"){
        	 	$pageCount = db( 'admin' )->field( 'a.worknum,a.name,a.type,a.cateid,b.*,c.catename,e.name checkname,e.timestart,e.timeend ' )->alias( 'a' )->join( 'gb_article b', 'a.worknum=b.adminid' )->join( 'gb_cate c', 'c.id=a.cateid' )->join( 'gb_bechecked d', 'd.worknum=a.worknum' )->join( 'gb_checktable e', 'e.id=d.sumid' )->where('e.id',$tableid)->where("a.type='科级干部'")->where('a.cateid2',$use_cateid2)->order( 'b.sort,a.worknum' )->count();
        	 	session('pageCount', $pageCount);
        	}
        	else{
        		$pageCount = db( 'admin' )->field( 'a.worknum,a.name,a.type,a.cateid,b.*,c.catename,e.name checkname,e.timestart,e.timeend ' )->alias( 'a' )->join( 'gb_article b', 'a.worknum=b.adminid' )->join( 'gb_cate c', 'c.id=a.cateid' )->join( 'gb_bechecked d', 'd.worknum=a.worknum' )->join( 'gb_checktable e', 'e.id=d.sumid' )->where('e.id',$tableid)->where("a.type='科级干部'")->where('a.cateid',$yonghuinf['cateid'])->order( 'b.sort,a.worknum' )->count();
        		session('pageCount', $pageCount);
        	}
        	//dump($pageCount);die;
        }
		else if($type5=="民主测评"){
            if($user_type == "科级干部"){
            	$pageCount=db( 'admin' )->field( 'a.worknum,a.name,a.type,a.cateid,b.*,c.catename,e.name checkname,e.timestart,e.timeend ' )->alias( 'a' )->join( 'gb_article b', 'a.worknum=b.adminid' )->join( 'gb_cate c', 'c.id=a.cateid' )->join( 'gb_bechecked d', 'd.worknum=a.worknum' )->join( 'gb_checktable e', 'e.id=d.sumid' )->where('e.id',$tableid)->where("a.type='中层干部'")->where('a.cateid',$use_cate['id'])->order( 'b.sort,a.worknum' )->count();

            	session('pageCount', $pageCount);
            }
            else{
				$pageCount=db( 'admin' )->field( 'a.worknum,a.name,a.type,a.cateid,b.*,c.catename,e.name checkname,e.timestart,e.timeend ' )->alias( 'a' )->join( 'gb_article b', 'a.worknum=b.adminid' )->join( 'gb_cate c', 'c.id=a.cateid' )->join( 'gb_bechecked d', 'd.worknum=a.worknum' )->join( 'gb_checktable e', 'e.id=d.sumid' )->where('e.id',$tableid)->where("a.type='中层干部' or a.type='科级干部'")->where('a.cateid',$use_cate['id'])->order( 'b.sort,a.worknum' )->count();
				session('pageCount', $pageCount);
			}
			//dump($pageCount);die;
		}
		
			
			
		$type= db('checktable')->field('type')->where('id',$tableid)->find();
		if ( request()->isPost() ) {
			//dump($newPage);die;
			//$worknum=session('worknum');
			$data = input( 'post.' );
			$data[ 'time' ] = time();
			$data[ 'worknum' ] = $yonghuinf["worknum"];
			$data[ 'sumid' ] = session('tableid');

			//判断是否对此人投过票
			$exist=db("data")->where('sumid',$data['sumid'])->where('worknum',$data['worknum'])->where('beworknum',$data['beworknum'])->find();
			if ($exist) {
				$this->error( '已有投票' );
			}
			//判断是否对此人投过票END
			//数据有效性判断
			if(!isset($data['de'])||!isset($data['neng'])||!isset($data['qin'])||!isset($data['ji'])||!isset($data['lian'])||!isset($data['summary']))
			{
				$this->error( '网络波动请重新投票' );
			}
			//数据有效性判断END


			//数据备份
			$data2 = $data;
			//量化选项分数
			foreach ($data2 as $key => $value) {
				if($value=="好"){
					$data2[$key]=100;
				}
				elseif($value=="较好"){
					$data2[$key]=80;
				}
				elseif($value=="一般"){
					$data2[$key]=60;
				}
				elseif($value=="差"){
					$data2[$key]=0;
				}
				if($value=="优秀"){
					$data2[$key]=100;
				}
				elseif($value=="称职"){
					$data2[$key]=80;
				}
				elseif($value=="基本称职"){
					$data2[$key]=60;
				}
				elseif($value=="不称职"){
					$data2[$key]=0;
				}
			}
			//量化选项分数END
			//德 分数计算
			$k1=0;
			$k2=0;
			$k3=0;
			$k4=0;
			$k5=0;
			$k6=1;
			//五个选项的分数占比  总分=k1*第一题分数+k2*第二题分数 以此类推

			foreach ($data2 as $key => $value) {
				if($key=="de"){
					$sum1=$k1*$value;
				}
				elseif($key=="neng"){
					$sum2=$k2*$value;
				}
				elseif($key=="qin"){
					$sum3=$k3*$value;
				}
				elseif($key=="ji"){
					$sum4=$k4*$value;
				}
				elseif($key=="lian"){
					$sum5=$k5*$value;
				}
				elseif($key=="summary"){
					$sum6=$k6*$value;
				}
			}
			$data['score']=$sum1+$sum2+$sum3+$sum4+$sum5+$sum6;

			//德 分数计算END

			//dump($data);die;
			//dump(db( 'data' )->insert( $data ));



			//session('tableid', null);
			if (  db( 'data' )->insert( $data ) ) {
				//dump(session('pageCount'));die;
				$newPage=session('cepin1page');
				//$worknum=session('worknum');
				//$pageCount=db('check')->where('worknum', $worknum)->where('sumid', $data[ 'sumid' ])->value('allvote');
				//dump($newPage);
				//$p = session('pageCount');
				//dump($p);die;
				if($newPage<=session('pageCount')){
					$url='cepin1/id/'.session('tableid').'.html?page='.$newPage;
					header("Location:$url");
					//dump("1");die;
				} else {
					//dump("2");die;
					$this->success( '测评完成！' ,url( 'checklst',array('id'=>$data[ 'sumid' ]) ) );
				}
			} else {
				$this->error( '测评失败！' );
			}	
			return;
		}

		if($type["type"]=="民主测评" || $type["type"]=="德的考核考察")
		{	
			/*$checkobject=db("view_checktable")->field( 'a.*,b.sort ' )->alias( 'a' )->join( 'gb_article b', 'a.beworknum=b.adminid' )->where("a.id",$tableid)->where("a.worknum",$yonghuinf["worknum"])->where('a.cateid',$yonghuinf["cateid"])->order( 'b.sort,a.beworknum' )->paginate(1,true,[
				'path'=>$_SERVER['SERVER_NAME'].'/lygbgl/public/index.php/admin/ceping/cepin1/id/'.session($tableid).'page/[PAGE].html',
					//'path'=>__ACTION__.'/channel/'.$channel.'/page/[PAGE].html',  
				]);		*/	
				if($user_type == "科级干部"){
					$checkobject=db( 'admin' )->field( 'a.worknum,a.name,a.type,a.cateid,b.*,c.catename,e.name checkname,e.timestart,e.timeend ' )->alias( 'a' )->join( 'gb_article b', 'a.worknum=b.adminid' )->join( 'gb_cate c', 'c.id=a.cateid' )->join( 'gb_bechecked d', 'd.worknum=a.worknum' )->join( 'gb_checktable e', 'e.id=d.sumid' )->where('e.id',$tableid)->where("a.type='中层干部'")->where('a.cateid',$use_cate['id'])->order( 'b.sort,a.worknum' )->paginate(1,true);	
					

					$checkobject2=db( 'admin' )->field( 'a.worknum,a.name,a.type,a.cateid,b.*,c.catename,e.name checkname,e.timestart,e.timeend ' )->alias( 'a' )->join( 'gb_article b', 'a.worknum=b.adminid' )->join( 'gb_cate c', 'c.id=a.cateid' )->join( 'gb_bechecked d', 'd.worknum=a.worknum' )->join( 'gb_checktable e', 'e.id=d.sumid' )->where('e.id',$tableid)->where("a.type='中层干部'")->where('a.cateid',$use_cate['id'])->order( 'b.sort,a.worknum' )->select();//dump($use_cate['keywords']);die;
				}else{
					$checkobject=db( 'admin' )->field( 'a.worknum,a.name,a.type,a.cateid,b.*,c.catename,e.name checkname,e.timestart,e.timeend ' )->alias( 'a' )->join( 'gb_article b', 'a.worknum=b.adminid' )->join( 'gb_cate c', 'c.id=a.cateid' )->join( 'gb_bechecked d', 'd.worknum=a.worknum' )->join( 'gb_checktable e', 'e.id=d.sumid' )->where('e.id',$tableid)->where("a.type='中层干部' or a.type='科级干部'")->where('a.cateid',$use_cate['id'])->order( 'b.sort,a.worknum' )->paginate(1,true);
					$checkobject2=db( 'admin' )->field( 'a.worknum,a.name,a.type,a.cateid,b.*,c.catename,e.name checkname,e.timestart,e.timeend ' )->alias( 'a' )->join( 'gb_article b', 'a.worknum=b.adminid' )->join( 'gb_cate c', 'c.id=a.cateid' )->join( 'gb_bechecked d', 'd.worknum=a.worknum' )->join( 'gb_checktable e', 'e.id=d.sumid' )->where('e.id',$tableid)->where("a.type='中层干部' or a.type='科级干部'")->where('a.cateid',$use_cate['id'])->order( 'b.sort,a.worknum' )->select();
				}
		}
		elseif($type["type"]=="领导对干部测评") {
			$checkobject=db( 'admin' )->field( 'a.worknum,a.name,a.type,a.cateid,b.*,c.catename,e.name checkname,e.timestart,e.timeend ' )->alias( 'a' )->join( 'gb_article b', 'a.worknum=b.adminid' )->join( 'gb_cate c', 'c.id=a.cateid' )->join( 'gb_bechecked d', 'd.worknum=a.worknum' )->join( 'gb_checktable e', 'e.id=d.sumid' )->where('e.id',$tableid)->where("a.type='中层干部' or a.type='科级干部'")->order( 'b.sort,a.worknum' )->paginate(1,true);		
			$checkobject2=db( 'admin' )->field( 'a.worknum,a.name,a.type,a.cateid,b.*,c.catename,e.name checkname,e.timestart,e.timeend ' )->alias( 'a' )->join( 'gb_article b', 'a.worknum=b.adminid' )->join( 'gb_cate c', 'c.id=a.cateid' )->join( 'gb_bechecked d', 'd.worknum=a.worknum' )->join( 'gb_checktable e', 'e.id=d.sumid' )->where('e.id',$tableid)->where("a.type='中层干部' or a.type='科级干部'")->order( 'b.sort,a.worknum' )->select();
		}
		elseif($type['type']=="部门负责人测评"){
			$use_cateid2=db('admin') -> where('worknum',$user_id)->value('cateid2');
			if($use_cate['keywords'] == "机关部门"){
				$checkobject=db( 'admin' )->field( 'a.worknum,a.name,a.type,a.cateid,b.*,c.catename,e.name checkname,e.timestart,e.timeend ' )->alias( 'a' )->join( 'gb_article b', 'a.worknum=b.adminid' )->join( 'gb_cate c', 'c.id=a.cateid' )->join( 'gb_bechecked d', 'd.worknum=a.worknum' )->join( 'gb_checktable e', 'e.id=d.sumid' )->where('e.id',$tableid)->where("a.type='科级干部'")->where('a.cateid2',$use_cateid2)->order( 'b.sort,a.worknum' )->paginate(1,true);
				$checkobject2=db( 'admin' )->field( 'a.worknum,a.name,a.type,a.cateid,b.*,c.catename,e.name checkname,e.timestart,e.timeend ' )->alias( 'a' )->join( 'gb_article b', 'a.worknum=b.adminid' )->join( 'gb_cate c', 'c.id=a.cateid' )->join( 'gb_bechecked d', 'd.worknum=a.worknum' )->join( 'gb_checktable e', 'e.id=d.sumid' )->where('e.id',$tableid)->where("a.type='科级干部'")->where('a.cateid2',$use_cateid2)->order( 'b.sort,a.worknum' )->select();
			}

			else{
				$checkobject=db( 'admin' )->field( 'a.worknum,a.name,a.type,a.cateid,b.*,c.catename,e.name checkname,e.timestart,e.timeend ' )->alias( 'a' )->join( 'gb_article b', 'a.worknum=b.adminid' )->join( 'gb_cate c', 'c.id=a.cateid' )->join( 'gb_bechecked d', 'd.worknum=a.worknum' )->join( 'gb_checktable e', 'e.id=d.sumid' )->where('e.id',$tableid)->where("a.type='科级干部'")->where('a.cateid',$yonghuinf['cateid'])->order( 'b.sort,a.worknum' )->paginate(1,true);
				//dump($checkobject);die;
				$checkobject2=db( 'admin' )->field( 'a.worknum,a.name,a.type,a.cateid,b.*,c.catename,e.name checkname,e.timestart,e.timeend ' )->alias( 'a' )->join( 'gb_article b', 'a.worknum=b.adminid' )->join( 'gb_cate c', 'c.id=a.cateid' )->join( 'gb_bechecked d', 'd.worknum=a.worknum' )->join( 'gb_checktable e', 'e.id=d.sumid' )->where('e.id',$tableid)->where("a.type='科级干部'")->where('a.cateid',$yonghuinf['cateid'])->order( 'b.sort,a.worknum' )->select();
			}
			//dump($checkobject);die;
		}
		elseif($type["type"]=="民主干部互评")
		{   
			//dump($yonghuinf['worknum']);die;
			$checkobject=db( 'admin' )->field( 'a.worknum,a.name,a.type,a.cateid,b.*,c.catename,e.name checkname,e.timestart,e.timeend ' )->alias( 'a' )->join( 'gb_article b', 'a.worknum=b.adminid' )->join( 'gb_cate c', 'c.id=a.cateid' )->join( 'gb_bechecked d', 'd.worknum=a.worknum' )->join( 'gb_checktable e', 'e.id=d.sumid' )->where('e.id',$tableid)->where("a.type='中层干部'")->order( 'b.sort' )->paginate(1,true);	
			//dump($checkobject);die;					
			$checkobject2=db( 'admin' )->field( 'a.worknum,a.name,a.type,a.cateid,b.*,c.catename,e.name checkname,e.timestart,e.timeend ' )->alias( 'a' )->join( 'gb_article b', 'a.worknum=b.adminid' )->join( 'gb_cate c', 'c.id=a.cateid' )->join( 'gb_bechecked d', 'd.worknum=a.worknum' )->join( 'gb_checktable e', 'e.id=d.sumid' )->where('e.id',$tableid)->where("a.type='中层干部'")->order( 'b.sort' )->select();
		}
		elseif($type["type"]=="科级干部互评")
		{
			$checkobject=db( 'admin' )->field( 'a.worknum,a.name,a.type,a.cateid,b.*,c.catename,e.name checkname,e.timestart,e.timeend ' )->alias( 'a' )->join( 'gb_article b', 'a.worknum=b.adminid' )->join( 'gb_cate c', 'c.id=a.cateid' )->join( 'gb_bechecked d', 'd.worknum=a.worknum' )->join( 'gb_checktable e', 'e.id=d.sumid' )->where('e.id',$tableid)->where("a.type='科级干部'")->order( 'b.sort,a.worknum' )->where('c.keywords','<>',$use_cate['keywords'])->paginate(1,true);
			//dump($use_cate['keywords']);
			//dump($checkobject);die;		
			$checkobject2=db( 'admin' )->field( 'a.worknum,a.name,a.type,a.cateid,b.*,c.catename,e.name checkname,e.timestart,e.timeend ' )->alias( 'a' )->join( 'gb_article b', 'a.worknum=b.adminid' )->join( 'gb_cate c', 'c.id=a.cateid' )->join( 'gb_bechecked d', 'd.worknum=a.worknum' )->join( 'gb_checktable e', 'e.id=d.sumid' )->where('e.id',$tableid)->where("a.type='科级干部'")->order( 'b.sort,a.worknum' )->where('c.keywords','<>',$use_cate['keywords'])->select();
		}
	
		$checknum=count($checkobject2);
		$checkobjectall=$checkobject->all();
		$checkobjectrender=$checkobject->render();
		$check=db("checktable")->alias('a')->join('gb_check b', 'a.id=b.sumid')->where("a.id",$tableid)->where("b.worknum",$yonghuinf["worknum"])->select();
		$zero=strtotime($check["0"]["timestart"]);
		$year=date("Y",$zero);
				

		//判断是否对此人投过票
		$cepxx=" ";
		//dump($checkobjectall);die;
		foreach ($checkobjectall as $key => $value) {
			//dump($value);die;
			if(db("data")->where("sumid",$tableid)->where("worknum",$yonghuinf["worknum"])->where("beworknum",$value["worknum"])->find()){
				$checkobjectall[$key]["status"]="1";
				$cepxx = db('data')->where('beworknum',$checkobjectall['0']['worknum'])->where('worknum',$yonghuinf["worknum"])->find();
				//dump($cepxx);die;
			}
			else{
				$checkobjectall[$key]["status"]="2";
				$cepxx=" ";
			}
		}
		//END

		//dump($checkobjectall);die;
		//dump($page);dump($pageCount);die;
		$this->assign( array(
			'year' => $year,
			'tableid' => $tableid,
			'page' => $page,
			'pageCount' => $pageCount,
			'checkobject' => $checkobjectall,
			'checkobjectrender' => $checkobjectrender,
			'cepxx' => $cepxx
			) );
		return view();
	}

	public function cepin2() {

		if(input('param.page')) {
			$page=input('param.page');
			session('cepin2page', $page);
		}
		$tableid=input("id");					//调查表ID
		$page = input('page') + 1;
		if(!session('dedipage')) {
			session('dedipage', $page);
		}
		if($tableid){
			session('tableid', $tableid );
		}
		$yonghuid=session('id');				//当前用户ID
		$yonghuinf=db("admin")->where("id",$yonghuid)->find();   //当前用户除密码外的信息
		$type= db('checktable')->field('type')->where('id',$tableid)->find();
		$pageCount=db('admin')->where('cateid', $yonghuinf['cateid'])->where("type = '中层干部' or type='科级干部'")->count();
		if(!session('pageCount')) {
			session('pageCount', $pageCount);
		}
		if ( request()->isPost() ) {
			$data = input( 'post.' );
			//dump($data);die;
			$data[ 'time' ] = time();
			$data[ 'worknum' ] = $yonghuinf["worknum"];
			$data[ 'sumid' ] = session('tableid');

			//判断是否对此人投过票
			$exist=db("data")->where('sumid',$data['sumid'])->where('worknum',$data['worknum'])->where('beworknum',$data['beworknum'])->find();
			if ($exist) {
				$this->error( '已有投票' );
			}

			//END

			//session('tableid', null);
			if (  db( 'data' )->insert( $data ) ) {
				/*if(!$this->success( '测评成功！' ,url( 'checklst',array('id'=>$data[ 'sumid' ]) ) )) {
					
				}*/
				//$this->success( '测评成功！' ,url( 'checklst',array('id'=>$data[ 'sumid' ]) ) );
				$newPage=session('cepin2page')+1;
				//$worknum=session('worknum');
				//$pageCount=db('check')->where('worknum', $worknum)->where('sumid', $data[ 'sumid' ])->value('allvote');
				if($newPage<=session('pageCount')) {
					$url='cepin2/id/'.session('tableid').'.html?page='.$newPage;
					header("Location:$url");
				} else {
					$this->success( '测评完成！' ,url( 'checklst',array('id'=>$data[ 'sumid' ]) ) );
				}
			} else {
				$this->error( '测评失败！' );
			}
			return;
		}
		if($type["type"]=="民主测评" || $type["type"]=="德的考核考察")
		{
			$checkobject=db("view_checktable")->field( 'a.*,b.sort ' )->alias( 'a' )->join( 'gb_article b', 'a.beworknum=b.adminid' )->where("a.id",$tableid)->where("a.worknum",$yonghuinf["worknum"])->where('a.cateid',$yonghuinf["cateid"])->order( 'b.sort,a.beworknum' )->paginate(1,true);						
			$checkobject2=db("view_checktable")->field( 'a.*,b.sort ' )->alias( 'a' )->join( 'gb_article b', 'a.beworknum=b.adminid' )->where("a.id",$tableid)->where("a.worknum",$yonghuinf["worknum"])->where('a.cateid',$yonghuinf["cateid"])->order( 'b.sort,a.beworknum' )->select();
		}
		elseif($type["type"]=="民主干部互评" || $type["type"]=="德的干部互评")
		{
			$checkobject=db("view_checktable")->field( 'a.*,b.sort ' )->alias( 'a' )->join( 'gb_article b', 'a.beworknum=b.adminid' )->where("a.id",$tableid)->where("a.worknum",$yonghuinf["worknum"])->where('a.cateid','<>',$yonghuinf["cateid"])->order( 'b.sort,a.beworknum' )->paginate(1,true);						
			$checkobject2=db("view_checktable")->field( 'a.*,b.sort ' )->alias( 'a' )->join( 'gb_article b', 'a.beworknum=b.adminid' )->where("a.id",$tableid)->where("a.worknum",$yonghuinf["worknum"])->where('a.cateid','<>',$yonghuinf["cateid"])->order( 'b.sort,a.beworknum' )->select();
		}
		$checknum=count($checkobject2);
		$checkobjectall=$checkobject->all();
		$checkobjectrender=$checkobject->render();
		$check=db("checktable")->alias('a')->join('gb_check b', 'a.id=b.sumid')->where("a.id",$tableid)->where("b.worknum",$yonghuinf["worknum"])->select();
		$zero=strtotime($check["0"]["timestart"]);
		$year=date("Y",$zero);


		//判断是否对此人投过票
		foreach ($checkobjectall as $key => $value) {
			if(db("data")->where("sumid",$tableid)->where("worknum",$yonghuinf["worknum"])->where("beworknum",$value["beworknum"])->find()){
				$checkobjectall[$key]["status"]="1";
				$cepxx = db('data')->where('beworknum',$checkobjectall['0']['beworknum'])->where('worknum',$yonghuinf["worknum"])->find();
				//dump($cepxx);die;
			}
			else{
				$checkobjectall[$key]["status"]="2";
				$cepxx="";
			}
		}
		//END
		$page = $page - 1;
		//dump($page);dump($pageCount);die;
		$this->assign( array(
			'page' => $page,
			'pageCount' => $pageCount,
			'year' => $year,
			'tableid' => $tableid,
			'checkobject' => $checkobjectall,
			'checkobjectrender' => $checkobjectrender,
			'cepxx' => $cepxx,
			) );
		return view();
	}
	public function cepin3() {
		if(input('param.page')) {
			$page=input('param.page');
			session('cepin3page', $page);
		}
		$tableid=input("id");
		if($tableid){
			session('tableid', $tableid );
		}
		$yonghuid=session('id');
		$yonghuinf=db("admin")->where("id",$yonghuid)->find();

		if ( request()->isPost() ) {
			$data = input( 'post.' );
			$data[ 'time' ] = time();
			$data[ 'worknum' ] = $yonghuinf["worknum"];
			$data[ 'sumid' ] = session('tableid');
			//session('tableid', null);
			
			if (  db( 'data' )->insert( $data ) ) {
				$newPage=session('cepin3page')+1;
				$worknum=session('worknum');
				$pageCount=db('check')->where('worknum', $worknum)->where('sumid', $data[ 'sumid' ])->value('allvote');
				if($newPage<=$pageCount) {
					$url='cepin3/id/'.session('tableid').'.html?page='.$newPage;
					header("Location:$url");
				} else {
					$this->success( '测评完成！' ,url( 'checklst',array('id'=>$data[ 'sumid' ]) ) );
				}

			} else {
				$this->error( '测评失败！' );
			}
			return;
		}
		$cateid=input("cateid");

		$checkobject=db("checktable")->alias('a')->join('gb_check b', 'a.id=b.sumid')->where("a.id",$tableid)->where("b.worknum",$yonghuinf["worknum"])->select();
		$department = db( 'cate' )->where( 'id',$cateid )->select();
		$zero=strtotime($checkobject["0"]["timestart"]);
		$year=date("Y",$zero);
		// dump($checkobject);
		// dump($department);die;

		//判断是否对此人投过票
		foreach ($checkobject as $key => $value) {
			if(db("data")->where("sumid",$tableid)->where("worknum",$yonghuinf["worknum"])->where("cateid",$department["0"]["id"])->find()){
				$checkobject[$key]["status"]="1";
				$cepxx = db('data')->where('cateid',$department["0"]["id"])->where('worknum',$yonghuinf["worknum"])->find();
				//dump($cepxx);die;
			}
			else{
				$checkobject[$key]["status"]="2";
				$cepxx="";
			}
		}
		//END
		//dump($checkobject);die;

		$this->assign( array(
			'year' => $year,
			'department' => $department,
			'checkobject' => $checkobject,
			'cepxx' => $cepxx,
			) );
		return view();
	}


	public function cepin4() {
		if(input('param.page')) {
			$page=input('param.page');
			session('cepin4page', $page);
		}
		$tableid=input("id");					//调查表ID
		if($tableid){
			session('tableid', $tableid );
		}
		$yonghuid=session('id');				//当前用户ID
		$yonghuinf=db("admin")->where("id",$yonghuid)->find();   //当前用户除密码外的信息
		$yonghucateinf=db("cate")->where('id',$yonghuinf["cateid"])->find();//当前用户的部门信息
		$type= db('checktable')->field('type')->where('id',$tableid)->find();
		$name = db('checktable')->field('name')->where('id',$tableid)->find();
		//dump($name);die;
		if ( request()->isPost() ) {
			$data = input( 'post.' );
			//dump($data);die;
			if(!isset($data['srd']))
               $this->error( '测评失败！' );
           if(!isset($data['zssr']))
           	$this->error( '测评失败！' );
			$data[ 'time' ] = time();
			$data[ 'worknum' ] = $yonghuinf["worknum"];
			$data[ 'sumid' ] = session('tableid');
			//session('tableid', null);


			if (  db( 'data' )->insert( $data ) ) {
				$newPage=session('cepin4page')+1;
				$worknum=session('worknum');
				$pageCount=db('check')->where('worknum', $worknum)->where('sumid', $data[ 'sumid' ])->value('allvote');
				if($newPage<=$pageCount) {
					$url='cepin4/id/'.session('tableid').'.html?page='.$newPage;
					header("Location:$url");
				} else {
					$this->success( '测评完成！' ,url( 'checklst',array('id'=>$data[ 'sumid' ]) ) );
				}
				//$this->success( '测评成功！' ,url( 'checklst',array('id'=>$data[ 'sumid' ]) ) );
			} else {
				$this->error( '测评失败！' );
			}
			return;
		}
		if($yonghucateinf["keywords"]=="机关部门")
		{
			$checkobject=db("view_checktable")->field( 'a.*,b.sort ' )->alias( 'a' )->join( 'gb_article b', 'a.beworknum=b.adminid' )->where("a.id",$tableid)->where("a.worknum",$yonghuinf["worknum"])->join( 'gb_cate c', 'c.id=a.cateid' )->where('c.keywords',$yonghucateinf["keywords"])->order( 'b.sort,a.beworknum' )->paginate(1,true);						
			$checkobject2=db("view_checktable")->field( 'a.*,b.sort ' )->alias( 'a' )->join( 'gb_article b', 'a.beworknum=b.adminid' )->where("a.id",$tableid)->where("a.worknum",$yonghuinf["worknum"])->join( 'gb_cate c', 'c.id=a.cateid' )->where('c.keywords',$yonghucateinf["keywords"])->order( 'b.sort,a.beworknum' )->select();
		}
		else{
			$checkobject=db("view_checktable")->field( 'a.*,b.sort ' )->alias( 'a' )->join( 'gb_article b', 'a.beworknum=b.adminid' )->where("a.id",$tableid)->where("a.worknum",$yonghuinf["worknum"])->join( 'gb_cate c', 'c.id=a.cateid' )->where('a.cateid',$yonghuinf["cateid"])->order( 'b.sort,a.beworknum' )->paginate(1,true);						
			$checkobject2=db("view_checktable")->field( 'a.*,b.sort ' )->alias( 'a' )->join( 'gb_article b', 'a.beworknum=b.adminid' )->where("a.id",$tableid)->where("a.worknum",$yonghuinf["worknum"])->join( 'gb_cate c', 'c.id=a.cateid' )->where('a.cateid',$yonghuinf["cateid"])->order( 'b.sort,a.beworknum' )->select();
		}
		
		
		$checknum=count($checkobject2);
		$checkobjectall=$checkobject->all();
		$checkobjectrender=$checkobject->render();
		$check=db("checktable")->alias('a')->join('gb_check b', 'a.id=b.sumid')->where("a.id",$tableid)->where("b.worknum",$yonghuinf["worknum"])->select();
		$zero=strtotime($check["0"]["timestart"]);
		$year=date("Y",$zero);
		


		//判断是否对此人投过票
		foreach ($checkobjectall as $key => $value) {
			if(db("data")->where("sumid",$tableid)->where("worknum",$yonghuinf["worknum"])->where("beworknum",$value["beworknum"])->find()){
				$checkobjectall[$key]["status"]="1";
				$cepxx = db('data')->where('beworknum',$checkobjectall['0']['beworknum'])->where('worknum',$yonghuinf["worknum"])->find();
				//dump($cepxx);die;
			}
			else{
				$checkobjectall[$key]["status"]="2";
				$cepxx="";
			}
		}
		//END
		//dump($checkobjectall);die;

		if(!isset($cepxx)){
			$cepxx = "";
		}
		//dump($page);dump($pageCount);die;
		$this->assign( array(

			'year' => $year,
			'tableid' => $tableid,
			'checkobject' => $checkobjectall,
			'checkobjectrender' => $checkobjectrender,
			'cepxx' => $cepxx,
			'name' => $name,
			) );
		return view();
	}
}
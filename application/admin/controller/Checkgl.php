<?php
namespace app\ admin\ controller;
use app\ admin\ model\ Cate as CateModel;
use app\ admin\ controller\ Common;
class Checkgl extends Common {

	public
	function lst() {
		$artres = db( 'checktable' )->order( 'id',"desc" )->paginate( 20 );
		//dump($artres);die;
		$department = db( 'cate' )->order( 'id' )->select();
		$this->assign( array(
			'artres' => $artres,
			'department' => $department,
			) );
		return view();
	}


	public
	function lst2() {
		$id=input('id');
		//dump($id);
		$type=db('checktable')->where('id',$id)->value('type');
		//dump($type);die;
		if($id){
			session('checktableid', $id );
		}
		$yonghuworknum = session('worknum');
		//dump($yonghuworknum);die;
		if($type=="民主测评" || $type=="领导对干部测评"){
		$artres = db( 'admin' )->field( 'a.worknum,a.name,a.type,a.cateid,b.*,c.catename ' )->alias( 'a' )->join( 'gb_article b', 'a.worknum=b.adminid' )->join( 'gb_cate c', 'c.id=a.cateid' )->where("a.type = '中层干部' or a.type = '科级干部'")->order( 'b.sort' )->paginate( 10 );
		$artall = db( 'admin' )->field( 'a.worknum,a.name,a.type,a.cateid,b.*,c.catename ' )->alias( 'a' )->join( 'gb_article b', 'a.worknum=b.adminid' )->join( 'gb_cate c', 'c.id=a.cateid' )->where("a.type = '中层干部' or a.type = '科级干部'")->order( 'b.sort' )->select();
		} 
		else if($type=="试用期干部测评"){
		}
		else if($type=="科级干部互评"||$type=="部门负责人测评"){
		$artres = db( 'admin' )->field( 'a.worknum,a.name,a.type,a.cateid,b.*,c.catename ' )->alias( 'a' )->join( 'gb_article b', 'a.worknum=b.adminid' )->join( 'gb_cate c', 'c.id=a.cateid' )->where("a.type='科级干部'")->order( 'b.sort' )->paginate( 10 );
		$artall = db( 'admin' )->field( 'a.worknum,a.name,a.type,a.cateid,b.*,c.catename ' )->alias( 'a' )->join( 'gb_article b', 'a.worknum=b.adminid' )->join( 'gb_cate c', 'c.id=a.cateid' )->where("a.type='科级干部'")->order( 'b.sort' )->select();

		}
		elseif($type=="民主干部互评"){
		$artres = db( 'admin' )->field( 'a.worknum,a.name,a.type,a.cateid,b.*,c.catename ' )->alias( 'a' )->join( 'gb_article b', 'a.worknum=b.adminid' )->join( 'gb_cate c', 'c.id=a.cateid' )->where("a.type='中层干部'")->order( 'b.sort' )->paginate( 10 );
		$artall = db( 'admin' )->field( 'a.worknum,a.name,a.type,a.cateid,b.*,c.catename ' )->alias( 'a' )->join( 'gb_article b', 'a.worknum=b.adminid' )->join( 'gb_cate c', 'c.id=a.cateid' )->where("a.type='中层干部'")->order( 'b.sort' )->select();
		}
		else
		{	
		$artres = db( 'admin' )->field( 'a.worknum,a.name,a.type,a.cateid,b.*,c.catename ' )->alias( 'a' )->join( 'gb_article b', 'a.worknum=b.adminid' )->join( 'gb_cate c', 'c.id=a.cateid' )->where("a.type = '中层干部' or a.type='科级干部'")->order( 'b.sort' )->paginate( 10 );
		$artall = db( 'admin' )->field( 'a.worknum,a.name,a.type,a.cateid,b.*,c.catename ' )->alias( 'a' )->join( 'gb_article b', 'a.worknum=b.adminid' )->join( 'gb_cate c', 'c.id=a.cateid' )->where("a.type = '中层干部' or a.type='科级干部'")->order( 'b.sort' )->select();
		//dump($artres);die;
		}
		$department = db( 'cate' )->order( 'id' )->select();
		$this->assign( array(
			'id'=>$id,
			'artres' => $artres,
			'artall' => $artall,
			'department' => $department,
			'type' => $type,
			
			) );

		if ( request()->isPost() ) {
			$data = input( 'post.' );
			//dump($data);die;
			if($data['type']=="民主测评" || $type=="领导对干部测评"){
				if ( $data[ "part" ] == 0 && $data[ "information" ] == "" ) {
					$artres = db( 'admin' )->field( 'a.worknum,a.name,a.type,a.cateid,b.*,c.catename ' )->alias( 'a' )->join( 'gb_article b', 'a.worknum=b.adminid' )->join( 'gb_cate c', 'c.id=a.cateid' )->where("a.type = '中层干部' or a.type='科级干部'")->order( 'b.sort' )->select();
				} 
				elseif ( $data[ "part" ] == 0 ) {
					if ( $data[ "selectway" ] == "name" ) {
						$artres = db( 'admin' )->field( 'a.worknum,a.name,a.type,a.cateid,b.*,c.catename ' )->alias( 'a' )->join( 'gb_article b', 'a.worknum=b.adminid' )->join( 'gb_cate c', 'c.id=a.cateid' )->where("a.type = '中层干部' or a.type='科级干部'")->order( 'b.sort' )->where( 'a.name', $data[ "information" ] )->select();
					} 
					elseif ( $data[ "selectway" ] == "worknum" ) {
						$artres = db( 'admin' )->field( 'a.worknum,a.name,a.type,a.cateid,b.*,c.catename ' )->alias( 'a' )->join( 'gb_article b', 'a.worknum=b.adminid' )->join( 'gb_cate c', 'c.id=a.cateid' )->where("a.type = '中层干部' or a.type='科级干部'")->order( 'b.sort' )->where( 'a.worknum', $data[ "information" ] )->select();
					}
				} 
				else {
					$i = $data[ "part" ];
					if ( $data[ "selectway" ] == "name"  && $data["information"]=="") {
						$artres = db( 'admin' )->field( 'a.worknum,a.name,a.type,a.cateid,b.*,c.catename ' )->alias( 'a' )->join( 'gb_article b', 'a.worknum=b.adminid' )->join( 'gb_cate c', 'c.id=a.cateid' )->where("a.type = '中层干部' or a.type='科级干部'")->order( 'b.sort' )->where( 'a.cateid', $i )->select();
					} 
					elseif ($data[ "selectway" ] == "name") {
						$artres = db( 'admin' )->field( 'a.worknum,a.name,a.type,a.cateid,b.*,c.catename ' )->alias( 'a' )->join( 'gb_article b', 'a.worknum=b.adminid' )->join( 'gb_cate c', 'c.id=a.cateid' )->where("a.type = '中层干部' or a.type='科级干部'")->order( 'b.sort' )->where( 'a.name', $data[ "information" ] )->where( 'a.cateid', $i )->select();
					}
					elseif ( $data[ "selectway" ] == "worknum" ) {
						$artres = db( 'admin' )->field( 'a.worknum,a.name,a.type,a.cateid,b.*,c.catename ' )->alias( 'a' )->join( 'gb_article b', 'a.worknum=b.adminid' )->join( 'gb_cate c', 'c.id=a.cateid' )->where("a.type = '中层干部' or a.type='科级干部'")->order( 'b.sort' )->where( 'a.worknum', $data[ "information" ] )->where( 'a.cateid', $i )->select();
					}
				}
			} 
			elseif($data['type']=="科级干部互评"||$data['type']=="部门负责人测评"){
				if ( $data[ "part" ] == 0 && $data[ "information" ] == "" ) {
					$artres = db( 'admin' )->field( 'a.worknum,a.name,a.type,a.cateid,b.*,c.catename ' )->alias( 'a' )->join( 'gb_article b', 'a.worknum=b.adminid' )->join( 'gb_cate c', 'c.id=a.cateid' )->where("a.type='科级干部'")->order( 'b.sort' )->select();
				} 
				elseif ( $data[ "part" ] == 0 ) {
					if ( $data[ "selectway" ] == "name" ) {
						$artres = db( 'admin' )->field( 'a.worknum,a.name,a.type,a.cateid,b.*,c.catename ' )->alias( 'a' )->join( 'gb_article b', 'a.worknum=b.adminid' )->join( 'gb_cate c', 'c.id=a.cateid' )->where("a.type='科级干部'")->order( 'b.sort' )->where( 'a.name', $data[ "information" ] )->select();
					} 
					elseif ( $data[ "selectway" ] == "worknum" ) {
						$artres = db( 'admin' )->field( 'a.worknum,a.name,a.type,a.cateid,b.*,c.catename ' )->alias( 'a' )->join( 'gb_article b', 'a.worknum=b.adminid' )->join( 'gb_cate c', 'c.id=a.cateid' )->where("a.type='科级干部'")->order( 'b.sort' )->where( 'a.worknum', $data[ "information" ] )->select();
					}
				} 
				else {
					$i = $data[ "part" ];
					if ( $data[ "selectway" ] == "name"  && $data["information"]=="") {
						$artres = db( 'admin' )->field( 'a.worknum,a.name,a.type,a.cateid,b.*,c.catename ' )->alias( 'a' )->join( 'gb_article b', 'a.worknum=b.adminid' )->join( 'gb_cate c', 'c.id=a.cateid' )->where("a.type='科级干部'")->order( 'b.sort' )->where( 'a.cateid', $i )->select();
					} 
					elseif ($data[ "selectway" ] == "name") {
						$artres = db( 'admin' )->field( 'a.worknum,a.name,a.type,a.cateid,b.*,c.catename ' )->alias( 'a' )->join( 'gb_article b', 'a.worknum=b.adminid' )->join( 'gb_cate c', 'c.id=a.cateid' )->where("a.type='科级干部'")->order( 'b.sort' )->where( 'a.name', $data[ "information" ] )->where( 'a.cateid', $i )->select();
					}
					elseif ( $data[ "selectway" ] == "worknum" ) {
						$artres = db( 'admin' )->field( 'a.worknum,a.name,a.type,a.cateid,b.*,c.catename ' )->alias( 'a' )->join( 'gb_article b', 'a.worknum=b.adminid' )->join( 'gb_cate c', 'c.id=a.cateid' )->where("a.type='科级干部'")->order( 'b.sort' )->where( 'a.worknum', $data[ "information" ] )->where( 'a.cateid', $i )->select();
					}
				}
			} 
			else{
				if ( $data[ "part" ] == 0 && $data[ "information" ] == "" ) {
					$artres = db( 'admin' )->field( 'a.worknum,a.name,a.type,a.cateid,b.*,c.catename ' )->alias( 'a' )->join( 'gb_article b', 'a.worknum=b.adminid' )->join( 'gb_cate c', 'c.id=a.cateid' )->where("a.type='科级干部'")->order( 'b.sort' )->select();
				} 
				elseif ( $data[ "part" ] == 0 ) {
					if ( $data[ "selectway" ] == "name" ) {
						$artres = db( 'admin' )->field( 'a.worknum,a.name,a.type,a.cateid,b.*,c.catename ' )->alias( 'a' )->join( 'gb_article b', 'a.worknum=b.adminid' )->join( 'gb_cate c', 'c.id=a.cateid' )->where("a.type='科级干部'")->order( 'b.sort' )->where( 'a.name', $data[ "information" ] )->select();
					} 
					elseif ( $data[ "selectway" ] == "worknum" ) {
						$artres = db( 'admin' )->field( 'a.worknum,a.name,a.type,a.cateid,b.*,c.catename ' )->alias( 'a' )->join( 'gb_article b', 'a.worknum=b.adminid' )->join( 'gb_cate c', 'c.id=a.cateid' )->where("a.type='科级干部'")->order( 'b.sort' )->where( 'a.worknum', $data[ "information" ] )->select();
					}
				} 
				else {
					$i = $data[ "part" ];
					if ( $data[ "selectway" ] == "name"  && $data["information"]=="") {
						$artres = db( 'admin' )->field( 'a.worknum,a.name,a.type,a.cateid,b.*,c.catename ' )->alias( 'a' )->join( 'gb_article b', 'a.worknum=b.adminid' )->join( 'gb_cate c', 'c.id=a.cateid' )->where("a.type='科级干部'")->order( 'b.sort' )->where( 'a.cateid', $i )->select();
					} 
					elseif ($data[ "selectway" ] == "name") {
						$artres = db( 'admin' )->field( 'a.worknum,a.name,a.type,a.cateid,b.*,c.catename ' )->alias( 'a' )->join( 'gb_article b', 'a.worknum=b.adminid' )->join( 'gb_cate c', 'c.id=a.cateid' )->where("a.type='科级干部'")->order( 'b.sort' )->where( 'a.name', $data[ "information" ] )->where( 'a.cateid', $i )->select();
					}
					elseif ( $data[ "selectway" ] == "worknum" ) {
						$artres = db( 'admin' )->field( 'a.worknum,a.name,a.type,a.cateid,b.*,c.catename ' )->alias( 'a' )->join( 'gb_article b', 'a.worknum=b.adminid' )->join( 'gb_cate c', 'c.id=a.cateid' )->where("a.type='科级干部'")->order( 'b.sort' )->where( 'a.worknum', $data[ "information" ] )->where( 'a.cateid', $i )->select();
					}
				}
			}
			$this->assign( array(
				'artres' => $artres,
				'artall' => $artall,
				'department' => $department,
				) );
			return view("checkgl/show");
		}

		return view();
	}
	
	public 
	function lst2_2(){
		$id=input('id');
		if($id){
			session('checktableid', $id );
		}
		$artres = db( 'admin' )->field( 'a.worknum,a.name,a.type,a.cateid,b.*,c.catename ' )->alias( 'a' )->join( 'gb_article b', 'a.worknum=b.adminid' )->join( 'gb_cate c', 'c.id=a.cateid' )->where('a.type',"中层干部")->order( 'b.sort' )->paginate( 10 );
		$department = db( 'cate' )->where('keywords',"教学部门")->order( 'sort' )->select();
		$this->assign( array(
			'id'=>$id,
			'artres' => $artres,
			'department' => $department,
			) );

		if ( request()->isPost() ) {
			$data = input( 'post.' );
			if(!$data)
			{
				$this->error( '请选择测评对象！', url( 'lst2_2' ,array('id'=>$id)) );
			}
			$i=0;
			foreach($data as $value){
				$department = db( 'cate' )->field( 'id' )->where('id', $value)->find();
				$department2[$i]["cateid"]=$department["id"];
				$department2[$i]["sumid"]=$id;
				$i++;
			}

			//添加或编辑信息
			$i=0;
			$flag=0;    //判断添加信息有无失败
			db('bechecked')->where('sumid',$id)->delete();
			foreach($department2 as $value){
				
				if(db( 'bechecked' )->insert($department2[$i])){
				}
				else{
					$flag=1;
				}
				$i++;
			}
			//END

			if ( $flag==0 ) {
				session('checktableid', null);
				$first=session('createtable');
				if ($first=="1") {
					$getID= db('checktable')->max('id');//$getID即为最后一条记录的ID
					session('createtable', null);
					$this->success( '添加测评对象信息成功,现在选取投票对象', url( 'lst3',array('id'=>$getID  ) ) );
				}
				$this->success( '编辑调查表信息成功', url( 'lst' ) );
			} else {
				$this->error( '编辑调查表信息失败！', url( 'lst2_2' ,array('id'=>$id )));
			}
			return view();
		}

		return view();
	}


	public
	function show() {
		$artres = db( 'admin' )->field( 'a.worknum,a.name,a.type,a.cateid,b.*,c.catename ' )->alias( 'a' )->join( 'gb_article b', 'a.worknum=b.adminid' )->join( 'gb_cate c', 'c.id=a.cateid' )->where('a.type = "中层干部" or a.type = "科级干部"')->order( 'b.sort' )->paginate( 10 );
		$department = db( 'cate' )->order( 'id' )->select();
		$this->assign( array(
			'artres' => $artres,
			'department' => $department,
			) );
		$id=session('checktableid');
		if ( request()->isPost() ) {
			$data = input( 'post.' );
			//dump($data);
			$i=0;
			foreach($data as $value){
				$artres2[$i]= $artres = db( 'admin' )->field( 'a.worknum, a.cateid' )->alias( 'a' )->join( 'gb_article b', 'a.worknum=b.adminid' )->join( 'gb_cate c', 'c.id=a.cateid' )->where('a.type="科级干部" OR a.type="中层干部"')->order( 'b.sort' )->where('b.id', $value)->find();
				$artres2[$i]["sumid"]=$id;
				$i++;
			}
			//dump($artres2);die;
			$department = db( 'cate' )->order( 'id' )->select();

			//添加或编辑信息
			$i=0;
			$flag=0;    //判断添加信息有无失败
			db('bechecked')->where('sumid',$id)->delete();
			foreach($artres2 as $value){
				
				if(db( 'bechecked' )->insert($artres2[$i])){
				}
				else{
					$flag=1;
				}
				$i++;
			}
			//END

			if ( $flag==0 ) {
				session('checktableid', null);
				$first=session('createtable');
				if ($first=="1") {
					$getID= db('checktable')->max('id');//$getID即为最后一条记录的ID
					session('createtable', null);
					$this->success( '添加测评对象信息成功,现在选取投票对象', url( 'lst3',array('id'=>$getID  ) ) );
				}
				
				$this->success( '编辑调查表信息成功', url( 'lst' ) );
			} else {
				$this->error( '编辑调查表信息失败！', url( 'lst2' ) );
			}
			return;
		}

		return view("checkgl/show");
	}

	public
	function check1() {
		$id=input('id');
		$type= db('checktable')->field('type')->where('id',$id)->find();
		if($type["type"]=="班子测评")
		{
			$artres = db( 'checktable' )->field('a.name checkname,a.timestart,a.timeend,c.catename,a.type')->alias( 'a' )->join( 'gb_bechecked b', 'a.id=b.sumid' )->join( 'gb_cate c', 'c.id=b.cateid' )->order( 'id' )->where('a.id',$id)->order( 'c.sort' )->paginate( 20 );
			$a=$artres->isEmpty();
			if($a=="true"){
				$this->error( '无候选部门信息！', url( 'lst' ) );
			}
			$this->assign( array(
				'artres' => $artres,
				) );
			return view("checkgl/check1");
		}
		else
		{
			$artres = db( 'admin' )->field( 'a.worknum,a.name,a.type,a.cateid,b.*,c.catename,e.name checkname,e.timestart,e.timeend,d.sumid ' )->alias( 'a' )->join( 'gb_article b', 'a.worknum=b.adminid' )->join( 'gb_cate c', 'c.id=a.cateid' )->join( 'gb_bechecked d', 'd.worknum=a.worknum' )->join( 'gb_checktable e', 'e.id=d.sumid' )->where('e.id',$id)->order( 'b.sort' )->paginate( 20 );
			$a=$artres->isEmpty();
			if($a=="true"){
				$this->error( '无候选人信息！', url( 'lst' ) );
			}
			$department = db( 'cate' )->order( 'id' )->select();
			$this->assign( array(
				'artres' => $artres,
				'department' => $department,
				) );
			return view("checkgl/check1");
		}
	}

    public function dec1($worknum="",$sumid=""){
          if(db('bechecked')->where('worknum',$worknum)->where('sumid',$sumid)->delete())
          	$this->success('删除成功');
          else
          	$this->error('删除失败');
    }
    public function dec2($worknum="",$sumid=""){
          if(db('check')->where('worknum',$worknum)->where('sumid',$sumid)->delete())
          	$this->success('删除成功');
          else
          	$this->error('删除失败');
    }
	public
	function lst3() {
		$id=input('id');
		if($id){
			session('checktableid', $id );
		}
		$id=session('checktableid');

		$checktableinf=db("checktable")->where("id",$id)->find();
		//dump($checktableinf["type"]);die;
		if($checktableinf["type"]=="民主干部互评" || $checktableinf["type"]=="德的干部互评"||$checktableinf['type']=="部门负责人测评"){
			$artres = db( 'admin' )->field( 'a.worknum,a.name,a.type,a.cateid,a.id,c.catename ' )->alias( 'a' )->join( 'gb_cate c', 'c.id=a.cateid' )->order( 'a.id' )->where('a.type',"中层干部")->paginate( 20 );
			$artall = db( 'admin' )->field( 'a.worknum,a.name,a.type,a.cateid,a.id,c.catename ' )->alias( 'a' )->join( 'gb_cate c', 'c.id=a.cateid' )->order( 'a.id' )->where('a.type',"中层干部")->select();
		}
		else if($checktableinf["type"]=="领导对干部测评") {
			$artres = db( 'admin' )->field( 'a.worknum,a.name,a.type,a.cateid,a.id,c.catename ' )->alias( 'a' )->join( 'gb_cate c', 'c.id=a.cateid' )->order( 'a.id' )->where('a.type',"院领导")->paginate( 20 );
			$artall = db( 'admin' )->field( 'a.worknum,a.name,a.type,a.cateid,a.id,c.catename ' )->alias( 'a' )->join( 'gb_cate c', 'c.id=a.cateid' )->order( 'a.id' )->where('a.type',"院领导")->select();
		}
		else if($checktableinf["type"]=="科级干部互评") {
			$artres = db( 'admin' )->field( 'a.worknum,a.name,a.type,a.cateid,a.id,c.catename ' )->alias( 'a' )->join( 'gb_cate c', 'c.id=a.cateid' )->order( 'a.id' )->where('a.type',"中层干部")->paginate( 20 );
			$artall = db( 'admin' )->field( 'a.worknum,a.name,a.type,a.cateid,a.id,c.catename ' )->alias( 'a' )->join( 'gb_cate c', 'c.id=a.cateid' )->order( 'a.id' )->where('a.type',"中层干部")->select();
		}
		else if($checktableinf['type']=="班子测评"){
            $artres = db( 'admin' )->field( 'a.worknum,a.name,a.type,a.cateid,a.id,c.catename ' )->alias( 'a' )->join( 'gb_cate c', 'c.id=a.cateid' )->order( 'a.id' )->where('a.type',"中层干部")->where('c.keywords',"教学部门")->paginate( 20 );
			$artall = db( 'admin' )->field( 'a.worknum,a.name,a.type,a.cateid,a.id,c.catename ' )->alias( 'a' )->join( 'gb_cate c', 'c.id=a.cateid' )->order( 'a.id' )->where('a.type',"中层干部")->where('c.keywords',"教学部门")->select();
		}
		else{
			$artres = db( 'admin' )->field( 'a.worknum,a.name,a.type,a.cateid,a.id,c.catename ' )->alias( 'a' )->join( 'gb_cate c', 'c.id=a.cateid' )->where('a.type <> "院领导"')->order( 'a.id' )->paginate( 20 );
			$artall = db( 'admin' )->field( 'a.worknum,a.name,a.type,a.cateid,a.id,c.catename ' )->alias( 'a' )->join( 'gb_cate c', 'c.id=a.cateid' )->where('a.type <> "院领导"')->order( 'a.id' )->select();
		}
		$department = db( 'cate' )->order( 'id' )->select();
		$this->assign( array(
			'id'=>$id,
			'artres' => $artres,
			'artall'=>$artall,
			'department' => $department,
			) );

		if ( request()->isPost() ) {
			$data = input( 'post.' );
			//dump($checktableinf["type"]);die;
			if($checktableinf["type"]=="民主干部互评" || $checktableinf["type"]=="德的干部互评"||$checktableinf["type"]=="科级干部互评"||$checktableinf['type']=="部门负责人测评"){
				if ( $data[ "part" ] == 0) {
					$artres = db( 'admin' )->field( 'a.worknum,a.name,a.type,a.cateid,a.id,c.catename ' )->alias( 'a' )->join( 'gb_cate c', 'c.id=a.cateid' )->order( 'a.id' )->where('a.type',"中层干部")->select();
				} 
				else {
					$i = $data[ "part" ];
					$artres = $artres = db( 'admin' )->field( 'a.worknum,a.name,a.type,a.cateid,a.id,c.catename ' )->alias( 'a' )->join( 'gb_cate c', 'c.id=a.cateid' )->order( 'a.id' )->where( 'a.cateid', $i )->where('a.type',"中层干部")->select();

				}
			}
            elseif($checktableinf["type"]=="领导对干部测评"){
            	if ( $data[ "part" ] == 0) {
					$artres = db( 'admin' )->field( 'a.worknum,a.name,a.type,a.cateid,a.id,c.catename ' )->alias( 'a' )->join( 'gb_cate c', 'c.id=a.cateid' )->order( 'a.id' )->where('a.type',"院领导")->select();
				} 
				else {
					$i = $data[ "part" ];
					$artres = $artres = db( 'admin' )->field( 'a.worknum,a.name,a.type,a.cateid,a.id,c.catename ' )->alias( 'a' )->join( 'gb_cate c', 'c.id=a.cateid' )->order( 'a.id' )->where( 'a.cateid', $i )->where('a.type',"院领导")->select();
               }
            }
			else{
				if ( $data[ "part" ] == 0) {
					$artres = db( 'admin' )->field( 'a.worknum,a.name,a.type,a.cateid,a.id,c.catename ' )->alias( 'a' )->join( 'gb_cate c', 'c.id=a.cateid' )->where('a.type <> "院领导"')->order( 'a.id' )->select();
				} 
				else {
					$i = $data[ "part" ];
					$artres = $artres = db( 'admin' )->field( 'a.worknum,a.name,a.type,a.cateid,a.id,c.catename ' )->alias( 'a' )->join( 'gb_cate c', 'c.id=a.cateid' )->where('a.type <> "院领导"')->order( 'a.id' )->where( 'a.cateid', $i )->select();

				}
			}
			$this->assign( array(
				'artres' => $artres,
				'department' => $department,
				) );
			return view("checkgl/show2");
		}

		return view();
	}

	public
	function show2() {
		$artres = db( 'admin' )->field( 'a.worknum ' )->alias( 'a' )->join( 'gb_cate c', 'c.id=a.cateid' )->order( 'a.id' )->paginate( 10 );
		//dump($artres);die;
		$department = db( 'cate' )->order( 'id' )->select();
		$this->assign( array(
			'artres' => $artres,
			'department' => $department,
			) );
		$id=session('checktableid');
		$checktableinf=db("checktable")->where("id",$id)->find();
        //dump($id);die;
		if ( request()->isPost() ) {
			$data = input( 'post.' );
			if($checktableinf["type"]=="民主干部互评" || $checktableinf["type"]=="德的干部互评"){
				$i=0;
				foreach($data as $value){
					$artres2[$i]= $artres = db( 'admin' )->field( 'a.worknum' )->alias( 'a' )->join( 'gb_cate c', 'c.id=a.cateid' )->order( 'a.id' )->where('a.id', $value)->find();
					$yonghuinf=db("admin")->field("cateid")->where('id',$value)->find(); 
					$cateinf=db("cate")->where('id',$yonghuinf["cateid"])->find();
					if($cateinf["keywords"]=="机关部门")
					{
						$artres2[$i]["sumid"]=$id;
						$artres2[$i]["allvote"]=db('bechecked')->alias('a')->where('a.sumid',$id)->join('gb_view_yonghu b','b.worknum=a.worknum')->join('gb_article c','c.adminid=a.worknum')->where('b.cateid',$yonghuinf['cateid'])->count('a.id');
					//dump($artres2[$i]["allvote"]);
						$i++;
					}
					else{
						$artres2[$i]["sumid"]=$id;
						$artres2[$i]["allvote"]=db('bechecked')->alias('a')->where('a.sumid',$id)->join('gb_view_yonghu b','b.worknum=a.worknum')->where('b.cateid',$yonghuinf['cateid'])->join('gb_article c','c.adminid=a.worknum')->count('a.id');
					//dump($artres2[$i]["allvote"]);
						$i++;
					}
				}
			}

            elseif($checktableinf['type']=="部门负责人测评"){
            	$i=0;
				foreach($data as $value){
					$artres2[$i]= $artres = db( 'admin' )->field( 'a.worknum' )->alias( 'a' )->join( 'gb_cate c', 'c.id=a.cateid' )->order( 'a.id' )->where('a.id', $value)->find();
					$yonghuinf=db("admin")->field("cateid,cateid2")->where('id',$value)->find(); 
					$cateinf=db("cate")->where('id',$yonghuinf["cateid"])->find();
					if($cateinf["keywords"]=="机关部门")
					{
						$artres2[$i]["sumid"]=$id;
						$artres2[$i]["allvote"]=db('bechecked')->alias('a')->where('a.sumid',$id)->join('gb_admin b','b.worknum=a.worknum')->join('gb_article c','c.adminid=a.worknum')->where('b.cateid2 ',$yonghuinf['cateid2'])->where('b.type = "科级干部"')->count('a.id');
					
						$i++;
					}
					else{
						$artres2[$i]["sumid"]=$id;
						$artres2[$i]["allvote"]=db('bechecked')->alias('a')->where('a.sumid',$id)->join('gb_admin b','b.worknum=a.worknum')->where('b.cateid',$yonghuinf['cateid'])->join('gb_article c','c.adminid=a.worknum')->where('b.type = "科级干部"')->count('a.id');
					//dump($artres2[$i]["allvote"]);
						$i++;
					}
				}
            }

			elseif($checktableinf["type"]=="领导对干部测评") {
				$i=0;
				foreach($data as $value){
					//工号
					$artres2[$i]= $artres = db( 'admin' )->field( 'a.worknum' )->alias( 'a' )->join( 'gb_cate c', 'c.id=a.cateid' )->order( 'a.id' )->where('a.id', $value)->find();
					$yonghuinf=db("admin")->field("cateid")->where('id',$value)->find(); 
					$cateinf=db("cate")->where('id',$yonghuinf["cateid"])->find();
						$artres2[$i]["sumid"]=$id;
						$artres2[$i]["allvote"]=db('bechecked')->alias('a')->where('a.sumid',$id)->join('gb_view_yonghu b','b.worknum=a.worknum')->join('gb_article c','c.adminid=a.worknum')->where('b.type="科级干部" OR b.type="中层干部"')->count('a.id');
					//dump($artres2[$i]["allvote"]);
						$i++;
				}
			}
			elseif ($checktableinf["type"]=="科级干部互评"){
				$i=0;
				foreach($data as $value){
					//工号
					//dump($value);die;
					//dump($artres);die;
					$artres2[$i] = db( 'admin' )->field( 'a.worknum' )->alias( 'a' )->join( 'gb_cate c', 'c.id=a.cateid' )->order( 'a.id' )->where('a.id', $value)->find();
					//dump($artres2[$i]);die;
					$yonghuinf=db("admin")->field("cateid")->where('id',$value)->find();
					//dump($yonghuinf);die; 
					$cateinf=db("cate")->where('id',$yonghuinf["cateid"])->find();
					if($cateinf["keywords"]=="机关部门")
					{
						$artres2[$i]["sumid"]=$id;
						$artres2[$i]["allvote"]=db('bechecked')->alias('a')->where('a.sumid',$id)->join('gb_view_yonghu b','b.worknum=a.worknum')->join('gb_article c','c.adminid=a.worknum')->where('b.keywords','教学部门')->count('a.id');
					//dump($artres2[$i]);die;
						$i++;
					}
					else{
						$artres2[$i]["sumid"]=$id;
						$artres2[$i]["allvote"]=db('bechecked')->alias('a')->where('a.sumid',$id)->join('gb_view_yonghu b','b.worknum=a.worknum')->join('gb_article c','c.adminid=a.worknum')->where('b.keywords','机关部门')->count('a.id');
					//dump($artres2[$i]["allvote"]);
						$i++;
					}
				}
			}
			elseif ($checktableinf["type"]=="民主测评" || $checktableinf["type"]=="德的考核考察") {
				$i=0;
				
				foreach($data as $value){
					$artres2[$i]= $artres = db( 'admin' )->field( 'a.worknum' )->alias( 'a' )->join( 'gb_cate c', 'c.id=a.cateid' )->order( 'a.id' )->where('a.id', $value)->find();
					$yonghuinf=db("admin")->field("cateid")->where('id',$value)->find(); 
					$cateinf=db("cate")->where('id',$yonghuinf["cateid"])->find();
					if($cateinf["keywords"]=="机关部门")
					{
						$artres2[$i]["sumid"]=$id;
						$artres2[$i]["allvote"]=db('bechecked')->alias('a')->where('a.sumid',$id)->join('gb_view_yonghu b','b.worknum=a.worknum')->join('gb_article c','c.adminid=a.worknum')->where('b.cateid',$cateinf['id'])->count('a.id');
					//dump($artres2[$i]["allvote"]);
						$i++;
					}
					else{
						$artres2[$i]["sumid"]=$id;
						$artres2[$i]["allvote"]=db('bechecked')->alias('a')->where('a.sumid',$id)->join('gb_view_yonghu b','b.worknum=a.worknum')->where('b.cateid',$yonghuinf['cateid'])->join('gb_article c','c.adminid=a.worknum')->count('a.id');
					//dump($artres2[$i]["allvote"]);
						$i++;
					}
				}
			}
			elseif ($checktableinf["type"]=="试用期干部测评") {    //试用期改掉了
				$i=0;
				foreach($data as $value){
					$artres2[$i]= $artres = db( 'admin' )->field( 'a.worknum' )->alias( 'a' )->join( 'gb_cate c', 'c.id=a.cateid' )->order( 'a.id' )->where('a.id', $value)->find();
					$yonghuinf=db("admin")->field("cateid")->where('id',$value)->find(); 
					$cateinf=db("cate")->where('id',$yonghuinf["cateid"])->find();
					//dump($cateinf);

					if($cateinf["keywords"]=="机关部门")
					{
						$artres2[$i]["sumid"]=$id;
						$artres2[$i]["allvote"]=db('bechecked')->alias('a')->where('a.sumid',$id)->join('gb_view_yonghu b','b.worknum=a.worknum')->join('gb_article c','c.adminid=a.worknum')->where('b.keywords',$cateinf['keywords'])->where('c.try',"是")->count('a.id');
					//dump($artres2[$i]["allvote"]);
						$i++;
					}
					else{
						$artres2[$i]["sumid"]=$id;
						$artres2[$i]["allvote"]=db('bechecked')->alias('a')->where('a.sumid',$id)->join('gb_view_yonghu b','b.worknum=a.worknum')->where('b.cateid',$yonghuinf['cateid'])->join('gb_article c','c.adminid=a.worknum')->where('c.try',"是")->count('a.id');
					//dump($artres2[$i]["allvote"]);
						$i++;
					}
				}
			}
			elseif ($checktableinf["type"]=="班子测评") {
				$i=0;
				foreach($data as $value){
					$artres2[$i]= $artres = db( 'admin' )->field( 'a.worknum' )->alias( 'a' )->join( 'gb_cate c', 'c.id=a.cateid' )->order( 'a.id' )->where('a.id', $value)->find();
					$yonghuinf=db("admin")->field("cateid")->where('id',$value)->find(); 
					$cateinf=db("cate")->where('id',$yonghuinf["cateid"])->find();
					if($cateinf["keywords"]=="机关部门") {
						$artres2[$i]["sumid"]=$id;
						$artres2[$i]["allvote"]=db('bechecked')->where('sumid', $id)->count();
						$i++;
					} else {
						$artres2[$i]["sumid"]=$id;
						$artres2[$i]["allvote"]=db('bechecked')->where('sumid', $id)->count();	
						$i++;				
					}
					/*$artres2[$i]["sumid"]=$id;
					$artres2[$i]["allvote"]=1;
					$i++;*/
				}
			}


			$department = db( 'cate' )->order( 'id' )->select();

			//添加或编辑信息
			$i=0; 
			$flag=0;    //判断添加信息有无失败
			db('check')->where('sumid',$id)->delete();
            //dump($artres2);die;
			foreach($artres2 as $value){
				
				if(db( 'check' )->insert($artres2[$i])){
				}
				else{
					$flag=1;
				}
				$i++;
			}
			//END

			if ( $flag==0 ) {
				session('checktableid', null);
				$this->success( '编辑调查表信息成功', url( 'lst' ) );
			} else {
				$this->error( '编辑调查表信息失败！', url( 'lst3' ) );
			}
			return;
		}

		return view("checkgl/show2");
	}
	
	public
	function check2() {
		$id=input('id');
		$artres = db( 'admin' )->field( 'a.id,a.worknum,a.name,a.type,c.catename,e.name checkname,e.timestart,e.timeend,d.sumid ' )->alias( 'a' )->join( 'gb_cate c', 'c.id=a.cateid' )->join( 'gb_check d', 'd.worknum=a.worknum' )->join( 'gb_checktable e', 'e.id=d.sumid' )->where('e.id',$id)->order( 'a.type' )->paginate( 100 );
		$a=$artres->isEmpty();
			if($a=="true"){
				$this->error( '无候选人信息！', url( 'lst' ) );
			}
		$department = db( 'cate' )->order( 'id' )->select();
		$this->assign( array(
			'artres' => $artres,
			'department' => $department,
			) );
		return view("checkgl/check2");
	}

	public
	function add() {
		if ( request()->isPost() ) {
			$data = input( 'post.' );
			$data[ 'time' ] = time();
			
			if($data['type']=="班子测评"){
				if ( db( 'checktable' )->insert( $data ) ) {
					$getID= db('checktable')->max('id');//$getID即为最后一条记录的ID
					session('createtable', "1" );
					$this->success( '添加调查表信息成功', url( 'lst2_2',array('id'=>$getID  ) ) );
				} else {
					$this->error( '添加调查表信息失败！' );
				}
			}
			elseif ($data['type']=="德的考核考察"||$data['type']=="民主测评"||$data['type']=="民主干部互评"||$data['type']=="德的干部互评"||$data['type']=="试用期干部测评" || $data['type']=="领导对干部测评"||$data['type']=="科级干部互评"||$data['type'] == "部门负责人测评") {
				if ( db( 'checktable' )->insert( $data ) ) {
					$getID= db('checktable')->max('id');//$getID即为最后一条记录的ID
					session('createtable', '1');
					$this->success( '添加调查表信息成功,现在选取测评对象', url( 'lst2',array('id'=>$getID,'type'=>$data['type']  ) ) );
				} else {
					$this->error( '添加调查表信息失败！' );
				}
			}
			
			return;
		}
		
		$cate = new CateModel();
		$cateres = $cate->catetree();
		$department = db( 'cate' )->order( 'id' )->select();
		$this->assign( array(
			'cateres' => $cateres,
			'department' => $department,
			) );

		return view();
	}

	public
	function edit() {
		$arts = db( 'checktable' )->where( array( 'id' => input( 'id' ) ) )->find();
		if ( request()->isPost() ) {
			$data = input( 'post.' );
			$data[ 'time' ] = time();
			if ( db( 'checktable' )->where("sumid",$data["sumid"])->update( $data ) ) {
				$this->success( '修改调查表信息成功！', url( 'lst' ) );
			} else {
				$this->error( '修改调查表信息失败！' );
			}
			return;
		}
		$cate = new CateModel();
		$cateres = $cate->catetree();
		$this->assign( array(
			'cateres' => $cateres,
			'arts' => $arts,
			) );
		return view();
	}



	public
	function del() {
		db('check')->where('sumid',input("id"))->delete();
		db('bechecked')->where('sumid',input("id"))->delete();
		db('data')->where('sumid',input("id"))->delete();
		if ( db( 'checktable' )->where("id",input("id"))->delete() ) {
			$this->success( '删除调查表信息成功！', url( 'lst' ) );
		} else {
			$this->error( '删除调查表信息失败！' );
		}
	}









}
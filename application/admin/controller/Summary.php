<?php
namespace app\ admin\ controller;
use app\ admin\ model\ Admin as AdminModel;
use app\ admin\ controller\ Common;
class Summary extends Common {

	public
	function gerenlst() {
		$artres = db( 'checktable' )->order( 'sumid' )->paginate( 20 );
		$department = db( 'cate' )->order( 'id' )->select();
		$this->assign( array(
			'artres' => $artres,
			'department' => $department,
		) );
		return view();
	}


	public

	function Summary() {
		$id = input( 'id' );
		//dump($id);die;
		$type = db( 'checktable' )->field( 'type' )->where( 'id', $id )->find();
		$yonghuid = session( 'id' ); //当前用户ID
		$yonghuinf = db( "admin" )->where( "id", $yonghuid )->find(); //当前用户除密码外的信息
		$yonghucateinf = db( "cate" )->where( 'id', $yonghuinf[ "cateid" ] )->find(); //当前用户的部门信息
		
		if ( $type[ "type" ] == "民主测评" || $type[ "type" ] == "民主干部互评"||$type[ "type" ] == "领导对干部测评"||$type["type"] == "科级干部互评"||$type['type']=="部门负责人测评")
		 {
		 	if($type['type'] == "科级干部互评"||$type['type'] == "部门负责人测评"){
		 		$artres = db( 'admin' )->field( 'a.worknum,a.name,a.type,a.cateid,c.catename,e.id tableid,e.name checkname,e.timestart,e.timeend ' )->alias( 'a' )->join( 'gb_article b', 'a.worknum=b.adminid' )->join( 'gb_cate c', 'c.id=a.cateid' )->join( 'gb_bechecked d', 'd.worknum=a.worknum' )->join( 'gb_checktable e', 'e.id=d.sumid' )->where( 'e.id', $id )->where( 'a.type="科级干部"' )->order( 'b.sort' )->select();
		 	}
		 	elseif($type['type'] == "民主干部互评"){
		 		 $artres = db( 'admin' )->field( 'a.worknum,a.name,a.type,a.cateid,c.catename,e.id tableid,e.name checkname,e.timestart,e.timeend ' )->alias( 'a' )->join( 'gb_article b', 'a.worknum=b.adminid' )->join( 'gb_cate c', 'c.id=a.cateid' )->join( 'gb_bechecked d', 'd.worknum=a.worknum' )->join( 'gb_checktable e', 'e.id=d.sumid' )->where( 'e.id', $id )->where( 'a.type="中层干部"' )->order( 'b.sort' )->select();
		 	}
			else{
				$artres = db( 'admin' )->field( 'a.worknum,a.name,a.type,a.cateid,c.catename,e.id tableid,e.name checkname,e.timestart,e.timeend ' )->alias( 'a' )->join( 'gb_article b', 'a.worknum=b.adminid' )->join( 'gb_cate c', 'c.id=a.cateid' )->join( 'gb_bechecked d', 'd.worknum=a.worknum' )->join( 'gb_checktable e', 'e.id=d.sumid' )->where( 'e.id', $id )->where( 'a.type="中层干部" or a.type="科级干部"' )->order( 'b.sort' )->select();
			if ( !$artres ) {
				$this->error( '无候选人信息！', url( 'gerenlst' ) );
			   }
		    }
			//读取统计信息

			foreach ( $artres as $key => $value ) {
				$data1 = db( "data" )->where( 'sumid', $id )->where( 'beworknum', $artres[ $key ][ "worknum" ] )->where( 'Summary', '优秀' )->count();
				//总评价中优秀的数目 
				$data2 = db( "data" )->where( 'sumid', $id )->where( 'beworknum', $artres[ $key ][ "worknum" ] )->where( 'Summary', '称职' )->count();
				//总评价中称职的数目
				$data3 = db( "data" )->where( 'sumid', $id )->where( 'beworknum', $artres[ $key ][ "worknum" ] )->where( 'Summary', '基本称职' )->count();
				//总评价中基本称职的数目
				$data4 = db( "data" )->where( 'sumid', $id )->where( 'beworknum', $artres[ $key ][ "worknum" ] )->where( 'Summary', '不称职' )->count();
				//总评价中不称职的数目

				if ( $type[ "type" ] == "民主测评"||$type['type']=="部门负责人测评" ) {
					$allvote = db( 'check' )->field( 'c.name,c.id,a.sumid,b.worknum as beworknum,a.worknum,d.cateid as becateid,e.cateid' )->alias( 'a' )->join( 'gb_bechecked b', 'a.sumid=b.sumid' )->where( 'b.worknum', $value[ "worknum" ] )->join( 'gb_checktable c', 'a.sumid=c.id' )->join( 'gb_admin d', 'd.worknum=b.worknum' )->join( 'gb_admin e', 'e.worknum=a.worknum and d.cateid=e.cateid' )->where( 'c.id', $id )->count();
					$votenum = db( 'data' )->where( 'sumid', $id )->where( 'beworknum', $artres[ $key ][ "worknum" ] )->count();
					
					if ( $allvote == 0) {
						$votenum = 0;
						$allvote = 1;
					}
					if($votenum != 0){
						$pingfen = ($data1*100 + $data2*80 + $data3*60)/$votenum;
					}
					else{
						$pingfen = 0;
					}
					$percent = $votenum / $allvote * 100;
					$percents = sprintf( "%.2f", $percent );
					$artres[ $key ][ 'allvote' ] = $allvote;
					$artres[ $key ][ 'votenum' ] = $votenum;
					$artres[ $key ][ 'percents' ] = $percents;
					$artres[ $key ][ 'pingfen' ] = $pingfen;
				}
				elseif($type[ "type" ] == "领导对干部测评"){
					$allvote = db( 'check' )->field( 'c.name,c.id,a.sumid,b.worknum as beworknum,a.worknum,d.cateid as becateid,e.cateid' )->alias( 'a' )->join( 'gb_bechecked b', 'a.sumid=b.sumid' )->where( 'b.worknum', $value[ "worknum" ] )->join( 'gb_checktable c', 'a.sumid=c.id' )->join( 'gb_admin d', 'd.worknum=b.worknum' )->where( 'c.id', $id )->count();
					//dump($allvote);
					//dump($value["worknum"]);
					$votenum = db( 'data' )->where( 'sumid', $id )->where( 'beworknum', $artres[ $key ][ "worknum" ] )->count();
					//dump($votenum);die;
					if ( $allvote == 0) {
						$votenum = 0;
						$allvote = 1;
					}

					if($votenum != 0){
						$pingfen = ($data1*100 + $data2*80 + $data3*60)/$votenum;
					}
					else{
						$pingfen = 0;
					}
					$percent = $votenum / $allvote * 100;
					$percents = sprintf( "%.2f", $percent );
					$artres[ $key ][ 'allvote' ] = $allvote;
					$artres[ $key ][ 'votenum' ] = $votenum;
					$artres[ $key ][ 'percents' ] = $percents;
					$artres[ $key ][ 'pingfen' ] = $pingfen;
				}
				elseif ( $type[ "type" ] == "科级干部互评" ) {
					$allvote = db( 'check' )->field( 'c.name,c.id,a.sumid,b.worknum as beworknum,a.worknum,d.cateid as becateid,e.cateid' )->alias( 'a' )->join( 'gb_bechecked b', 'a.sumid=b.sumid' )->where( 'b.worknum', $value[ "worknum" ] )->join( 'gb_checktable c', 'a.sumid=c.id' )->join( 'gb_admin d', 'd.worknum=b.worknum' )->where( 'c.id', $id )->count();
					$votenum = db( 'data' )->where( 'sumid', $id )->where( 'beworknum', $artres[ $key ][ "worknum" ] )->count();
					//dump($votenum);die;
					if ( $allvote == 0) {
						$votenum = 0;
						$allvote = 1;
					}

					if($votenum != 0){
						$pingfen = ($data1*100 + $data2*80 + $data3*60)/$votenum;
					}
					else{
						$pingfen = 0;
					}
					$percent = $votenum / $allvote * 100;
					$percents = sprintf( "%.2f", $percent );
					$artres[ $key ][ 'allvote' ] = $allvote;
					$artres[ $key ][ 'votenum' ] = $votenum;
					$artres[ $key ][ 'percents' ] = $percents;
					$artres[ $key ][ 'pingfen' ] = $pingfen;
				}
				 elseif ( $type[ "type" ] == "民主干部互评" ) {
					$allvote = db( 'check' )->field( 'c.name,c.id,a.sumid,b.worknum as beworknum,a.worknum,d.cateid as becateid,e.cateid' )->alias( 'a' )->join( 'gb_bechecked b', 'a.sumid=b.sumid' )->where( 'b.worknum', $value[ "worknum" ] )->join( 'gb_checktable c', 'a.sumid=c.id' )->join( 'gb_admin d', 'd.worknum=b.worknum' )->join( 'gb_admin e', 'e.worknum=a.worknum and d.cateid<>e.cateid' )->where( 'c.id', $id )->count();
					$votenum = db( 'data' )->where( 'sumid', $id )->where( 'beworknum', $artres[ $key ][ "worknum" ] )->count();
					//dump($votenum);die;
					if ( $allvote == 0) {
						$votenum = 0;
						$allvote = 1;
					}

					if($votenum != 0){
						$pingfen = ($data1*100 + $data2*80 + $data3*60)/$votenum;
					}
					else{
						$pingfen = 0;
					}
					$percent = $votenum / $allvote * 100;
					$percents = sprintf( "%.2f", $percent );
					$artres[ $key ][ 'allvote' ] = $allvote;
					$artres[ $key ][ 'votenum' ] = $votenum;
					$artres[ $key ][ 'percents' ] = $percents;
					$artres[ $key ][ 'pingfen' ] = $pingfen;
					//dump($allvote);
				}
				if($votenum!=0)
				$artres[ $key ][ 'data1' ] = ($data1 + $data2 * 0.8+0.6*$data3)/$votenum*100;
			else
				$artres[ $key ][ 'data1' ]=0;
				//dump($artres[$key]);
			}
			//dump($artres);
			//END

			$department = db( 'cate' )->order( 'id' )->select();
			$this->assign( array(
				'artres' => $artres,
				'department' => $department,
			) );
			return view();
		}
		elseif ( $type[ "type" ] == "德的考核考察" || $type[ "type" ] == "德的干部互评" ) {
			$artres = db( 'admin' )->field( 'a.worknum,a.name,a.type,a.cateid,c.catename,e.id tableid,e.name checkname,e.timestart,e.timeend ' )->alias( 'a' )->join( 'gb_article b', 'a.worknum=b.adminid' )->join( 'gb_cate c', 'c.id=a.cateid' )->join( 'gb_bechecked d', 'd.worknum=a.worknum' )->join( 'gb_checktable e', 'e.id=d.sumid' )->where( 'e.id', $id )->where( 'a.type', "中层干部" )->order( 'b.sort' )->select();
			if ( !$artres ) {
				$this->error( '无候选人信息！', url( 'gerenlst' ) );
			}
			//读取统计信息

			foreach ( $artres as $key => $value ) {
				$data1 = db( "data" )->where( 'sumid', $id )->where( 'beworknum', $artres[ $key ][ "worknum" ] )->where( 'Summary', '好' )->count();
				//总评价中优秀的数目 
				$data2 = db( "data" )->where( 'sumid', $id )->where( 'beworknum', $artres[ $key ][ "worknum" ] )->where( 'Summary', '较好' )->count();
				//总评价中称职的数目
				$data3 = db( "data" )->where( 'sumid', $id )->where( 'beworknum', $artres[ $key ][ "worknum" ] )->where( 'Summary', '一般' )->count();
				//总评价中基本称职的数目
				$data4 = db( "data" )->where( 'sumid', $id )->where( 'beworknum', $artres[ $key ][ "worknum" ] )->where( 'Summary', '不称职' )->count();
				//总评价中不称职的数目
				if ( $type[ "type" ] == "德的考核考察" ) {
					$allvote = db( 'check' )->field( 'c.name,c.id,a.sumid,b.worknum as beworknum,a.worknum,d.cateid as becateid,e.cateid' )->alias( 'a' )->join( 'gb_bechecked b', 'a.sumid=b.sumid' )->where( 'b.worknum', $value[ "worknum" ] )->join( 'gb_checktable c', 'a.sumid=c.id' )->join( 'gb_admin d', 'd.worknum=b.worknum' )->join( 'gb_admin e', 'e.worknum=a.worknum and d.cateid=e.cateid' )->where( 'c.id', $id )->count();
					$votenum = db( 'data' )->where( 'sumid', $id )->where( 'beworknum', $artres[ $key ][ "worknum" ] )->count();
					if ( $allvote == 0 ) {
						$votenum = 1;
						$allvote = 1;
					}
					$percent = $votenum / $allvote * 100;
					$percents = sprintf( "%.2f", $percent );
					$artres[ $key ][ 'allvote' ] = $allvote;
					$artres[ $key ][ 'votenum' ] = $votenum;
					$artres[ $key ][ 'percents' ] = $percents;
				} elseif ( $type[ "type" ] == "德的干部互评" ) {
					$allvote = db( 'check' )->field( 'c.name,c.id,a.sumid,b.worknum as beworknum,a.worknum,d.cateid as becateid,e.cateid' )->alias( 'a' )->join( 'gb_bechecked b', 'a.sumid=b.sumid' )->where( 'b.worknum', $value[ "worknum" ] )->join( 'gb_checktable c', 'a.sumid=c.id' )->join( 'gb_admin d', 'd.worknum=b.worknum' )->join( 'gb_admin e', 'e.worknum=a.worknum and d.cateid<>e.cateid' )->where( 'c.id', $id )->count();
					$votenum = db( 'data' )->where( 'sumid', $id )->where( 'beworknum', $artres[ $key ][ "worknum" ] )->count();
					if ( $allvote == 0 ) {
						$votenum = 1;
						$allvote = 1;
					}
					$percent = $votenum / $allvote * 100;
					$percents = sprintf( "%.2f", $percent );
					$artres[ $key ][ 'allvote' ] = $allvote;
					$artres[ $key ][ 'votenum' ] = $votenum;
					$artres[ $key ][ 'percents' ] = $percents;
					//dump($allvote);
				}
				if($votenum!=0)
				$artres[ $key ][ 'data1' ] = ($data1 + $data2 * 0.8+0.6*$data3)/$votenum*100;
			else
				$artres[ $key ][ 'data1' ]=0;
				//dump($artres[$key]);
			}
			//dump($artres);
			//END
			if ( !$artres ) {
				$this->error( '无候选人信息！', url( 'lst' ) );
			}
			$department = db( 'cate' )->order( 'id' )->select();
			$this->assign( array(
				'artres' => $artres,
				'department' => $department,
			) );
			return view();
		}
		elseif ( $type[ "type" ] == "试用期干部测评" ) {
			$artres = db( 'admin' )->field( 'a.worknum,a.name,a.type,a.cateid,c.catename,e.id tableid,e.name checkname,e.timestart,e.timeend ' )->alias( 'a' )->join( 'gb_article b', 'a.worknum=b.adminid' )->join( 'gb_cate c', 'c.id=a.cateid' )->join( 'gb_bechecked d', 'd.worknum=a.worknum' )->join( 'gb_checktable e', 'e.id=d.sumid' )->where( 'e.id', $id )->where( 'a.type', "中层干部" )->where( 'try', '是' )->order( 'b.sort' )->select();
			if ( !$artres ) {
				$this->error( '无候选人信息！', url( 'gerenlst' ) );
			}

			//读取统计信息
			foreach ( $artres as $key => $value ) {
				$data1 = db( "data" )->where( 'sumid', $id )->where( 'beworknum', $artres[ $key ][ "worknum" ] )->where( 'srd', '优秀' )->count();
				//总评价中优秀的数目 
				$data2 = db( "data" )->where( 'sumid', $id )->where( 'beworknum', $artres[ $key ][ "worknum" ] )->where( 'srd', '称职' )->count();
				//总评价中称职的数目
				$data3 = db( "data" )->where( 'sumid', $id )->where( 'beworknum', $artres[ $key ][ "worknum" ] )->where( 'srd', '基本称职' )->count();
				//总评价中基本称职的数目
				$data4 = db( "data" )->where( 'sumid', $id )->where( 'beworknum', $artres[ $key ][ "worknum" ] )->where( 'srd', '不称职' )->count();
				//总评价中不称职的数目
				$inf = db( 'view_yonghu' )->where( 'worknum', $value[ 'worknum' ] )->find();
				if ( $inf[ "keywords" ] == "机关部门" ) {
					$allvote = db( 'check' )->field( 'c.name as tablename,c.id as tableid,b.worknum as beworknum,a.worknum,d.cateid as becateid,d.name as bename,e.cateid,e.name' )->alias( 'a' )->join( 'gb_bechecked b', 'a.sumid=b.sumid' )->where( 'b.worknum', $value[ "worknum" ] )->join( 'gb_checktable c', 'a.sumid=c.id' )->join( 'gb_view_yonghu d', 'd.worknum=b.worknum' )->join( 'gb_view_yonghu e', 'e.worknum=a.worknum and d.keywords=e.keywords' )->where( 'c.id', $id )->count();
				} 
				else {
					$allvote = db( 'check' )->field( 'c.name,c.id,a.sumid,b.worknum as beworknum,a.worknum,d.cateid as becateid,e.cateid' )->alias( 'a' )->join( 'gb_bechecked b', 'a.sumid=b.sumid' )->where( 'b.worknum', $value[ "worknum" ] )->join( 'gb_checktable c', 'a.sumid=c.id' )->join( 'gb_admin d', 'd.worknum=b.worknum' )->join( 'gb_admin e', 'e.worknum=a.worknum and d.cateid=e.cateid' )->where( 'c.id', $id )->count();
				}
				$votenum = db( 'data' )->where( 'sumid', $id )->where( 'beworknum', $artres[ $key ][ "worknum" ] )->count();
				if ( $allvote == 0 ) {
					$votenum = 1;
					$allvote = 1;
				}
				$percent = $votenum / $allvote * 100;
				$percents = sprintf( "%.2f", $percent );
				$artres[ $key ][ 'allvote' ] = $allvote;
				$artres[ $key ][ 'votenum' ] = $votenum;
				$artres[ $key ][ 'percents' ] = $percents;
				if($votenum!=0)
				$artres[ $key ][ 'data1' ] = ($data1 + $data2 * 0.8+0.6*$data3)/$votenum*100;
			else
				$artres[ $key ][ 'data1' ]=0;
				//dump($artres[$key]);
			}
			//dump($artres);die;
			//END
			if ( !$artres ) {
				$this->error( '无候选人信息！', url( 'lst' ) );
			}
			$department = db( 'cate' )->order( 'id' )->select();
			$this->assign( array(
				'artres' => $artres,
				'department' => $department,
			) );
			return view();
		}
	}


	public

	function weitoupiao() {
		$tableid = input( 'id' );
		//dump($tableid);die();
		$worknum = input( 'worknum' );
		$tablename = db('checktable')->where('id',$tableid)->find();
		//dump($tablename);die;

		$inf = db( 'view_yonghu' )->where( 'worknum', $worknum )->find();
		//dump($inf);die;
	    
        if($tablename['type'] == "民主测评"){
            if($inf['type'] == "科级干部"){
            	$allvote = db( 'check' )->field( 'c.name as tablename,c.id as tableid,b.worknum as beworknum,a.worknum,d.cateid as becateid,d.name as bename,e.cateid,e.name,e.type,e.catename' )->alias( 'a' )->join( 'gb_bechecked b', 'a.sumid=b.sumid' )->where( 'b.worknum', $worknum )->join( 'gb_checktable c', 'a.sumid=c.id' )->join( 'gb_view_yonghu d', 'd.worknum=b.worknum' )->join( 'gb_view_yonghu e', 'e.worknum=a.worknum and d.cateid=e.cateid' )->where('d.cateid',$inf['cateid'])->where( 'c.id', $tableid )->where('e.type <> "科级干部"')->order( 'e.cateid' )->select();
            	//dump($allvote); //总名单
				$votenum = db( 'data' )->field( 'b.*' )->alias( 'a' )->join( 'gb_view_yonghu b', 'a.worknum=b.worknum' )->where( 'a.sumid', $tableid )->where( 'a.beworknum', $worknum )->select();
            }else{
        		$allvote = db( 'check' )->field( 'c.name as tablename,c.id as tableid,b.worknum as beworknum,a.worknum,d.cateid as becateid,d.name as bename,e.cateid,e.name,e.type,e.catename' )->alias( 'a' )->join( 'gb_bechecked b', 'a.sumid=b.sumid' )->where( 'b.worknum', $worknum )->join( 'gb_checktable c', 'a.sumid=c.id' )->join( 'gb_view_yonghu d', 'd.worknum=b.worknum' )->join( 'gb_view_yonghu e', 'e.worknum=a.worknum and d.cateid=e.cateid' )->where('d.cateid',$inf['cateid'])->where( 'c.id', $tableid )->order( 'e.cateid' )->select(); //总名单
				$votenum = db( 'data' )->field( 'b.*' )->alias( 'a' )->join( 'gb_view_yonghu b', 'a.worknum=b.worknum' )->where( 'a.sumid', $tableid )->where( 'a.beworknum', $worknum )->select();
			} 
			//已投票名单
			//dump($allvote);
			//dump($votenum);

			$weitoupiao = $allvote;
			foreach ( $weitoupiao as $i => $value1 ) {
				foreach ( $votenum as $j => $value2 ) {
					if ( $value1[ 'worknum' ] == $value2[ 'worknum' ] ) {
						unset( $weitoupiao[ $i ] );
					}
				}
            }
            //dump($weitoupiao);die;
            if ( !$weitoupiao ) {
			   $this->error( '无未投票人员！', url( 'summary',array('id'=>$tableid) ) );
		    }
            $tableinf = db( 'checktable' )->where( 'id', $tableid )->find();

        }

        elseif($tablename['type']=="部门负责人测评"){
        	if($inf['keywords'] == "机关部门"){
            	$allvote = db( 'check' )->field( 'c.name as tablename,c.id as tableid,b.worknum as beworknum,a.worknum,d.cateid as becateid,d.name as bename,e.cateid,e.name,e.type,e.catename' )->alias( 'a' )->join( 'gb_bechecked b', 'a.sumid=b.sumid' )->where( 'b.worknum', $worknum )->join( 'gb_checktable c', 'a.sumid=c.id' )->join( 'gb_view_yonghu d', 'd.worknum=b.worknum' )->join( 'gb_view_yonghu e', 'e.worknum=a.worknum and d.cateid=e.cateid' )->where('d.cateid2',$inf['cateid2'])->where( 'c.id', $tableid )->order( 'e.cateid' )->select();
            	//dump($allvote); //总名单
				$votenum = db( 'data' )->field( 'b.*' )->alias( 'a' )->join( 'gb_view_yonghu b', 'a.worknum=b.worknum' )->where( 'a.sumid', $tableid )->where( 'a.beworknum', $worknum )->select();
			}
            
			//已投票名单
			//dump($allvote);
			// dump($votenum);die;
			$weitoupiao = $allvote;
			foreach ( $weitoupiao as $i => $value1 ) {
				foreach ( $votenum as $j => $value2 ) {
					if ( $value1[ 'worknum' ] == $value2[ 'worknum' ] ) {
						unset( $weitoupiao[ $i ] );
					}
				}
            }
            //dump($weitoupiao);die;
            if ( !$weitoupiao ) {
			   $this->error( '无未投票人员！', url( 'summary',array('id'=>$tableid) ) );
		    }
            $tableinf = db( 'checktable' )->where( 'id', $tableid )->find();
            
        }

        elseif ($tablename['type'] == "民主干部互评") {
        	$allvote = db( 'check' )->field( 'c.name as tablename,c.id as tableid,b.worknum as beworknum,a.worknum,d.cateid as becateid,d.name as bename,e.cateid,e.name,e.type,e.catename' )->alias( 'a' )->join( 'gb_bechecked b', 'a.sumid=b.sumid' )->where( 'b.worknum', $worknum )->join( 'gb_checktable c', 'a.sumid=c.id' )->join( 'gb_view_yonghu d', 'd.worknum=b.worknum' )->join( 'gb_view_yonghu e', 'e.worknum=a.worknum ' )->where('e.cateid','<>',$inf['cateid'])->where( 'c.id', $tableid )->order( 'e.cateid' )->select(); //总名单
			$votenum = db( 'data' )->field( 'b.*' )->alias( 'a' )->join( 'gb_view_yonghu b', 'a.worknum=b.worknum' )->where( 'a.sumid', $tableid )->where( 'a.beworknum', $worknum )->select(); //已投票名单
			//dump($allvote);die;
			//dump($votenum);

			$weitoupiao = $allvote;
			foreach ( $weitoupiao as $i => $value1 ) {
				foreach ( $votenum as $j => $value2 ) {
					if ( $value1[ 'worknum' ] == $value2[ 'worknum' ] ) {
						unset( $weitoupiao[ $i ] );
					}
				}
            }
            if ( !$weitoupiao ) {
			   $this->error( '无未投票人员！', url( 'summary',array('id'=>$tableid) ) );
		    }
            $tableinf = db( 'checktable' )->where( 'id', $tableid )->find();
        }
        elseif($tablename['type'] == "领导对干部测评"){
        	$allvote = db( 'check' )->field( 'c.name as tablename,c.id as tableid,b.worknum as beworknum,a.worknum,d.cateid as becateid,d.name as bename,e.cateid,e.name,e.type,e.catename' )->alias( 'a' )->join( 'gb_bechecked b', 'a.sumid=b.sumid' )->where( 'b.worknum', $worknum )->join( 'gb_checktable c', 'a.sumid=c.id' )->join( 'gb_view_yonghu d', 'd.worknum=b.worknum' )->join( 'gb_view_yonghu e', 'e.worknum=a.worknum' )->where( 'c.id', $tableid )->order( 'e.cateid' )->select(); //总名单
			$votenum = db( 'data' )->field( 'b.*' )->alias( 'a' )->join( 'gb_view_yonghu b', 'a.worknum=b.worknum' )->where( 'a.sumid', $tableid )->where( 'a.beworknum', $worknum )->select(); //已投票名单

			$weitoupiao = $allvote;
			foreach ( $weitoupiao as $i => $value1 ) {
				foreach ( $votenum as $j => $value2 ) {
					if ( $value1[ 'worknum' ] == $value2[ 'worknum' ] ) {
							unset( $weitoupiao[ $i ] );
					}
				}
            }
            if ( !$weitoupiao ) {
			   $this->error( '无未投票人员！', url( 'summary',array('id'=>$tableid) ) );
		    }
            $tableinf = db( 'checktable' )->where( 'id', $tableid )->find();
        }
        elseif($tablename['type'] == "科级干部互评"){
        	$allvote = db( 'check' )->field( 'c.name as tablename,c.id as tableid,b.worknum as beworknum,a.worknum,d.name as bename,e.cateid,e.name,e.type,e.catename' )->alias( 'a' )->join( 'gb_bechecked b', 'a.sumid=b.sumid' )->where( 'b.worknum', $worknum )->join( 'gb_checktable c', 'a.sumid=c.id' )->join( 'gb_view_yonghu d', 'd.worknum=b.worknum' )->join( 'gb_view_yonghu e', 'e.worknum=a.worknum' )->where( 'c.id', $tableid )->order( 'e.cateid' )->where('e.keywords','<>',$inf['keywords'])->select(); //总名单
			$votenum = db( 'data' )->field( 'b.*' )->alias( 'a' )->join( 'gb_view_yonghu b', 'a.worknum=b.worknum' )->where( 'a.sumid', $tableid )->where( 'a.beworknum', $worknum )->select(); //已投票名单

			$weitoupiao = $allvote;
			 //dump($weitoupiao);
			foreach ( $weitoupiao as $i => $value1 ) {
				foreach ( $votenum as $j => $value2 ) {
					if ( $value1[ 'worknum' ] == $value2[ 'worknum' ] ) {
							unset( $weitoupiao[ $i ] );
					}
				}
            }
            if ( !$weitoupiao ) {
			   $this->error( '无未投票人员！', url( 'summary',array('id'=>$tableid) ) );
		    }
            //dump($weitoupiao);die;
            $tableinf = db( 'checktable' )->where( 'id', $tableid )->find();
        }

		$department = db( 'cate' )->order( 'id' )->select();

		$this->assign( 'adminres', $weitoupiao );
		$this->assign( 'department', $department );
		// $this->assign( 'page', $page );
		$this->assign( 'tableinf', $tableinf );
		return view();
	}

	public

	function huizong() 
	{
		$tableid = input( 'id' );
		$worknum = input( 'worknum' );
		$inf = db( 'view_yonghu' )->where( 'worknum', $worknum )->find();
		$tableinf = db( 'checktable' )->where( 'id', $tableid )->find();
		$department = db( 'cate' )->order( 'id' )->select();
		//dump($tableinf);die;
   if($tableinf['type']=='试用期干部测评')
   {
   	       if($worknum==0)
   			$artres = db( 'admin' )->field( 'a.worknum,a.name,a.type,a.cateid,c.catename,e.id tableid,e.name checkname,e.timestart,e.timeend ' )->alias( 'a' )->join( 'gb_article b', 'a.worknum=b.adminid' )->join( 'gb_cate c', 'c.id=a.cateid' )->join( 'gb_bechecked d', 'd.worknum=a.worknum' )->join( 'gb_checktable e', 'e.id=d.sumid' )->where( 'e.id', $tableid )->where( 'a.type', "中层干部" )->where( 'try', '是' )->order( 'b.sort' )->select();
   		else
   			$artres = db( 'admin' )->field( 'a.worknum,a.name,a.type,a.cateid,c.catename,e.id tableid,e.name checkname,e.timestart,e.timeend ' )->alias( 'a' )->join( 'gb_article b', 'a.worknum=b.adminid' )->join( 'gb_cate c', 'c.id=a.cateid' )->join( 'gb_bechecked d', 'd.worknum=a.worknum' )->join( 'gb_checktable e', 'e.id=d.sumid' )->where( 'e.id', $tableid )->where( 'a.type', "中层干部" )->where('a.worknum',$worknum)->where( 'try', '是' )->order( 'b.sort' )->select();
   	}
   	elseif($tableinf['type']=='科级干部互评'||$tableinf['type']=='部门负责人测评'){
   		if($worknum==0)
   			$artres = db( 'admin' )->field( 'a.worknum,a.name,a.type,a.cateid,c.catename,e.id tableid,e.name checkname,e.timestart,e.timeend ' )->alias( 'a' )->join( 'gb_article b', 'a.worknum=b.adminid' )->join( 'gb_cate c', 'c.id=a.cateid' )->join( 'gb_bechecked d', 'd.worknum=a.worknum' )->join( 'gb_checktable e', 'e.id=d.sumid' )->where( 'e.id', $tableid )->where( 'a.type', "科级干部" )->order( 'b.sort' )->select();
   		else
   			$artres = db( 'admin' )->field( 'a.worknum,a.name,a.type,a.cateid,c.catename,e.id tableid,e.name checkname,e.timestart,e.timeend ' )->alias( 'a' )->join( 'gb_article b', 'a.worknum=b.adminid' )->join( 'gb_cate c', 'c.id=a.cateid' )->join( 'gb_bechecked d', 'd.worknum=a.worknum' )->join( 'gb_checktable e', 'e.id=d.sumid' )->where( 'e.id', $tableid )->where( 'a.type', "科级干部" )->where('a.worknum',$worknum)->order( 'b.sort' )->select();
   	}
   	elseif($tableinf['type']=='领导对干部测评'){
   		if($worknum==0)
   			$artres = db( 'admin' )->field( 'a.worknum,a.name,a.type,a.cateid,c.catename,e.id tableid,e.name checkname,e.timestart,e.timeend ' )->alias( 'a' )->join( 'gb_article b', 'a.worknum=b.adminid' )->join( 'gb_cate c', 'c.id=a.cateid' )->join( 'gb_bechecked d', 'd.worknum=a.worknum' )->join( 'gb_checktable e', 'e.id=d.sumid' )->where( 'e.id', $tableid )->where( 'a.type = "科级干部" or a.type = "中层干部"')->order( 'b.sort' )->select();
   		else
   			$artres = db( 'admin' )->field( 'a.worknum,a.name,a.type,a.cateid,c.catename,e.id tableid,e.name checkname,e.timestart,e.timeend ' )->alias( 'a' )->join( 'gb_article b', 'a.worknum=b.adminid' )->join( 'gb_cate c', 'c.id=a.cateid' )->join( 'gb_bechecked d', 'd.worknum=a.worknum' )->join( 'gb_checktable e', 'e.id=d.sumid' )->where( 'e.id', $tableid )->where( 'a.type = "科级干部" or a.type = "中层干部"')->where('a.worknum',$worknum)->order( 'b.sort' )->select();   
   	}
   	elseif($tableinf['type']=='民主干部互评'){
   		if($worknum==0)
   			$artres = db( 'admin' )->field( 'a.worknum,a.name,a.type,a.cateid,c.catename,e.id tableid,e.name checkname,e.timestart,e.timeend ' )->alias( 'a' )->join( 'gb_article b', 'a.worknum=b.adminid' )->join( 'gb_cate c', 'c.id=a.cateid' )->join( 'gb_bechecked d', 'd.worknum=a.worknum' )->join( 'gb_checktable e', 'e.id=d.sumid' )->where( 'e.id', $tableid )->where( 'a.type = "科级干部" or a.type = "中层干部"')->order( 'b.sort' )->select();
   		else
   			$artres = db( 'admin' )->field( 'a.worknum,a.name,a.type,a.cateid,c.catename,e.id tableid,e.name checkname,e.timestart,e.timeend ' )->alias( 'a' )->join( 'gb_article b', 'a.worknum=b.adminid' )->join( 'gb_cate c', 'c.id=a.cateid' )->join( 'gb_bechecked d', 'd.worknum=a.worknum' )->join( 'gb_checktable e', 'e.id=d.sumid' )->where( 'e.id', $tableid )->where( 'a.type = "科级干部" or a.type = "中层干部"')->where('a.worknum',$worknum)->order( 'b.sort' )->select();   
   	}
   	else
   	{
   		if($tableinf['type']==0)
   			$artres = db( 'admin' )->field( 'a.worknum,a.name,a.type,a.cateid,c.catename,e.id tableid,e.name checkname,e.timestart,e.timeend ' )->alias( 'a' )->join( 'gb_article b', 'a.worknum=b.adminid' )->join( 'gb_cate c', 'c.id=a.cateid' )->join( 'gb_bechecked d', 'd.worknum=a.worknum' )->join( 'gb_checktable e', 'e.id=d.sumid' )->where( 'e.id', $tableid )->where( 'a.type = "科级干部" or a.type = "中层干部"')->order( 'b.sort' )->select();
   		else
   			$artres = db( 'admin' )->field( 'a.worknum,a.name,a.type,a.cateid,c.catename,e.id tableid,e.name checkname,e.timestart,e.timeend ' )->alias( 'a' )->join( 'gb_article b', 'a.worknum=b.adminid' )->join( 'gb_cate c', 'c.id=a.cateid' )->join( 'gb_bechecked d', 'd.worknum=a.worknum' )->join( 'gb_checktable e', 'e.id=d.sumid' )->where( 'e.id', $tableid )->where( 'a.type = "科级干部" or a.type = "中层干部"')->where('a.worknum',$worknum)->order( 'b.sort' )->select();
   	}


		if ( !$artres ) {
			$this->error( '无候选人信息！', url( 'gerenlst' ) );
		}

		//读取统计信息
		//dump($artres);die;
		if($tableinf['type']=='试用期干部测评'){
		foreach ( $artres as $key => $value ) {
			$value['data1'] = db( "data" )->where( 'sumid', $tableid )->where( 'beworknum', $artres[ $key ][ "worknum" ] )->where( 'srd', '优秀' )->count();
			//总评价中优秀的数目 
			$value['data2'] = db( "data" )->where( 'sumid', $tableid )->where( 'beworknum', $artres[ $key ][ "worknum" ] )->where( 'srd', '称职' )->count();
			//总评价中称职的数目
			$value['data3'] = db( "data" )->where( 'sumid', $tableid )->where( 'beworknum', $artres[ $key ][ "worknum" ] )->where( 'srd', '基本称职' )->count();
			//总评价中基本称职的数目
			$value['data4'] = db( "data" )->where( 'sumid', $tableid )->where( 'beworknum', $artres[ $key ][ "worknum" ] )->where( 'srd', '不称职' )->count();
			//总评价中不称职的数目
			$value['data5'] = db( "data" )->where( 'sumid', $tableid )->where( 'beworknum', $artres[ $key ][ "worknum" ] )->where( 'zssr', '同意' )->count();
			//总评价中同意的数目
			$value['data6'] = db( "data" )->where( 'sumid', $tableid )->where( 'beworknum', $artres[ $key ][ "worknum" ] )->where( 'zssr', '不同意' )->count();
			//总评价中不同意的数目
			$value['data7'] = db( "data" )->where( 'sumid', $tableid )->where( 'beworknum', $artres[ $key ][ "worknum" ] )->where( 'zssr',null)->count();
			//总评价中弃权的数目
			$inf = db( 'view_yonghu' )->where( 'worknum', $value[ 'worknum' ] )->find();
			if ( $inf[ "keywords" ] == "机关部门" ) {
				$allvote = db( 'check' )->field( 'c.name as tablename,c.id as tableid,b.worknum as beworknum,a.worknum,d.cateid as becateid,d.name as bename,e.cateid,e.name' )->alias( 'a' )->join( 'gb_bechecked b', 'a.sumid=b.sumid' )->where( 'b.worknum', $value[ "worknum" ] )->join( 'gb_checktable c', 'a.sumid=c.id' )->join( 'gb_view_yonghu d', 'd.worknum=b.worknum' )->join( 'gb_view_yonghu e', 'e.worknum=a.worknum and d.keywords=e.keywords' )->where( 'c.id', $tableid )->count();
			} else {
				$allvote = db( 'check' )->field( 'c.name,c.id,a.sumid,b.worknum as beworknum,a.worknum,d.cateid as becateid,e.cateid' )->alias( 'a' )->join( 'gb_bechecked b', 'a.sumid=b.sumid' )->where( 'b.worknum', $value[ "worknum" ] )->join( 'gb_checktable c', 'a.sumid=c.id' )->join( 'gb_admin d', 'd.worknum=b.worknum' )->join( 'gb_admin e', 'e.worknum=a.worknum and d.cateid=e.cateid' )->where( 'c.id', $tableid )->count();
			}
			$votenum = db( 'data' )->where( 'sumid', $tableid )->where( 'beworknum', $artres[ $key ][ "worknum" ] )->count();
			if ( $allvote == 0 ) {
				$votenum = 1;
				$allvote = 1;
			}
			$percent = $votenum / $allvote * 100;
			$percents = sprintf( "%.2f", $percent );
			$artres[ $key ][ 'allvote' ] = $allvote;
			$artres[ $key ][ 'votenum' ] = $votenum;
			if($value['votenum']!=0)
			{
				
				$value['per']=100*($value['data1']+$value['data2'])/$value['votenum']; 
				$value['total']=($value['data1']+0.8*$value['data2']+0.6*$value['data3'])/$value['votenum']*100;
				$value['dp1']=$value['data1']/$value['votenum']*100;
			$value['dp2']=$value['data2']/$value['votenum']*100;
			$value['dp3']=$value['data3']/$value['votenum']*100;
			$value['dp4']=$value['data4']/$value['votenum']*100;
			$value['dp5']=$value['data5']/$value['votenum']*100;
			$value['dp6']=$value['data6']/$value['votenum']*100;
			$value['dp7']=$value['data7']/$value['votenum']*100;
			}
		else
		{
			$value['per']=0;
			$value['total']=0;
			$value['dp1']=0;
			$value['dp2']=0;
			$value['dp3']=0;
			$value['dp4']=0;
			$value['dp5']=0;
			$value['dp6']=0;
			$value['dp7']=0;
			
		}
		  
			//dump($artres[$key]);
		}
	}
	elseif($tableinf['type']=='民主测评'||$tableinf['type']=='民主干部互评'||$tableinf['type']=='领导对干部测评'||$tableinf['type']=='科级干部互评'||$tableinf['type']=='部门负责人测评'){
		
		foreach ( $artres as $key => $value ) {
		$sum_all = array();
		$fenxiang = array();
	    $fenxiang['de'] = 0;
	    $fenxiang['neng'] = 0;
        $fenxiang['qin'] = 0;
        $fenxiang['ji'] = 0;
        $fenxiang['lian'] = 0;
		$sum_all['hao'] = $fenxiang;
		$sum_all['jiaohao'] =$fenxiang;
		$sum_all['yiban'] = $fenxiang;
		$sum_all['cha'] = $fenxiang;
		$sum_all['youxiu'] = 0;
		$sum_all['chenzhi'] = 0;
		$sum_all['jibenchenzhi'] = 0;
		$sum_all['buchenzhi'] = 0;
		//dump($sum_all);
		$data_all = db( "data" )->where( 'sumid', $tableid )->where( 'beworknum', $artres[ $key ][ "worknum" ])->select();
		//dump($data_all);die;
			foreach ($data_all as $i => $value_1) {
				if($value_1['de'] == "好"){
					$sum_all['hao']['de']++;
				}
				elseif($value_1['de'] == "较好"){
					$sum_all['jiaohao']['de']++;
				}
				elseif($value_1['de'] == "一般"){
					$sum_all['yiban']['de']++;
				}
				elseif($value_1['de'] == "差"){
					$sum_all['cha']['de']++;
				}
				if($value_1['neng'] == "好"){
					$sum_all['hao']['neng']++;
				}
				elseif($value_1['neng'] == "较好"){
					$sum_all['jiaohao']['neng']++;
				}
				elseif($value_1['neng'] == "一般"){
					$sum_all['yiban']['neng']++;
				}
				elseif($value_1['neng'] == "差"){
					$sum_all['cha']['neng']++;
				}
				if($value_1['qin'] == "好"){
					$sum_all['hao']['qin']++;
				}
				elseif($value_1['qin'] == "较好"){
					$sum_all['jiaohao']['qin']++;
				}
				elseif($value_1['qin'] == "一般"){
					$sum_all['yiban']['qin']++;
				}
				elseif($value_1['qin'] == "差"){
					$sum_all['cha']['qin']++;
				}
				if($value_1['ji'] == "好"){
					$sum_all['hao']['ji']++;
				}
				elseif($value_1['ji'] == "较好"){
					$sum_all['jiaohao']['ji']++;
				}
				elseif($value_1['ji'] == "一般"){
					$sum_all['yiban']['ji']++;
				}
				elseif($value_1['ji'] == "差"){
					$sum_all['cha']['ji']++;
				}
				if($value_1['lian'] == "好"){
					$sum_all['hao']['lian']++;
				}
				elseif($value_1['lian'] == "较好"){
					$sum_all['jiaohao']['lian']++;
				}
				elseif($value_1['lian'] == "一般"){
					$sum_all['yiban']['lian']++;
				}
				elseif($value_1['lian'] == "差"){
					$sum_all['cha']['lian']++;
				}
				if($value_1['summary'] == "优秀"){
					$sum_all['youxiu']++;
				}
				elseif($value_1['summary'] == "称职"){
					$sum_all['chenzhi']++;
				}
				elseif($value_1['summary'] == "基本称职"){
					$sum_all['jibenchenzhi']++;
				}
				elseif($value_1['summary'] == "不称职"){
					$sum_all['buchenzhi']++;
				}
			}
				$artres[ $key ]['hao'] = $sum_all['hao'];
				$artres[ $key ]['jiaohao'] = $sum_all['jiaohao'];
				$artres[ $key ]['yiban'] = $sum_all['yiban'];
				$artres[ $key ]['cha'] = $sum_all['cha'];
				$artres[ $key ]['youxiu'] = $sum_all['youxiu'];
				$artres[ $key ]['chenzhi'] = $sum_all['chenzhi'];
				$artres[ $key ]['jibenchenzhi'] = $sum_all['jibenchenzhi'];
				$artres[ $key ]['buchenzhi'] = $sum_all['buchenzhi'];
				//$sum_all['hao']++;
               //dump($sum_all);die;


				$allvote = db( 'check' )->field( 'c.name,c.id,a.sumid,b.worknum as beworknum,a.worknum,d.cateid as becateid,e.cateid' )->alias( 'a' )->join( 'gb_bechecked b', 'a.sumid=b.sumid' )->where( 'b.worknum', $value[ "worknum" ] )->join( 'gb_checktable c', 'a.sumid=c.id' )->join( 'gb_admin d', 'd.worknum=b.worknum' )->where( 'c.id', $tableid )->count();
				$votenum = db( 'data' )->where( 'sumid', $tableid )->where( 'beworknum', $artres[ $key ][ "worknum" ] )->count();
				//dump( $value[ "worknum" ]);
				//dump($allvote);die;
				//dump($votenum);die;
			if ( $allvote == 0 ) {
				$votenum = 1;
				$allvote = 1;
			}
			$percent = $votenum / $allvote * 100;
			$percents = sprintf( "%.2f", $percent );
			$artres[ $key ][ 'allvote' ] = $allvote;
			$artres[ $key ][ 'votenum' ] = $votenum;
			if($artres[ $key ]['votenum']!=0)
			{
				
				//$value['per']=100*($value['data1']+$value['data2'])/$value['votenum']; 
				//$value['total']=($value['data1']+0.8*$value['data2']+0.6*$value['data3'])/$value['votenum']*100;
				// $artres[ $key ]['dp1']=$artres[ $key ]['hao']/($artres[ $key ]['votenum']*5)*100;
			 //    $artres[ $key ]['dp2']=$artres[ $key ]['jiaohao']/($artres[ $key ]['votenum']*5)*100;
			 //    $artres[ $key ]['dp3']=$artres[ $key ]['yiban']/($artres[ $key ]['votenum']*5)*100;
			 //   	$artres[ $key ]['dp4']=$artres[ $key ]['cha']/($artres[ $key ]['votenum']*5)*100;
			    $artres[ $key ]['pj']=($artres[ $key ]['youxiu']*100 + $artres[ $key ]['chenzhi']*80 + $artres[ $key ]['jibenchenzhi']*60)/$artres[ $key ]['votenum'];
			    $artres[ $key ]['pj']=round($artres[ $key ]['pj'],2);
			   // $value['dp5']=$value['youxii']/$value['votenum']*100;
			   // $value['dp6']=$value['data6']/$value['votenum']*100;
			    //$value['dp7']=$value['data7']/$value['votenum']*100;
			}
		else
		{
			$artres[ $key ]['per']=0;
			$artres[ $key ]['total']=0;
			// $artres[ $key ]['dp1']=0;
			// $artres[ $key ]['dp2']=0;
			// $artres[ $key ]['dp3']=0;
			// $artres[ $key ]['dp4']=0;
			$artres[ $key ]['pj']=0;			
		}
	}


	}
	else
	{
		foreach ( $artres as $key => &$value ) {
			//dump($artres);die;
			$value['data1'] = db( "data" )->where( 'sumid', $tableid )->where( 'beworknum', $artres[ $key ][ "worknum" ] )->where( 'srd', '优秀' )->count();
			//总评价中优秀的数目 
			$value['data2'] = db( "data" )->where( 'sumid', $tableid )->where( 'beworknum', $artres[ $key ][ "worknum" ] )->where( 'srd', '称职' )->count();
			//总评价中称职的数目
			$value['data3'] = db( "data" )->where( 'sumid', $tableid )->where( 'beworknum', $artres[ $key ][ "worknum" ] )->where( 'srd', '基本称职' )->count();
			//总评价中基本称职的数目
			$value['data4'] = db( "data" )->where( 'sumid', $tableid )->where( 'beworknum', $artres[ $key ][ "worknum" ] )->where( 'srd', '不称职' )->count();
			//总评价中不称职的数目
			$value['data5'] = db( "data" )->where( 'sumid', $tableid )->where( 'beworknum', $artres[ $key ][ "worknum" ] )->where( 'zssr', '同意' )->count();
			//总评价中同意的数目
			$value['data6'] = db( "data" )->where( 'sumid', $tableid )->where( 'beworknum', $artres[ $key ][ "worknum" ] )->where( 'zssr', '不同意' )->count();
			//总评价中不同意的数目
			$value['data7'] = db( "data" )->where( 'sumid', $tableid )->where( 'beworknum', $artres[ $key ][ "worknum" ] )->where( 'zssr',null)->count();
			//总评价中弃权的数目
			$inf = db( 'view_yonghu' )->where( 'worknum', $value[ 'worknum' ] )->find();
			if ( $inf[ "keywords" ] == "机关部门" ) {
				$allvote = db( 'check' )->field( 'c.name as tablename,c.id as tableid,b.worknum as beworknum,a.worknum,d.cateid as becateid,d.name as bename,e.cateid,e.name' )->alias( 'a' )->join( 'gb_bechecked b', 'a.sumid=b.sumid' )->where( 'b.worknum', $value[ "worknum" ] )->join( 'gb_checktable c', 'a.sumid=c.id' )->join( 'gb_view_yonghu d', 'd.worknum=b.worknum' )->join( 'gb_view_yonghu e', 'e.worknum=a.worknum and d.keywords=e.keywords' )->where( 'c.id', $tableid )->count();
			} else {
				$allvote = db( 'check' )->field( 'c.name,c.id,a.sumid,b.worknum as beworknum,a.worknum,d.cateid as becateid,e.cateid' )->alias( 'a' )->join( 'gb_bechecked b', 'a.sumid=b.sumid' )->where( 'b.worknum', $value[ "worknum" ] )->join( 'gb_checktable c', 'a.sumid=c.id' )->join( 'gb_admin d', 'd.worknum=b.worknum' )->join( 'gb_admin e', 'e.worknum=a.worknum and d.cateid=e.cateid' )->where( 'c.id', $tableid )->count();
			}
			$votenum = db( 'data' )->where( 'sumid', $tableid )->where( 'beworknum', $artres[ $key ][ "worknum" ] )->count();
			if ( $allvote == 0 ) {
				$votenum = 1;
				$allvote = 1;
			}
			$percent = $votenum / $allvote * 100;
			$percents = sprintf( "%.2f", $percent );
			$artres[ $key ][ 'allvote' ] = $allvote;
			$artres[ $key ][ 'votenum' ] = $votenum;
			if($value['votenum']!=0)
			{
				
				$value['per']=100*($value['data1']+$value['data2'])/$value['votenum']; 
				$value['total']=($value['data1']+0.8*$value['data2']+0.6*$value['data3'])/$value['votenum']*100;
				$value['dp1']=$value['data1']/$value['votenum']*100;
			$value['dp2']=$value['data2']/$value['votenum']*100;
			$value['dp3']=$value['data3']/$value['votenum']*100;
			$value['dp4']=$value['data4']/$value['votenum']*100;
			$value['dp5']=$value['data5']/$value['votenum']*100;
			$value['dp6']=$value['data6']/$value['votenum']*100;
			$value['dp7']=$value['data7']/$value['votenum']*100;
			}
		else
		{
			$value['per']=0;
			$value['total']=0;
			$value['dp1']=0;
			$value['dp2']=0;
			$value['dp3']=0;
			$value['dp4']=0;
			$value['dp5']=0;
			$value['dp6']=0;
			$value['dp7']=0;
			
		}
		  
			//dump($artres[$key]);
		}
	}
		//dump($artres);
		//END
		if ( !$artres ) {
			$this->error( '无候选人信息！', url( 'lst' ) );
		}
		
		$this->assign( array(
			'artres' => $artres,
			
		) );
		$this->assign( 'tableinf', $tableinf );
		return view();
	}

	public
	function huizonggeren() {
		$artres = db( 'admin' )->field( 'a.worknum,a.name,a.type,a.cateid,b.*,c.catename ' )->alias( 'a' )->join( 'gb_article b', 'a.worknum=b.adminid' )->join( 'gb_cate c', 'c.id=a.cateid' )->where( 'a.type', "中层干部" )->order( 'b.sort' )->paginate( 10 );
		$department = db( 'cate' )->order( 'id' )->select();
		$this->assign( array(
			'artres' => $artres,
			'department' => $department,
		) );
		return view();
	}

}
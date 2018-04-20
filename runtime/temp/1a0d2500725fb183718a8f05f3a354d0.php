<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:97:"/Applications/XAMPP/xamppfiles/htdocs/ut-lygbgl/public/../application/admin/view/article/edit.htm";i:1524116982;s:95:"/Applications/XAMPP/xamppfiles/htdocs/ut-lygbgl/public/../application/admin/view/public/top.htm";i:1524117020;s:96:"/Applications/XAMPP/xamppfiles/htdocs/ut-lygbgl/public/../application/admin/view/public/left.htm";i:1524117019;}*/ ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>干部考核与信息管理系统</title>
<meta name="description" content="Dashboard">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<!--Basic Styles-->
<link href="__ADMIN__/style/bootstrap.css" rel="stylesheet">
<link href="__ADMIN__/style/font-awesome.css" rel="stylesheet">
<link href="__ADMIN__/style/weather-icons.css" rel="stylesheet">

<!--Beyond styles-->
<link id="beyond-link" href="__ADMIN__/style/beyond.css" rel="stylesheet" type="text/css">
<link href="__ADMIN__/style/demo.css" rel="stylesheet">
<link href="__ADMIN__/style/typicons.css" rel="stylesheet">
<link href="__ADMIN__/style/animate.css" rel="stylesheet">
<link href="__ADMIN__/style/fileinput.css" media="all" rel="stylesheet" type="text/css" />
<link href="__ADMIN__/style/style.css" rel="stylesheet">
<link href="__ADMIN__/style/amazeui.min.css" rel="stylesheet">
<link href="__ADMIN__/style/admin.css" rel="stylesheet">
<link href="__ADMIN__/style/app.css" rel="stylesheet">
</head>
<body>
<!-- 头部 --> 
<header class="am-topbar am-topbar-inverse admin-header"> 
  <!--logo-->
  <div class="am-topbar-brand"><a href="/"> <span  class="nav-titlle">干部考核与信息管理系统</span> </a></div>
  <!--logo--> 
  <!--左侧切换-->
  <div class="am-icon-list tpl-header-nav-hover-ico am-fl am-margin-right"> </div>
  <!--左侧切换--> 

  <!--<button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only" data-am-collapse="{target: '#topbar-collapse'}"><span class="am-sr-only">导航切换</span> <span class="am-icon-bars"></span></button>-->
  <!--右侧切换--> 
  <!--右侧菜单-->
  <div class="am-collapse am-topbar-collapse" id="topbar-collapse">
    <ul class="am-nav am-nav-pills am-topbar-nav am-topbar-right admin-header-list tpl-header-list">
      <!--<li class="am-dropdown" data-am-dropdown data-am-dropdown-toggle> <a class="am-dropdown-toggle tpl-header-list-link" href="javascript:;"> <span class="am-icon-bell-o"></span> 提醒 <span class="am-badge tpl-badge-success am-round">2</span></span> </a>
        <ul class="am-dropdown-content tpl-dropdown-content">
          <li class="tpl-dropdown-content-external">
            <h3>你有 <span class="tpl-color-success">2</span> 条提醒</h3>
            <a href="###">全部</a></li>
          <li class="tpl-dropdown-list-bdbc"><a href="#" class="tpl-dropdown-list-fl">×××调查表即将关闭，请及时完成测评</a> <span class="tpl-dropdown-list-fr">2017/06/18</span> </li>
          <li class="tpl-dropdown-list-bdbc"><a href="#" class="tpl-dropdown-list-fl">××××测评活动将于××××/××/××开始，请及时完成测评</a> <span class="tpl-dropdown-list-fr">2017/08/13</span> </li>
          
        </ul>
      </li>-->
      
     <li class="am-dropdown" data-am-dropdown data-am-dropdown-toggle> <a class="am-dropdown-toggle tpl-header-list-link" href="javascript:;"><?php echo $yonghutype2["job"]; ?> </span> </a>
       <!-- <ul class="am-dropdown-content tpl-dropdown-content">
          <li class="tpl-dropdown-content-external">
            <h3>你有 <span class="tpl-color-primary">4</span> 个任务进度</h3>
            <a href="###">全部</a></li>
          <li> <a href="javascript:;" class="tpl-dropdown-content-progress"> <span class="task"> <span class="desc">Amaze UI 用户中心 v1.2 </span> <span class="percent">45%</span> </span> <span class="progress">
            <div class="am-progress tpl-progress am-progress-striped">
              <div class="am-progress-bar am-progress-bar-success" style="width:45%"></div>
            </div>
            </span> </a> </li>
          <li> <a href="javascript:;" class="tpl-dropdown-content-progress"> <span class="task"> <span class="desc">新闻内容页 </span> <span class="percent">30%</span> </span> <span class="progress">
            <div class="am-progress tpl-progress am-progress-striped">
              <div class="am-progress-bar am-progress-bar-secondary" style="width:30%"></div>
            </div>
            </span> </a> </li>
          <li> <a href="javascript:;" class="tpl-dropdown-content-progress"> <span class="task"> <span class="desc">管理中心 </span> <span class="percent">60%</span> </span> <span class="progress">
            <div class="am-progress tpl-progress am-progress-striped">
              <div class="am-progress-bar am-progress-bar-warning" style="width:60%"></div>
            </div>
            </span> </a> </li>
        </ul>-->
      </li>
      
      <li class="am-dropdown" data-am-dropdown data-am-dropdown-toggle id="wxf-text-center"> <a class="am-dropdown-toggle tpl-header-list-link" href="javascript:;"> <span class="tpl-header-list-user-nick"><?php echo $yonghutype2["name"]; ?></span><span class="fa fa-user-circle fa-2x am-user"> <!--<img src="__ADMIN__/images/adam-jansen.jpg">--></span> </a>
        <ul class="am-dropdown-content">
         <?php if($yonghutype2['type']=="中层干部"): ?> <li><a href="<?php echo url('article/edit',array('id'=>$yonghutype2['artid'])); ?>"><span class="fa fa-user-o"></span> 个人资料</a></li><?php endif; ?>
         
          <li><a href="<?php echo url('admin/logout'); ?>"><span class="am-icon-power-off"></span> 退出</a></li>
        </ul>
      </li>
      
    </ul>
  </div>
</header>
 
<!-- /头部 -->
<div class="tpl-page-container tpl-page-header-fixed"> 
    <!-- Page Sidebar --> 
    <!-- Page Sidebar -->

<div class="tpl-left-nav tpl-left-nav-hover">
  
  <div class="tpl-left-nav-list">
    <ul class="tpl-left-nav-menu">
      <li class="tpl-left-nav-item"> <a href="<?php echo url('index/index'); ?>" class="nav-link tpl-left-nav-link-list"> <i class="am-icon-home"></i>&nbsp; <span>干部测评</span> </a> </li>
       
      <?php if(($yonghutype["group_id"]=="1")): ?>
      <li class="tpl-left-nav-item"> <a href="#" class="nav-link tpl-left-nav-link-list"> <i class="fa fa-address-book"></i>&nbsp; <span>信息管理</span> <i class="am-icon-angle-right tpl-left-nav-more-ico am-fr am-margin-right"></i> </a>
        <ul class="tpl-left-nav-sub-menu">
          <li> 
          <!-- <a href="<?php echo url('article/add'); ?>"> <i class="am-icon-angle-right"></i> <span>干部添加</span></a>  -->
          <a href="<?php echo url('article/lst'); ?>"> <i class="am-icon-angle-right"></i> <span>信息查看</span></a> 
          <a href="<?php echo url('article/mysort'); ?>"> <i class="am-icon-angle-right"></i> <span>信息排序</span></a>
          <a href="<?php echo url('article/mysearch'); ?>"> <i class="am-icon-angle-right"></i> <span>信息查询</span></a>
          <!--<a href="<?php echo url('article/approval'); ?>"> <i class="am-icon-angle-right"></i> <span>修改审核</span></a> -->
          <!-- <a href="<?php echo url('article/alladd'); ?>"> <i class="am-icon-angle-right"></i> <span>干部信息导入</span></a>  -->
        
          </li>
        </ul>
      </li>
      
      <li class="tpl-left-nav-item"> <a href="#" class="nav-link tpl-left-nav-link-list"> <i class="fa fa-calendar"></i>&nbsp; <span>考核管理</span> <i class="am-icon-angle-right tpl-left-nav-more-ico am-fr am-margin-right"></i> </a>
        <ul class="tpl-left-nav-sub-menu">
          <li> 
          <a href="<?php echo url('checkgl/add'); ?>"> <i class="am-icon-angle-right"></i> <span>调查表生成</span></a> 
          <a href="<?php echo url('checkgl/lst'); ?>"> <i class="am-icon-angle-right"></i> <span>调查表管理</span></a> 
         </li>
        </ul>
      </li>
      <?php endif; if(($yonghutype["group_id"]=="1")): ?>
      <li class="tpl-left-nav-item"> <a href="#" class="nav-link tpl-left-nav-link-list"> <i class="fa fa-bar-chart"></i>&nbsp;<span>信息汇总</span> <i class="am-icon-angle-right tpl-left-nav-more-ico am-fr am-margin-right"></i> </a>
        <ul class="tpl-left-nav-sub-menu">
          <li> 
          <a href="<?php echo url('summary/gerenlst'); ?>"> <i class="am-icon-angle-right"></i> <span>信息汇总</span></a> 
         </li>
        </ul>
      </li>
   
      <?php endif; ?>
      <li class="tpl-left-nav-item"> <a href="#" class="nav-link tpl-left-nav-link-list"> <i class="fa fa-user"></i>  &nbsp; <span>用户管理</span> <i class="am-icon-angle-right tpl-left-nav-more-ico am-fr am-margin-right"></i> </a>
        <ul class="tpl-left-nav-sub-menu">
        
          <li> 
           <?php if(($yonghutype["group_id"]=="1")): ?><a href="<?php echo url('admin/lst'); ?>"> <i class="am-icon-angle-right"></i> <span>用户列表</span></a> <?php endif; ?>
        <!--  <a href="<?php echo url('auth_group/lst'); ?>"> <i class="am-icon-angle-right"></i> <span>用户组管理</span></a> 
          <a href="<?php echo url('auth_rule/lst'); ?>"> <i class="am-icon-angle-right"></i> <span>权限列表</span></a> 
-->
            <!-- <?php if(($yonghutype["group_id"]=="1")): ?> <a href="<?php echo url('article/edit',array('id'=>$yonghutype2['artid'])); ?>"><i class="am-icon-angle-right"></i> <span>个人资料</span></a><?php endif; ?> -->
          <a href="<?php echo url('admin/editpassword',array('id'=>$yonghuid)); ?>"> <i class="am-icon-angle-right"></i> <span>修改密码</span></a> 
             <a href="<?php echo url('admin/record'); ?>"> <i class="am-icon-angle-right"></i> <span>登录记录</span></a> 

         </li>
        </ul>
      </li>
       <?php if(($yonghutype["group_id"]=="1")): ?>
       <li class="tpl-left-nav-item"> <a href="#" class="nav-link tpl-left-nav-link-list"> <i class="fa fa-cog"></i>  &nbsp; <span>系统设置</span> <i class="am-icon-angle-right tpl-left-nav-more-ico am-fr am-margin-right"></i> </a>
        <ul class="tpl-left-nav-sub-menu">
        
          <li> 
          <a href="<?php echo url('cate/lst'); ?>"> <i class="am-icon-angle-right"></i> <span>部门管理</span></a> 
          <a href="<?php echo url('message/lst'); ?>"> <i class="am-icon-angle-right"></i> <span>信息发布管理</span></a> 
          <!--</i><a href="#"> <i class="am-icon-angle-right"></i> <span>参数设置</span></a> -->

         </li>
        </ul>
      </li>
     <?php endif; ?>
     <li class="tpl-left-nav-item"> <a href="<?php echo url('admin/logout'); ?>" class="nav-link tpl-left-nav-link-list"> <i class="am-icon-power-off"></i> <span>退出</span> </a> </li>
    </ul>
  </div>
</div>


<!-- /Page Sidebar --> 
    <!-- /Page Sidebar --> 
    <!-- Page Content -->
    <div class="tpl-content-wrapper"> 
      <!-- Page Breadcrumb -->
      <div>
        <ol class="breadcrumb">
          <li><a href="#">首页</a></li>
          <li><a href="#">干部信息管理</a></li>
          <li><a href="#">干部信息查看</a></li>
         <?php if($app): ?><li class="active">信息修改审核</li><?php else: ?>  <li class="active">编辑</li><?php endif; ?>
        </ol>
      </div>
      <!-- /Page Breadcrumb --> 
      
      <!-- Page Body -->
      <div class="page-body">
        <div class="row">
          <div class="col-lg-12 col-sm-12 col-xs-12">
            <div class="widget">
              <div class="widget-header bordered-bottom bordered-blue"> 
              <span class="widget-caption"><?php if($app): ?>干部信息修改审核<?php else: ?>干部信息编辑<?php endif; ?></span>
              </div>
              <div class="widget-body">

               <div class="btn-wrap">
              <div class="btn-group btn-group-justified">
              <?php if($app): ?>
                <h1><b>基本信息修改审核</b></h1>
              <?php else: ?>
             <a class="btn btn-info" href="__index__/index.php/admin/Article/edit/id/<?php echo $id; ?>">基本信息&nbsp;&nbsp;&nbsp;</a>
             <a class="btn btn-default" href="__index__/index.php/admin/Article/edit2/id/<?php echo $id; ?>">教育&nbsp;&nbsp;&nbsp;</a>
              <a class="btn btn-default" href="__index__/index.php/admin/Article/edit3/id/<?php echo $id; ?>">简历&nbsp;&nbsp;&nbsp;</a>
             <a class="btn btn-default" href="__index__/index.php/admin/Article/edit4/id/<?php echo $id; ?>">家庭信息&nbsp;&nbsp;&nbsp;</a>
             <?php endif; ?>
             </div>
              </div>
              <div class="widget-body1">
                <div id="horizontal-form ">
                  <form class="form-horizontal" role="form" action="" method="post" enctype="multipart/form-data" >
                    <input type="hidden" name="id" value="<?php echo $arts['id']; ?>">
                    <?php if($app): ?>
<div class="am-u-md-6 am-u-sm-12 row-mb">
  
  <div class="form-group ">
                      <label for="username" class="col-sm-2 control-label">工号</label>
                      <div class="col-sm-6">
                        <p  style="padding-top: 6px;margin:0;"><?php echo $arts['adminid']; ?></p>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="group_id" class="col-sm-2 control-label">性别</label>
                      <div class="col-sm-6">
                        <p  style="padding-top: 6px;margin:0;"><?php echo $arts['sex']; ?></p>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="group_id" class="col-sm-2 control-label">一寸照</label>
                      <div class="col-sm-6">
                        <div class="kv-main">
                          <img  width="71px" height="99px" src="__adminimg__/<?php echo $arts['img']; ?>" alt="无照片">
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="zhiwu" class="col-sm-2 control-label">出生日期</label>
                      <div class="col-sm-6">
                         <p  style="padding-top: 6px;margin:0;"><?php echo $arts['birthday']; ?></p>
                      </div>
                    </div>
                    <div class="form-group form-group1">
                      <label for="group_id" class="col-sm-2 control-label">籍贯</label>
                      <div class="col-sm-8">
                        <div data-toggle="distpicker" >
                          <div class="form-group col-sm-4">
                           <p  style="padding-top: 6px;margin:0;"><?php echo $arts['jiguan_p']; ?> </p> 
                          </div>
                          <div class="form-group col-sm-4">
                            
                              <p  style="padding-top: 6px;margin:0;"><?php echo $arts['jiguan_c']; ?></p> 
                           
                          </div>
                        </div>
                      </div>
                    </div>
                    

                    <div class="form-group form-group1">
                      <label for="group_id" class="col-sm-2 control-label">出生地</label>
                      <div class="col-sm-8 ">
                        <div data-toggle="distpicker">
                          <div class="form-group col-sm-4">
                             <p  style="padding-top: 6px;margin:0;"><?php echo $arts['chushengdi_p']; ?> </p>
                          </div>
                          <div class="form-group col-sm-4">
                             <p  style="padding-top: 6px;margin:0;"><?php echo $arts['chushengdi_c']; ?></p>
                           
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="group_id" class="col-sm-2 control-label">政治面貌</label>
                      <div class="col-sm-6">
                       
                           <p  style="padding-top: 6px;margin:0;"><?php echo $arts['politics']; ?></p>
                         
                        </select>
                      </div>
                    </div>
                   
                    <div class="form-group">
                      <label for="username" class="col-sm-2 control-label">职务</label>
                      <div class="col-sm-6">
                          <p  style="padding-top: 6px;margin:0;"><?php echo $arts['job']; ?></p>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="group_id" class="col-sm-2 control-label">是否为试用</label>
                      <div class="col-sm-6">
                        <p  style="padding-top: 6px;margin:0;"><?php echo $arts['try']; ?></p>
                      </div>
                    </div>
                     <div class="form-group">
                      <label for="group_id" class="col-sm-2 control-label">职级</label>
                      <div class="col-sm-6">

                       
                        <p  style="padding-top: 6px;margin:0;"><?php echo $arts['zhiji']; ?></p>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="zhiwu" class="col-sm-2 control-label">任现职时间</label>
                      <div class="col-sm-6">
                          <p  style="padding-top: 6px;margin:0;"><?php echo $arts['jobtime']; ?></p>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="zhiwu" class="col-sm-2 control-label">任现级时间</label>
                      <div class="col-sm-6">
                          <p  style="padding-top: 6px;margin:0;"><?php echo $arts['ranktime']; ?></p>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="zhiwu" class="col-sm-2 control-label">工作时间</label>
                      <div class="col-sm-6">
                          <p  style="padding-top: 6px;margin:0;"><?php echo $arts['alljobtime']; ?></p>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="zhiwu" class="col-sm-2 control-label">入党时间</label>
                      <div class="col-sm-6">
                         <p  style="padding-top: 6px;margin:0;"><?php echo $arts['joinpartytime']; ?></p>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="zhiwu" class="col-sm-2 control-label">学历</label>
                      <div class="col-sm-6">
                         <p  style="padding-top: 6px;margin:0;"><?php echo $arts['edubg']; ?></p> 
                      </div>
                    </div>
                   <!--  <div class="form-group">
                      <label for="group_id" class="col-sm-2 control-label no-padding-right">学历</label>
                      <div class="col-sm-6">
                        <select name="edubg" style="width: 100%;">
                          <option selected="selected" value="0">-学历选择-</option>
                          <option <?php if(($arts['edubg']=="博士研究生")): ?> selected="selected" <?php endif; ?> value="博士研究生">博士研究生</option>
                          <option <?php if(($arts['edubg']=="硕士研究生")): ?> selected="selected" <?php endif; ?> value="硕士研究生">硕士研究生</option>
                          <option <?php if(($arts['edubg']=="本科")): ?> selected="selected" <?php endif; ?> value="本科">本科</option>
                          <option <?php if(($arts['edubg']=="专科")): ?> selected="selected" <?php endif; ?> value="专科">专科</option>
                          <option <?php if(($arts['edubg']=="中专/高中/中技")): ?> selected="selected" <?php endif; ?> value="中专/高中/中技">中专/高中/中技</option>
                          <option <?php if(($arts['edubg']=="初中")): ?> selected="selected" <?php endif; ?> value="初中">初中</option>
                          <option <?php if(($arts['edubg']=="小学")): ?> selected="selected" <?php endif; ?> value="小学">小学</option>
                        </select>
                      </div>
                    </div> -->
                    
                    <div class="form-group">
                      <label for="group_id" class="col-sm-2 control-label">学位</label>
                      <div class="col-sm-6">
                         <p  style="padding-top: 6px;margin:0;"><?php echo $arts['degree']; ?></p>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="zhiwu" class="col-sm-2 control-label ">职称</label>
                      <div class="col-sm-6">
                         <p  style="padding-top: 6px;margin:0;"><?php echo $arts['ptitle']; ?></p>
                      </div>
                    </div>
<!--                     <div class="form-group">
                      <label for="group_id" class="col-sm-2 control-label no-padding-right">职称</label>
                      <div class="col-sm-6">
                        <select name="ptitle"  style="width: 100%;">
                          <option selected="selected" value="0">-职称选择-</option>
                          <option <?php if(($arts['ptitle']=="教授")): ?> selected="selected" <?php endif; ?> value="教授">教授</option>
                          <option <?php if(($arts['ptitle']=="副教授")): ?> selected="selected" <?php endif; ?> value="副教授">副教授</option>
                          <option <?php if(($arts['ptitle']=="讲师")): ?> selected="selected" <?php endif; ?> value="讲师">讲师</option>
                          <option <?php if(($arts['ptitle']=="助教")): ?> selected="selected" <?php endif; ?> value="助教">助教</option>
                        </select>
                      </div>
                    </div> -->
                    <div class="form-group">
                      <label for="group_id" class="col-sm-2 control-label ">健康状况</label>
                      <div class="col-sm-6">
                         <p  style="padding-top: 6px;margin:0;"><?php echo $arts['health']; ?></p>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="zhiwu" class="col-sm-2 control-label">专业或专长</label>
                      <div class="col-sm-6">
                          <p  style="padding-top: 6px;margin:0;"><?php echo $arts['specialjob']; ?></p>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="zhiwu" class="col-sm-2 control-label">备注</label>
                      <div class="col-sm-6">
                          <p  style="padding-top: 6px;margin:0;"><?php echo $arts['specialskill']; ?></p>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="zhiwu" class="col-sm-2 control-label">奖惩情况</label>
                      <div class="col-sm-6">
                          <p  style="padding-top: 6px;margin:0;"><?php echo $arts['jiangcheng']; ?></p>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="zhiwu" class="col-sm-2 control-label">考核结果</label>
                      <div class="col-sm-6">  <p  style="padding-top: 6px;margin:0;"><?php echo $arts['jieguo']; ?></p>
                      </div>
                    </div>
</div>
<div class="am-u-md-6 am-u-sm-12 row-mb">
                     <div class="form-group ">
                      <label for="username" class="col-sm-2 control-label">工号</label>
                      <div class="col-sm-6">
                        <p  style="padding-top: 6px;margin:0;"><?php echo $arts1['adminid']; ?></p>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="group_id" class="col-sm-2 control-label">性别</label>
                      <div class="col-sm-6">
                       <label >
                      <input type="radio" name="sex" id="optionsRadios1" value="男" <?php if(($arts1['sex']=="男")): ?> checked<?php endif; ?>> &nbsp;男&nbsp;&nbsp;
                      </label>
                      <label>
                      <input type="radio" name="sex" id="optionsRadios2" value="女" <?php if(($arts1['sex']=="女")): ?> checked<?php endif; ?>>&nbsp;女&nbsp;&nbsp;
                      </label>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="group_id" class="col-sm-2 control-label">一寸照</label>
                      <div class="col-sm-6">
                        <div class="kv-main">
                        <?php if($arts1['img']==""): ?>
                          <img  width="71px" height="99px" src="__adminimg__/public/static/admin/images/noimg.jpg" alt="无照片">
                          <a class="btn btn-default" href="<?php echo url('changeimg',array('id'=>$arts1['id'])); ?>">修改照片</a>
                           <?php else: ?>
                          <img  width="71px" height="99px" src="__adminimg__/<?php echo $arts1['img']; ?>" alt="无照片">
                          <a class="btn btn-default" href="<?php echo url('changeimg',array('id'=>$arts1['id'])); ?>">修改照片</a>
                          <?php endif; ?>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="zhiwu" class="col-sm-2 control-label">出生日期</label>
                      <div class="col-sm-6">
                        <input type="date"  value="<?php echo $arts1['birthday']; ?>" name="birthday"  class="form-control"  />
                      </div>
                    </div>
                    <div class="form-group form-group1">
                      <label for="group_id" class="col-sm-2 control-label">籍贯</label>
                      <div class="col-sm-8">
                        <div data-toggle="distpicker" >
                          <div class="form-group col-sm-4">
                            <label class="sr-only" for="province2">Province</label>
                            <!-- <?php echo $arts['jiguan_p']; ?> --><select  name="jiguan_p" id="province2" data-province="">
                            </select>
                          </div>
                          <div class="form-group col-sm-4">
                            <label class="sr-only" for="city2">City</label>
                            <!-- <?php echo $arts['jiguan_c']; ?> -->
                            <select  name="jiguan_c" id="city2" data-city="" style="width:152px;">
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                    

                    <div class="form-group form-group1">
                      <label for="group_id" class="col-sm-2 control-label">出生地</label>
                      <div class="col-sm-8 ">
                        <div data-toggle="distpicker">
                          <div class="form-group col-sm-4">
                            <label class="sr-only" for="province2">Province</label>
                            <!-- <?php echo $arts['chushengdi_p']; ?> -->
                            <select  name="chushengdi_p" id="province2" data-province="">
                            
                            </select>
                          </div>
                          <div class="form-group col-sm-4">
                            <label class="sr-only" for="city2">City</label>

                            <!-- <?php echo $arts['chushengdi_c']; ?> -->
                            <select  name="chushengdi_c" id="city2" data-city="" style="width:152px;">
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="group_id" class="col-sm-2 control-label">政治面貌</label>
                      <div class="col-sm-6">
                        <select name="politics" style="width: 100%;">
                          <option selected="selected" value="0">--政治面貌选择--</option>
                          <option <?php if(($arts1['politics']=="中共党员")): ?> selected="selected" <?php endif; ?> value="中共党员">中共党员</option>
                          <option <?php if(($arts1['politics']=="共青团员")): ?> selected="selected" <?php endif; ?> value="共青团员">共青团员</option>
                          <option <?php if(($arts1['politics']=="群众")): ?> selected="selected" <?php endif; ?> value="群众">群众</option>
                          <option <?php if(($arts1['politics']=="民主党派成员")): ?> selected="selected" <?php endif; ?> value="民主党派成员">民主党派成员</option>
                          <option <?php if(($arts1['politics']=="无党派人士")): ?> selected="selected" <?php endif; ?> value="无党派人士">无党派人士</option>
                        </select>
                      </div>
                    </div>
                   
                    <div class="form-group">
                      <label for="username" class="col-sm-2 control-label">职务</label>
                      <div class="col-sm-6">
                        <input class="form-control" id="work" placeholder="" value="<?php echo $arts1['job']; ?>" name="job" required="required" type="text">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="group_id" class="col-sm-2 control-label">是否为试用</label>
                      <div class="col-sm-6">
                      <label >
                      <input <?php if(($arts1['try']=="是")): ?> checked<?php endif; ?> type="radio" id="shiyong1" name="try"  value="是"/ ><label for="shiyong1">&nbsp;&nbsp;是&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                        </label>
                        <label>
                        <input <?php if(($arts1['try']=="否")): ?> checked<?php endif; ?> type="radio" id="shiyong2" name="try"   value="否"/><label for="shiyong2">&nbsp;&nbsp;否&nbsp;</label>
                        </label>
                      </div>
                    </div>
                     <div class="form-group">
                      <label for="group_id" class="col-sm-2 control-label">职级</label>
                      <div class="col-sm-6">

                       
                      <label >
                      <input <?php if(($arts1['zhiji']=="正职")): ?> checked<?php endif; ?> type="radio" id="rank" name="zhiji"  value="正职"/ ><label for="rank">&nbsp;&nbsp;正职&nbsp;</label>  
                        </label>
                        <label>
                        <input <?php if(($arts1['zhiji']=="副职")): ?> checked<?php endif; ?> type="radio" id="rank1" name="zhiji"   value="副职"/><label for="rank1">&nbsp;&nbsp;副职&nbsp;</label>
                        </label>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="zhiwu" class="col-sm-2 control-label">任现职时间</label>
                      <div class="col-sm-6">
                        <input type="date" name="jobtime" value="<?php echo $arts1['jobtime']; ?>" class="form-control"  />
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="zhiwu" class="col-sm-2 control-label">任现级时间</label>
                      <div class="col-sm-6">
                        <input type="date" name="ranktime" value="<?php echo $arts1['ranktime']; ?>" class="form-control"  />
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="zhiwu" class="col-sm-2 control-label">工作时间</label>
                      <div class="col-sm-6">
                        <input type="date" name="alljobtime" value="<?php echo $arts1['alljobtime']; ?>" class="form-control"  />
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="zhiwu" class="col-sm-2 control-label">入党时间</label>
                      <div class="col-sm-6">
                        <input type="date" name="joinpartytime" value="<?php echo $arts1['joinpartytime']; ?>" class="form-control"  />
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="zhiwu" class="col-sm-2 control-label">学历</label>
                      <div class="col-sm-6">
                        <input class="form-control" id="worktime" placeholder="" value="<?php echo $arts1['edubg']; ?>" name="edubg" required="required" type="text">
                      </div>
                    </div>
                   <!--  <div class="form-group">
                      <label for="group_id" class="col-sm-2 control-label no-padding-right">学历</label>
                      <div class="col-sm-6">
                        <select name="edubg" style="width: 100%;">
                          <option selected="selected" value="0">-学历选择-</option>
                          <option <?php if(($arts['edubg']=="博士研究生")): ?> selected="selected" <?php endif; ?> value="博士研究生">博士研究生</option>
                          <option <?php if(($arts['edubg']=="硕士研究生")): ?> selected="selected" <?php endif; ?> value="硕士研究生">硕士研究生</option>
                          <option <?php if(($arts['edubg']=="本科")): ?> selected="selected" <?php endif; ?> value="本科">本科</option>
                          <option <?php if(($arts['edubg']=="专科")): ?> selected="selected" <?php endif; ?> value="专科">专科</option>
                          <option <?php if(($arts['edubg']=="中专/高中/中技")): ?> selected="selected" <?php endif; ?> value="中专/高中/中技">中专/高中/中技</option>
                          <option <?php if(($arts['edubg']=="初中")): ?> selected="selected" <?php endif; ?> value="初中">初中</option>
                          <option <?php if(($arts['edubg']=="小学")): ?> selected="selected" <?php endif; ?> value="小学">小学</option>
                        </select>
                      </div>
                    </div> -->
                    
                    <div class="form-group">
                      <label for="group_id" class="col-sm-2 control-label">学位</label>
                      <div class="col-sm-6">
                        <select name="degree" style="width: 100%;">
                          <option selected="selected" value="0">--学位选择--</option>
                          <option <?php if(($arts1['degree']=="博士")): ?> selected="selected" <?php endif; ?> value="博士">博士</option>
                          <option <?php if(($arts1['degree']=="硕士")): ?> selected="selected" <?php endif; ?> value="硕士">硕士</option>
                          <option <?php if(($arts1['degree']=="学士")): ?> selected="selected" <?php endif; ?> value="学士">学士</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="zhiwu" class="col-sm-2 control-label ">职称</label>
                      <div class="col-sm-6">
                        <input class="form-control" id="worktime" placeholder="" value="<?php echo $arts1['ptitle']; ?>" name="ptitle" required="required" type="text">
                      </div>
                    </div>
<!--                     <div class="form-group">
                      <label for="group_id" class="col-sm-2 control-label no-padding-right">职称</label>
                      <div class="col-sm-6">
                        <select name="ptitle"  style="width: 100%;">
                          <option selected="selected" value="0">-职称选择-</option>
                          <option <?php if(($arts['ptitle']=="教授")): ?> selected="selected" <?php endif; ?> value="教授">教授</option>
                          <option <?php if(($arts['ptitle']=="副教授")): ?> selected="selected" <?php endif; ?> value="副教授">副教授</option>
                          <option <?php if(($arts['ptitle']=="讲师")): ?> selected="selected" <?php endif; ?> value="讲师">讲师</option>
                          <option <?php if(($arts['ptitle']=="助教")): ?> selected="selected" <?php endif; ?> value="助教">助教</option>
                        </select>
                      </div>
                    </div> -->
                    <div class="form-group">
                      <label for="group_id" class="col-sm-2 control-label ">健康状况</label>
                      <div class="col-sm-6">
                        <select name="health" style="width: 100%;">
                          <option selected="selected" value="0">--健康状况选择--</option>
                          <option <?php if(($arts1['health']=="健康")): ?> selected="selected" <?php endif; ?> value="健康">健康</option>
                          <option <?php if(($arts1['health']=="亚健康")): ?> selected="selected" <?php endif; ?> value="亚健康">亚健康</option>
                          <option <?php if(($arts1['health']=="疾病")): ?> selected="selected" <?php endif; ?> value="疾病">疾病</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="zhiwu" class="col-sm-2 control-label">专业或专长</label>
                      <div class="col-sm-6">
                        <input class="form-control" id="worktime" placeholder="" value="<?php echo $arts1['specialjob']; ?>" name="specialjob"  type="text">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="zhiwu" class="col-sm-2 control-label">备注</label>
                      <div class="col-sm-6">
                        <textarea   class="form-control" id="worktime" placeholder=""  name="specialskill"  type="text"><?php echo $arts1['specialskill']; ?></textarea>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="zhiwu" class="col-sm-2 control-label">奖惩情况</label>
                      <div class="col-sm-6">
                        <textarea   class="form-control" id="worktime" placeholder=""  name="jiangcheng"  type="text"><?php echo $arts1['jiangcheng']; ?></textarea>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="zhiwu" class="col-sm-2 control-label">考核结果</label>
                      <div class="col-sm-6">
                        <textarea   class="form-control" id="worktime" placeholder=""  name="jieguo"  type="text"><?php echo $arts1['jieguo']; ?></textarea>
                      </div>
                    </div></div>
                    <div class="form-group">
                      <div style="text-align: center;">
                        <button type="submit" class="btn btn-default">审核通过</button> <a href="<?php echo url('reply',array('worknum'=>$arts1['adminid'],'type'=>1)); ?>"><button type="button" class="btn btn-default">驳回申请</button></a>
                      </div>
                    </div>

                    <?php else: ?>
                    <div class="form-group ">
                      <label for="username" class="col-sm-2 control-label">工号</label>
                      <div class="col-sm-6">
                        <p  style="padding-top: 6px;margin:0;"><?php echo $arts['adminid']; ?></p>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="group_id" class="col-sm-2 control-label">性别</label>
                      <div class="col-sm-6">
                       <label >
                      <input type="radio" name="sex" id="optionsRadios1" value="男" <?php if(($arts['sex']=="男")): ?> checked<?php endif; ?>> &nbsp;男&nbsp;&nbsp;
                      </label>
                      <label>
                      <input type="radio" name="sex" id="optionsRadios2" value="女" <?php if(($arts['sex']=="女")): ?> checked<?php endif; ?>>&nbsp;女&nbsp;&nbsp;
                      </label>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="group_id" class="col-sm-2 control-label">一寸照</label>
                      <div class="col-sm-6">
                        <div class="kv-main">
                        <?php if($arts['img']==""): ?>
                          <img  width="71px" height="99px" src="__adminimg__/public/static/admin/images/noimg.jpg" alt="无照片">
                          <a class="btn btn-default" href="<?php echo url('changeimg',array('id'=>$arts['id'])); ?>">修改照片</a>
                           <?php else: ?>
                          <img  width="71px" height="99px" src="__adminimg__/<?php echo $arts['img']; ?>" alt="无照片">
                          <a class="btn btn-default" href="<?php echo url('changeimg',array('id'=>$arts['id'])); ?>">修改照片</a>
                          <?php endif; ?>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="zhiwu" class="col-sm-2 control-label">出生日期</label>
                      <div class="col-sm-6">
                        <input type="date"  value="<?php echo $arts['birthday']; ?>" name="birthday"  class="form-control"  />
                      </div>
                    </div>
                    <div class="form-group form-group1">
                      <label for="group_id" class="col-sm-2 control-label">籍贯</label>
                      <div class="col-sm-8">
                        <div data-toggle="distpicker" >
                          <div class="form-group col-sm-4">
                            <label class="sr-only" for="province2">Province</label>
                            <!-- <?php echo $arts['jiguan_p']; ?> --><select  name="jiguan_p" id="province2" data-province="">
                            </select>
                          </div>
                          <div class="form-group col-sm-4">
                            <label class="sr-only" for="city2">City</label>
                            <!-- <?php echo $arts['jiguan_c']; ?> -->
                            <select  name="jiguan_c" id="city2" data-city="" style="width:152px;">
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                    

                    <div class="form-group form-group1">
                      <label for="group_id" class="col-sm-2 control-label">出生地</label>
                      <div class="col-sm-8 ">
                        <div data-toggle="distpicker">
                          <div class="form-group col-sm-4">
                            <label class="sr-only" for="province2">Province</label>
                            <!-- <?php echo $arts['chushengdi_p']; ?> -->
                            <select  name="chushengdi_p" id="province2" data-province="">
                            
                            </select>
                          </div>
                          <div class="form-group col-sm-4">
                            <label class="sr-only" for="city2">City</label>

                            <!-- <?php echo $arts['chushengdi_c']; ?> -->
                            <select  name="chushengdi_c" id="city2" data-city="" style="width:152px;">
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="group_id" class="col-sm-2 control-label">政治面貌</label>
                      <div class="col-sm-6">
                        <select name="politics" style="width: 100%;">
                          <option selected="selected" value="0">--政治面貌选择--</option>
                          <option <?php if(($arts['politics']=="中共党员")): ?> selected="selected" <?php endif; ?> value="中共党员">中共党员</option>
                          <option <?php if(($arts['politics']=="共青团员")): ?> selected="selected" <?php endif; ?> value="共青团员">共青团员</option>
                          <option <?php if(($arts['politics']=="群众")): ?> selected="selected" <?php endif; ?> value="群众">群众</option>
                          <option <?php if(($arts['politics']=="民主党派成员")): ?> selected="selected" <?php endif; ?> value="民主党派成员">民主党派成员</option>
                          <option <?php if(($arts['politics']=="无党派人士")): ?> selected="selected" <?php endif; ?> value="无党派人士">无党派人士</option>
                        </select>
                      </div>
                    </div>
                   
                    <div class="form-group">
                      <label for="username" class="col-sm-2 control-label">职务</label>
                      <div class="col-sm-6">
                        <input class="form-control" id="work" placeholder="" value="<?php echo $arts['job']; ?>" name="job" required="required" type="text">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="group_id" class="col-sm-2 control-label">是否为试用</label>
                      <div class="col-sm-6">
                      <label >
                      <input <?php if(($arts['try']=="是")): ?> checked<?php endif; ?> type="radio" id="shiyong1" name="try"  value="是"/ ><label for="shiyong1">&nbsp;&nbsp;是&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                        </label>
                        <label>
                        <input <?php if(($arts['try']=="否")): ?> checked<?php endif; ?> type="radio" id="shiyong2" name="try"   value="否"/><label for="shiyong2">&nbsp;&nbsp;否&nbsp;</label>
                        </label>
                      </div>
                    </div>
                     <div class="form-group">
                      <label for="group_id" class="col-sm-2 control-label">职级</label>
                      <div class="col-sm-6">

                       
                      <label >
                      <input <?php if(($arts['zhiji']=="正职")): ?> checked<?php endif; ?> type="radio" id="rank" name="zhiji"  value="正职"/ ><label for="rank">&nbsp;&nbsp;正职&nbsp;</label>  
                        </label>
                        <label>
                        <input <?php if(($arts['zhiji']=="副职")): ?> checked<?php endif; ?> type="radio" id="rank1" name="zhiji"   value="副职"/><label for="rank1">&nbsp;&nbsp;副职&nbsp;</label>
                        </label>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="zhiwu" class="col-sm-2 control-label">任现职时间</label>
                      <div class="col-sm-6">
                        <input type="date" name="jobtime" value="<?php echo $arts['jobtime']; ?>" class="form-control"  />
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="zhiwu" class="col-sm-2 control-label">任现级时间</label>
                      <div class="col-sm-6">
                        <input type="date" name="ranktime" value="<?php echo $arts['ranktime']; ?>" class="form-control"  />
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="zhiwu" class="col-sm-2 control-label">工作时间</label>
                      <div class="col-sm-6">
                        <input type="date" name="alljobtime" value="<?php echo $arts['alljobtime']; ?>" class="form-control"  />
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="zhiwu" class="col-sm-2 control-label">入党时间</label>
                      <div class="col-sm-6">
                        <input type="date" name="joinpartytime" value="<?php echo $arts['joinpartytime']; ?>" class="form-control"  />
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="zhiwu" class="col-sm-2 control-label">学历</label>
                      <div class="col-sm-6">
                        <input class="form-control" id="worktime" placeholder="" value="<?php echo $arts['edubg']; ?>" name="edubg" required="required" type="text">
                      </div>
                    </div>
                   <!--  <div class="form-group">
                      <label for="group_id" class="col-sm-2 control-label no-padding-right">学历</label>
                      <div class="col-sm-6">
                        <select name="edubg" style="width: 100%;">
                          <option selected="selected" value="0">-学历选择-</option>
                          <option <?php if(($arts['edubg']=="博士研究生")): ?> selected="selected" <?php endif; ?> value="博士研究生">博士研究生</option>
                          <option <?php if(($arts['edubg']=="硕士研究生")): ?> selected="selected" <?php endif; ?> value="硕士研究生">硕士研究生</option>
                          <option <?php if(($arts['edubg']=="本科")): ?> selected="selected" <?php endif; ?> value="本科">本科</option>
                          <option <?php if(($arts['edubg']=="专科")): ?> selected="selected" <?php endif; ?> value="专科">专科</option>
                          <option <?php if(($arts['edubg']=="中专/高中/中技")): ?> selected="selected" <?php endif; ?> value="中专/高中/中技">中专/高中/中技</option>
                          <option <?php if(($arts['edubg']=="初中")): ?> selected="selected" <?php endif; ?> value="初中">初中</option>
                          <option <?php if(($arts['edubg']=="小学")): ?> selected="selected" <?php endif; ?> value="小学">小学</option>
                        </select>
                      </div>
                    </div> -->
                    
                    <div class="form-group">
                      <label for="group_id" class="col-sm-2 control-label">学位</label>
                      <div class="col-sm-6">
                        <select name="degree" style="width: 100%;">
                          <option selected="selected" value="0">--学位选择--</option>
                          <option <?php if(($arts['degree']=="博士")): ?> selected="selected" <?php endif; ?> value="博士">博士</option>
                          <option <?php if(($arts['degree']=="硕士")): ?> selected="selected" <?php endif; ?> value="硕士">硕士</option>
                          <option <?php if(($arts['degree']=="学士")): ?> selected="selected" <?php endif; ?> value="学士">学士</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="zhiwu" class="col-sm-2 control-label ">职称</label>
                      <div class="col-sm-6">
                        <input class="form-control" id="worktime" placeholder="" value="<?php echo $arts['ptitle']; ?>" name="ptitle" required="required" type="text">
                      </div>
                    </div>
<!--                     <div class="form-group">
                      <label for="group_id" class="col-sm-2 control-label no-padding-right">职称</label>
                      <div class="col-sm-6">
                        <select name="ptitle"  style="width: 100%;">
                          <option selected="selected" value="0">-职称选择-</option>
                          <option <?php if(($arts['ptitle']=="教授")): ?> selected="selected" <?php endif; ?> value="教授">教授</option>
                          <option <?php if(($arts['ptitle']=="副教授")): ?> selected="selected" <?php endif; ?> value="副教授">副教授</option>
                          <option <?php if(($arts['ptitle']=="讲师")): ?> selected="selected" <?php endif; ?> value="讲师">讲师</option>
                          <option <?php if(($arts['ptitle']=="助教")): ?> selected="selected" <?php endif; ?> value="助教">助教</option>
                        </select>
                      </div>
                    </div> -->
                    <div class="form-group">
                      <label for="group_id" class="col-sm-2 control-label ">健康状况</label>
                      <div class="col-sm-6">
                        <select name="health" style="width: 100%;">
                          <option selected="selected" value="0">--健康状况选择--</option>
                          <option <?php if(($arts['health']=="健康")): ?> selected="selected" <?php endif; ?> value="健康">健康</option>
                          <option <?php if(($arts['health']=="亚健康")): ?> selected="selected" <?php endif; ?> value="亚健康">亚健康</option>
                          <option <?php if(($arts['health']=="疾病")): ?> selected="selected" <?php endif; ?> value="疾病">疾病</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="zhiwu" class="col-sm-2 control-label">专业或专长</label>
                      <div class="col-sm-6">
                        <input class="form-control" id="worktime" placeholder="" value="<?php echo $arts['specialjob']; ?>" name="specialjob"  type="text">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="zhiwu" class="col-sm-2 control-label">备注</label>
                      <div class="col-sm-6">
                        <textarea  rows="7"  class="form-control" id="worktime" placeholder=""  name="specialskill"  type="text"><?php echo $arts['specialskill']; ?></textarea>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="zhiwu" class="col-sm-2 control-label">奖惩情况</label>
                      <div class="col-sm-6">
                        <textarea  rows="7"  class="form-control" id="worktime" placeholder=""  name="jiangcheng"  type="text"><?php echo $arts['jiangcheng']; ?></textarea>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="zhiwu" class="col-sm-2 control-label">考核结果</label>
                      <div class="col-sm-6">
                        <textarea  rows="7"  class="form-control" id="worktime" placeholder=""  name="jieguo"  type="text"><?php echo $arts['jieguo']; ?></textarea>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default">保存信息</button>
                      </div>
                    </div>
                    <?php endif; ?>
                  </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /Page Body --> 
    </div>
    <!-- /Page Content --> 
  
</div>

<!--Basic Scripts--> 
<script src="__ADMIN__/style/jquery_002.js"></script> 
<script src="__ADMIN__/style/bootstrap.js"></script> 
<script src="__ADMIN__/style/jquery.js"></script> 
<script src="__ADMIN__/js/jquery.min.js"></script> 
<script type="text/javascript" src="__ADMIN__/style/jquery.js"></script> 
<script type="text/javascript" src="__ADMIN__/style/jquery.cityselect.js"></script> 
<!--Beyond Scripts--> 
<script src="__ADMIN__/style/beyond.js"></script> 
<script src="__ADMIN__/style/distpicker.data.js"></script> 
<script src="__ADMIN__/style/distpicker.js"></script> 
<script src="__ADMIN__/style/style.js"></script> 
<script src="__ADMIN__/style/fileinput.js" type="text/javascript"></script> 
<script src="__ADMIN__/style/fileinput_locale_fr.js" type="text/javascript"></script> 
<script src="__ADMIN__/style/fileinput_locale_es.js" type="text/javascript"></script>
<script src="__ADMIN__/js/amazeui.min.js"></script>
<script src="__ADMIN__/js/app.js"></script>
</body>
</html>
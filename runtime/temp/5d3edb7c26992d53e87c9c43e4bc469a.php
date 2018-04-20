<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:96:"/Applications/XAMPP/xamppfiles/htdocs/ut-lygbgl/public/../application/admin/view/index/index.htm";i:1524117010;s:95:"/Applications/XAMPP/xamppfiles/htdocs/ut-lygbgl/public/../application/admin/view/public/top.htm";i:1524117020;s:96:"/Applications/XAMPP/xamppfiles/htdocs/ut-lygbgl/public/../application/admin/view/public/left.htm";i:1524117019;}*/ ?>
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
<link href="__ADMIN__/style/amazeui.min.css" rel="stylesheet">
<link href="__ADMIN__/style/admin.css" rel="stylesheet">
<link href="__ADMIN__/style/app.css" rel="stylesheet">
<link href="__ADMIN__/style/style.css" rel="stylesheet">
<!-- 弹出窗口 2017.12.1-->
<link href="__ADMIN__/style/animate.min.css" rel="stylesheet">
<!-- <link href="__ADMIN__/style/common.css" rel="stylesheet"> -->

<!-- end -->
<!--Basic Scripts-->
<script src="__ADMIN__/style/jquery_002.js"></script>
<script src="__ADMIN__/style/bootstrap.js"></script>
<script src="__ADMIN__/style/jquery.js"></script>
<script src="__ADMIN__/js/jquery.min.js"></script> 
<!--Beyond Scripts-->
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
    <!-- Sidebar Menu --> 
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
    <!-- /Sidebar Menu --> 
 
   
  <!-- Page Content -->

    <div class="tpl-content-wrapper"> 
  <!-- Page Breadcrumb -->

  <!-- /Page Breadcrumb --> 
  <!-- Page Body --> 
  <!-- crad -->
  <?php if($yonghutype['group_id']==1): ?>
  <div class="row cards xa-widget-header"> 
    <!-- 第一个-->
    <div class="am-u-lg-3 am-u-md-6 am-u-sm-12">
      <div class="dashboard-stat bai">
        <div class="visual"> <i class="fa fa-venus-mars vis-i-yellow"></i> </div>
        <div class="details">
          <div class="number"><span class="card-numfs-sm"><?php echo $num['bsex']; ?></span> / <span><?php echo $num['all']-$num['bsex']; ?></span></div>
          <div class="desc">男/女</div>
        </div>
        <div class="more"> <span class="task"> <span class="desc">男女比例</span> <span class="card percent"><span><?php echo $per['bsex']; ?>%</span> / <span><?php echo $per['gsex']; ?>%</span></span> </span> <span class="progress">
          <div class="am-progress tpl-progress am-progress-striped" style="background-color: #f36a5a;">
            <div class="progress-bar progress-bar-info" style="width: <?php echo $per['bsex']; ?>%"></div>
          </div>
          </span> </div>
      </div>
    </div>
    <!-- 第一个--> 
    <!-- 第二个-->
    <div class="am-u-lg-3 am-u-md-6 am-u-sm-12">
      <div class="dashboard-stat bai">
        <div class="visual"> <i class="fa fa-graduation-cap vis-i-blue"></i> </div>
        <div class="details">
          <div class="number"><span class="card-numfs-sm"><?php echo $num['edubg']; ?></span> / <span><?php echo $num['all']-$num['edubg']; ?></span></div>
          <div class="desc">硕士及以上/其他</div>
        </div>
        <div class="more"> <span class="task"> <span class="desc">学历比例</span> <span class="card percent"><span><?php echo $per['edubg']; ?>%</span> /<span> <?php echo $per['fedubg']; ?>%</span></span> </span> <span class="progress">
          <div class="am-progress tpl-progress am-progress-striped">
            <div class="am-progress-bar am-progress-bar-success" style="width: <?php echo $per['edubg']; ?>%"></div>
          </div>
          </span> </div>
      </div>
    </div>
    <!-- 第二个--> 
    <!-- 第三个-->
    <div class="am-u-lg-3 am-u-md-6 am-u-sm-12">
      <div class="dashboard-stat bai">
        <div class="visual"> <i class="fa fa-group vis-i-gree"></i> </div>
        <div class="details">
          <div class="number"><span class="card-numfs-sm"><?php echo $num['ptitle']; ?></span> / <span><?php echo $num['all']-$num['ptitle']; ?></span></div>
          <div class="desc">高级职称/其他</div>
        </div>
        <div class="more"> <span class="task"> <span class="desc">职称比例</span> <span class="card percent"><span><?php echo $per['ptitle']; ?>%</span> / <span><?php echo $per['fptitle']; ?>%</span></span> </span> <span class="progress">
          <div class="am-progress tpl-progress am-progress-striped">
            <div class="am-progress-bar am-progress-bar-success" style="width: <?php echo $per['ptitle']; ?>%"></div>
          </div>
          </span> </div>
      </div>
    </div>
    <!-- 第三个--> 
    <!-- 第四个-->
    <div class="am-u-lg-3 am-u-md-6 am-u-sm-12">
      <div class="dashboard-stat bai">
        <div class="visual"> <i class="fa fa-group vis-i-red"></i> </div>
        <div class="details">
          <div class="number"><span class="card-numfs-sm"><?php echo $num['politics']; ?></span> / <span><?php echo $num['all']-$num['politics']; ?></span></div>
          <div class="desc fontsize">党员/其他</div>
        </div>
        <div class="more"> <span class="task"> <span class="desc">党员比例</span> <span class="card percent"><span><?php echo $per['politics']; ?>%</span> / <span><?php echo $per['fpolitics']; ?>%</span></span> </span> <span class="progress">
          <div class="am-progress tpl-progress am-progress-striped">
            <div class="am-progress-bar am-progress-bar-success" style="width: <?php echo $per['politics']; ?>%"></div>
          </div>
          </span> </div>
      </div>
    </div>
    <!-- 第四个--> 
 </div>  <?php if($app): ?>

<!--<div class="tpl-portlet-components">
  <div class="portlet-title">
    <div class="caption ">
    <a  href="<?php echo url('article/approval'); ?>" style="text-decoration: none;color: #82949a"><span class="font-red bold"><span class="fa fa-bell"></span>
    审批提醒：</span>您有<span class="am-badge tpl-badge-danger am-round"><?php echo $app; ?></span>个修改申请待审核  <span class="tpl-label-info">  进入审核<i class="am-icon-share"></i></span></a></div>
  </div>

</div><?php endif; endif; ?>
  <!-- /crad -->
<div class="row xa-widget-header" >
<!--info-->



<div class="am-u-md-12 am-u-sm-12">
<div class="tpl-portlet-components">
  <div style="margin-top: 10px;">
    <ul class="tpl-task-list tpl-task-remind">
     <?php if(is_array($message) || $message instanceof \think\Collection): $i = 0; $__LIST__ = $message;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$m): $mod = ($i % 2 );++$i;?>
      <li>
        <div class="cosA">
          <p ><span class="cosIco"><i class="am-icon-bell-o"></i></span><?php echo mb_substr($m['title'],0,20,'utf-8'); ?></p>
          <span><?php echo $m['text']; ?></span>
        </div>
      </li>
      <?php endforeach; endif; else: echo "" ;endif; ?>
     
    </ul>
  </div>

</div>
</div>
</div>

<!--/info--> 

<!--ceping--> 
 <div class="tpl-portlet-components">
        <div class="portlet-title">
          <div class="caption font-red bold">
          <span class="fa fa-pencil"></span>
          测评任务</div>
        </div>
        <div class="tpl-block">
          <div class="am-g">
            <div class="am-u-sm-12 am-u-md-6">
             <?php if(($test_num <= 0)): ?>
             <p>您的测评任务都已完成</p>
             <?php else: ?>
             <p>您有&nbsp;&nbsp;
               <span class="cpnum"><?php echo $test_num; ?></span>
               &nbsp;&nbsp;张测评表需要完成</p>            
               <?php endif; ?>
            </div>
          </div>
          <div id="horizontal-form">
          <!--pc表格-->
                                    <table class="table table-bordered  table-hover table-condensed text-center" id="wxf-text-center">
                                      
                                        <thead>
                                        
                                            <tr>    
                                                 <th>序号</th>                   
                                                <th>调查表名称</th>
                                               <th>开始时间</th>
                                                <th>结束时间</th>
                                                <th>操作</th>
                                            </tr>
                                        </thead>
                                        <tbody  id="list">
                                        <?php if(is_array($artres) || $artres instanceof \think\Collection): $i = 0; $__LIST__ = $artres;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$art): $mod = ($i % 2 );++$i;?>
                                            <tr>
                                              <label>
                                              <td><?php echo $art['sumid']; ?></td>
                                                <td><?php echo $art['name']; ?></td>
                                                <td><?php echo $art['timestart']; ?> </td>
                                                <td><?php echo $art['timeend']; ?></td>

                                              <?php if(($art['status']=="3")): ?>
                                            <td class="cepinganniu2" >
                                                <a href="#" class="btn btn-warning btn-sm shiny disabled">
                                                   <i ></i> 已过期
                                                </a>
                                            </td>
                                            <?php elseif(($art['status']=="4")): ?>
                                            <td class="cepinganniu1" >
                                                <a href="#" class="btn btn-success btn-sm shiny">
                                                  <i></i> 未开启
                                                </a>
                                            </td>
                                            <?php elseif(($art['status']=="1")): ?>
                                             <td class="cepinganniu1" >
                                                <a href="#" class="btn btn-success btn-sm shiny">
                                                  <i></i> 已测评
                                                </a>
                                            </td>
                                                <?php else: ?>
                                            <td class="cepinganniu3" >
                                                <a href="<?php echo url('ceping/checklst',array('id'=>$art['id'])); ?>"  class="btn btn-primary btn-sm shiny demo17 rubberBand" id="jzbtn">
                                                   <i class="fa fa-edit">   </i>   测评
                                                </a>
                                            </td>
                                            <?php endif; ?>  
                                            </tr>
                                        <?php endforeach; endif; else: echo "" ;endif; ?>

                                               </div>
                                                                                  
                                        </tbody>
                                       
                                    </table>

<!--手机端表格-->
                                    <table class="table table-bordered  table-hover table-condensed text-center " id="wuxiaofa-text-center">
                                      
                                        <thead>
                                        
                                            <tr>    
                                                       
                                                <th>调查表名称</th>
                                           
                                                <th>操作</th>
                                            </tr>
                                        </thead>
                                        <tbody  id="list">
                                        <?php if(is_array($artres) || $artres instanceof \think\Collection): $i = 0; $__LIST__ = $artres;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$art): $mod = ($i % 2 );++$i;?>
                                            <tr>
                                              <label>
                                             
                                                <td><?php echo $art['name']; ?></td>
                                              
                                             

                                              <?php if(($art['status']=="3")): ?>
                                            <td class="cepinganniu2" >
                                                <a href="#" class="btn btn-warning btn-sm shiny disabled">
                                                   <i ></i> 已过期
                                                </a>
                                            </td>
                                            <?php elseif(($art['status']=="4")): ?>
                                            <td class="cepinganniu1" >
                                                <a href="#" class="btn btn-success btn-sm shiny">
                                                  <i></i> 未开启
                                                </a>
                                            </td>
                                            <?php elseif(($art['status']=="1")): ?>
                                             <td class="cepinganniu1" >
                                                <a href="#"  class="btn btn-primary btn-sm shiny demo17 rubberBand" id="jzbtn">
                                                   <i class="fa fa-edit">   </i>   测评
                                                </a>
                                            </td>
                                                <?php else: ?>
                                            <td class="cepinganniu3" >
                                                <a href="<?php echo url('ceping/checklst',array('id'=>$art['id'])); ?>"  class="btn btn-primary btn-sm shiny">
                                                   <i class="fa fa-edit">   </i>   测评
                                                </a>
                                            </td>
                                            <?php endif; ?>  
                                            </tr>
                                        <?php endforeach; endif; else: echo "" ;endif; ?>

                                               </div>
                                                                                  
                                        </tbody>
                                       
                                    </table>
                                    </div>


        </div>
      </div> 
       <!--/ceping--> 

 
      
 


  <!--测评完成情况-->
  <!--<div class="row">
   <div class="am-u-md-6 am-u-sm-12 row-mb">
    <div class="tpl-portlet">
      <div class="tpl-portlet-title">
      <div class="tpl-caption font-red">
        <i class="fa fa-bar-chart"></i>
        <span>全校测评表完成情况</span>
      </div>
      
      
      <div class="am-actions">
        <ul class="am-actions-btn">
          <a href="#"><li class="am-green">详情</li></a>
        </ul>
      </div>
      </div>
    <div class="tpl-scrollable">
       <div class="wrapper1">
                <div class="scroller" >
                  <ul class="tpl-task-list tpl-task-remind">
                    <li>
                      <div class="wcdA">
                        <span class="zjd">85 <i class="fa fa-percent zjd2"></i></span><span class="zjd1">总进度</span>
                        
                      </div>
                      <div class="wcdB">
                        <span class="progress">
          <div class="am-progress tpl-progress am-progress-striped">
            <div class="am-progress-bar am-progress-bar-success" style="width: 85%"></div>
          </div>
          </span>
                      </div>
                    </li>
                    <li>
                      <div class="wcdA">
                        <i class="fa fa-calendar-check-o"></i><span style="font-size: 16px;">民主测评</span>
                        <span class="wcdA-num">57%</span>
                      </div>
                      <div class="wcdB">
                        <span class="progress">
          <div class="am-progress tpl-progress am-progress-striped">
            <div class="am-progress-bar am-progress-bar-secondary" style="width: 57%"></div>
          </div>
          </span>
                      </div>
                    </li>
                    <li>
                       <div class="wcdA">
                        <i class="fa fa-calendar-check-o"></i><span style="font-size: 16px;">德的测评</span>
                        <span class="wcdA-num">87%</span>
                      </div>
                      <div class="wcdB">
                        <span class="progress">
          <div class="am-progress tpl-progress am-progress-striped">
            <div class="am-progress-bar am-progress-bar-warning" style="width: 87%"></div>
          </div>
          </span>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
    </div>
    </div>
   </div>
   <div class="am-u-md-6 am-u-sm-12 row-mb">
    <div class="tpl-portlet">
      <div class="tpl-portlet-title">
      <div class="tpl-caption font-red">
        <i class="fa fa-bar-chart"></i>
        <span>全校测评表完成情况</span>
      </div>
      
      
      <div class="am-actions">
        <ul class="am-actions-btn">
          <a href="#"><li class="am-green">详情</li></a>
        </ul>
      </div>
      </div>
    <div class="tpl-scrollable">
       <div class="wrapper1">
                <div class="scroller" >
                  <ul class="tpl-task-list tpl-task-remind">
                    <li>
                       <div class="wcdA">
                        <i class="fa fa-calendar-check-o"></i><span style="font-size: 16px;">民主互评</span>
                        <span class="wcdA-num">57%</span>
                      </div>
                      <div class="wcdB">
                        <span class="progress">
          <div class="am-progress tpl-progress am-progress-striped">
            <div class="am-progress-bar am-progress-bar-secondary" style="width: 57%"></div>
          </div>
          </span>
                      </div>
                    </li>
                    <li>
                      <div class="wcdA">
                        <i class="fa fa-calendar-check-o"></i><span style="font-size: 16px;">德的互评</span>
                        <span class="wcdA-num">57%</span>
                      </div>
                      <div class="wcdB">
                        <span class="progress">
          <div class="am-progress tpl-progress am-progress-striped">
            <div class="am-progress-bar am-progress-bar-warning" style="width: 57%"></div>
          </div>
          </span>
                      </div>
                    </li>
                    <li>
                       <div class="wcdA">
                        <i class="fa fa-calendar-check-o"></i><span style="font-size: 16px;">班子测评</span>
                        <span class="wcdA-num">87%</span>
                      </div>
                      <div class="wcdB">
                        <span class="progress">
          <div class="am-progress tpl-progress am-progress-striped">
            <div class="am-progress-bar am-progress-bar-success" style="width: 87%"></div>
          </div>
          </span>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
    </div>
    </div>
   </div>
    
  </div>
  -->
  <!--测评完成情况-->

  <!-- /Page Body --> 
  </div>
  </div>
  <!-- /Page Content --> 
<!-- 弹出窗口 -->
<div id="HBox" style="width:300px;height:270px;margin:0 auto;box-shadow:1px 1px 5px #333;-webkit-box-shadow:1px 1px 5px #333;display:none;background-color:#ffffff;">
 <p style="margin-top : 60px; margin-left:30px;font-size: 35px;font-family: Microsoft YaHei;">系统正在处理中</p>
</div>
<!-- end -->

 <script>
// $(function(){
  $("#jzbtn").click(function(){
  //var $el = $('.dialog');
  //$el.hDialog(); //默认调用
  //定时关闭
  $('.demo17').hDialog({width:300,height: 150,hideTime: 10000, modalHide: false,closeHide: false});

  console.log("111"); //返回顶部
 // $.goTop();

});

 // alert("11");
</script>
<!--Basic Scripts--> 
<script src="__ADMIN__/style/jquery_002.js"></script> 
<script src="__ADMIN__/style/bootstrap.js"></script> 
<script src="__ADMIN__/style/jquery.js"></script> 
<script src="__ADMIN__/js/jquery.min.js"></script> 
<!--Beyond Scripts--> 
<script src="__ADMIN__/style/beyond.js"></script>
<script src="__ADMIN__/js/amazeui.min.js"></script>
<script src="__ADMIN__/js/app.js"></script>
<!-- 弹出框口 -->
<script src="__ADMIN__/style/jquery-1.9.1.min.js"></script>
<script src="__ADMIN__/style/jquery.hDialog.min.js"></script>
<!-- end -->
</body>
</html>
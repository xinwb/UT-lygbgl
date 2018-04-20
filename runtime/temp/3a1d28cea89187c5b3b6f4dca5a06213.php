<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:96:"/Applications/XAMPP/xamppfiles/htdocs/ut-lygbgl/public/../application/admin/view/checkgl/lst.htm";i:1524117004;s:95:"/Applications/XAMPP/xamppfiles/htdocs/ut-lygbgl/public/../application/admin/view/public/top.htm";i:1524117020;s:96:"/Applications/XAMPP/xamppfiles/htdocs/ut-lygbgl/public/../application/admin/view/public/left.htm";i:1524117019;}*/ ?>
<!DOCTYPE html>
<!--总体的列表页-->
<html>
<head>
<meta charset="utf-8">
<title>干部考核与信息管理系统</title>
<meta name="5ription" content="Dashboard">
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
<link href="__ADMIN__/style/style.css" rel="stylesheet">
<link href="__ADMIN__/style/amazeui.min.css" rel="stylesheet">
<link href="__ADMIN__/style/admin.css" rel="stylesheet">
<link href="__ADMIN__/style/app.css" rel="stylesheet">
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
          <li><a href="#">干部考核管理</a></li>
          <li class="active">调查表管理</li>
        </ol>                                                                                                                                                              
      </div>
    <!-- /Page Breadcrumb -->
    <div class="page-body">
    <div class="row">
     <div class="btn-addadd"> <button type="button" tooltip="添加考核" class="btn btn-sm btn-azure btn-addon" onClick="javascript:window.location.href = '<?php echo url('add'); ?>'"> <i class="fa fa-plus"></i> Add
            </button></div>
      <div class="col-lg-12 col-sm-12 col-xs-12">
        <div class="widget1">
          <div class="widget-header bordered-bottom bordered-blue"> <span class="widget-caption">管理调查表</span> </div>
          <div class="widget-body1">
            <div id="horizontal-form">
              <table class="table table-bordered  table-hover table-condensed text-center">
                <thead>
                  <tr>
                    <th width="5%">ID</th>
                    <th width="30%">调查表名字</th>
                    <th width="15%">开始时间</th>
                    <th width="15%">结束时间</th>
                    <th width="15%">类别</th>
                    <th width="10%">编辑干部考核名单</th>
                    <th width="10%">编辑教职工投票名单</th>
                    <th width="10%">操作</th>
                  </tr>
                </thead>
                
                <tbody  id="list">
                
                <?php if(is_array($artres) || $artres instanceof \think\Collection): $i = 0; $__LIST__ = $artres;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$art): $mod = ($i % 2 );++$i;?>
                <tr>
                    <label>
                  <td><?php echo $art['sumid']; ?></td>
                  <td><?php echo $art['name']; ?></td>
                  <td><?php echo $art['timestart']; ?></td>
                  <td><?php echo $art['timeend']; ?></td>
                  <td><?php echo $art["type"]; ?></td>
                  <?php if(($art["type"]=="班子测评")): ?>
                  <td><a href="<?php echo url('lst2_2',array('id'=>$art['id'])); ?>" class="btn btn-primary btn-sm shiny"> <i class="fa fa-edit"></i> 编辑 </a> <a href="<?php echo url('check1',array('id'=>$art['id'])); ?>" class="btn btn-primary btn-sm shiny"> <i class="fa fa-edit"></i> 查看 </a></td>
                  <?php else: ?>
                  <td><a href="<?php echo url('lst2',array('id'=>$art['id'],'type'=>$art['type'])); ?>" class="btn btn-primary btn-sm shiny"> <i class="fa fa-edit"></i> 编辑 </a> <a href="<?php echo url('check1',array('id'=>$art['id'])); ?>" class="btn btn-primary btn-sm shiny"> <i class="fa fa-edit"></i> 查看 </a></td>
                  <?php endif; ?>

                  <td><a href="<?php echo url('lst3',array('id'=>$art['id'])); ?>" class="btn btn-primary btn-sm shiny"> <i class="fa fa-edit"></i> 编辑 </a> <a href="<?php echo url('check2',array('id'=>$art['id'])); ?>" class="btn btn-primary btn-sm shiny"> <i class="fa fa-edit"></i> 查看 </a></td>

                  <td align="center"><a href="<?php echo url('edit',array('id'=>$art['id'])); ?>" class="btn btn-primary btn-sm shiny"> <i class="fa fa-edit"></i> 编辑 </a> <a href="#" onClick="warning('确实要删除吗', '<?php echo url('del',array('id'=>$art['id'])); ?>')" class="btn btn-danger btn-sm shiny"> <i class="fa fa-trash-o"></i> &nbsp;删除 </a>
                    </td>
                    </label>
                </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>
                  </tbody>
                
              </table>
              <div class="sz"> <?php echo $artres->render(); ?> </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
 
  <!-- /Page Content --> 
</div>
<script src="__ADMIN__/style/beyond.js"></script>
<script src="__ADMIN__/js/amazeui.min.js"></script>
<script src="__ADMIN__/js/app.js"></script>
</body>
</html>
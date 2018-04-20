<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:95:"/Applications/XAMPP/xamppfiles/htdocs/ut-lygbgl/public/../application/admin/view/admin/edit.htm";i:1524116976;s:95:"/Applications/XAMPP/xamppfiles/htdocs/ut-lygbgl/public/../application/admin/view/public/top.htm";i:1524117020;s:96:"/Applications/XAMPP/xamppfiles/htdocs/ut-lygbgl/public/../application/admin/view/public/left.htm";i:1524117019;}*/ ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>干部考核和信息管理系统</title>
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
<link href="__ADMIN__/style/style.css" rel="stylesheet">
<link href="__ADMIN__/style/typicons.css" rel="stylesheet">
<link href="__ADMIN__/style/animate.css" rel="stylesheet">
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
          <li><a href="/">首页</a></li>
          <li><a href="#">用户管理</a></li>
          <li class="active">编辑</li>
        </ol>
      </div>
      <!-- /Page Breadcrumb --> 
      
      <!-- Page Body -->
      <div class="page-body">
        <div class="row">
          <div class="col-lg-12 col-sm-12 col-xs-12">
            <div class="widget">
              <div class="widget-header bordered-bottom bordered-blue"> <span class="widget-caption">编辑管理员</span> </div>
              <div class="widget-body">
              <div class="widget-body1">
                <div id="horizontal-form">
                  <form class="form-horizontal" role="form" action="" method="post">
                    <input type="hidden" name="id" value="<?php echo $admin['id']; ?>">
                    <div class="form-group">
                      <label for="username" class="col-sm-2 control-label">所属用户组</label>
                      <div class="col-sm-6">
                        <select name="group_id">
                          
                                    <?php if(is_array($authGroupRes) || $authGroupRes instanceof \think\Collection): $i = 0; $__LIST__ = $authGroupRes;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$authGroupRes): $mod = ($i % 2 );++$i;?>
                                        
                          <option <?php if($authGroupRes['id'] == $groupId): ?>selected="selected"<?php endif; ?> value="<?php echo $authGroupRes['id']; ?>"><?php echo $authGroupRes['title']; ?></option>
                          
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                
                        </select>
                      </div>
                      <p class="help-block col-sm-4 red">* 必填</p>
                    </div>
                    <div class="form-group">
                      <label for="username" class="col-sm-2 control-label">工号</label>
                      <div class="col-sm-6">
                        <input class="form-control"  placeholder="" name="worknum" value="<?php echo $admin['worknum']; ?>"  type="text">
                      </div>
                      <p class="help-block col-sm-4 red">* 必填</p>
                    </div>
                    <div class="form-group">
                      <label for="username" class="col-sm-2 control-label">姓名</label>
                      <div class="col-sm-6">
                        <input class="form-control"  placeholder="" name="name" value="<?php echo $admin['name']; ?>"  type="text">
                      </div>
                      <p class="help-block col-sm-4 red">* 必填</p>
                    </div>
                    <div class="form-group">
                      <label for="group_id" class="col-sm-2 control-label">密码</label>
                      <div class="col-sm-6">
                        <input class="form-control"  placeholder="" name="password" value="" type="text">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="group_id" class="col-sm-2 control-label">类型</label>
                      <div class="col-sm-6">
                        <select name="type" style="width: 100%;">
                          <option  value="<?php echo $admin['type']; ?>">--类型选择--</option>
                          <option <?php if(($admin['type']=="中层干部")): ?> selected="selected" <?php endif; ?> value="中层干部">中层干部</option>
                          <option <?php if(($admin['type']=="高层干部")): ?> selected="selected" <?php endif; ?> value="院领导">院领导</option>
                          <option <?php if(($admin['type']=="科级干部")): ?> selected="selected" <?php endif; ?> value="科级干部">科级干部</option>
                          <option <?php if(($admin['type']=="普通教职工")): ?> selected="selected" <?php endif; ?> value="普通教职工">普通教职工</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="group_id" class="col-sm-2 control-label">所在支部</label>
                      <div class="col-sm-6">
                        <select name="cateid" style="width: 100%;">
                          <option selected="selected" value="0">请选择支部</option>
                         <?php if(is_array($department) || $department instanceof \think\Collection): $i = 0; $__LIST__ = $department;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$art): $mod = ($i % 2 );++$i;?>
                          <option <?php if(($admin['cateid']==$art['id'])): ?> selected="selected" <?php endif; ?> value="<?php echo $art['id']; ?>" ><?php echo $art['catename']; ?></option>
						<?php endforeach; endif; else: echo "" ;endif; ?>
                        
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="group_id" class="col-sm-2 control-label">所在部门</label>
                      <div class="col-sm-6">
                        <select name="cateid2" style="width: 100%;">
                          <option selected="selected" value="0">请选择部门</option>
                         <?php if(is_array($department) || $department instanceof \think\Collection): $i = 0; $__LIST__ = $department;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$art): $mod = ($i % 2 );++$i;?>
                          <option <?php if(($admin['cateid2']==$art['id'])): ?> selected="selected" <?php endif; ?> value="<?php echo $art['id']; ?>" ><?php echo $art['catename']; ?></option>
            <?php endforeach; endif; else: echo "" ;endif; ?>
                        
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default">保存信息</button>
                      </div>
                    </div>
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
<!--Beyond Scripts--> 
<script src="__ADMIN__/style/beyond.js"></script>
<script src="__ADMIN__/js/amazeui.min.js"></script>
<script src="__ADMIN__/js/app.js"></script>
</body>
</html>
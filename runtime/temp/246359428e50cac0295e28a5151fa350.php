<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:58:"D:\wwwroot\zhihuichengshi/city/admin\view\index\index.html";i:1491390607;}*/ ?>
<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset="utf-8" />
        <title>网站后台管理系统</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="__PUBLIC__/assets/css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="__PUBLIC__/assets/css/font-awesome.min.css" />
        <!--[if IE 7]>
            <link rel="stylesheet" href="__PUBLIC__/assets/css/font-awesome-ie7.min.css" />
        <![endif]-->
        <link rel="stylesheet" href="__PUBLIC__/assets/css/ace.min.css" />
        <link rel="stylesheet" href="__PUBLIC__/assets/css/ace-rtl.min.css" />
        <link rel="stylesheet" href="__PUBLIC__/assets/css/ace-skins.min.css" />
        <link rel="stylesheet" href="__PUBLIC__/css/style.css" />
        <!--[if lte IE 8]>
            <link rel="stylesheet" href="__PUBLIC__/assets/css/ace-ie.min.css" />
        <![endif]-->
        <script src="__PUBLIC__/assets/js/ace-extra.min.js"></script>
        <!--[if lt IE 9]>
            <script src="__PUBLIC__/assets/js/html5shiv.js"></script>
            <script src="__PUBLIC__/assets/js/respond.min.js"></script>
        <![endif]-->
        <!--[if !IE]> -->
            <script src="__PUBLIC__/js/jquery-1.9.1.min.js"></script>
            <!-- <![endif]-->
            <!--[if IE]>
                <script type="text/javascript">window.jQuery || document.write("<script src='__PUBLIC__/assets/js/jquery-1.10.2.min.js'>" + "<" + "script>");</script>
            <![endif]-->
            <script type="text/javascript">if ("ontouchend" in document) document.write("<script src='__PUBLIC__/assets/js/jquery.mobile.custom.min.js'>" + "<" + "script>");</script>
            <script src="__PUBLIC__/assets/js/bootstrap.min.js"></script>
            <script src="__PUBLIC__/assets/js/typeahead-bs2.min.js"></script>
            <!--[if lte IE 8]>
                <script src="__PUBLIC__/assets/js/excanvas.min.js"></script>
            <![endif]-->
            <script src="__PUBLIC__/assets/js/ace-elements.min.js"></script>
            <script src="__PUBLIC__/assets/js/ace.min.js"></script>
            <script src="__PUBLIC__/assets/layer/layer.js" type="text/javascript"></script>
            <script src="__PUBLIC__/assets/laydate/laydate.js" type="text/javascript"></script>
            <script type="text/javascript">
            $(function(){
                var cid = $('#nav_list> li>.submenu');
                    cid.each(function(i){
                        $(this).attr('id', "Sort_link_" + i);
                    })
            });
            jQuery(document).ready(function() {
                    $.each($(".submenu"),
                    function() {
                        var $aobjs = $(this).children("li");
                        var rowCount = $aobjs.size();
                        var divHeigth = $(this).height();
                        $aobjs.height(divHeigth / rowCount);
                    });
                    //初始化宽度、高度    
                    $("#main-container").height($(window).height() - 76);
                    $("#iframe").height($(window).height() - 140);

                    $(".sidebar").height($(window).height() - 99);
                    var thisHeight = $("#nav_list").height($(window).outerHeight() - 173);
                    $(".submenu").height();
                    $("#nav_list").children(".submenu").css("height", thisHeight);

                    //当文档窗口发生改变时 触发  
                    $(window).resize(function() {
                        $("#main-container").height($(window).height() - 76);
                        $("#iframe").height($(window).height() - 140);
                        $(".sidebar").height($(window).height() - 99);

                        var thisHeight = $("#nav_list").height($(window).outerHeight() - 173);
                        $(".submenu").height();
                        $("#nav_list").children(".submenu").css("height", thisHeight);
                    });
                    $(".iframeurl").click(function() {
                        var cid = $(this).attr("name");
                        var cname = $(this).attr("title");
                        $("#iframe").attr("src", cid).ready();
                        $("#Bcrumbs").attr("href", cid).ready();
                        $(".Current_page a").attr('href', cid).ready();
                        $(".Current_page").attr('name', cid);
                        $(".Current_page").html(cname).css({
                            "color": "#333333",
                            "cursor": "default"
                        }).ready();
                        $("#parentIframe").html('<span class="parentIframe iframeurl"></span>').css("display", "none").ready();
                        $("#parentIfour").html('').css("display", "none").ready();
                    });

                });

                /*********************点击事件*********************/
                $(document).ready(function() {
                    $('#nav_list').find('li.home').click(function() {
                        $('#nav_list').find('li.home').removeClass('active');
                        $(this).addClass('active');
                    });

                    //时间设置
                    function currentTime() {
                        var d = new Date(),
                        str = '';
                        str += d.getFullYear() + '年';
                        str += d.getMonth() + 1 + '月';
                        str += d.getDate() + '日';
                        str += d.getHours() + '时';
                        str += d.getMinutes() + '分';
                        str += d.getSeconds() + '秒';
                        return str;
                    }
                    setInterval(function() {
                        $('#time').html(currentTime)
                    },
                    1000);
                    //修改密码
                    $('.change_Password').on('click',
                    function() {
                        layer.open({
                            type: 1,
                            title: '修改密码',
                            area: ['300px', '300px'],
                            shadeClose: true,
                            content: $('#change_Pass'),
                            btn: ['确认修改'],
                            yes: function(index, layero) {
                                if ($("#password").val() == "") {
                                    layer.alert('原密码不能为空!', {
                                        title: '提示框',
                                        icon: 0,

                                    });
                                    return false;
                                }
                                if ($("#Nes_pas").val() == "") {
                                    layer.alert('新密码不能为空!', {
                                        title: '提示框',
                                        icon: 0,

                                    });
                                    return false;
                                }

                                if ($("#c_mew_pas").val() == "") {
                                    layer.alert('确认新密码不能为空!', {
                                        title: '提示框',
                                        icon: 0,

                                    });
                                    return false;
                                }
                                if (!$("#c_mew_pas").val || $("#c_mew_pas").val() != $("#Nes_pas").val()) {
                                    layer.alert('密码不一致!', {
                                        title: '提示框',
                                        icon: 0,

                                    });
                                    return false;
                                } else {
                                    layer.alert('修改成功！', {
                                        title: '提示框',
                                        icon: 1,
                                    });
                                    layer.close(index);
                                }
                            }
                        });
                    });
                    $('#Exit_system').on('click',
                    function() {
                        layer.confirm('是否确定退出系统？', {
                            btn: ['是', '否'],
                            //按钮
                            icon: 2,
                        },
                        function() {
                            location.href = "<?php echo url('logout'); ?>";
                        });
                    });
                })
            </script>
    </head>
    <body>
        <div class="navbar navbar-default" id="navbar">
            <script type="text/javascript">try {
                    ace.settings.check('navbar', 'fixed')
                } catch(e) {}</script>
            <div class="navbar-container" id="navbar-container">
                <div class="navbar-header pull-left">
                    <a href="#" class="navbar-brand">
                        <small>
                            <img src="__PUBLIC__/images/logo.png"></small>
                    </a>
                    <!-- /.brand --></div>
                <!-- /.navbar-header -->
                <div class="navbar-header pull-right" role="navigation">
                    <ul class="nav ace-nav">
                        <li class="light-blue">
                            <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                                <span class="time">
                                    <em id="time"></em>
                                </span>
                                <span class="user-info">
                                    <small>欢迎光临,</small><?php echo \think\Session::get('username'); ?></span>
                                <i class="icon-caret-down"></i>
                            </a>
                            <ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                                <li>
                                    <a href="#"><i class="icon-user"></i>修改密码</a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="javascript:ovid(0)" id="Exit_system">
                                        <i class="icon-off"></i>退出</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="main-container" id="main-container">
            <script type="text/javascript">try {
                    ace.settings.check('main-container', 'fixed')
                } catch(e) {}</script>
            <div class="main-container-inner">
                <a class="menu-toggler" id="menu-toggler" href="#">
                    <span class="menu-text"></span>
                </a>
                <div class="sidebar" id="sidebar">
                    <script type="text/javascript">try {
                            ace.settings.check('sidebar', 'fixed')
                        } catch(e) {}</script>
                    <div class="sidebar-shortcuts" id="sidebar-shortcuts">
                        <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">后台管理系统</div>
                        <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
                            <span class="btn btn-success"></span>
                            <span class="btn btn-info"></span>
                            <span class="btn btn-warning"></span>
                            <span class="btn btn-danger"></span>
                        </div>
                    </div>
                    <!-- #sidebar-shortcuts -->
                    <ul class="nav nav-list" id="nav_list">
                        <li class="home">
                            <a href="javascript:void(0)" name="home.html" class="iframeurl" title="">
                                <i class="icon-dashboard"></i>
                                <span class="menu-text">系统首页</span></a>
                        </li>
                        <li>
                            <a href="#" class="dropdown-toggle">
                                <i class="icon-cogs"></i>
                                <span class="menu-text">系统设置</span>
                                <b class="arrow icon-angle-down"></b>
                            </a>
                            <ul class="submenu">
                                <li class="home">
                                    <a href="javascript:void(0)" name="<?php echo url('System/base'); ?>" title="基本设置" class="iframeurl">
                                        <i class="icon-double-angle-right"></i>基本设置</a>
                                </li>
                                <li class="home">
                                    <a href="javascript:void(0)" name="<?php echo url('System/sms'); ?>" title="短信接口" class="iframeurl">
                                        <i class="icon-double-angle-right"></i>短信接口</a>
                                </li>
                                <li class="home">
                                    <a href="javascript:void(0)" name="<?php echo url('Region/index'); ?>" title="地区设置" class="iframeurl"><i class="icon-double-angle-right"></i>区域设置</a>
                                </li>
                                
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="dropdown-toggle">
                                <i class="icon-group "></i>
                                <span class="menu-text">房东管理</span>
                                <b class="arrow icon-angle-down"></b>
                            </a>
                            <ul class="submenu">
                                <li class="home">
                                    <a href="javascript:void(0)" name="<?php echo url('Landlord/index'); ?>" title="房东列表" class="iframeurl">
                                        <i class="icon-double-angle-right"></i>房东列表</a>
                                </li>
                                <li class="home">
                                    <a href="javascript:void(0)" name="<?php echo url('Landlord/addedit'); ?>" title="添加房东" class="iframeurl">
                                        <i class="icon-double-angle-right"></i>添加房东</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="dropdown-toggle">
                                <i class="icon-home"></i>
                                <span class="menu-text">房源管理</span>
                                <b class="arrow icon-angle-down"></b>
                            </a>
                            <ul class="submenu">
                                <li class="home">
                                    <a href="javascript:void(0)" name="transaction.html" title="所有房源" class="iframeurl">
                                        <i class="icon-double-angle-right"></i>所有房源</a>
                                </li>
                                <li class="home">
                                    <a href="javascript:void(0)" name="Orderform.html" title="未租房源" class="iframeurl">
                                        <i class="icon-double-angle-right"></i>未租房源</a>
                                </li>
                                <li class="home">
                                    <a href="javascript:void(0)" name="Amounts.html" title="已租房源" class="iframeurl">
                                        <i class="icon-double-angle-right"></i>已租房源</a>
                                </li>
                                
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="dropdown-toggle">
                                <i class="icon-user"></i>
                                <span class="menu-text">会员管理</span>
                                <b class="arrow icon-angle-down"></b>
                            </a>
                            <ul class="submenu">
                                <li class="home">
                                    <a href="javascript:void(0)" name="<?php echo url('User/index'); ?>" title="会员列表" class="iframeurl">
                                        <i class="icon-double-angle-right"></i>会员列表</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="dropdown-toggle">
                                <i class="icon-picture"></i>
                                <span class="menu-text">商城管理</span>
                                <b class="arrow icon-angle-down"></b>
                            </a>
                            <ul class="submenu">
                                <li class="home">
                                    <a href="javascript:void(0)" name="Systems.html" title="商品分类" class="iframeurl">
                                        <i class="icon-double-angle-right"></i>商品分类</a>
                                </li>
                                <li class="home">
                                    <a href="javascript:void(0)" name="菜单管理.html" title="商品列表" class="iframeurl">
                                        <i class="icon-double-angle-right"></i>商品列表</a>
                                </li>
                                <li class="home">
                                    <a href="javascript:void(0)" name="用户管理.html" title="订单管理" class="iframeurl">
                                        <i class="icon-double-angle-right"></i>订单管理</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="dropdown-toggle">
                                <i class="icon-umbrella"></i>
                                <span class="menu-text">楼下商家</span>
                                <b class="arrow icon-angle-down"></b>
                            </a>
                            <ul class="submenu">
                                <li class="home">
                                    <a href="javascript:void(0)" name="<?php echo url('Shop/index'); ?>" title="所有商家" class="iframeurl">
                                        <i class="icon-double-angle-right"></i>所有商家</a>
                                </li>
                                <li class="home">
                                    <a href="javascript:void(0)" name="<?php echo url('Shop/addedit'); ?>" title="新增商家" class="iframeurl">
                                        <i class="icon-double-angle-right"></i>新增商家</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="dropdown-toggle">
                                <i class="icon-list"></i>
                                <span class="menu-text">新闻管理</span>
                                <b class="arrow icon-angle-down"></b>
                            </a>
                            <ul class="submenu">
                                <li class="home">
                                    <a href="javascript:void(0)" name="<?php echo url('News/index'); ?>" title="新闻列表" class="iframeurl"><i class="icon-double-angle-right"></i>新闻列表</a>
                                </li>
                                <li class="home">
                                    <a href="javascript:void(0)" name="<?php echo url('News/add'); ?>" title="添加新闻" class="iframeurl"><i class="icon-double-angle-right"></i>添加新闻</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="dropdown-toggle">
                                <i class="icon-book"></i>
                                <span class="menu-text">云工作</span>
                                <b class="arrow icon-angle-down"></b>
                            </a>
                            <ul class="submenu">
                                <li class="home">
                                    <a href="javascript:void(0)" name="<?php echo url('Job/index'); ?>" title="所有职位" class="iframeurl">
                                        <i class="icon-double-angle-right"></i>所有职位</a>
                                </li>
                                <li class="home">
                                    <a href="javascript:void(0)" name="<?php echo url('Job/addedit'); ?>" title="新增职位" class="iframeurl">
                                        <i class="icon-double-angle-right"></i>新增职位</a>
                                </li>
                            </ul>
                        </li>
                        
                        <li>
                            <a href="#" class="dropdown-toggle">
                                <i class="icon-comments"></i>
                                <span class="menu-text">论坛交流</span>
                                <b class="arrow icon-angle-down"></b>
                            </a>
                            <ul class="submenu">
                                <li class="home">
                                    <a href="javascript:void(0)" name="<?php echo url('Bbs/forum'); ?>" title="论坛版块" class="iframeurl">
                                        <i class="icon-double-angle-right"></i>论坛版块</a>
                                </li>
                                <li class="home">
                                    <a href="javascript:void(0)" name="<?php echo url('Bbs/index'); ?>" title="贴子列表" class="iframeurl">
                                        <i class="icon-double-angle-right"></i>贴子列表</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="dropdown-toggle">
                                <i class="icon-bullhorn"></i>
                                <span class="menu-text">二手信息</span>
                                <b class="arrow icon-angle-down"></b>
                            </a>
                            <ul class="submenu">
                                <li class="home">
                                    <a href="javascript:void(0)" name="<?php echo url('Classinfo/category'); ?>" title="分类列表" class="iframeurl">
                                        <i class="icon-double-angle-right"></i>分类列表</a>
                                </li>
                                <li class="home">
                                    <a href="javascript:void(0)" name="<?php echo url('Classinfo/index'); ?>" title="信息列表" class="iframeurl">
                                        <i class="icon-double-angle-right"></i>信息列表</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="dropdown-toggle">
                                <i class="icon-bullhorn"></i>
                                <span class="menu-text">其他</span>
                                <b class="arrow icon-angle-down"></b>
                            </a>
                            <ul class="submenu">
                                <li class="home">
                                    <a href="javascript:void(0)" name="<?php echo url('Gbook/index'); ?>" title="投诉建议" class="iframeurl">
                                        <i class="icon-double-angle-right"></i>投诉建议</a>
                                </li>
                                <li class="home">
                                    <a href="javascript:void(0)" name="<?php echo url('Slide/index'); ?>" title="幻灯管理" class="iframeurl">
                                        <i class="icon-double-angle-right"></i>幻灯管理</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <div class="sidebar-collapse" id="sidebar-collapse">
                        <i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>
                    </div>
                    <script type="text/javascript">try {
                            ace.settings.check('sidebar', 'collapsed')
                        } catch(e) {}</script>
                </div>
                <div class="main-content">
                    <script type="text/javascript">try {
                            ace.settings.check('breadcrumbs', 'fixed')
                        } catch(e) {}</script>
                    <div class="breadcrumbs" id="breadcrumbs">
                        <ul class="breadcrumb">
                            <li>
                                <i class="icon-home home-icon"></i>
                                <a href="index.html">首页</a></li>
                            <li class="active">
                                <span class="Current_page iframeurl"></span>
                            </li>
                            <li class="active" id="parentIframe">
                                <span class="parentIframe iframeurl"></span>
                            </li>
                            <li class="active" id="parentIfour">
                                <span class="parentIfour iframeurl"></span>
                            </li>
                        </ul>
                    </div>
                    <iframe id="iframe" style="border:0; width:100%; background-color:#FFF;" name="iframe" frameborder="0" src="<?php echo url('home'); ?>"></iframe>
                </div>
            </div>
        </div>
        <!--底部样式-->
        <div class="footer_style" id="footerstyle">
            <p class="l_f">版权所有：</p>
            <p class="r_f">地址：</p>
        </div>
    </body>
</html>
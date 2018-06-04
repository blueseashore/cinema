<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" class="loading">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7"/>
    <meta name="viewport"
          content="width=device-width, initial-scale=0.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"/>
    <meta name="keywords" content=""/>
    <meta name="description" content="最影视">
    <meta name="author" content=""/>
    <link rel="stylesheet" type="text/css" href="<?= $this->config->item('base_assets_url') ?>/css/style.css"/>
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta content="black" name="apple-mobile-web-app-status-bar-style">
    <meta content="telephone=no" name="format-detection">
    <link rel="apple-touch-icon-precomposed" href="<?= $this->config->item('base_assets_url') ?>/images/favicon.ico">
    <script>
        var logined = 0
    </script>
    <title>最影视</title>
</head>
<body>
<script>
    var base_url = '<?=$this->config->item('base_url')?>';
    var now_page = 1, search_value = '<?=isset($search)?$search:''?>';
</script>
<div id="menu">
    <div class="search_wrap">
        <form action="" method="get">
            <input type="text" name="search" class="search_input" placeholder="关键字查找"/>
            <i class="reset_input"></i>
        </form>
    </div>
    <ul>
        <li class="nav_index menu_cur">
            <a href="<?= $this->config->item('base_url') ?>"><i></i>
                <span>首页</span>
                <b></b>
                <div class="clear"></div>
            </a>
        </li>
        <li class="nav_site">
            <a href="/cinema/subcriberlist">
                <i></i>
                <span>我的收藏</span>
                <b></b>
                <div class="clear"></div>
            </a>
        </li>
        <li class="nav_help">
            <a href="/cinema/watched">
                <i></i>
                <span>已看完</span>
                <b></b>
                <div class="clear"></div>
            </a>
        </li>
        <li class="nav_about">
            <a href="/cineme/logout">
                <i></i>
                <span>推出登陆</span>
                <b></b>
                <div class="clear"></div>
            </a>
        </li>
    </ul>
</div>
<div id="user">
    <div class="account">
        <div class="login_b_t">
            <div class="pd10">
                <div class="fl">还没有账号<a id="reg_now" href="" onclick="return false;">立即注册</a></div>
                <div class="fr"><a href="#">忘记密码?</a></div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
    <div class="pd10">
        <form method="post" action="">
            <div class="login_b_i">
                <div class="login_input">
                    <div class="login_user"><input type="text" name="email" placeholder="邮箱/帐号"/><i></i></div>
                    <div class="login_password"><input type="password" name="password" placeholder="密码"/><i></i></div>
                </div>
            </div>
            <a class="login_submit">登录</a>
        </form>
        <div class="login_quick">
            <p>用第三方帐号直接登录</p>
            <a href="#" id="weibo_app"><span><i></i>微博帐号登录</span></a>
            <a href="#" id="qq_connect"><span><i></i>QQ帐号登录</span></a>
        </div>
    </div>
</div>
<div id="header">
    <div class="wrap">
        <i class="menu_open"></i>
        <div class="logo"><a href="http://uckendo.com/" title="模板之家"><img
                        src="<?= $this->config->item('base_assets_url') ?>/css/logo.png"/></a></div>
        <i class="search_open"></i>
    </div>
    <div class="logo_msk"></div>
</div>
<div id="container">
    <div id="sort">
        <table width="100%" border="0" cellspacing="0">
            <tr>
                <td class="sort_left">
                    <div class="sort_cate">
                        <div class="sort_b"><a href="#" onclick="return false;">
                                <div class="sort_b_inner"><i class="cate_default"></i><span>全部</span>
                                    <div class="clear"></div>
                                </div>
                            </a></div>
                    </div>
                </td>
                <td>
                    <div class="sort_sort">
                        <div class="sort_b"><a href="#" onclick="return false;">
                                <div class="sort_b_inner"><i class="cate_sort"></i><span>最新发布</span>
                                    <div class="clear"></div>
                                </div>
                            </a></div>
                    </div>
                </td>
                <td class="sort_right">
                    <div class="sort_tag">
                        <div class="sort_b"><a href="#" onclick="return false;">
                                <div class="sort_b_inner"><i class="cate_tag"></i><span>版权</span>
                                    <div class="clear"></div>
                                </div>
                            </a></div>
                    </div>
                </td>
            </tr>
        </table>
    </div>

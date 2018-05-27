<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" class="loading">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7"/>
    <meta name="viewport"
          content="width=device-width, initial-scale=0.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"/>
    <meta name="keywords" content="<?= $filmInfo['film_name'] ?>"/>
    <meta name="description" content="<?= $filmInfo['film_name'] ?>">
    <meta name="author" content="<?= $filmInfo['film_name'] ?>"/>
    <link rel="stylesheet" type="text/css" href="<?= $this->config->item('base_assets_url') ?>/css/style.css"/>
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta content="black" name="apple-mobile-web-app-status-bar-style">
    <meta content="telephone=no" name="format-detection">
    <link rel="apple-touch-icon-precomposed" href="http://www.17sucai.com/static/images/favicon.ico">
    <script>
        var base_url = '<?=$this->config->item('base_url')?>';
        var logined = 0
    </script>
    <title><?= $filmInfo['film_name'] ?></title>
</head>

<body style="background-color: #ccc">
<div id="menu">
    <ul>
        <li class="nav_index"><a href="<?= $this->config->item('base_url') ?>"><i></i><span>首页</span><b></b>
                <div class="clear"></div>
            </a></li>
        <li class="nav_site"><a href="<?= $this->config->item('base_url') ?>"><i></i><span>设计师</span><b></b>
                <div class="clear"></div>
            </a></li>
        <li class="nav_help"><a href="<?= $this->config->item('base_url') ?>"><i></i><span>帮帮忙</span><b></b>
                <div class="clear"></div>
            </a></li>
        <li class="nav_about"><a href="<?= $this->config->item('base_url') ?>"><i></i><span>关于我们</span><b></b>
                <div class="clear"></div>
            </a></li>
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
            <a href="http://www.17sucai.com/oauth/weibo/login" id="weibo_app"><span><i></i>微博帐号登录</span></a>
            <a href="http://www.17sucai.com/oauth/qq/login" id="qq_connect"><span><i></i>QQ&nbsp;&nbsp;帐号登录</span></a>
        </div>
    </div>
</div>

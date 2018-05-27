<div id="header" class="head">
    <div class="wrap">
        <i class="menu_back"><a href="<?= $this->config->item('base_url') ?>"></a></i>
        <div class="title">
            <span class="title_d"><p>关于我们</p></span>
            <div class="clear"></div>
        </div>
        <i class="menu_share"></i>
    </div>
</div>

<div id="container">

</div>


<div id="us_panel_menu">
    <div class="us_panel_msk"></div>
    <div class="us_panel_menu_t">
        <table width="100%" cellspacing="0">
            <tr>
                <td valign="top" class="us_panel_menu_index">
                    <a href="<?= $this->config->item('base_url') ?>"><i></i><span>首页</span></a>
                </td>
                <td valign="top" class="us_panel_menu_designer">
                    <a href="#"><i></i><span>设计师</span></a>
                </td>
                <td valign="top" class="us_panel_menu_help">
                    <a href="#"><i></i><span>帮帮忙</span></a>
                </td>
                <td valign="top" class="us_panel_menu_about">
                    <a href="#"><i></i><span>关于我们</span></a>
                </td>
            </tr>
        </table>
    </div>
</div>

<div id="us_panel2">
    <table width="100%" height="100%" cellspacing="0" border="0">
        <tr>
            <td class="us_panel_like2"><i></i><span>公众号</span></td>
            <td class="us_panel_menu">
                <div class="arrow_top"></div>
                <i></i>
                <div class="us_panel_menu_left"></div>
                <div class="us_panel_menu_right"></div>
            </td>
            <td class="us_panel_post"><i></i><span>评论(<em>5</em>)</span></td>
        </tr>
    </table>
</div>

<div id="add_newpost">
    <div class="add_newpost">
        <table width="100%" height="100%" cellspacing="5">
            <tr>
                <td class="add_newpost_cancel">取消</td>
                <td class="add_newpost_post">评论</td>
            </tr>
        </table>
    </div>
    <div class="newpost_w">
        <div class="pd10">
            <div class="newpost_w_t">
                <textarea></textarea>
            </div>
        </div>
    </div>
</div>


<div id="share">
    <div class="share_msk"></div>
    <div class="share">
        <table width="100%" cellspacing="10" border="0">
            <tr>
                <td class="sina"><a
                            href="http://service.weibo.com/share/share.php?url=http://www.ke01.com/post/3377/&title=%E7%AE%80%E6%B4%81%E7%BD%91%E9%A1%B5%E5%8D%95%E9%A1%B5(%E5%90%ABPSD%E6%96%87%E4%BB%B6)&pic=http://cdn.ke01.com/201401/1389608264889.jpg&appkey=3206975293"
                            target="_blank"></a></td>
                <td class="guangbo"><a
                            href="http://share.v.t.qq.com/index.php?c=share&a=index&url=http://www.ke01.com/post/3377/&title=%E7%AE%80%E6%B4%81%E7%BD%91%E9%A1%B5%E5%8D%95%E9%A1%B5(%E5%90%ABPSD%E6%96%87%E4%BB%B6)&pic=http://cdn.ke01.com/201401/1389608264889.jpg&appkey=3206975293"
                            target="_blank"></a></td>
                <td class="facebook"><a target="_blank"
                                        href="http://www.facebook.com/sharer.php?u=http://www.ke01.com/post/3377/&t=%E7%AE%80%E6%B4%81%E7%BD%91%E9%A1%B5%E5%8D%95%E9%A1%B5(%E5%90%ABPSD%E6%96%87%E4%BB%B6)&images=http://cdn.ke01.com/201401/1389608264889.jpg"></a>
                </td>
                <td class="twitter"><a target="_blank"
                                       href="http://twitter.com/share?text=%E7%AE%80%E6%B4%81%E7%BD%91%E9%A1%B5%E5%8D%95%E9%A1%B5(%E5%90%ABPSD%E6%96%87%E4%BB%B6)&url=http://www.ke01.com/post/3377/&pic=http://cdn.ke01.com/201401/1389608264889.jpg"></a>
                </td>
            </tr>
        </table>
        <div class="pd10">
            <div class="cancel_share"><a href="" onclick="return false;">取消分享</a></div>
        </div>
    </div>
</div>
<div id="reg_index">
    <div class="reg_bar">
        <div class="wrap">
            <span class="fl"><i></i>注册帐号</span>
            <i class="reg_bar_close fr"></i>
            <div class="clear"></div>
        </div>
    </div>
    <div class="wrap reg_ct">
        <p>您可以选择以下第三方帐号直接登录uehtml<br/>一分钟完成注册</p>
        <a href="http://www.17sucai.com/oauth/weibo/login" id="weibo_app"><span><i></i>微博帐号登录</span></a>
        <a href="http://www.17sucai.com/oauth/qq/login" id="qq_connect"><span><i></i>QQ&nbsp;&nbsp;帐号登录</span></a>
    </div>
</div>
<script language="javascript" src="<?= $this->config->item('base_assets_url') ?>/js/zepto.min.js"></script>
<script language="javascript" src="<?= $this->config->item('base_assets_url') ?>/js/fx.js"></script>
<script language="javascript" src="<?= $this->config->item('base_assets_url') ?>/js/script.js"></script>
<script type="application/javascript">
    $('.article_level').live('click', function () {
        if ($('.article_level_sub').css('display') !== 'none') {
            $('.article_level_sub').hide();
        } else {
            $('.article_level_sub').show();
        }
    });
</script>
</body>
</html>
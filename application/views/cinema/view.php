<div id="header" class="head">
    <div class="wrap">
        <i class="menu_back"><a href="<?= $this->config->item('base_url') ?>"></a></i>
        <div class="title">
            <span class="title_d"><p><?= $filmInfo['film_name'] ?></p></span>
            <div class="clear"></div>
        </div>
        <i class="menu_share"></i>
    </div>
</div>

<div id="container">
    <div id="content">
        <div style="height:1px"></div>
        <div id="hideEpisode"
             style="position:fixed;border: 2px solid #F5F5DC;
              width:80%;height:auto;display: none;background-color:#D3D3D3;margin: 200px 10% 0 10% ;z-index:10">
        </div>
        <div id="works">
            <div class="pd5">
                <div class="list_info_i" style="margin-top:5px;">
                    <dl class="list_info_views">
                        <dt></dt>
                        <dd><?= $filmInfo['film_watched'] ?></dd>
                        <div class="clear"></div>
                    </dl>
                    <dl class="list_info_comment">
                        <dt></dt>
                        <dd><?= $filmInfo['comment_num'] ?></dd>
                        <div class="clear"></div>
                    </dl>
                    <dl class="list_info_like">
                        <dt></dt>
                        <dd><?= $filmInfo['film_sub'] ?></dd>
                        <div class="clear"></div>
                    </dl>
                    <dl class="works_view">
                        <dt></dt>
                        <dd><?= date('Y-m-d', $filmInfo['create_time']) ?></dd>
                        <div class="clear"></div>
                    </dl>
                    <div class="clear"></div>
                </div>
                <div class="article_sub">
                    <table width="100%" border="0" cellspacing="5">
                        <tr>
                            <td rowspan="5"><img src="<?= $filmInfo['film_img'] ?>"/></td>
                            <td>评分：<?= $filmInfo['film_score'] ?></td>
                        </tr>
                        <tr>
                            <td>订阅：<?= $filmInfo['film_sub'] ?></td>
                        </tr>
                        <tr>
                            <td>更新至<?= $filmInfo['now_episode'] ?>集/共<?= $filmInfo['total_episode'] ?>集</td>
                        </tr>
                        <tr>
                            <td>每周<?= $filmInfo['week_up_day'] ?>更新</td>
                        </tr>
                        <tr>
                            <td><span>订阅</span></td>
                        </tr>
                    </table>
                    <div class="more_about">
                        <h4>简介</h4>
                        <div class="more_about">
                            <span><?= $filmInfo['film_intro'] ?></span>
                        </div>
                    </div>
                </div>
                <div class="article_list">
                    <table style="width: 100%;">
                        <th colspan="2">
                            <span style="float: left;">集数</span>
                            <style>
                                /*横条样式*/
                                input[type=range] {
                                    -webkit-appearance: none; /*清除系统默认样式*/
                                    width: 80%;
                                    background: -webkit-linear-gradient(#61bd12, #61bd12) no-repeat, #ddd; /*设置左边颜色为#61bd12，右边颜色为#ddd*/
                                    background-size: 100% 100%; /*设置左右宽度比例*/
                                    height: 10px; /*横条的高度*/
                                }

                                /*拖动块的样式*/
                                input[type=range]::-webkit-slider-thumb {
                                    -webkit-appearance: none; /*清除系统默认样式*/
                                    height: 30px; /*拖动块高度*/
                                    width: 30px; /*拖动块宽度*/
                                    background: #fff; /*拖动块背景*/
                                    border-radius: 50%; /*外观设置为圆形*/
                                    border: solid 1px #ddd; /*设置边框*/
                                }
                            </style>
                            <input type="range" value="1" style="width: 80%;margin: 10px auto;">
                        </th>
                        <?php
                        if ($filmInfo['now_episode'] > 0) {
                            for ($i = $filmInfo['now_episode']; $i > 0; $i--) {
                                ?>
                                <tr>
                                    <td class="episodeView" data-filmId="<?= $filmInfo['film_id'] ?>"
                                        data-episodeNum="<?= $i ?>"><?= $filmInfo['film_name'] . ' ' . $i . ' 集' ?></td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>

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
                    <a href="/cinema/about"><i></i><span>关于我们</span></a>
                </td>
            </tr>
        </table>
    </div>
</div>

<div id="us_panel2">
    <table width="100%" height="100%" cellspacing="0" border="0">
        <tr>
            <td class="us_panel_like"><i></i><span>喜欢(<em><?= $filmInfo['film_sub'] ?></em>)</span></td>
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
<script language="JavaScript">
    $('.episodeView').live('click', function () {
        $.get(
            base_url + 'cinema/get_episode',
            {
                film_id: $(this).attr('data-filmId'),
                episode_num: $(this).attr('data-episodeNum')
            },
            function (data) {
                $('#hideEpisode').html(data);
                $('#hideEpisode').show();
            }
        );
    });
    $('#closeEpisode').live('click', function () {
        $('#hideEpisode').hide();
    });
</script>
</body>
</html>
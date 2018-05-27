<div class="push_msk"></div>
</div>
<div id="sort_content">
    <div class="asort">
        <div class="hd">
            <div class="wrap">
                <div class="fl"><span>选择类型</span>
                    <div class="clear"></div>
                </div>
                <div class="fr"></div>
                <div class="clear"></div>
            </div>
        </div>
        <?php
        $menu = [
            [
                'name' => '电视剧',
                'id' => '0-1',
                'list' => [
                    '韩剧' => '4-1',
                    '美剧' => '6-1',
                    '港剧' => '2-1',
                    '台剧' => '3-1',
                    '泰剧' => '8-1',
                    '日剧' => '5-1',
                    '英剧' => '7-1',
                ]
            ],
            [
                'name' => '综艺',
                'id' => '0-4',
                'list' => [
                    '韩国综艺' => '4-4',
                ]
            ], [
                'name' => '动漫',
                'id' => '0-3',
                'list' => [
                    '日漫' => '5-3',
                    '国漫' => '1-3'
                ]
            ]
        ];
        ?>
        <div class="ct">
            <div class="wrap">
                <ul class="choose_cate">
                    <?php
                    foreach ($menu as $item) {
                        ?>
                        <li style="font-weight:700;" c_data="<?= $item['id'] ?>" style="background:#f7f7f7;">
                            <i style="margin-right:0;background:none;width:0;" class="s"></i>
                            <span><?= $item['name'] ?></span>
                            <i class="e"></i>
                        </li>
                        <?php
                        if (!empty($item['list'])) {
                            foreach ($item['list'] as $cdata_name => $cdata_id) {
                                ?>
                                <li c_data="<?= $cdata_id ?>">
                                    <i style="background:none;width:10px;margin-right:0;" class="s"></i>
                                    <span><?= $cdata_name ?></span>
                                    <i class="e"></i>
                                </li>
                                <?php
                            }
                        }
                        ?>
                        <?php
                    }
                    ?>
                </ul>
                <div class="clear"></div>
            </div>
        </div>
    </div>

    <div class="asort">
        <div class="hd">
            <div class="wrap">
                <div class="fl"><span>选择排序</span>
                    <div class="clear"></div>
                </div>
                <div class="fr"></div>
                <div class="clear"></div>
            </div>
        </div>
        <div class="ct">
            <div class="wrap">
                <ul class="choose_sort">
                    <li class="a_selected" s_data="rec"><i class="s"></i><span>最新推荐</span><i class="e"></i></li>
                    <li s_data="like"><i class="s"></i><span>最多喜欢</span><i class="e"></i></li>
                    <li s_data="view"><i class="s"></i><span>最多浏览</span><i class="e"></i></li>
                    <li s_data="comment"><i class="s"></i><span>最多评论</span><i class="e"></i></li>
                    <li s_data="laster"><i class="s"></i><span>最新发布</span><i class="e"></i></li>
                </ul>
                <div class="clear"></div>
            </div>
        </div>
    </div>

    <div class="asort">
        <div class="hd">
            <div class="wrap">
                <div class="fl"><i></i><span>版权</span>
                    <div class="clear"></div>
                </div>
                <div class="fr"></div>
                <div class="clear"></div>
            </div>
        </div>
        <div class="ct">
            <div class="wrap">
                <!--<h4 class="cate_trade"><i></i><span>行业</span></h4>-->
                <ul>
                    <li t_data=""><i></i><span>所有者</span><i class="e"></i></li>
                    <li t_data="1"><i></i><span>原创</span><i class="e"></i></li>
                    <li t_data="2"><i></i><span>转载</span><i class="e"></i></li>
                </ul>
                <div class="clear"></div>
            </div>
        </div>
    </div>

</div>

<div id="newwrap_t" class="newwrap">
    <div class="newwrap_msk"></div>
    <iframe id="newwrap" frameborder="0" width="100%" height="100%"></iframe>
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
        <a href="#" id="weibo_app"><span><i></i>微博帐号登录</span></a>
        <a href="#" id="qq_connect"><span><i></i>QQ&nbsp;&nbsp;帐号登录</span></a>
    </div>
</div>
<div class="loading_dark"></div>
<div id="loading_mask">
    <div class="loading_mask">
        <ul class="anm">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
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
    $(window).scroll(function () {
        var scrollPos = $(window).scrollTop();
        console.log(scrollPos);
    });
</script>
</body>
</html>
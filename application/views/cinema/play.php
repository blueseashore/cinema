<div id="content">
    <div id="list">
        <ul>
            <?php
            for ($i = 1; $i < 10; $i++) {
                ?>
                <li>
                    <div class="wrap">
                        <a class="alist" vhref="detail.html">
                            <div class="list_litpic fl"><img
                                        src="<?= $this->config->item('base_assets_url') ?>/images/1421841277109.jpg"/>
                            </div>
                            <div class="list_info">
                                <h4>UEMO用户图片排序问题</h4>
                                <h5>by<span>经验分享</span><em>(其他)</em></h5>
                                <div class="list_info_i">
                                    <dl class="list_info_views">
                                        <dt></dt>
                                        <dd>6907</dd>
                                        <div class="clear"></div>
                                    </dl>
                                    <dl class="list_info_comment">
                                        <dt></dt>
                                        <dd>5</dd>
                                        <div class="clear"></div>
                                    </dl>
                                    <dl class="list_info_like">
                                        <dt></dt>
                                        <dd>8</dd>
                                        <div class="clear"></div>
                                    </dl>
                                    <div class="clear"></div>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </a>
                    </div>
                </li>
            <?php } ?>
        </ul>
        <div class="list_loading"><i></i><span>努力加载中...</span></div>
    </div>
</div>
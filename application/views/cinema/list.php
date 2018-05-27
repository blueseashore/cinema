<script>
    var base_url = '<?=$this->config->item('base_url')?>';
    var now_page = 1, search_value = '<?=$search?>';
</script>
<div id="content">
    <div id="list">
        <ul>
            <?php
            foreach ($filmList as $item) {
                if ($item['type_id'] == 1 and $item['area_id'] == 4) {
                    $item['film_img'] = $this->config->item('base_url') . $item['film_img'];
                }
                ?>
                <li>
                    <div class="wrap">
                        <a class="alist" vhref="/cinema/view?filmId=<?= $item['film_id'] ?>">
                            <div class="list_litpic fl"><img
                                        src="<?= $item['film_img'] ?>"/>
                            </div>
                            <div class="list_info">
                                <h4><?= $item['film_name'] ?></h4>
                                <h5><?= mb_substr($item['film_intro'], 0, 24) ?></h5>
                                <div class="list_info_i">
                                    <dl class="list_info_views">
                                        <dt></dt>
                                        <dd><?= $item['film_watched'] ?></dd>
                                        <div class="clear"></div>
                                    </dl>
                                    <dl class="list_info_comment">
                                        <dt></dt>
                                        <dd><?= $item['comment_num'] ?></dd>
                                        <div class="clear"></div>
                                    </dl>
                                    <dl class="list_info_like">
                                        <dt></dt>
                                        <dd><?= $item['film_sub'] ?></dd>
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
        <?php
        if (isset($search) && empty($filmList)) {
        ?>
        <div class="list_loading"><i></i><span><?= empty($filmList) ? '暂无' . $search . '影片信息' : '努力加载中...' ?></span>
            <?php
            } elseif (count($filmList) > 10) {
                echo '<div class="list_loading"><i></i><span>努力加载中...</span></div>';
            }
            ?>

        </div>
    </div>
</div>
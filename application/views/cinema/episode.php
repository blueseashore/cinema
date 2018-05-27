<div class="hd" style="height: 0px;">
    <div class="fr" style="margin-top: -30px;" id="closeEpisode"></div>
</div>
<div class="ct" style="height: 300px;margin: 5px 5px;">
    <div class="wrap">
        <ul class="choose_sort">
            <?php
            $move_site = [
                1 => [
                    '劲爆网络',
                    'https://kan.jinbaozy.com/'
                ],
                2 => [
                    '热播网',
                    'https://www.y3600.com/'
                ],
            ];
            foreach ($list as $item) {
                ?>
                <li s_data="like">
                    <i class="s"></i>
                    <a href="<?= $move_site[$item['web_id']][1] . $item['film_uri'] ?>">
                        <span style="font-size: <?= strlen($item['episode_name']) > 10 ? 14 : 18 ?>px;color: black;"><?= $move_site[$item['web_id']][0] ?>
                            --<?= $item['episode_name'] ?></span>
                    </a>
                </li>

                <?php
            }
            ?>
        </ul>
    </div>
</div>
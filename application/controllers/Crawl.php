<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crawl extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('cinema/resource_model');
        $this->load->model('cinema/episode_model');
    }

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *        http://example.com/index.php/welcome
     *    - or -
     *        http://example.com/index.php/welcome/index
     *    - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index()
    {
        $arr = [
            'https://kan.jinbaozy.com/vodtypehtml/1?.html' => ['国产动漫', 1, 3], //
            'https://kan.jinbaozy.com/vodtypehtml/2?.html' => ['日欧动漫', 0, 3], //
            'https://kan.jinbaozy.com/vodtypehtml/3?.html' => ['美剧', 6, 1],
            'https://kan.jinbaozy.com/vodtypehtml/4?.html' => ['热播综艺', 0, 4],
        ];
        $time = time();
//        $this->db->query('truncate table ci_film_resource');
        foreach ($arr as $base_url => $desc) {
            for ($i = 1; $i < 20; $i++) {
                if ($i == 1) {
                    $link = '';
                } else {
                    $link = '-' . $i;
                }
                $uri = str_replace('?', $link, $base_url);
                echo $uri, PHP_EOL;
                $content = file_get_contents($uri);
                if (strlen($content) < 500) {
                    break;
                }
                $pattern = '/<div class="img"><ul>[\s\S]*?<\/ul><\/div>/';
                preg_match($pattern, $content, $a);
                preg_match_all('/<li>[\s\S]*?<\/li>/', $a[0], $b);
                $imgPattern = '/src="([\s\S])*?"/';
                $titlePattern = '/<p([\s\S])*?<\/p>/';
                $herfPattern = '/href="([\s\S])*?"/';
                foreach ($b[0] as $item) {
                    preg_match($herfPattern, $item, $c);
                    $film_url = substr($c[0], 6, -1);
                    preg_match($titlePattern, $item, $d);
                    preg_match('/<a([\s\S])*?>([\s\S])*?<\/a>/', $d[0], $f);
                    preg_match('/>([\s\S])*?</', $f[0], $g);
                    $film_name = substr($g[0], 1, -1);
                    preg_match($imgPattern, $item, $e);
                    $film_img = substr($e[0], 5, -1);
                    $data = [
                        'web_id' => 1,
                        'film_name' => $film_name,
                        'nick_name' => '',
                        'film_img' => $film_img,
                        'film_intro' => '',
                        'film_url' => $film_url,
                        'area_id' => $desc[1],
                        'type_id' => $desc[2],
                        'resource_desc' => trim($desc[0]),
                        'create_time' => $time,
                    ];
                    $this->resource_model->save_resource($data);
                }
            }
        }
    }

    /**
     * 抓去详情页；
     */
    public function view()
    {
//        $list = $this->db->query('select * from ci_film_resource');
        $where = ['film_status' => 1, 'web_id' => 1];
        if (!empty($this->input->get('now_episode'))) {
            $where['now_episode'] = 0;
        }
        $list = $this->db->get_where('ci_film_resource', $where)->result_array();
        $webInfo = $this->db->get_where('ci_film_web', ['id' => 1])->row_array();
        $time = time();
        foreach ($list as $clist) {
            $url = $webInfo['web_site'] . $clist['film_url'];
            $content = file_get_contents($url);
            $pattern = '/<div class="jieshao_down"><span([\s\S]*?)>([\s\S]*?)<\/span>/';
            preg_match($pattern, $content, $a);
            $resource = [
                'id' => $clist['id'],
                'film_intro' => trim(str_replace([' ', "\n", "\r"], '', $a[2])),
                'update_time' => $time,
            ];
            $this->resource_model->save_resource($resource);
            $pattern = '/<div class="playlist1">[\n]?([\s\S]*?)<\/div>/';
            preg_match($pattern, $content, $a);
            preg_match_all('/<li>[\n]?([\s\S]*?)<\/li>/', $a[0], $b);
            $titlePattern = '/<a([\s\S])*?>([\s\S]*?)<\/a>/';
            $herfPattern = '/href="([\s\S])*?"/';
            foreach ($b[1] as $item) {
                preg_match($herfPattern, $item, $c);
                $episode_info = explode('-', $c[0]);
                $episode_num = explode('.', $episode_info[count($episode_info) - 1])[0];
                preg_match($titlePattern, $item, $d);
                preg_match('/<a([\s\S])*?>([\s\S])*?<\/a>/', $d[0], $f);
                preg_match('/>([\s\S])*?</', $f[0], $g);
                $episode = [
                    'web_id' => $clist['web_id'],
                    'resource_id' => $clist['id'],
                    'episode_name' => substr($g[0], 1, -1),
                    'episode_num' => $episode_num,
                    'film_uri' => substr($c[0], 6, -1),
                    'create_time' => $time,
                ];
                $this->episode_model->save_episode($episode);
            }
            //计算该电影的集数
            $this->db->update('ci_film_resource', ['now_episode' => count($b[1])], ['id' => $clist['id']]);
        }
    }

    public function relation()
    {
        /**
         * 插入影片
         * insert into ci_film (film_name,film_alias_name,film_tags,film_img,film_intro,type_id,area_id,
         * week_up_day,total_episode,film_starring,now_episode,create_time) select film_name,film_name,
         * film_name,film_img,film_intro,type_id,area_id,week_up_day,total_episode,'',now_episode,create_time
         * from ci_film_resource;
         */
        /**
         * 更新资源film id
         * update ci_film_resource r, ci_film f set r.film_id = f.film_id where r.film_name=f.film_name
         */
        /**
         * 更新影片信息
         * update ci_film_resource r, ci_film f set f.total_episode = r.total_episode,f.week_up_day=r.week_up_day,f.now_episode=r.now_episode where r.film_name=f.film_name
         */

    }

    /**
     * 热播网
     * @throws Exception
     */
    public function rebowang()
    {
        $base = '';
        $url = 'https://www.y3600.com/hanju/';
        $content = file_get_contents($url);
//        $content = file_get_contents('/Users/kendo/Desktop/index.html');
        $pattern = '/<A class="img playico" href="([\s\S]*?)" target=([\s\S]*?) title="([\s\S]*?)"><IMG src="([\s\S]*?)"/';
        preg_match_all($pattern, $content, $filmInfo);
        if (!empty($filmInfo)) {
            $time = time();
            foreach ($filmInfo[1] as $key => $item) {
                $patternName = '/《([\s\S]*?)》/';
                preg_match($patternName, $filmInfo[3][$key], $nameInfo);
                $data = [
                    'web_id' => 2,
                    'film_name' => $nameInfo[1],
                    'film_intro' => $filmInfo[3][$key],
                    'film_img' => $filmInfo[4][$key],
                    'film_url' => $item,
                    'create_time' => $time
                ];
                $imgPath = '/assets/images/rebowang/' . md5($data['film_name']) . '.jpg';
                file_put_contents('./' . $imgPath, file_get_contents('https:' . $data['film_img']));
                $data['film_img'] = $imgPath;
                $this->resource_model->save_resource($data);
            }
        }
    }

    public function reboview()
    {
        $url = 'https://www.y3600.com/';
        $where = ['film_status' => 1, 'web_id' => 2];
        $list = $this->db->get_where('ci_film_resource', $where)->result_array();
        $time = time();
        foreach ($list as $item) {
            $content = file_get_contents($url . $item['film_url']);
            $subPattern = '/<ul class="intro">([\s\S]*?)<\/ul>/';
            preg_match($subPattern, $content, $subInfo);
            $sub = str_replace(['<BR>', '<h1>', '</h1>'], [''], $subInfo[1]);
            $subList = explode(chr(10), $sub);
            if (count($subList) < 7) {
                $sub = str_replace(['<h1>', '</h1>'], [''], $subInfo[1]);
                $subList = explode('<BR>', $sub);
                array_unshift($subList, '');
                array_unshift($subList, '');
                $nameList = explode(chr(10), $subList[2]);
                $subList[1] = $nameList[0];
                $subList[2] = $nameList[1];
            }
            preg_match_all('/\d+/', $subList[1], $now_episode);
            if (count($now_episode[0]) == 3) {
                $now_episode[0] = 1;
            } else {
                $now_episode[0] = $now_episode[0][0];
            }
            $filmStarring = substr($subList[5], strpos($subList[5], '】') + 3, strlen($subList[5]));
            $firstTimeStr = substr($subList[7], strpos($subList[7], '】') + 3, strlen($subList[7]));
            $timePattern = '/\d+/';
            preg_match_all($timePattern, $firstTimeStr, $timeInfo);
            $timeInfo = $timeInfo[0];

            $year = $timeInfo[0];
            if (!isset($timeInfo[1][1])) {
                $month = '0' . $timeInfo[1];
            } else {
                $month = $timeInfo[1];
            }
            if (!isset($timeInfo[2][1])) {
                $day = '0' . $timeInfo[2];
            } else {
                $day = $timeInfo[2];
            }
            $firstTime = $year . '-' . $month . '-' . $day;
            $weekUpInfo = substr($subList[8], strpos($subList[8], '】') + 3, strlen($subList[8]));
            $data = [
                'id' => $item['id'],
                'release_time' => strtotime($firstTime),
                'now_episode' => $now_episode[0],
                'film_starring' => $filmStarring,
                'week_up_info' => $weekUpInfo,
                'update_time' => $time,
            ];
            $this->resource_model->save_resource($data);
            for ($i = $data['now_episode']; $i > 0; $i--) {
                $episode = [
                    'web_id' => $item['web_id'],
                    'resource_id' => $item['id'],
                    'episode_name' => str_replace($now_episode[0], $i, $subList[1]),
                    'episode_num' => $i,
                    'film_uri' => $item['film_url'],
                    'create_time' => $time,
                ];
                $this->episode_model->save_episode($episode);
            }
        }

    }
}

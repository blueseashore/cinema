<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller
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
            'https://kan.jinbaozy.com/vodtypehtml/1.html' => ['国产动漫', 1, 3], //
            'https://kan.jinbaozy.com/vodtypehtml/2.html' => ['日欧动漫', 0, 3], //
            'https://kan.jinbaozy.com/vodtypehtml/3.html' => ['美剧', 6, 1],
            'https://kan.jinbaozy.com/vodtypehtml/4.html' => ['热播综艺', 0, 4],
        ];
        $time = time();
        $this->db->query('truncate table  ci_film_resource');
        foreach ($arr as $base_url => $desc) {
            for ($i = 1; $i < 100; $i++) {
                if ($i == 1) {
                    $link = '';
                } else {
                    $link = '-' . $i;
                }
                $uri = str_replace('?', $link, $base_url);
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
                        'film_sub' => '',
                        'film_url' => $film_url,
                        'area_id' => $desc[1],
                        'type_id' => $desc[2],
                        'resource_desc' => $desc[0],
                        'create_time' => $time,
                    ];
                    $this->resource_model->save_resource($data);
                }
            }
        }
    }

    /**
     *
     */
    public function view()
    {

        $url = 'https://kan.jinbaozy.com/vodhtml/700.html';
        $content = file_get_contents($url);
        $url = 'https://kan.jinbaozy.com/m';
//        $content = str_replace(["\r","\n"],'',$content);
//        $content = preg_replace("/\r\n/",'',$content);
        $pattern = '/<p><label>简介：<\/label>([\s\S]*?)<\/p>/';
        preg_match($pattern, $content, $a);
        echo '描述:', $a['1'], PHP_EOL;
        $pattern = '/<div class="movurl2">[\n]?([\s\S]*?)<div class="blank5">/';
        preg_match($pattern, $content, $a);
        preg_match_all('/<li>[\n]?([\s\S]*?)<\/li>/', $a[0], $b);
        $titlePattern = '/<a([\s\S])*?>([\s\S]*?)<\/a>/';
        $herfPattern = '/href="([\s\S])*?"/';
        foreach ($b[1] as $item) {
            preg_match($herfPattern, $item, $c);
            echo '地址:' . $url, substr($c[0], 6, -1), PHP_EOL;
            $list = explode('-', $c[0]);
            $list = explode('.', $list[count($list) - 1]);
            preg_match($titlePattern, $item, $d);
            preg_match('/<a([\s\S])*?>([\s\S])*?<\/a>/', $d[0], $f);
            preg_match('/>([\s\S])*?</', $f[0], $g);
            echo '标题:', substr($g[0], 1, -1), PHP_EOL;
            echo '<hr>';
        }
    }

    public function home(){
        for ($i = 1; $i <= 4; $i++) {
            echo "<img src='./assets/images/{$i}.jpg'>";
        }
    }
}

<?php
/**
 * 影院模块
 * User: kendo    Date: 2018/5/7
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Cinema extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('cinema/film_model');
        $this->load->model('cinema/episode_model');
    }

    /**
     * @name 影院首页
     */
    public function index()
    {
        $param['search'] = $this->input->get('search');
        $data['search'] = $param['search'];
        $data['filmList'] = $this->film_model->queryFilm($param);
        $this->load->view('layout/header');
        $this->load->view('cinema/list', $data);
        $this->load->view('layout/footer');
    }

    public function list()
    {
        $param['search'] = $this->input->get('search');
        $param['page'] = $this->input->get('page');
        $param['fid'] = $this->input->get('fid');
        $data['filmList'] = $this->film_model->queryFilm($param);
        $data['search'] = $param['search'];
        echo $this->load->view('cinema/list', $data, TRUE);
    }

    public function view()
    {
        if (empty($this->input->get('filmId'))) {
            $this->load->helper('url');
            redirect('/');
        }
        $data['filmInfo'] = $this->film_model->get($this->input->get('filmId'));
        $this->load->view('layout/header_2', $data);
        $this->load->view('cinema/view', $data);
//        $this->load->view('layout/footer');
    }

    public function play()
    {
        $this->load->view('layout/header');
        $this->load->view('cinema/play');
        $this->load->view('layout/footer');
    }

    public function subcriberlist()
    {
        $this->load->view('layout/header_1');
        $this->load->view('cinema/subcriberlist');
        $this->load->view('layout/footer');
    }

    public function watched()
    {
        $this->load->view('layout/header_1');
        $this->load->view('cinema/watched');
        $this->load->view('layout/footer');
    }

    public function get_episode()
    {
        $param['film_id'] = $this->input->get('film_id');
        $param['episode_num'] = $this->input->get('episode_num');
        $data['list'] = $this->episode_model->get($param);
        echo $this->load->view('cinema/episode', $data, TRUE);
    }

    public function about()
    {
        $data['filmInfo']['film_name'] = '关于我们';
        $this->load->view('layout/header_2', $data);
        $this->load->view('cinema/about');
    }
}
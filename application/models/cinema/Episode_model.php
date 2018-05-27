<?php

/**
 * User: kendo    Date: 2018/5/17
 */
class Episode_model extends CI_Model
{
    private $_table = 'ci_film_episode';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function save_episode(array $param)
    {
        $where = $param;
        unset($where['create_time']);
        $episodeInfo = $this->db->get_where('ci_film_episode', $where)->row_array();
        if (!empty($episodeInfo)) {
            return $this->db->update('ci_film_episode',['update_time'=>$param['create_time']],['id'=>$episodeInfo['id']]);
        } else {
            if ($this->db->insert($this->_table, $param)) {
                return $this->db->insert_id();
            } else {
                throw new Exception($this->db->error());
            }
        }
    }

    public function get(array $param)
    {
        $this->db->where('f.film_id', $param['film_id']);
        if (!empty($param['episode_num'])) {
            $this->db->where('e.episode_num', intval($param['episode_num']));
        }
        $this->db->from($this->_table . ' e');
        $this->db->join('ci_film_resource f', 'e.resource_id = f.id');
        return $this->db->get()->result_array();
    }
}
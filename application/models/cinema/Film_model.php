<?php

/**
 * User: kendo    Date: 2018/5/17
 */
class Film_model extends CI_Model
{
    private $_table = 'ci_film';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function queryFilm(array $param)
    {
        if (!empty($param['fid'])) {
            $fid_info = explode('-', $param['fid']);
            $this->db->where('area_id', $fid_info[0]);
            $this->db->where('type_id', $fid_info[1]);
        } else {
            $this->db->where('area_id', 6);
            $this->db->where('type_id', 1);
        }
        $this->db->order_by('update_time', 'DESC');
        if (!empty($param['search'])) {
            $this->db->like('film_name', trim(addslashes($param['search'])));
            $this->db->or_like('film_alias_name', trim(addslashes($param['search'])));
        }
        if (empty($param['page'])) {
            $param['page'] = 1;
        }
        if (empty($param['limit'])) {
            $param['limit'] = 10;
        }
        $this->db->limit(intval($param['limit']), (intval($param['page']) - 1) * intval($param['limit']));
        return $this->db->get($this->_table)->result_array();
    }

    public function get($filmId = 0)
    {
        return $this->db->get_where($this->_table, ['film_id' => $filmId])->row_array();
    }
}
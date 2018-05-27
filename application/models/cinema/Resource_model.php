<?php

/**
 * User: kendo    Date: 2018/5/17
 */
class Resource_model extends CI_Model
{
    private $_table = 'ci_film_resource';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function save_resource(array $param)
    {
        if (!empty($param['id'])) {
            $this->db->update($this->_table, $param, ['id' => $param['id']]);
        } else {
            $where = ['web_id' => $param['web_id'], 'film_name' => $param['film_name']];
            $data = $this->db->get_where($this->_table, $where)->row_array();
            if (!empty($data)) {
                $param['update_time'] = $param['create_time'];
                unset($param['create_time']);
                $this->db->update($this->_table, $param, ['id' => $data['id']]);
            } else {
                if ($this->db->insert($this->_table, $param)) {
                    return $this->db->insert_id();
                } else {
                    throw new Exception($this->db->error());
                }
            }
        }
    }
}
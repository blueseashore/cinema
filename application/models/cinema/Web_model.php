<?php

/**
 * User: kendo    Date: 2018/5/24
 */
class Web_model extends CI_Model
{
    private $_table = 'ci_film_web';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function queryWeb(array $param)

    {
        $data = [];
        $info = $this->db->get_where($this->_table, $param)->result_array();
        foreach ($info as $item) {
            $data[$item['id']] = $item;
        }
        return $data;
    }
}
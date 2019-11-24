<?php

class Dashboard_model extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function dashboardList()
    {
        return $this->db->selectAll('SELECT * FROM data');
    }

    public function dashboardSingleList($id)
    {
        return $this->db->selectOne('SELECT * FROM data WHERE creator = :creator AND id = :id',
                array('creator' => $_SESSION['data']['login'], 'id' => $id));
    }

    public function create($data)
    {
        $insert = $this->db->insert('data',
            array(
                'creator' => $_SESSION['data']['login'],
                'title' => $data['title'],
                'text' => $data['text'],
                'datetime' => date("y/m/d h:i:s")
        ));
        return $insert;
    }

    public function edit_save_data($data)
    {
        $result = $this->db->update('data', $data,
            "`id` = '{$data['id']}' AND creator = '{$_SESSION['data']['login']}'");
            return $result;
    }

    function delete($id)
    {
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql    = "DELETE FROM data WHERE id = $id";
        $q      = $this->db->prepare($sql);
        $result = $q->execute(array($id));
        return $result;
    }
}

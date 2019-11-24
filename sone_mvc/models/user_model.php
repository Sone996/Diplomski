<?php

class User_model extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function userList()
    {
        return $this->db->select('SELECT id, login, role FROM users');
    }

    public function userSingleList($id)
    {
        $result = $this->db->select('SELECT id, login, role FROM users WHERE id = :id',
            array(':id' => $id));
        return $result;
    }

    public function createUser($data)
    {
        $res =$this->db->insert('users',
            array(
                'login' => $data['login'],
                'password' => Hash::create('sha512', $data['password'],
                    HASH_PASSWORD_KEY),
                'role' => $data['role']
        ));
        return $res;
    }

    public function deleteUser($id)
    {
        $result = $this->db->select("SELECT role FROM users WHERE id = :id",
            array(':id' => $id));
        $result = reset($result);
        if ($result['role'] == 'owner') {
            return false;
        } else {
            $res = $this->db->delete('users', "id = $id");
            return $res;
        }
    }

    public function editSave($data)
    {
        $post_data = array(
            'login' => $data['login'],
            'password' => Hash::create('sha512', $data['password'],
                HASH_PASSWORD_KEY),
            'role' => $data['role']
        );
        $this->db->update('users', $post_data, "`id`={$data['id']}");
    }
}

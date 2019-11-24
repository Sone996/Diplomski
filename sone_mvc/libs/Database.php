<?php

class My_database extends PDO
{

    public function __construct() {
        $dns = 'mysql:host=localhost;dbname=MVC;charset=utf8';
        $uname = 'root';
        $pass = 'Nebojsa.Ilic1996';                              //ne znam da li je prazan ili root
        parent::__construct($dns, $uname, $pass);
    }

    public function select($sql, $array = array(),
            $fetch_mode = PDO::FETCH_ASSOC) {
        $sth = $this->prepare($sql);
        foreach ($array as $key => $value) {
            $sth->bindValue("$key", $value);
        }
        $sth->execute();
        return $sth->fetchAll($fetch_mode);
    }

    public function insert($table, $data) {
        ksort($data);  //sort by key
        $field_names = implode('`,`', array_keys($data));
        $field_values = ':' . implode(', :', array_keys($data));
        $sth = $this->prepare("INSERT INTO $table (`$field_names`) VALUES ($field_values)");
        foreach ($data as $key => $value) {
            $sth->bindValue(":$key", $value);
        }
        $sth->execute();
    }

    public function update($table, $data, $where) {
        ksort($data);  //sort by key
        $field_details = null;
        foreach ($data as $key => $value) {
            $field_details .= "`$key`=:$key,";
        }
        $field_details = rtrim($field_details, ',');
        $sth = $this->prepare("UPDATE $table SET $field_details WHERE $where");
        foreach ($data as $key => $value) {
            $sth->bindValue(":$key", $value);
        }
        $sth->execute();
    }

    public function delete($table, $where, $limit = 1) {
        return $this->exec("DELETE FROM $table WHERE $where LIMIT $limit");
    }

    public function selectAll($sql, $array = array(),
            $fetchMode = PDO::FETCH_ASSOC) {
        $sth = $this->prepare($sql);
        foreach ($array as $key => $value) {
            $sth->bindValue("$key", $value);
        }

        $sth->execute();
        return $sth->fetchAll($fetchMode);
    }

    public function selectOne($sql, $array = array(),
            $fetchMode = PDO::FETCH_ASSOC) {
        $sth = $this->prepare($sql);
        foreach ($array as $key => $value) {
            $sth->bindValue("$key", $value);
        }

        $sth->execute();
        return $sth->fetch($fetchMode);
    }

}

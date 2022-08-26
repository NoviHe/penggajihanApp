<?php
class UserModel extends Model
{
    public function __construct()
    {
        $this->connect();
        $this->_table = "user";
    }

    public function showAll($param = '')
    {
        $query = $this->selectAll('id_user', $param);
        $data = $this->getResult($query);
        return $data;
    }

    public function CustomQuery($sql)
    {
        $query = $this->query($sql);
        $data = $this->getResult($query);
        return $data;
    }

    public function showWhere($array)
    {
        $query = $this->selectWhere($array);
        $data = $this->getResult($query);
        return $data;
    }

    public function getRow()
    {
        $query = $this->selectAll();
        $data = $this->getRows($query);
        return $data;
    }

    public function insert($data)
    {
        $query = parent::insert($data);
        return $query;
    }

    public function show($id)
    {
        $query = $this->selectWhere(array('id_user' => $id));
        $data = $this->getResult($query);
        return $data;
    }

    public function update($data, $id = "")
    {
        $query = parent::update($data, array('id_user' => $id));
        return $query;
    }

    public function delete($id = "")
    {
        $query = parent::delete(array('id_user' => $id));
        return $query;
    }

    //validasi

    public function validasiUsername($data)
    {
        $query = $this->selectWhere(array('username' => $data));
        // $data = $this->getResult($query);
        $data = $this->getRows($query);
        return $data;
    }
}

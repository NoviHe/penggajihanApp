<?php
class AdminModel extends Model
{
    public function __construct()
    {
        $this->connect();
        $this->_table = "super_admin";
    }

    public function showAll()
    {
        $query = $this->selectAll();
        $data = $this->getResult($query);
        return $data;
    }

    public function update($data, $id = "")
    {
        $query = parent::update($data, array('id' => $id));
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

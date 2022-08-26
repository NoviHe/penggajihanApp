<?php
class KaryawanModel extends Model
{
    public function __construct()
    {
        $this->connect();
        $this->_table = "karyawan";
    }

    public function showAll($param = '')
    {
        $query = $this->selectAll('id_user', $param);
        $data = $this->getResult($query);
        return $data;
    }

    public function showJoinKaryawan()
    {
        $query = $this->query("SELECT karyawan.*,user.*,jabatan.* FROM karyawan 
        INNER JOIN user ON karyawan.user_id=user.id_user
        INNER JOIN jabatan ON karyawan.jabatan_id=jabatan.id_jabatan
        ORDER BY karyawan.id_karyawan ASC");
        $data = $this->getResult($query);
        return $data;
    }

    public function showJoin($array = '')
    {
        $query = $this->selectJoin(array('user'), "INNER JOIN", array('karyawan.user_id' => 'user.id_user'), $array, 'id_karyawan', 'DESC');
        $data = $this->getResult($query);
        return $data;
    }

    public function joinWhere($array = '')
    {
        $query = $this->selectJoin(array('jabatan'), "INNER JOIN", array('karyawan.jabatan_id' => 'jabatan.id_jabatan'), $array, 'id_karyawan', 'DESC');
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

    public function getRowWhere($array)
    {
        $query = $this->selectWhere($array);
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
        $query = $this->selectWhere(array('id_karyawan' => $id));
        $data = $this->getResult($query);
        return $data;
    }

    public function update($data, $id = "")
    {
        $query = parent::update($data, array('id_karyawan' => $id));
        return $query;
    }

    public function delete($id = "")
    {
        $query = parent::delete(array('id_karyawan' => $id));
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

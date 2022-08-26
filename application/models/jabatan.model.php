<?php
class JabatanModel extends Model
{
    public function __construct()
    {
        $this->connect();
        $this->_table = "jabatan";
    }

    public function showAll($param = '')
    {
        $query = $this->selectAll('id_jabatan', $param);
        $data = $this->getResult($query);
        return $data;
    }

    public function CustomQuery($sql)
    {
        $query = $this->query($sql);
        $data = $this->getResult($query);
        return $data;
    }

    public function showJoin()
    {
        $query = $this->selectJoin(array('user'), "INNER JOIN", array('jabatan.user_id' => 'user.id_user'), '', 'id_jabatan', 'DESC');
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
        $query = $this->selectWhere(array('id_jabatan' => $id));
        $data = $this->getResult($query);
        return $data;
    }

    public function update($data, $id = "")
    {
        $query = parent::update($data, array('id_jabatan' => $id));
        return $query;
    }

    public function delete($id = "")
    {
        $query = parent::delete(array('id_jabatan' => $id));
        return $query;
    }
}

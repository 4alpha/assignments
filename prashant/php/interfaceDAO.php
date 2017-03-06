<?php
interface  DAO {
    public function get($pri_key);
    public function getAll();
    public function add($obj);
    public function update($obj);
    public function delete($pri_key);
}
?>
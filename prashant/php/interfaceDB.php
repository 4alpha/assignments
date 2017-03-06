<?php
interface DB {
    public function insert($query);
    public function delete($query);
    public function update($query);
    public function getAll($query);
    public function get($query);
}
?>
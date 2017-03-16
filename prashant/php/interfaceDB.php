<?php
interface DB {
    public function get($query);
    public function getAll($query);
    public function insert($query);
    public function update($query);
    public function delete($query);
}
?>
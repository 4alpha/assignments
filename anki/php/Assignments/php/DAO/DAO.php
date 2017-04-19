<?php
namespace DAO;
interface DAO {
  function add($obj);
  function update($obj);
  function delete($obj);
  function getAll();
}
?>

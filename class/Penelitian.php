<?php
require_once 'DAO.php';

class Penelitian
{
  private $dbh;
  private $tblName = "penelitian";

  public function __construct() {
    $this->dbh = DAO::getInstance();
  }

  public function getALL() {
    $sql= "select * from ".$this->tblName;
    $rs = $this->dbh->query($sql);
    return $rs;
  }

  public function simpan($data) {
    $sql = "insert into ".$this->tblName." (semester,judul,deskripsi,sks,rencana_publikasi,nidn) values (?,?,?,?,?,?)";
    $st = $this->dbh->prepare($sql);
    $st->execute($data);
    return $st->rowCount();
  }

  public function update($data) {
    $sql = "update penelitian set namamk = ?, nidn = ? where id = ?";
    $st = $this->dbh->prepare($sql);
    $st->execute($data);
    return $st->rowCount();
  }

  public function hapus($id) {
    $sql = "delete from penelitian where id = ?";
    $st = $this->dbh->prepare($sql);
    $st->execute($data);
    return $st->rowCount();
  }

  public function findByID($id){
    $sql = "select * from " . $this->tblName . " where id = ?";
    $st = $this->dbh->prepare($sql);
    $st->execute([$id]);
    return $st->fetch();
  } 
}

?>
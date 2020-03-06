<?php
session_start();
$db=new PDO("mysql:host=127.0.0.1;dbname=s1080404;charset=utf8","root","");
date_default_timezone_set("Asia/Taipei");

// select SQL
function select($tableName,$where){
  global $db;
  $sql="SELECT * FROM ".$tableName." WHERE ".$where;
  return $db->query($sql)->fetchAll();
}

/* 2020/01/03 新增 */
function select_prepare($tableName,$prepareCode,$userData){
  global $db;
  // SELECT * FROM q1t10_admin WHERE acc=? AND pwd=?
  $sql="SELECT * FROM ".$tableName." WHERE ".$prepareCode;
  $beload=$db->prepare($sql);  // query是純語意，prepare是參雜?之特殊語意
  $beload->execute($userData);
  return $beload->fetchAll();
}


//insert SQL
function insert($ary,$tableName){
  global $db;
  $feild="id";
  $data="null";
  foreach ($ary as $key => $value) { //陣列形式
      $feild.=",".$key;
      $data.=",'".$value."'";
  }

  $sql="INSERT INTO ".$tableName." (".$feild.") VALUE (".$data.")";
  //$sql="INSERT INTO ".$tableName." (id,a,b,c) VALUE (null,1,2,3)";
  $db->query($sql);
  return $db->lastInsertId();
}

//update SQL
function update($ary,$tableName){
  global $db;
  foreach ($ary as $do => $data) {
      switch ($do) {
          case 'num+1':
              $sql="UPDATE ".$tableName." SET num=num+1 WHERE id=".$data; //$data=對象id
              $db->query($sql);
          break;
          case 'num-1':
              $sql="UPDATE ".$tableName." SET num=num-1 WHERE id=".$data; //$data=對象id
              $db->query($sql);
          break;
          default:
              foreach ($data as $key => $value) {  //$data=陣列內容，結構為['id']=修改新值
                  $sql="UPDATE ".$tableName." SET ".$do."='".$value."' WHERE id=".$key;
                  $db->query($sql);
              }
          break;
      }
  }
}


//delete SQL
function delete($ary,$tableName){
  global $db;
  foreach ($ary as $do => $data) {
      switch ($do) {
          case 'del':
              foreach ($data as $value) {
                  $sql="DELETE FROM ".$tableName." WHERE id=".$value;
                  $db->query($sql);
              }
          break;
          case 'delat':
              $sql="DELETE FROM ".$tableName." WHERE ".$data; //條件不是用id
              $db->query($sql);
          break;
      }
  }
}


//php轉址
function plo($link){
  return header("location:".$link);
}

//JS轉址
function jlo($link){
  return "location.href='".$link."'";
}

//file upload
function addfile($file){
  $newname=time()."_".$file['name'];
  copy($file['tmp_name'],"upload/".$newname);
  return $newname;
}


?>
<?php
$key=$_GET['key'];
require_once 'connect.php';
$sql="SELECT * FROM user WHERE key_token='$key'";
$result=$conn->query($sql);
if($result->num_rows > 0){
    echo "Token Valid";
     $stmt = $conn->prepare("SELECT * FROM teshary");
      $stmt->execute();
      $stmt->bind_result($id,$title,$konten,$penulis);
      $produk = array(); 
      while($stmt->fetch()){
      $temp = array();
      $temp[] = $id; 
      $temp[] = $title;
      $temp[] = $konten; 
      $temp[] = $penulis; 
      array_push($produk, $temp);
      }
      echo json_encode($produk);
}else{
    echo"Token Tidak Valid";
}


?>
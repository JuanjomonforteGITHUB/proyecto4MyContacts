<?php
	include("conexion.proc.php");
	// $idContacte = $_REQUEST['idContacte'];
	$id=$_GET["id"];

	$query="SELECT * FROM tbl_contactes WHERE idContacte=$id";
	// $query="SELECT * FROM tbl_contactes WHERE idContacte=".$id;
  $resultado=$conexion -> query($query);

  $jsondata = array();

  while( $row = $resultado->fetch_object() ) {

    $jsondata[] = $row;
  }

  $resultado->close();

  header('Content-type: application/json; charset=utf-8');
  echo json_encode($jsondata, JSON_FORCE_OBJECT);

	// $query="SELECT * FROM tbl_contactes WHERE idContacte=".$id;
 //    echo $query;
 //    $queryAdre = mysqli_query($conexion, $query);
 //    // $resultado=$conexion -> query($query);

 //    $jsondata = array();

 //    if(mysqli_num_rows($queryAdre)>0){	
	// 		while($row = mysqli_fetch_array($queryAdre)){
 //      			$jsondata[] = $row;
 //      		}
 //    }

 //    $queryAdre->close();

 //    header('Content-type: application/json; charset=utf-8');
 //    echo json_encode($jsondata, JSON_FORCE_OBJECT);
    // header('location: mapaContacte.php');
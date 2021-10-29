<?php

header('Content-type: application/json; charset=UTF-8');

  $id = $_REQUEST["id"];

  $password = $_REQUEST["password"];

  $result = "";

  // DB 코드 시작

  $host='localhost';

  $user='root';

  $pass='1234';

  $db='testdb';

  $arr = array();  

  $conn = mysqli_connect($host,$user,$pass,$db);

  if ($conn->connect_error) {

	$arr["error"] = true;

        echo json_encode($arr);

	return;

  }

  if($conn) {

    $arr["connection"] = true;

  }

  $select_query = "SELECT * FROM login WHERE id='$id' AND password='$password' ";

  $result_set = mysqli_query($conn, $select_query);

  if (mysqli_num_rows($result_set) > 0) {

	$arr["login"] = true;

  } else {

	$arr["login"] = false;

  }

  mysqli_close($conn);

  $json = json_encode($arr);

  echo $json;

?>
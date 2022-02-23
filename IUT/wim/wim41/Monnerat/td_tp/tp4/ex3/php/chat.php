<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');
$conn = mysqli_connect("localhost","","","");

$id = filter_input(INPUT_GET,"id",FILTER_VALIDATE_INT);
$message = filter_input(INPUT_POST,"message");
$pseudo = filter_input(INPUT_POST,"pseudo");

if ($message !== NULL && $pseudo !== NULL){
	$res=mysqli_query($conn,"INSERT INTO message values(NULL,'$pseudo','$message')");
}

$result = mysqli_query($conn,"SELECT * FROM message where id > $id;");
$retour = [];
foreach($result as $message){
	$retour[]=$message;
}
echo json_encode($retour);
?>

<?php
include "dbcon.php";

$answer = $_POST['answer'];
$user_id = $_POST['user_id'];
$question = $_POST['question'];



$query = "insert into `answers` (`user_id`,`question`,`answer`)values('$user_id','$question','$answer')";
$result = mysqli_query($connection, $query);

if ($result) {
    $data = array('question' => $question);
    echo json_encode($data);


}



?>
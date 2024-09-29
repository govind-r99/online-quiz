<?php
include "dbcon.php";
$question = $_GET['question'];
$user_id = $_GET['user_id'];

$query = "SELECT id, question, choice_1, choice_2, choice_3, choice_4 FROM `questions` WHERE `question_no` = $question";



$result = mysqli_query($connection, $query);
if ($result->num_rows > 0) {
    echo json_encode(mysqli_fetch_assoc($result));
} else {


    echo json_encode(["status" => 'over', 'user_id' => $user_id]);


}


?>
<?php

include "dbcon.php";

$answer = $_POST['answer'];
$user_id = $_POST['user_id']; 
foreach ($answer as $index => $id) {
    $ans = $_POST['answer_' . ++$index];
    $query = "UPDATE `answers` SET `answer`='$ans' WHERE `id`=$id";

    $result = mysqli_query($connection, $query);
}

header('location:/online-quiz/pages/success.php?user=' . $user_id);

?>
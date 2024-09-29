<?php

include "dbcon.php";

$answer = $_POST['answer'];
foreach ($answer as $index => $id) {
    $ans = $_POST['answer_' . ++$index];
    $query = "UPDATE `answers` SET `answer`='$ans' WHERE `id`=$id";

    $result = mysqli_query($connection, $query);
}
?>
<?php
include "dbcon.php";

$name = $_POST['name'];

if ($name == null || empty($name)) {
    header('location:/online-quiz/index.php?message=validationError');
}

$query = "insert into `user` (`name`)values('$name')";
$result = mysqli_query($connection, $query);

if ($result) {
    header('location:/online-quiz/pages/quiz.php?user=' . $connection->insert_id);

}



?>
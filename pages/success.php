<?php
include "../formhandling/dbcon.php";
include "../layout/header.php";

$user_id = $_GET['user'];

$query = "SELECT *, questions.question as question_name,answers.id as answer_id,questions.id as question_id,questions.answer as correct_answer 
          FROM `questions` 
          JOIN `answers` ON `answers`.`question` = `questions`.`id` 
          WHERE `user_id` = $user_id";


$result = mysqli_query($connection, $query);
// var_dump($result);
// exit;

$correct = 0;
$incorrect = 0;
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    if ($row['correct_answer'] == $row['answer']) {
        $correct++;
    } else {
        $incorrect++;
    }
}

$count = 1;
?>


<div class="container">
    <div class="row">
        <h1 class="text-center text-danger">ONLINE QUIZ </h1>
    </div>
    <div class="row pt-5">
        <table class="table table-striped border">
            <thead>
                <th>Total Questions</th>
                <th>Passed</th>
                <th>Failed</th>
            </thead>
            <tbody>
                <td><?php echo $result->num_rows ?></td>
                <td><?php echo $correct ?></td>
                <td><?php echo $incorrect ?></td>
            </tbody>
        </table>
    </div>

    <a href="../index.php" class="btn btn-primary">Redo Test</a>

    <?php include "../layout/footer.php"; ?>
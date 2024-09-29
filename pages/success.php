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


$count = 1;
?>


<div class="container">
    <div class="row">
        <h1 class="text-center text-danger">ONLINE QUIZ </h1>
    </div>
    <div class="row pt-5">

        <?php
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

            if ($row['correct_answer'] == $row['answer']) {
                $correct++;
            } else {
                $incorrect++;
            }
            ?>
            <h3 class="text-info">Question <span id="question_no"><?php echo $count++ ?></span></h3>
            <div class="border rounded bg-primary-emphasis p-5">
                <p class="fs-5 text-center" id="question"><?php echo $row['question_name'] ?></p>
                <div class="row justify-content-center ">
                    <div class="col-6 form-check p-3 ">
                        <input class="form-check-input" type="radio" name="answer_<?php echo $row['question_id']; ?>"
                            id="answer_<?php echo $row['question_id']; ?>_1" value="choice_1" <?php if ($row['answer'] == 'choice_1')
                                   echo "checked"; ?>>
                        <label class="form-check-label <?php if ($row['answer'] == 'choice_1')
                            echo "fw-bold"; ?> " for="answer_<?php echo $row['question_id']; ?>_1" id="choice_1">
                            <?php echo $row['choice_1'] ?>     <?php if ($row['correct_answer'] == 'choice_1')
                                        echo "<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-check-lg' viewBox='0 0 16 16'>
  <path d='M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425z'/>
</svg> "; ?>
                        </label>
                    </div>
                    <input type="hidden" name="answer[]" value="<?php echo $row['answer_id'] ?>">
                    <div class="col-6 form-check p-3">
                        <input class="form-check-input" type="radio" name="answer_<?php echo $row['question_id']; ?>"
                            id="answer_<?php echo $row['question_id']; ?>_2" value="choice_2" <?php if ($row['answer'] == 'choice_2')
                                   echo "checked"; ?>>
                        <label class="form-check-label <?php if ($row['answer'] == 'choice_2')
                            echo "fw-bold"; ?> " for="answer_<?php echo $row['question_id']; ?>_2" id="choice_2">
                            <?php echo $row['choice_2'] ?>     <?php if ($row['correct_answer'] == 'choice_2')
                                        echo "<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-check-lg' viewBox='0 0 16 16'>
  <path d='M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425z'/>
</svg>"; ?>
                        </label>
                    </div>
                    <div class="col-6 form-check p-3">
                        <input class="form-check-input" type="radio" name="answer_<?php echo $row['question_id']; ?>"
                            id="answer_<?php echo $row['question_id']; ?>_3" value="choice_3" <?php if ($row['answer'] == 'choice_3')
                                   echo "checked"; ?>>
                        <label class="form-check-label <?php if ($row['answer'] == 'choice_3')
                            echo "fw-bold"; ?> " for="answer_<?php echo $row['question_id']; ?>_3" id="choice_3">
                            <?php echo $row['choice_3'] ?>     <?php if ($row['correct_answer'] == 'choice_3')
                                        echo "<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-check-lg' viewBox='0 0 16 16'>
  <path d='M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425z'/>
</svg>"; ?>
                        </label>
                    </div>
                    <div class="col-6 form-check p-3">
                        <input class="form-check-input" type="radio" name="answer_<?php echo $row['question_id']; ?>"
                            id="answer_<?php echo $row['question_id']; ?>_4" value="choice_4" <?php if ($row['answer'] == 'choice_4')
                                   echo "checked"; ?>>
                        <label class="form-check-label <?php if ($row['answer'] == 'choice_4')
                            echo "fw-bold"; ?> " for="answer_<?php echo $row['question_id']; ?>_4" id="choice_4">
                            <?php echo $row['choice_4'] ?>     <?php if ($row['correct_answer'] == 'choice_4')
                                        echo "<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-check-lg' viewBox='0 0 16 16'>
  <path d='M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425z'/>
</svg>"; ?>
                        </label>
                    </div>
                    <span class="text-danger text-center" style="display: none;" id="validation">Please select an
                        answer</span>

                </div>
                <div class="text-end">
                </div>
            </div>

        <?php } ?>
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
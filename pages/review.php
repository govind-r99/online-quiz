<?php
include "../formhandling/dbcon.php";
include "../layout/header.php";

$user_id = $_GET['user_id'];

$query = "SELECT *, questions.question as question_name,answers.id as answer_id,questions.id as question_id 
          FROM `questions` 
          JOIN `answers` ON `answers`.`question` = `questions`.`id` 
          WHERE `user_id` = $user_id";


$result = mysqli_query($connection, $query);



$count = 1;
?>


<div class="container">
    <div class="row">
        <h1 class="text-center text-danger">ONLINE QUIZ </h1>
    </div>
    <div class="row pt-5">
        <form method="post" action="../formhandling/submit.php">
            <input type="hidden" value="<?php echo $_GET['user_id'] ?>" name="user_id">
            <?php while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                ?>
                <h3 class="text-info">Question <span id="question_no"><?php echo $count++ ?></span></h3>
                <div class="border rounded bg-light p-5">
                    <p class="fs-5 text-center" id="question"><?php echo $row['question_name'] ?></p>
                    <div class="row justify-content-center ">
                        <div class="col-6 form-check p-3 ">
                            <input class="form-check-input" type="radio" name="answer_<?php echo $row['question_id']; ?>"
                                id="answer_<?php echo $row['question_id']; ?>_1" value="choice_1" <?php if ($row['answer'] == 'choice_1')
                                       echo "checked"; ?>>
                            <label class="form-check-label" for="answer_<?php echo $row['question_id']; ?>_1" id="choice_1">
                                <?php echo $row['choice_1'] ?>
                            </label>
                        </div>
                        <input type="hidden" name="answer[]" value="<?php echo $row['answer_id'] ?>">
                        <div class="col-6 form-check p-3">
                            <input class="form-check-input" type="radio" name="answer_<?php echo $row['question_id']; ?>"
                                id="answer_<?php echo $row['question_id']; ?>_2" value="choice_2" <?php if ($row['answer'] == 'choice_2')
                                       echo "checked"; ?>>
                            <label class="form-check-label" for="answer_<?php echo $row['question_id']; ?>_2" id="choice_2">
                                <?php echo $row['choice_2'] ?>
                            </label>
                        </div>
                        <div class="col-6 form-check p-3">
                            <input class="form-check-input" type="radio" name="answer_<?php echo $row['question_id']; ?>"
                                id="answer_<?php echo $row['question_id']; ?>_3" value="choice_3" <?php if ($row['answer'] == 'choice_3')
                                       echo "checked"; ?>>
                            <label class="form-check-label" for="answer_<?php echo $row['question_id']; ?>_3" id="choice_3">
                                <?php echo $row['choice_3'] ?>
                            </label>
                        </div>
                        <div class="col-6 form-check p-3">
                            <input class="form-check-input" type="radio" name="answer_<?php echo $row['question_id']; ?>"
                                id="answer_<?php echo $row['question_id']; ?>_4" value="choice_4" <?php if ($row['answer'] == 'choice_4')
                                       echo "checked"; ?>>
                            <label class="form-check-label" for="answer_<?php echo $row['question_id']; ?>_4" id="choice_4">
                                <?php echo $row['choice_4'] ?>
                            </label>
                        </div>
                        <span class="text-danger text-center" style="display: none;" id="validation">Please select an
                            answer</span>

                    </div>
                    <div class="text-end">
                    </div>
                </div>

            <?php } ?>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <?php include "../layout/footer.php"; ?>
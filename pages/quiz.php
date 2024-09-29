<?php include "../layout/header.php"; ?>

<div class="container">
    <div class="row">
        <h1 class="text-center text-danger">ONLINE QUIZ </h1>
    </div>
    <div class="row pt-5">
        <form method="post" action="">
            <h3 class="text-info">Question <span id="question_no"></span></h3>
            <div class="border rounded bg-light p-5">
                <p class="fs-5 text-center" id="question"></p>
                <div class="row justify-content-center ">
                    <div class="col-6 form-check p-3 ">
                        <input class="form-check-input" type="radio" name="answer" id="answer1" value="choice_1">
                        <label class="form-check-label" for="answer1" id="choice_1">
                            Default radio
                        </label>
                    </div>
                    <div class="col-6 form-check p-3">
                        <input class="form-check-input" type="radio" name="answer" id="answer2" value="choice_2">
                        <label class="form-check-label" for="answer2" id="choice_2">
                            Default radio
                        </label>
                    </div>
                    <div class="col-6 form-check p-3">
                        <input class="form-check-input" type="radio" name="answer" id="answer3" value="choice_3">
                        <label class="form-check-label" for="answer3" id="choice_3">
                            Default radio
                        </label>
                    </div>
                    <div class="col-6 form-check p-3">
                        <input class="form-check-input" type="radio" name="answer" id="answer4" value="choice_4">
                        <label class="form-check-label" for="answer4" id="choice_4">
                            Default radio
                        </label>
                    </div>
                    <span class="text-danger text-center" style="display: none;" id="validation">Please select an
                        answer</span>

                </div>
                <div class="text-end">
                    <button type="button" class="btn btn-primary" onclick="submitAnswer()" id="submit">Next</button>
                </div>
            </div>

        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>

        $(document).ready(function () {
            getQuestion(<?php echo isset($_GET['question']) ?>);
        });

        function getQuestion(question) {
            if (question == null) {
                question = 1;

            }
            else {
                ++question;
            }
            $('#question_no').html(question)
            $.ajax({
                type: "GET",
                url: "../formhandling/getquestion.php",
                data: { question: question, user_id: <?php echo $_GET['user']; ?> },
                cache: false,
                success: function (data) {
                    var data = JSON.parse(data)
                    if (data.status == "over") {
                        window.location.href = "review.php?user_id=<?php echo $_GET['user']; ?>";
                    }
                    else {

                    }
                    $('input[name="answer"]:checked').prop('checked', false);
                    $('#question').html(data.question);
                    $('#choice_1').html(data.choice_1);
                    $('#choice_2').html(data.choice_2);
                    $('#choice_3').html(data.choice_3);
                    $('#choice_4').html(data.choice_4);
                    $('#submit').val(data.id);
                }
            });
        }


        function submitAnswer() {
            var answer = $('input[name="answer"]:checked').val();
            var question = $('#submit').val();
            var validation = true;
            if (answer == null) {
                $('#validation').show();
                var validation = false;
            }
            else {
                $('#validation').hide();
                var validation = true;
            }

            if (validation) {
                $.ajax({
                    type: "POST",
                    url: "../formhandling/submitanswer.php",
                    data: { answer: answer, user_id: <?php echo $_GET['user']; ?>, question: question },
                    cache: false,
                    success: function (data) {
                        data = JSON.parse(data);
                        getQuestion(data.question);

                    }
                });
            }
        }
    </script>



    <?php include "../layout/footer.php"; ?>
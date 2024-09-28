<?php include "layout/header.php"; ?>

<div class="container">
    <div class="row vh-100 align-self-center justify-content-center">
        <h1 class="text-center text-danger">ONLINE QUIZ </h1>
        <div class="col-md-6 text-center">
            <form method="post" action="./formhandling/start.php">
                <div class="mb-3">
                    <label for="name" class="form-label">Enter your Name</label>
                    <small class="text-danger">*</small>
                    <input type="text" class="form-control" id="name" name="name">
                    <?php if (isset($_GET['message']) == "validationError") { ?>
                        <span class="text-danger">Please Enter your name</span>
                    <?php } ?>
                </div>
                <button type="submit" class="btn btn-primary btn-lg col-3">Start</button>
            </form>
        </div>

    </div>


    <?php include "layout/footer.php"; ?>
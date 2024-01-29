<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Class - Classroom</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <link rel="stylesheet" href="../../css/stuClass.css">
</head>

<body>

    <?php
    session_start();
    include "../connection.php";
    $stuClickClass = $_SESSION['stuClickedClass'];
    $q1 = "SELECT * from content where c_id='$stuClickClass'";
    $r1 = mysqli_query($connection, $q1);
    $f1 = mysqli_fetch_assoc($r1);

    if (isset($f1)) {

        $title = $f1['link'];
        $link = $f1['title'];
        $msg = $f1['t_msg'];
        
    } else {
        $title = "No Link found for this class!";
        $link = "No Title found for this class!";
        $msg = "No Messages found for this class!";
    }
    ?>


    <nav class="navbar-dark bg-dark navbar sticky-top shadow p-2 d-flex">
        <div class="flex-grow-0 mr-3">
            <img class="d-flex" src="https://upload.wikimedia.org/wikipedia/commons/5/59/Google_Classroom_Logo.png" alt="Image Not Found!" width="32" height="32" />
        </div>
        <div class="flex-grow-1 class-name">
            <a class="navbar-brand">
                <p class="class-name">Classroom</p>
            </a>
        </div>
    </nav>

    <div id="page1">
        <div class="c-detail">

            <div class="tmsg">
                <h4 class="font-weight-bold text-muted">Teacher Message </h4>
                <div class="msg">
                    <p class="font-weight-bold pmsg"> <?php echo $msg; ?></p>
                </div>
            </div>
<br>
            <div class="classContent">

                <h4 class="font-weight-bold text-muted p-2"> Title of document : </h4>

                <div class="title">
                    <p class="font-weight-bold t-title"> <?php echo $title; ?></p>
                </div>
                <br>
                <h4 class="font-weight-bold text-muted p-2"> Link of document : </h4>


                <div class="title">
                    <button class="btn btn-primary">
                        <a class="font-weight-bold a-link" href="<?php echo $link; ?>"> View Document </a>
                    </button>
                </div>

            </div>

        </div> <!-- C-detail Div Ends Here -->


    </div>
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
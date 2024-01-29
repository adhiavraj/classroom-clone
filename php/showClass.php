<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Class - Classroom</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="../css/theSC.css">
</head>

<body>

    <?php include "connection.php";
    session_start(); ?>

    <div class="all-contents">

        <nav class="navbar-dark bg-dark mb-1 navbar sticky-top shadow p-2 d-flex">
            <div class="flex-grow-0 mr-3">
                <img class="d-flex" src="https://upload.wikimedia.org/wikipedia/commons/5/59/Google_Classroom_Logo.png" alt="Image Not Found!" width="32" height="32" />
            </div>
            <div class="flex-grow-1 class-name">
                <a class="navbar-brand">
                    <p class="class-name">Classroom</p>
                </a>
            </div>
        </nav>

        <div class="container all-cont-of-class">
            <div class="your-class-img">
                <div class="image-container">
                    <img src="../img/classBg.png" alt="Class Image!" class="your-class-img mt-3">

                    <?php
                    
                    $clicked_class = $_SESSION['clicked_class'];

                    $q1 = "SELECT * from class where c_id = '$clicked_class'";
                    $r1 = mysqli_query($connection, $q1);
                    $gc = mysqli_fetch_assoc($r1);
                    $cc = $gc['code'];
                    ?>

                    <p class="image-text font-weight-bold"><?php echo strtoupper($gc['cname']); ?></p>

                </div>
            </div>

            <div class="row">


                <!-- Displaying Code Section  -->
                <div class="class-code-sec ml-3 mr-5">

                    <p class="font-weight-bold c-heading">Class Code : </p>

                    <p class="font-weight-bold c-code"> <?php echo $cc; ?> </p>

                    <?php if (isset($_POST['existingClassBtn']) || isset($_SESSION['generated_code'])) { ?>
                        <button class="copy-button">
                            <i class="material-icons">content_copy</i>
                        </button>
                    <?php } ?>


                </div>

                <!-- Writing Message Section  -->
                <div class="announce bg-light text-white">
                    <div class="row">
                        <img src="https://lh3.googleusercontent.com/-uNzPYqTKunY/AAAAAAAAAAI/AAAAAAAAAAA/AJIwbgbeOOTIOTtwMX-rVdYAq44Hx8YgSg/photo.jpg?sz=46" class="announce-img" alt="profile">

                    </div>
                    <p class="tag">

                        Announce something to your class</p>

                    <div class="wrapper">

                        <div class="input-data text-area show">

                            <form action="#" method="post">
                                <input type="text" name="given_msg" id="" class="textmsg text-muted" placeholder=" " required>
                                <label for="" class="labelmsg">Announce something to your class</label>

                        </div>
                    </div>

                    <!--  Before was here -->

                </div>
            </div>
            <div class="title-link-cont">
                <h4 class="rounded p-2 mt-2 d-flex justify-content-center assignment-title assi-notice" id="assi-notice">Give your assignment title and link below: </h4>


                <input name="givenLink" type="text" class="mt-2 p-3 assignment-title" id="title-in" placeholder="Give your title here..." required>
                <br>
                <input name="givenTitle" type="text" class="mt-2 p-3 assignment-title" id="title-in" placeholder="Link of your document here.." required>
                <!-- <input value="submit" class="btn btn-primary mt-3 d-flex justify-content-center" name="titleLinkSub" type="submit"> -->
            </div>
            <div class="row">
                <button class="cancel-button btn btn-sm">Cancel</button>
                <button class="btn btn-sm btn-primary msg-sub" name="sub_given_msg"> Submit </button>
            </div>
            </form>
        </div>

    </div>

    <div id="page2">

        <div class="row">


            <?php

            if (isset($_POST['sub_given_msg'])) {
                
                
                $teacherMsg = $_POST['given_msg'];
                $_SESSION['teacherMsg'] = $_POST['given_msg'];

                $email = $_SESSION['inputEmail'];
                $pass = $_SESSION['inputPassword'];


                $cstu = "SELECT * from students where email='$email' and password='$pass'";
                $runcs = mysqli_query($connection, $cstu);
                $checkstu = mysqli_fetch_assoc($runcs);

                if(!$checkstu) {

                    $tidFromTable = "SELECT t_id from teacher where email='$email' and password='$pass'";
                    $tid_result = mysqli_query($connection, $tidFromTable);

                    $get_tid = mysqli_fetch_assoc($tid_result);   
                    $tid = $get_tid['t_id'];

                    $givenLink = $_POST['givenLink'];
                $givenTitle = $_POST['givenTitle'];

                $updateContent = "INSERT into content values('$tid','$clicked_class','$givenLink','$givenTitle','$teacherMsg') ";
                $updateRunContent = mysqli_query($connection, $updateContent);
                }

                // Columns :  t_id   c_id   link   title   t_msg   cname

                
            }

            ?>


            <!-- Printing Through WHile Loop - Getting data with cid ( class id ) -->
            <?php



            $clicked_class = $_SESSION['clicked_class'];
            $showMsg = "select * from content where c_id = '$clicked_class'";
            $runQuery = mysqli_query($connection, $showMsg);


            if (isset($_POST['sub_given_msg'])) {

                $givenLink = $_POST['givenLink'];

                $checkClass = "SELECT * from content where link='$givenLink'";
                $runCC = mysqli_query($connection, $checkClass);
                $checkRunCC = mysqli_fetch_assoc($runCC);



                    while ($check = $runQuery->fetch_assoc()) {

            ?>
                        <div class="t-t-d-c">

                        <?php if(isset($check['link'])) { ?>
                            <div class="bg-dark text-white t-details-cont">
                                <?php
                                
                                echo $check['link'];
                                ?>
                            </div>
                        <?php  } ?>

                            <div class="doc-link-btn">
                                <button class="btn btn-primary">
                                    <a calss="text-white" href="<?php echo $check['title']; ?>">Click here to view document!</a>
                                </button>
                            </div>
                        </div>
            <?php

                    } // End of while loop

                 // Else condition ends

            } // Submit Button Condition Ends

            ?>

        <!-- Row Div Ends -->
        </div>

        <!-- Page 2 Ends -->
    </div> 

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script src="../js/text_annouce.js"></script>

</body>

</html>
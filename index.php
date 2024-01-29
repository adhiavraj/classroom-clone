<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1 shrink-to-fit=no" />
  <title>Classroom</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />

  <style>
    .all-contents {

      background: linear-gradient(to bottom right, #6a77ff, #ff6b6b, #cc68e2);
      /*  Good For Mobo*/
      background: linear-gradient(to bottom right, #7e8d9d, #40505a);
      /* Current */
      /* background: linear-gradient(to bottom right, #8793a1, #596164); */
      background: linear-gradient(to bottom right, #cececebb, #6c757d);

    }

    .center {
      align-items: center;
      /* text-align: center; */
    }
  </style>
  <link rel="stylesheet" href="css/style.css" />
</head>

<body>



  <div class="all-contents">


    <!-- Starting session and Including Connection File -->
    <?php
    session_start();
    include "php/connection.php";
    ?>

    <!-- Navigaton Starts From Here -->

    <nav class="navbar navbar-dark bg-dark sticky-top shadow p-2">
      <div class="flex-grow-0 pr-3 center">

        <img class="" src="https://upload.wikimedia.org/wikipedia/commons/5/59/Google_Classroom_Logo.png" alt="Image Not Found!" width="32" height="32" />
      </div>
      <div class="flex-grow-1 class-name">

        <a class="navbar-brand text-white">
          <p class="class-name">

            Classroom

          </p>
        </a>
      </div>
      <form class="form-inline" action="./php/register.php" method="post">

        <!-- <div class="d-flex flex-wrap"> -->

        <div class="dropdown">

          <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Account
          </button>

          <div class="dropdown-menu">

            <a style="margin-right: 10%;" href="php/register.php" id="registerBtn" class="dropdown-item">
              Register
            </a>
            <a href="php/login.php" id="loginBtn" name="loginBtn" class="btn btn-light btn-sm mt-2 dropdown-item" role="button">
              Login
            </a>


            <?php
            if (isset($_SESSION['isLog']) && $_SESSION['isLog']) {
              echo "<a value='registerBtn' type='button' name='logout' href='php/logout.php' class='dropdown-item nav-a-links btn btn-danger btn-sm mt-2' role='button'>logout</a>
        ";
            }
            ?>
          </div>
        </div>
        <!-- </div> -->
      </form>
    </nav>

    <!-- Creating Dismissing Alert To Inform User to register  -->
    <?php


    $warningDismissing = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
<strong>Register/Login!</strong> To Create or Join ClassRoom You should have to
register/login yourself first.
<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
  <span aria-hidden='true'>&times;</span>
</button>
</div>";

    $successDismissing = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong>Congratulations!</strong> Logined Successfull, Now you can create or join class.
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
  <span aria-hidden='true'>&times;</span>
  </button>
  </div>";

    if (isset($_SESSION['isLog']) && $_SESSION['isLog']) {

        echo $successDismissing;
      
    }
    
    else {
        echo $warningDismissing;
    }

    ?>


    <div class="jumbotron-fluid">
      <div class="mt-3 container bg-dark home-class class-container create-div" style="padding: 10px">
        <!-- <h1 class="display-3">Create Class Here!</h1> -->
        <h3 class="font-weight-bold create-h-txt">Create Class Here!</h3>
        <p class="create-p-txt">
          You can create your class by clicking the create button located
          below. This Includes! file uploading for your group, Allow to
          annouce something that you want
        </p>

        <div class="mt-5 d-flex justify-content-center rounded cls-btn">

          <?php

          // Create Class Button 

          $disabled = (isset($_SESSION['isLog']) && $_SESSION['isLog']) ? '' : 'disabled';
          $button = "<form action='php/checkTeacher_Redirect.php' method='POST'>
              <div class='mt-5 container d-flex justify-content-center cls-btn'>
                <button
                  type='submit'
                  class='btn btn-success btn-lg'
                  id='createClassBtn' name='createClassBtn' $disabled
                >
                  Create Class
                </button>
              </div>
            </form>";
          echo $button;

          // Existing Class Button 
          if (isset($_SESSION['isLog']) && $_SESSION['isLog']) {

            
              $existingClassButton = "<form action='php/totalTeacherClasses.php' method='POST'>
              <div class='mt-5 container d-flex justify-content-center cls-btn'>
                <button
                  type='submit'
                  class='btn btn-primary btn-lg text-white exist-btn'
                  id='createClassBtn' name='existingClassBtn'
                >
                  Existing Class
                </button>
              </div>
            </form>";
              echo $existingClassButton;
            
          } else {
            // echo "Not any Existing class you have to create class";
          }

          ?>

        </div>

      </div>
    </div>


    <!-- Form ends above from here -->

    <br />

    <form action="php/student/createStudentData.php" method="post">
      <div class="jumbotron-fluid">
        <div class="container text-white home-class class-container join-div" style="padding: 10px">

          <h3 class="font-weight-bold join-h-txt" style="color: white;">Join Class Here!</h3>
          <p class="join-p-txt" style="color: lightcoral;">
            This is a template for a simple marketing or informational website.
            It includes a large callout called a jumbotron and three supporting
            pieces of content. Use it as a starting point to create something
            more unique.
          </p>


          <div class="mt-5 d-flex justify-content-center rounded cls-btn">

            <?php

            $disabled = (isset($_SESSION['isLog']) && $_SESSION['isLog']) ? '' : 'disabled';
            $button = "<form action='php/student/createStudentData.php' method='post'>
                      <div class='mt-5 container d-flex justify-content-center cls-btn'>
                        <button
                          type='submit'
                          class='btn btn-lg btn-light'
                          id='joinClassBtn' name='joinClassBtn' $disabled
                        >
                          Join Class
                        </button>
                      </div>
                    </form>";
            echo $button;

            ?>
          </div>
        </div>
    </form>

    <br />

  </div>

  <?php

if (isset($_SESSION['isLog']) && $_SESSION['isLog']) {

  if(isset($_POST['createClassBtn'])) {

    $email = $_POST['inputEmail'];
  $email = $_POST['inputPassword'];

  $email = $_SESSION['inputEmail'];
  $pass = $_SESSION['inputPassword'];

    $q5 = "SELECT t_id from teacher where email='$email' and password = '$pass'";
    $r5 = mysqli_query($connection, $q5);
    $gtid = mysqli_fetch_assoc($r5);
    $ttid = $gtid['t_id'];
    
  }
}

?>


<!-- Footer starts here   -->

  <footer class="bg-dark my-foot">
    <p class="foot-txt">&copy; 2023 Classroom-Clone, All rigths reserved</p>
  </footer>

  <!-- JavaScript Using Bootstrap -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="js/page.js"></script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1 shrink-to-fit=no" />
  <title>Create-Class</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />

  <link rel="stylesheet" href="../css/createStyle.css">

  <style>
    body {
      background: linear-gradient(to bottom right, #7e8d9d, #40505a);
    }

    .wrapper {
      width: 60vw;
      height: auto;
      background: #fff;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

    .wrapper .input-data {
      height: auto;
      width: 100%;
      position: relative;
      margin-bottom: 15px;
    }

    .wrapper .input-data input {
      height: 100%;
      width: 100%;
      border: none;
      font-size: 17px;
      border-bottom: 2px solid silver;
      padding-top: 15px;

    }

    .wrapper .input-data input:focus {
      outline: none;
    }

    .wrapper .input-data input:not(:placeholder-shown)~label {
      transform: translateY(-20px);
      font-size: 15px;
      color: #4158d0;

    }

    .wrapper .input-data label {
      position: absolute;
      bottom: 1px;
      left: 0;
      color: grey;
      pointer-events: none;
      font-size: large;
      transition: all 0.3s ease;
    }
  </style>

</head>

<body>


  <?php include "connection.php";
  session_start(); ?>


<nav class="navbar-dark bg-dark mb-2 navbar sticky-top shadow p-2 d-flex">

<div class="flex-grow-0 mr-3">
    <img class="d-flex" src="https://upload.wikimedia.org/wikipedia/commons/5/59/Google_Classroom_Logo.png" alt="Image Not Found!" width="32" height="32" />
</div>

<div class="flex-grow-1 class-name">

    <a class="navbar-brand">
        <p class="class-name">Classroom</p>
    </a>

</div>

</nav>



  <form action="" method="post">


    <div class="all">

      <h4 class="heading">Create class</h4>


      <div class="container wrapper">
        <!-- Class Name -->
        <div class="input-data">

          <input type="text" name="className" required placeholder=" ">
          <label>Class Name</label>
          <br>

        </div>
      </div>


      <!-- Section -->
      <!-- Department -->
      <div class="container wrapper">
        <div class="input-data">

          <input type="text" name="sectionName" required placeholder=" ">
          <label>Section</label>
          <br>

        </div>
      </div>

      <!-- Subject -->
      <div class="container wrapper">
        <div class="input-data">

          <input type="text" name="subjectName" required placeholder=" ">
          <label>Subject</label>
          <br>

        </div>
      </div>

      <!-- Room -->
      <div class="container wrapper">
        <div class="input-data">

          <input type="text" name="roomName" required placeholder=" ">
          <label>Room</label>
          <br>

        </div>
      </div>

      <div class="link-group">

        <div class="link-container">

          <div class="cancel-btn">

            <a href="../index.php">Cancel</a>

          </div>

          <div class="create-btn">

            <button type="submit" name="create" class="btn btn-primary btn-sm rounded">Create</button>

          </div>

        </div>


      </div>

    </div>

  </form>


  <?php

  include 'connection.php';

    if(isset($_POST['create'])){
      function generateRandomString($length)
      {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
    
        for ($i = 0; $i < $length; $i++) {
          $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
    
        return $randomString;
      }
    
    
      $generatedCode = generateRandomString(rand(5, 7));
    
      $_SESSION['generated_code'] = $generatedCode; // Generated code stored in session
      // echo $_SESSION['generated_code'];
    
      $_SESSION['className'] = $_POST['className'];
      $_SESSION['sectionName'] = $_POST['sectionName'];
      $_SESSION['subjectName'] = $_POST['subjectName'];
      $_SESSION['roomName'] = $_POST['roomName'];
      header("Location: insertClassInfo.php");
    }
  ?>


  <!-- Bootstrap JavaScript Linked Here! -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
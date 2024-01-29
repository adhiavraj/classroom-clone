<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Join Class - Classroom</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
  <link rel="stylesheet" href="../css/joinedClass.css">
</head>

<body>

  <div class="all-contents">
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

    <!-- PHP STARTS -->
    <?php

    session_start();
    include "connection.php";

    $sid = $_SESSION['sid'];

    $outerQuery = "SELECT * FROM stuClass where sid = '$sid'";

    $resultOuter = mysqli_query($connection, $outerQuery);

    if ($resultOuter) {

      while ($rowOuter = mysqli_fetch_assoc($resultOuter)) {

        $valueFromTable1 = $rowOuter['cid'];
        $_SESSION['stuClickedClass'] = $valueFromTable1;

        // Nested query
        $nestedQuery = "SELECT * FROM class WHERE c_id = '$valueFromTable1'";

        $resultNested = mysqli_query($connection, $nestedQuery);



        if ($resultNested) {

          while ($rowNested = mysqli_fetch_assoc($resultNested)) {

            $nestedClassValue = $rowNested['cname'];

            $nestedCode = $rowNested['code'];
          }
        } else {
          echo "Error in nested query: " . mysqli_error($connection);
        }
      }
    } else {
      echo "Error in outer query: " . mysqli_error($connection);
    }


    ?>

    <!-- Image Section  -->
    <div class="allContClass">
      <div class="row allJoinClasses">
        <div class="c-detail">
          <div class="image-container">
            <img src="../img/classBg.png" alt="Class Image!" class="your-class-img mt-3">
            <p class="image-text font-weight-normal"><?php echo $nestedClassValue; ?></p>
            <div class="vc-btn">
              <form action="" method="post">
                <input type="hidden" name="stuViewClass" value="<?php echo $valueFromTable1 ?>">
                <button type="submit" class="btn btn-primary" name="stuClickClass">View Class</button>
              </form>
            </div>
          </div>
        </div>
      </div> <!-- Row div ends here -->
    </div>


    <?php

    if (isset($_POST['stuClickClass'])) {

      header("Location: student/stuJoinClass.php");
    }

    ?>




  </div>


  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
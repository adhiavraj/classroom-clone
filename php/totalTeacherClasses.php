<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Existing Classes - Classroom</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />

    <link rel="stylesheet" href="../css/totaltea_class.css">
</head>

<body>

    <?php

    include "connection.php";
    session_start();
    if (isset($_POST['c_id'])) {
        $_SESSION['clicked_class']  = $_POST['c_id'];
        header("Location: showClass.php");
    }

    ?>

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

    <div class="container total-class">


        <?php

        $email = $_SESSION['inputEmail'];
        $pass = $_SESSION['inputPassword'];

        $q3 = "SELECT t_id from teacher where email='$email' and password = '$pass'";
        $r3 = mysqli_query($connection, $q3);
        $gtid = mysqli_fetch_assoc($r3); // Get t_id from  here

        if (isset($gtid)) {
            $tid = $gtid['t_id'];
            $_SESSION['logged_tid'] = $tid;
            $loggedTid = $_SESSION['logged_tid'];
        }



        $email = $_SESSION['inputEmail'];
        $pass = $_SESSION['inputPassword'];


        $cEc = "SELECT * from teacher where email='$email' and password='$pass'";
        $runcEc = mysqli_query($connection, $cEc);
        $fetchcEc = mysqli_fetch_assoc($runcEc);

        if (isset($fetchcEc)) {

            // Content column : t_id c_id link title t_msg

            $sql = "SELECT * FROM content WHERE t_id = '$loggedTid'";
            $result = $connection->query($sql);

            if ($result->num_rows > 0) {
                $c_id = array();
                $t_id = array();
                $msg = array();
                $title = array();
                $link = array();

                while ($row = $result->fetch_assoc()) {
                    $c_id[] = $row["c_id"];
                    $t_id[] = $row["t_id"];
                    $msg[] = $row["t_msg"];
                    $title[] = $row["title"];
                    $link[] = $row["link"];
                }
            } else {
                echo "";
            }


            $query2 = "SELECT * FROM class WHERE t_id = $loggedTid";
            $result2 = $connection->query($query2);

            while ($row = $result2->fetch_assoc()) :
        ?>

                <div class="all-class">

                    <div class="row">

                        <div class="class-content">



                            <div class="image-container">

                                <img src="../img/classBg.png" alt="" class="class-images">
                                <div class="image-text">

                                    <p><?php echo strtoupper($row['cname']); ?></p>

                                </div>
                                <form action="" method="post">
                                    <input type="hidden" name="c_id" value="<?php echo $row['c_id'] ?>">
                                    <button type="submit" class="btn btn-primary" name="viewclass">View Class</button>

                                </form>
                            </div>

                        </div>
                    </div>
                </div>

        <?php endwhile;
        } else {
            echo "<p class='font-weight-bold m-3' style='font-size: 25px;'> Classes Doesn't exist! </p> <br> <p class='font-weight-bold mt-1 ml-3' style='font-size: 25px;'> Create class to view class! </p>";
        }
        ?>

        <?php




        ?>




    </div>

</body>

</html>
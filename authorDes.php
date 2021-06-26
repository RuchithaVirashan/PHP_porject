<?php

    $name= $_GET['name'];
    require_once "home/homeDb.php";

    $sql = "SELECT * FROM authortb WHERE author_name='$name'";
    $result = $con->query($sql);
    $row = $result;

    while ($rows= $result->fetch_assoc()){
        $since = $rows['author_since'];
        $name = $rows['author_name'];
        $image = $rows['author_image'];
        $dis = $rows['author_description'];

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authors</title>

    <link rel="stylesheet" href="./styles/footer.css">
    <link rel="stylesheet" href="./styles/navbar.css">
    <link rel="stylesheet" href="./styles/authors.css">

    <!--font awsome-->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="./styles/home_style.css">
    <link rel="stylesheet" href="./styles/footer.css">
    <link rel="stylesheet" href="./styles/navbar.css" />

    <?php require_once "head.php" ?>

</head>

<body>
    <header>
        <?php require_once "nav.php" ?>
    </header>
    <br>
    <!--Author desctiption-->
    <div class="container">
        <div class="row justify-content-center">
            <h2 class="text-center"><?=htmlentities($name)?></h2>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="card h-75">
                    <img src="<?=htmlentities($image)?>" class="img-fluid" alt="books">
                </div>
            </div>
            <div class="col-sm-8">
                <div class="card h-75">
                    <div class="card-body">
                        <p class="card-text"><?=htmlentities($dis)?></p><br>
                        <div class="text-center">
                            <button type="button" class="btn btn-outline-info">See more</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<!--header2-->

<div class="container">
            <h4>Other books by the author</h4>
</div>

<div class="container-fluid">
    <hr>
</div>


<!--other books-->
    <?php
    require_once("./home/homeDb.php");
    require_once("./home/item-component.php");

    //Create instance of createdb class
    // $database=new CreateDb("Productdb", "productb");

    ?>

    <div class="container">
        <div class="row text-center py-5">
            <?php
            $sql = "SELECT * FROM productb LIMIT 0,8";
            $result = mysqli_query($con, $sql);
            // $result = $database->getData();
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    component($row['product_name'], $row['product_price'], $row['second_price'],$row['product_image'], $row['id']);
                }
            }
            ?>
        </div>
    </div>
    <!--header3-->
    <div class="container-fluid">
        <div class="header" id="header2">
            <h5>Top Author</h5>
        </div>
    </div>
    <div class="container-fluid">
        <hr>
    </div>

    <!--top author-->
    <?php require_once("./home/author-component.php");
    require_once("./home/homeDb.php"); ?>

    <!--testing-->
    <div class="container">
        <div class="row text-center py-5">
            <?php
            $sql = "SELECT * FROM authortb";
            $result = mysqli_query($con, $sql);
            // $result = $database->getData();
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    component1($row['author_name'], $row['author_since'], $row['author_image'], $row['id']);
                }
            }
            ?>
        </div>
    </div>

    <?php require_once "script.php" ?>
    <?php require_once "footer.php" ?>
</body>

</html>
<?php
    session_start();
    include("./connect.php");
    if(empty($_SESSION['user_id'])){
        header("Location: login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Receive Books list</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/admin.css">
</head>
<body>
    <?php include("./menubar.php"); ?>
    <div class="bookbox">
        <?php
            $query = "SELECT * FROM `project_work`.`received_books` ORDER BY id DESC";
            $result = $con->query($query);
            if($result->num_rows > 0){
                while ($row = $result->fetch_assoc()) {
                    echo('
                            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start border-primary" style="margin-top:4px; box-shadow: 0px 6px 16px -2px #787878; border:2px solid;">
                                <div class="d-flex w-100 justify-content-between">
                                    <div style="width:25%;">
                                            <img class="img-thumbnail " src="./bookicon.png" alt="Card image cap" style="height:100px;">
                                    </div>

                                    <div style="width:75%;">
                                    
                                        <div class="d-flex w-100 justify-content-between">
                                            <h5 class="mb-1">Book name : '.$row['book_name'].'</h5>
                                        </div>
                                        <small class="mb-1">
                                            Received Book : '.$row['book_name'].'<br>     
                                            Receive From : '.$row['name'].'<br> 
                                            Address : '.$row['address'].'<br>
                                            Phone : '.$row['contact_number'].'<br>
                                            Book Given Time : '.$row['time'].'
                                        </small>
                                    </div>
                                </div>
                            </a>                    
                    ');
                }
            }
        ?>
    </div>
</body>
</html>
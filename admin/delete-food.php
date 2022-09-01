<?php include('../config/constant.php');  ?>



<?php
if (isset($_GET['id']) && isset($_GET['image_name'])) {
    $ID = $_GET['id'];
    $IMAGE_name = $_GET['image_name'];

    //   checking and deleting the images if availabel 

    if ($IMAGE_name != "") {
        //getting the imae path
        $path = '../images/food/' . $IMAGE_name;
        $remove = unlink($path);
        if ($remove) {
            // echo "removied";
        } else {
            echo "failed to delete photo!!";
        }
    } else {
    }

    $sql = "DELETE FROM tbl_food where id='$ID'";
    $qry = mysqli_query($conn, $sql);

    if ($qry) {
        $_SESSION['delete-food'] = $TITLE . "-  Deleted Succesfully";
        header('location:' . SITEURL . 'admin/manage-food.php');
    } else {
        $_SESSION['delete-food'] = "Failed to delete";
        header('location:' . SITEURL . 'admin/manage-food.php');
    }
}else{
    echo "untuthorized user";
}



?>
<?php include('../config/constant.php');  ?>




<?PHP
//1.getting $ID from URL this means it is GET method -->
$G_id = $_GET['id'];



$sql = "DELETE FROM tbl_admin WHERE id=$G_id;";

if ($sql == TRUE) {
    $qry = mysqli_query($conn, $sql);
    if ($qry) {
        //now we create the variable to display message
        $_SESSION['delete'] = "Sucessfully Deleted";
        //after added we redirect to back page so

        header('location:' . SITEURL . 'admin/manage-admin.php');
    } else {
        //now we create the variable to display message
        $_SESSION['delete'] = "Failed to Delete";
        //after added we redirect to back page so

        header('location:' . SITEURL . 'admin/manage-admin.php');
    }
}
?>
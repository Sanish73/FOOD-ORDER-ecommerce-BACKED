<?php include('../config/constant.php');  ?>




<?PHP
// echo "i";



if (isset($_GET['id']) && isset($_GET['image_name'])) {
    // 1.getting $ID from URL this means it is GET method -->
    $G_id = $_GET['id'];
    $G_image_name = $_GET['image_name'];


    // now deleting the images which are stored in VS code 
    if($G_image_name!=''){
        // 1. LOating the path of the image 
        $path = "../images/category/".$G_image_name;//this slash makes your image not to delete
        // 2.this removes(unlink the images)
        $remove = unlink($path);

        if($remove == false){
            echo "failed to delete the image";
        }

    }

    $sql = "DELETE FROM tbl_category WHERE id='$G_id' AND img_name= '$G_image_name';";

    if ($sql == TRUE) {
        $qry = mysqli_query($conn, $sql);
        if ($qry) {
            //now we create the variable to display message

            $_SESSION['delete-category'] = "Sucessfully Deleted";
            // $_SESSION['user'] = $userName;
            //after added we redirect to back page so

            header('location:' . SITEURL . 'admin/manage-category.php');
        } else {
            //now we create the variable to display message
            $_SESSION['delete-category'] = "Failed to Delete";
            //after added we redirect to back page so

            header('location:' . SITEURL . 'admin/manage-category.php');
        }
    }
}
?>
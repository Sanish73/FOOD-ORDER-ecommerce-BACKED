<?php include('../config/constant.php');  ?>



<?php
if(isset($_GET['id'])){
    $ID = $_GET['id'];
    $TITLE = $_GET['title'];

    $sql = "DELETE FROM tbl_food where id='$ID'";
    $qry = mysqli_query($conn , $sql);

    if($qry){
        $_SESSION['delete-food']=$TITLE."-  Deleted Succesfully";    
        header('location:'.SITEURL.'admin/manage-food.php');
            
    }else{
        $_SESSION['delete-food']="Failed to delete";    
        header('location:'.SITEURL.'admin/manage-food.php');
    }
}



?>
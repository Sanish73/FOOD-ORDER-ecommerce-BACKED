<?php include('partials/menu.php'); ?>
<!-- menu section end -->


<div class="main-content">
    <div class="wrapper">
        <h1>Update Categoty</h1>
        <br><br>
        <!-- ---------------------php for data ------------------- -->
        <?php
        // echo "hi";
        //checking the whether the id is set or not
        if (isset($_GET['id'])) {
            //getting id data and other details
            $id = $_GET['id'];
            $sql = "SELECT  * FROM tbl_category WHERE id='$id'; ";

            $qry = mysqli_query($conn, $sql);

            $count = mysqli_num_rows($qry);

            if ($count == 1) {
                // echo "there exist";
                $row = mysqli_fetch_assoc($qry);

                $title = $row['title'];
                $current_image = $row['img_name'];
                $fearured = $row['featured'];
                $active = $row['active'];
            } else {
                $_SESSION['no-category-found'] = "No Category Found!!!";
                header('location:' . SITEURL . 'admin/update-category.php');
            }
        } else {
            header('location:' . SITEURL . 'admin/manage-category.php');
        }
        ?>

        <!-- ------------------php closed------------------------------ -->

        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Title:</td>
                    <td>
                        <input type="text" name="title" value="<?php echo $title; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Current Image:</td>
                    <td>
                        <?php if ($current_image != "") {
                        ?>
                            <a href="<?php echo SITEURL ?>images/category/<?php echo $current_image; ?>"><img src="<?php echo SITEURL ?>images/category/<?php echo $current_image; ?>" alt="" width="100px"></a>
                        <?php
                        } else {
                            echo "image Not Found";
                        }

                        ?>

                    </td>
                </tr>

                <tr>
                    <td>New Image:</td>
                    <td>
                        <!-- image will be displayed here -->
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>Featured:</td>
                    <td>
                        <!-- we can check the radio buttn by writting checked in inside  -->
                        <input <?php if($fearured == "yes") {
                                    echo "checked";
                                } ?> type="radio" name="featured" value="yes">Yes
                        <input <?php if($fearured == "no") {
                                    echo "checked";
                                } ?> type="radio" name="featured" value="no">No
                    </td>
                </tr>

                <tr>
                    <td>Active:</td>
                    <td>
                        <input <?php if($active == "yes") {
                                    echo "checked";
                                } ?> type="radio" name="active" value="yes">Yes
                        <input <?php if($active == "no") {
                                    echo "checked";
                                } ?> type="radio" name="active" value="no">No
                    </td>
                </tr>

                <tr>
                    <td>
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="hidden" name="image" value="<?php echo $current_image; ?>">
                        <input type="submit" name="submit" value="Update Category" class="btn-secondary">
                    </td>
                </tr>
            </table>

        </form>
    </div>
</div>

<!-- ---------------php open----------------- -->
<?php

if (isset($_POST['submit'])) {
    $ID = $_POST['id'];
    $TITLE  = $_POST['title'];
    $IMAGE = $_POST['image'];
    $FEATURED = $_POST['featured'];
    $ACTIVE = $_POST['active'];

    $sql1 = "UPDATE tbl_category SET
            title='$TITLE' , 
            img_name = '$IMAGE',
            featured = '$FEATURED',
            active = '$ACTIVE'  WHERE 
            id = '$id'
    ";

    $qry1 = mysqli_query($conn , $sql1);

    if($qry1){
        $_SESSION['category-updated'] = 'Sucessfully Updated';
        header('location:'.SITEURL.'admin/manage-category.php');

    }else{

    }

    
}

?>


<!-- footer section starts -->
<?php include('partials/footer.php') ?>
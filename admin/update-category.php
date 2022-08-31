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
                header('location:' . SITEURL . 'admin/manage-category.php');

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
                        <!-- image will be displayed here -->
                        <!-- <input type="text" name="username" value="<?php //echo $UserName; 
                                                                        ?>"> -->
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
                        <input type="radio" name="featured" value="no">No
                        <input type="radio" name="featured" value="yes">Yes
                    </td>
                </tr>

                <tr>
                    <td>Action:</td>
                    <td>
                        <input type="radio" name="action" value="no">No
                        <input type="radio" name="action" value="yes">Yes
                    </td>
                </tr>

                <tr>
                    <td>
                        <input type="submit" name="submit" value="Update Category" class="btn-secondary">
                    </td>
                </tr>
            </table>

        </form>
    </div>
</div>


<!-- footer section starts -->
<?php include('partials/footer.php') ?>
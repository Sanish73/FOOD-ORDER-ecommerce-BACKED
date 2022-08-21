<?php include('partials/menu.php'); ?>
<!-- menu section end -->


<div class="main-content">
    <div class="wrapper">
        <h1>Manage Category</h1>
        <br>
        <?php
        if (isset($_SESSION['category-add'])) {
            echo ($_SESSION['category-add']);
            unset($_SESSION['category-add']); //here sanish you can get error if you put session_unset()
            // session_unset();     dont put this// beaause of this the main session that you have put can also be unset results in $_session['user'] destory so
            // put unset($_session[']) this makes only particaular session unset
        }
        if (isset($_SESSION['category-faild-add'])) {
            echo ($_SESSION['category-faild-add']);
            unset($_SESSION['category-faild-add']);
        }

        ?><br><br><br>
        <a href="<?php echo SITEURL; ?>admin/add-category.php" class="btn-primary">Add Category</a>
        <br><br><br>

        <table class="tbl-full">
            <tr>
                <th>S.N</th>
                <th>Title</th>
                <th>Image</th>
                <th>Featured</th>
                <th>Active</th>
                <th>Action</th>
            </tr>

            <!-- ------------------php for table----------------- -->

            <?php
            $sql = "SELECT * FROM tbl_category";

            $qry = mysqli_query($conn, $sql);

            $count = mysqli_num_rows($qry);

            if ($count > 0) {
                //we have data
                while ($row = mysqli_fetch_assoc($qry)) {
                    $id = $row['id'];
                    $title = $row['title'];
                    $image_name = $row['img_name'];
                    $featured = $row['featured'];
                    $active = $row['active'];
            ?>
                    <tr>
                        <td>1.</td>
                        <td>Vijay</td>
                        <td>Vijay</td>
                        <td>Vijay</td>
                        <td>Vijay</td>
                        <td>
                            <a href="#" class="btn-secondary">Update Category</a>
                            <a href="#" class="btn-danger">Delete Category</a>
                        </td>
                    </tr>
                <?php


                }
            } else {
                //we donot have data
                //desplaying message inside table
                ?>

                <tr>
                    <td colspan="6">
                        No Category Found
                    </td>
                </tr>

            <?php
            }
            ?>
        </table>
    </div>

</div>




<!-- footer section starts -->
<?php include('partials/footer.php') ?>
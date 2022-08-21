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
        if (isset( $_SESSION['delete-category'])) {
            echo ( $_SESSION['delete-category']);
            unset( $_SESSION['delete-category']);
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
            $SN = 1;
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
                        <td><?php echo $SN++ ?></td>
                        <td><?php echo $title ?></td>
                        <td><?php
                            if ($image_name != "") {
                            ?>
                               <a href="<?php echo SITEURL ?>images/category/<?php echo $image_name ?>"> <img src="<?php echo SITEURL ?>images/category/<?php echo $image_name ?>" width="100px"></a>
                            <?php
                            } else {
                                echo "Image Not Added!!";
                            }

                            ?>
                        </td>
                        <td><?php echo $featured ?></td>
                        <td><?php echo $active ?></td>
                        <td>
                            <a href="<?php echo SITEURL; ?>admin/update-category.php?id=<?php echo $id; ?> &image_name=<?php echo $image_name; ?>" class="btn-secondary">Update Category</a>
                            <a href="<?php echo SITEURL; ?>admin/delete-category.php?id=<?php echo $id; ?> &image_name=<?php echo $image_name; ?>" class="btn-danger">Delete Category</a>
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
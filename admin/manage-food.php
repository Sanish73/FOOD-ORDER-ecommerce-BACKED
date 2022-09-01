<?php include('partials/menu.php'); ?>
<!-- menu section end -->


<div class="main-content">
    <div class="wrapper">
        <h1>Manage Food</h1>
        <br>
        <?php
        if (isset($_SESSION['food-add'])) {
            echo ($_SESSION['food-add']);
            unset($_SESSION['food-add']);
        }
        if (isset($_SESSION['food-faild-add'])) {
            echo ($_SESSION['food-faild-add']);
            unset($_SESSION['food-faild-add']);
        }

        if(isset(   $_SESSION['delete-food'])){
            echo(   $_SESSION['delete-food']);
            unset(   $_SESSION['delete-food']);
        }
        if (isset(  $_SESSION['food-updated'] )) {
            echo (   $_SESSION['food-updated'] );
            unset(  $_SESSION['food-updated'] );
        }

        if (isset(     $_SESSION['update-error']  )) {
            echo (    $_SESSION['update-error']  );
            unset(      $_SESSION['update-error']  );
        }
        ?>
        <br><br><br>
        <a href="<?php echo SITEURL; ?>admin/add-food.php" class="btn-primary">Add Food</a>
        <br><br><br>
        <table class="tbl-full">
            <tr>
                <th>S.N</th>
                <th>Title</th>
                <th>Price</th>
                <th>Image</th>
                <th>Featured</th>
                <th>Active</th>
                <th>Actions</th>

            </tr>

            <?php
            $sql = "SELECT  * FROM tbl_food";

            $qry = mysqli_query($conn, $sql);

            $count = mysqli_num_rows($qry);

            if ($count > 0) {
                $SN = 1;
                while ($row = mysqli_fetch_assoc($qry)) {
                    $id = $row['id'];
                    $title = $row['title'];
                    $price = $row['price'];
                    $image_name = $row['image_name'];
                    $featured = $row['features'];
                    $active = $row['active'];
            ?>
                    <tr>

                        <td><?php echo $SN++ ?></td>
                        <td><?php echo   $title ?></td>
                        <td><?php echo   $price ?></td>
                        <td><?php
                            ///checking whether we have image or not
                            if ($image_name == "") {
                                echo "Image Not Added";
                            } else {
                            ?>

                                <a href="<?php echo SITEURL ?>images/food/<?php echo $image_name ?>">
                                    <!-- //here even the simple space can make you code different -->
                                    <img src="<?php echo SITEURL ?>images/food/<?php echo $image_name ?>" width="100px">
                                </a>
                            <?php
                            }

                            ?>
                        </td>
                        <td><?php echo  $featured ?></td>
                        <td><?php echo  $active ?></td>
                        <td>
                            <a href="<?php echo SITEURL; ?>admin/update-food.php?id=<?php echo $id; ?> &image_name=<?php echo $image_name;?>" class="btn-secondary">Update Food</a>
                            <a href="<?php echo SITEURL; ?>admin/delete-food.php?id=<?php echo $id; ?> &image_name=<?php echo $image_name;?>" class="btn-danger">Delete Food</a>
                        </td>
                    </tr>

            <?php

                }
            } else {
                echo "<tr><td colspan='7'>food not added</td></tr>";
            }
            ?>
        </table>
    </div>

</div>




<!-- footer section starts -->
<?php include('partials/footer.php') ?>
<?php include('partials/menu.php'); ?>
<!-- menu section end -->


<div class="main-content">
    <div class="wrapper">
        <h1>Update Food</h1>
        <br><br>

         <!-- ---------------------php for data ------------------- -->
         <?php
        // echo "hi";
        //checking the whether the id is set or not
        if (isset($_GET['id'])) {
            //getting id data and other details
            $id = $_GET['id'];
            $sql = "SELECT  * FROM tbl_food WHERE id='$id'; ";

            $qry = mysqli_query($conn, $sql);

            $count = mysqli_num_rows($qry);

            if ($count == 1) {
                // echo "there exist";
                $row = mysqli_fetch_assoc($qry);

                $title = $row['title'];
                $description = $row['description'];
                $price = $row['price'];
                $current_image = $row['image_name'];
                $category_id = $row['category_id'];
                $featured = $row['features'];
                $active = $row['active'];
            } else {
                $_SESSION['no-category-found'] = "No Category Found!!!";
                header('location:' . SITEURL . 'admin/update-category.php');
            }
        } else {
            header('location:' . SITEURL . 'admin/manage-category.php');
        }
        ?>

<form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Title:</td>
                    <td>
                        <input type="text" name="title" value="<?php echo $title; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Description:</td>
                    <td>
                        <textarea  name="description"  cols="30" rows="5"><?php echo $description;?></textarea>
                    </td>
                </tr>

                <tr>
                    <td>Price:</td>
                    <td>
                        <input type="number" name="title" value="<?php echo $price; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Current Image:</td>
                    <td>
                        <?php if ($current_image != "") {
                        ?>
                            <a href="<?php echo SITEURL ?>images/food/<?php echo $current_image; ?>"><img src="<?php echo SITEURL ?>images/food/<?php echo $current_image; ?>" alt="" width="100px"></a>
                        <?php
                        } else {
                            echo "image Not Found";
                        }

                        ?>

                    </td>
                </tr>

                <tr>
                    <td>Category:</td>
                    <td>
                        <select name="category" id="">
                            <option value="0">Test category</option>
                        </select>
                        <!-- <input type="number" name="title" value="<?php echo $price; ?>"> -->
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
                        <input <?php if ($featured == "yes") {
                                    echo "checked";
                                } ?> type="radio" name="featured" value="yes">Yes
                        <input <?php if ($featured == "no") {
                                    echo "checked";
                                } ?> type="radio" name="featured" value="no">No
                    </td>
                </tr>

                <tr>
                    <td>Active:</td>
                    <td>
                        <input <?php if ($active == "yes") {
                                    echo "checked";
                                } ?> type="radio" name="active" value="yes">Yes
                        <input <?php if ($active == "no") {
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




<!-- footer section starts -->
<?php include('partials/footer.php') ?>
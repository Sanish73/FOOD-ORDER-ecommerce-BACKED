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
                $_SESSION['no-food-found'] = "No Category Found!!!";
                header('location:' . SITEURL . 'admin/update-food.php');
            }
        } else {
            header('location:' . SITEURL . 'admin/manage-food.php');
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
                        <textarea name="description" cols="30" rows="5"><?php echo $description; ?></textarea>
                    </td>
                </tr>

                <tr>
                    <td>Price:</td>
                    <td>
                        <input type="number" name="price" value="<?php echo $price; ?>">
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

                            <?php
                            $sql1 = "SELECT * FROM tbl_category WHERE active='yes'";
                            $qry1 = mysqli_query($conn, $sql1);
                            $count = mysqli_num_rows($qry1);

                            if ($count >= 1) {
                                //Category available 
                                while ($row = mysqli_fetch_assoc($qry1)) {
                                    $category_title = $row['title'];
                                    $category_id = $row['id'];

                                    echo " <option value='$category_id'>$category_title</option>";
                                }
                            } else {
                                //category not available
                                echo " <option value='0'>Category Not Available</option>";
                            }
                            ?>

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


<!-- ---------------php open----------------- -->
<?php

if (isset($_POST['submit'])) {
    $ID = $_POST['id'];
    $TITLE  = $_POST['title'];
    $DESCRIPTION  = $_POST['description'];
    $PRICE  = $_POST['price'];
    $CATEGORY  = $_POST['category'];
    $IMAGE = $_POST['image'];
    $FEATURED = $_POST['featured'];
    $ACTIVE = $_POST['active'];



    //checking images is empty or not

    if (isset($_FILES['image']['name'])) {
        $imageName = $_FILES['image']['name'];


        //here we have to check whether the image is selected or cancled if cancled then the image name would be blank so we have to check
        if ($imageName != "") {


            //image name is available
            //uploading the new image and deleteing the old image


            //adding Auto image name in $image_name
            //getting the extension of out image like(img,jpg,png) eg'food.jpg'
            //now using explode seperates the image name and extension llike(food) and jpg seperately
            //ext means extension
            $ext = explode('.', $imageName);
            $ext2 = end($ext);
            // echo $ext;

            // now renaming randomly using $ext and adding functoin
            $imageName = "Food_Category_" . rand(000, 999) . '.' . $ext2;
            // echo $imageName;

            $source_path = $_FILES['image']['tmp_name'];
            $destination_path = "../images/food/" . $imageName;

            // now upload the images 
            $upload = move_uploaded_file($source_path, $destination_path);

            // now check whether the image is uploaded or not
            // if the image is not uploaded then we will stop the porcess and redirect with error message
            if ($upload == false) {
                $_SESSION['update-error'] = 'Failed To Upload';
                header('location' . SITEURL . 'admin/manage-food.php');

                // stop the process 
                die();
            }


            if ($current_image != "") {
                //now removing th current image
                $remove_path  = "../images/food/" . $current_image;

                $remove = unlink($remove_path);

                // checking the imae is removed or not 
                if ($remove) {
                    echo "Removied";
                } else {
                    echo "   n ot Removied";
                }
            }
        } else {
            // empty 
            $imageName = $current_image;
        }
    } else {
        $imageName = $current_image;
    }

    $sql1 = "UPDATE tbl_food SET
            title='$TITLE' , 
            description='$DESCRIPTION',
            price='$PRICE',
            image_name= '$imageName',
            features= '$FEATURED',
            active = '$ACTIVE'  WHERE 
            id = '$id'
    ";

    $qry1 = mysqli_query($conn, $sql1);

    if ($qry1) {
        $_SESSION['food-updated'] = 'Sucessfully Updated';
        header('location:' . SITEURL . 'admin/manage-food.php');
    } else {
        echo "cannot update the Food!!";
    }
}

?>



<!-- footer section starts -->
<?php include('partials/footer.php') ?>
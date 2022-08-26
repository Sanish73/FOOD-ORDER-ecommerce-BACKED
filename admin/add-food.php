<?php include('partials/menu.php');
include('partials/login-check.php');
?>
<!-- menu section end -->


<div class="main-content">
    <div class="wrapper">
        <h1>Add Food</h1>
        <br>

        <?php
        if (isset($_SESSION['upload-error'])) {
            echo  $_SESSION['upload-error'];
            unset($_SESSION['upload-error']);
        }

        if (isset($_SESSION['Fill-require'])) {
            echo $_SESSION['Fill-require'];
            unset($_SESSION['Fill-require']);
        }


        ?><br><br>

        <form  action="" method="POST" onsubmit="validation()" enctype="multipart/form-data">
            <!-- enctype is used for uploading files  -->
            <table class="tbl-30">
                <tr>
                    <td>Title:</td>

                    <td>
                        <input type="text" name="title" placeholder="Title of the food">

                    </td>
                </tr>

                <tr>
                    <td>Description:</td>

                    <td>
                        <textarea name="description" cols="30" rows="5" placeholder="Description of the food"></textarea>

                    </td>
                </tr>

                <tr>
                    <td>Price:</td>

                    <td>
                        <input type="number" name="price" placeholder="price">

                    </td>
                </tr>

                <tr>
                    <td>Image:</td>

                    <td>
                        <input type="file" name="image">

                    </td>
                </tr>

                <tr>
                    <td>Category:</td>

                    <td>
                        <!-- creating dropdown for category -->
                        <select name="category">

                            <?php
                            //creating php code to displaying category from database
                            //displaying it in drop down
                            $sql = "SELECT * FROM tbl_category where active='yes'";

                            $qry = mysqli_query($conn, $sql) or die("Add food query !!!");

                            $count = mysqli_num_rows($qry);
                            //if $count is grater or equals to 1 then we have categories
                            if ($count >= 1) {
                                // echo "hi";
                                while ($row = mysqli_fetch_assoc($qry)) {
                                    //getting al the details of category
                                    $id = $row['id'];
                                    $title = $row['title'];
                            ?>
                                    <!-- -------------pphp closed------------------ -->
                                    <option value="<?php echo $id; ?>"><?php echo $title; ?> </option>
                                    <!-- -------------pphp Opned------------------ -->
                                <?php
                                }
                            } else {
                                // echo "no category";
                                ?>
                                <!-- -------------pphp closed------------------ -->
                                <option value="0">No Category Found</option>
                                <!-- -------------pphp Opned------------------ -->
                            <?php
                            }
                            ?>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Features:</td>

                    <td>
                        <input type="radio" name="featured" value="yes">Yes
                        <input type="radio" name="featured" value="no">No
                    </td>
                </tr>

                <tr>
                    <td>Active:</td>

                    <td>
                        <input type="radio" name="active" value="yes">Yes
                        <input type="radio" name="active" value="no">No
                    </td>
                </tr>


                <tr>
                    <td colspan="2"><br>
                        <input type="submit" name="submit" value="Add Food" class="btn-secondary">
                    </td>
                </tr>



            </table>

        </form>


        <!-- ------------PHP to check whether the button is clocked or not------------------------ -->
        <?php

        if (isset($_POST['submit'])) {
            if (!empty(isset($_POST['title'])) && !empty($_POST['description']) && !empty(isset($_POST['price']))  && !empty($_FILES['image']['name']) 
            && !empty(isset($_POST['featured'])) && !empty(isset($_POST['active']))) {
                // getting the data from the database
                $title = $_POST['title'];
                $description = $_POST['description'];
                $price = $_POST['price'];
                $category = $_POST['category'];


                //now uploading image 
                //checking the button
                if (isset($_FILES['image']['name'])) {
                    // getting the detalils of the image 
                    $image_name = $_FILES['image']['name'];
                    // echo $image_name;

                    // if the image is selected then 
                    if ($image_name != "") {
                        // echo "image selected";

                        //now getting the extension of image
                        //end sepereates the name and the extension of the img means it selects the extension of the images
                        $ext = explode('.', $image_name);
                        //what is only variable shoud be passed by reference
                        $ext2 = end($ext);


                        //creating the new name for images
                        $image_name = "Food-Name-" . rand(0000, 9999) . "." . $ext2; //for eg(sanish.jpg into Food-Name-4444)

                        // now uploading the image 
                        // getting the source path and Destination path 
                        $src = $_FILES['image']['tmp_name'];

                        //destination
                        $dest = "../images/food/" . $image_name;

                        //uploading the images in destination 
                        $upload = move_uploaded_file($src, $dest);

                        if ($upload) {
                        } else {
                            $_SESSION['upload-error'] = 'Failed To Upload';

                            header('location' . SITEURL . 'admin/add-food.php');
                            die();
                            // header('location' . SITEURL . 'admin/add-food.php');
                            // die();

                        }


                        /////////////////       // check whether radio buttin for featured and active are checked or not 
                        if (isset($_POST['featured'])) {
                            $featured = $_POST['featured'];
                        } else {
                            $featured = "No";
                        }

                        if (isset($_POST['active'])) {
                            $active = $_POST['active'];
                        } else {
                            $active = "No";
                        }




                        // now inserting into database
                        $sql2 = "INSERT INTO tbl_food SET 
                                title ='$title',
                                description= '$description',
                                price = $price,
                                image_name = '$image_name',
                                category_id = $category,
                                features = '$featured',
                                active = '$active'
                        ";

                        $qry2 = mysqli_query($conn, $sql2) or die("add food query is wrong");

                     

                        if ($qry2 == true) {
                            $_SESSION['food-add'] = "Sucessfully Added ";

                            // Cannot modify header information - headers already sent by (output started at C:\xampp\htdocs\Food_Order(ecommerce)\admin\add-food.php:102) in C:\xampp\htdocs\Food_Order(ecommerce)\admin\add-food.php on line 216
                            header('location:' . SITEURL . 'admin/manage-food.php');
                            // echo "add";
                        } else {
                            // echo "fase";
                            $_SESSION['food-faild-add'] = "Failed To Added ";
                            header('location:' . SITEURL . 'admin/manage-food.php');
                            //Cannot modify header information - headers already sent by (output started at C:\xampp\htdocs\Food_Order(ecommerce)\admin\add-food.php:102) in C:\xampp\htdocs\Food_Order(ecommerce)\admin\add-food.php on line 216
                            // header('location:' . SITEURL . 'admin/manage-food.php');
                            // echo "add";
                        }


                    } else {
                            // echo "fase";
                            $_SESSION['food-faild-add'] = "Failed To Added ";
                            // header('location:' . SITEURL . 'admin/manage-food.php');

                        }
                 } else {
                        // echo "no Image";
                 }
            } else {
                }
            } else {
                // echo "fase";
                $_SESSION['Fill-require'] = "Please Fill The From!!!";

                header('location:' . SITEURL . 'admin/add-food.php');

                // header('location:' . SITEURL . 'admin/add-food.php');



                

        }
        

        ?>


    </div>
</div>









<!-- footer section starts -->
<?php include('partials/footer.php') ?>


<!-- -----------------php for  uploading data in database------------------ -->
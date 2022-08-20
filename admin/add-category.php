<?php include('partials/menu.php');
include('partials/login-check.php');
?>
<!-- menu section end -->


<div class="main-content">
    <div class="wrapper">
        <h1>Add Category</h1>
        <br>

        <?php if (isset($_SESSION['upload-error'])) {
            echo  $_SESSION['upload-error'];
            unset($_SESSION['upload-error']);
        }
        ?><br><br>

        <form name="login" action="" method="POST" onsubmit="validation()" enctype="multipart/form-data">
            <!-- enctype is used for uploading files  -->
            <table class="tbl-30">
                <tr>
                    <td>Title:</td>

                    <td>
                        <input type="text" name="title" placeholder="Category title">

                    </td>
                </tr>

                <tr>
                    <td>Select Image:</td>

                    <td>
                        <input type="file" name="image">

                    </td>
                </tr>

                <tr>
                    <td>Featured:</td>

                    <td>
                        <input type="radio" name="featured" value="Yes">Yes
                        <input type="radio" name="featured" value="No">No


                    </td>
                </tr>

                <tr>
                    <td>Active:</td>

                    <td>
                        <input type="radio" name="active" value="Yes">Yes
                        <input type="radio" name="active" value="No">No


                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Category" class="btn-secondary">
                    </td>
                </tr>



            </table>

        </form>
    </div>
</div>






<!-- footer section starts -->
<?php include('partials/footer.php') ?>


<!-- -----------------php for  uploading data in database------------------ -->



<?php

if (isset($_POST['submit'])) {
    if (!empty(isset($_POST['featured'])) && !empty(isset($_POST['active'])) && !empty($_POST['title'])  && !empty($_FILES['image']['name'])) {
        //    1.getting the value from form
        $title = $_POST['title'];
        // if(!empty(($_POST['title'])))   ///for checking whether the title is empty or not
        //     echo ("not empty");
        // }else if(empty(($_POST['title']))){
        //     echo ("empty");
        // }

        //this is for image output
        // print_r($_FILES['image']['name']); and now checking if image is uploaded or not
        // if(!empty($_FILES['image']['name'])){
        // echo ("image is present");
        //     print_r($_FILES['image']['name']);

        // }else{
        //     echo ("no image");
        // }
        // now to upload image we need name, source path, and destinaton 
        if (isset($_FILES['image']['name'])) {
            $image_name = $_FILES['image']['name'];
            $source_path = $_FILES['image']['tmp_name'];
            $destination_path = "../images/category/" . $image_name;

            // now upload the images 
            $upload = move_uploaded_file($source_path, $destination_path);

            // now check whether the image is uploaded or not
            // if the image is not uploaded then we will stop the porcess and redirect with error message
            if ($upload == false) {
                $_SESSION['upload-error'] = 'Failed To Upload';
                header('location' . SITEURL . 'admin/add-category.php');
            }
        }


        // for radio button of featured we have to check whether the button is selected or not .
        if (isset($_POST['featured'])) {
            // getting the vallue from form
            $featured = $_POST['featured'];
        }
        // for radio button 0f active we have to check whether the button is selected or not .
        if (isset($_POST['active'])) {
            // getting the vallue from form
            $active = $_POST['active'];
        }


        $sql = "INSERT INTO tbl_category SET 
        title='$title' , 
        img_name = '$image_name',
        featured = '$featured',
        active='$active'
        ";

        $qry = mysqli_query($conn, $sql) or die("category query is wrong!!!");

        if ($qry) {
            // echo "treu";

            $_SESSION['category-add'] = "Sucessfully Added ";
            header('location:' . SITEURL . 'admin/manage-category.php');
        } else {
            // echo "fase";
            $_SESSION['category-faild-add'] = "Failed To Added ";
            header('location:' . SITEURL . 'admin/manage-category.php');
        }
    }
}

?>
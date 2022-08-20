<?php include('partials/menu.php');
include('partials/login-check.php');
?>
<!-- menu section end -->


<div class="main-content">
    <div class="wrapper">
        <h1>Add Category</h1>
        <br><br>

        <form name="login" action="" method="POST" onsubmit="validation()">
            <table class="tbl-30">
                <tr>
                    <td>Title:</td>

                    <td>
                        <input type="text" name="title" placeholder="Category title">

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




    if (!empty(isset($_POST['featured'])) && !empty(isset($_POST['active'])) && !empty($_POST['title'])) {
        //    1.getting the value from form
        $title = $_POST['title'];
        // if(!empty(($_POST['title'])))   ///for checking whether the title is empty or not
        //     echo ("not empty");
        // }else if(empty(($_POST['title']))){
        //     echo ("empty");
        // }


        // for radio button of featured we have to check whether the button is selected or not .
        if (isset($_POST['featured'])) {
            // getting the vallue from form
            $featured = $_POST['featured'];
        } else {
            $featured = "NO Featured";
        }


        // for radio button 0f active we have to check whether the button is selected or not .
        if (isset($_POST['active'])) {
            // getting the vallue from form
            $active = $_POST['active'];
        } else {
            $active = "NO Active";
        }

        $sql = "INSERT INTO tbl_category SET 
        title='$title' , 
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
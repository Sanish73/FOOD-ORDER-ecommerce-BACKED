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



            echo ("hi");
        }
        

        ?>


    </div>
</div>









<!-- footer section starts -->
<?php include('partials/footer.php') ?>


<!-- -----------------php for  uploading data in database------------------ -->
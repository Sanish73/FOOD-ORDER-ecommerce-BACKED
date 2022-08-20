<?php include('partials/menu.php'); ?>
<!-- menu section end -->


<div class="main-content">
    <div class="wrapper">
        <h1>Update Password</h1>
        <br><br>

        <!-- ---------------------php for data ------------------- -->
        <?php
        // 1. First we should get the id from GET method AKA website link

        // $G_id = $_GET['id']; //or
        if (isset($_GET['id'])) {
            $Iid = $_GET['id'];
          
        }

        if (isset($_SESSION['not-match'])) { //yesley session exist garxa vaney dekhauxa..i mean session ko message dekhauxa
            echo $_SESSION['not-match'];
            // session_unset();
            unset($_SESSION['not-match']);
        }

        ?>


        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Current Password:</td>
                    <td>
                        <input type="password" name="currentpassword" placeholder="Current Password">
                    </td>
                </tr>

                <tr>
                    <td>New Password:</td>
                    <td>
                        <input type="text" name="newpassword" placeholder="New password">
                    </td>
                </tr>


                <tr>
                    <td>Confirm Password:</td>
                    <td>
                        <input type="text" name="confirmpassword" placeholder="Confirm password">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="text" name="id" value="<?php echo $Iid ?>">
                        <input type="submit" name="submit" value="Update Admin" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>
    </div>
</div>



</div>
</div>


<!-- ----------------php for whether the submit button is clicked or not-------------------------- -->
<?php

if (isset($_POST['submit'])) {
    $Iid = $_POST['id'];
    $CurrentPassword = md5($_POST['currentpassword']);
    $NewPassword = md5($_POST['newpassword']);
    $ConfirmPassword = md5($_POST['confirmpassword']);




    $sql = "SELECT * FROM tbl_admin WHERE id= $Iid AND password='$CurrentPassword'";

    $qry = mysqli_query($conn, $sql) or die("Update query is not match!!!");

    if ($qry == true) {
        $count = mysqli_num_rows($qry); //this checks whether their is value or not

        if ($count == 1) { //check whether user exist for changing password

            if ($NewPassword == $ConfirmPassword) {
                $sql = "UPDATE tbl_admin SET password = '$ConfirmPassword'  WHERE id= '$Iid' ";

                $qry = mysqli_query($conn, $sql) or die("update button is not valid!!!!!!");

                if ($qry) {
                    //now we create the variable to display message
                    $_SESSION['update'] = "Password Succesfully Updated";
                    //after added we redirect to back page so
                    header('location:' . SITEURL . 'admin/manage-admin.php');
                } else {
                    //now we create the variable to display message
                    $_SESSION['update'] = "Failed To Updated Password";
                    //after added we redirect to back page so
                    header('location:' . SITEURL . 'admin/update-admin.php');
                }
            } else if ($NewPassword != $ConfirmPassword) {

                $_SESSION['not-match'] = "Password Dosn't Matched";
                //after added we redirect to back page so
                header('location:' . SITEURL . 'admin/update-password.php?id=' . $Iid);
            }
        } else {
            // if we didnt found admin data then we redirect to home page so that hacker cannot get into update admin
            $_SESSION['user-not-found'] = "User Not Found";
            //after added we redirect to back page so
            header('location:' . SITEURL . 'admin/manage-admin.php');
        }
    }
}

?>























<!-- footer section starts -->
<?php include('partials/footer.php') ?>
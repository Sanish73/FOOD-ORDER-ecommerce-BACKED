<?php include('partials/menu.php'); ?>
<!-- menu section end -->




<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
        <br><br>
        <form name="login" action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full Name:</td>
                    <td>
                        <input type="text" name="fullname" placeholder="Enter your Full Name.">
                    </td>
                </tr>

                <tr>
                    <td>Username:</td>
                    <td>
                        <input type="text" name="username" placeholder="Your username.">
                    </td>
                </tr>

                <tr>
                    <td>Password:</td>
                    <td>
                        <input type="password" name="password" placeholder=" Your Password.">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                    </td>
                </tr>
            </table>

        </form>
    </div>
</div>

<!-- footer section starts -->
<?php include('partials/footer.php') ?>

<!-- --------------javascript for validation------------- -->
<script>
    validation(){
        var fullName = document.login.fullname.value;

        alert (fullName);
    };
</script>



<!-- --------------------------PHP---------------------------- -->
<?php

if (isset($_POST['submit'])) //button clicked
{
    //now getting the value from the form;

    $full_name = $_POST['fullname'];
    $user_name = $_POST['username'];
    $password = md5($_POST['password']);



    $sql = "INSERT INTO tbl_admin SET 
        full_name='$full_name',
         username='$user_name',
         password='$password'";

    $qry = mysqli_query($conn, $sql) or die("query is worng");

    if ($qry == TRUE) {
        //now we create the variable to display message
        $_SESSION['add'] = "Sucessfully Added";
        //after added we redirect to back page so

        header('location:' . SITEURL . 'admin/manage-admin.php');
    } else {

        //now we create the variable to display message
        $_SESSION['add'] = "Failed to Add";
        //after added we redirect to back page so

        header('location:' . SITEURL . 'admin/add-admin.php');
    }
}
?>
<?php include('partials/menu.php'); ?>
<!-- menu section end -->




<div class="main-content">
        <div class="wrapper">
            <h1>Add Admin</h1>
    <br><br>
        <form action="" method="POST">
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



<?php

    if(isset($_POST['submit']))//button clicked
    {
                //now getting the value from the form;

        $full_name =$_POST['fullname'];
        $user_name = $_POST['username'];
        $password = $_POST['password'];


        echo $user_name;
        echo $password;
        
     
    }
?>
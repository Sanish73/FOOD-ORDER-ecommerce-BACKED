<?php include('partials/menu.php'); ?>
<!-- menu section end -->


<div class="main-content">
    <div class="wrapper">
        <h1>Update Admin</h1>
        <br><br>

        <!-- ---------------------php for data ------------------- -->
        <?php
        // 1. First we should get the id from GET method AKA website link
        $G_id = $_GET['id'];

        $sql = "SELECT * FROM tbl_admin WHERE id= $G_id";

        $qry = mysqli_query($conn, $sql) or die("Update query is not match!!!");

        if ($qry == true) {
            $count = mysqli_num_rows($qry); //this checks whether their is value or not

            if ($count == 1) { //check whether we have admin data or not
                $row = mysqli_fetch_assoc($qry);

                $FullName = $row['full_name'];
                $UserName = $row['username'];
            } else {
                // if we didnt found admin data then we redirect to home page so that hacker cannot get into update admin
                echo
            }
        }

        ?>

        <form action="" method="POST">
            <table class="tbl-30" >
                <tr>
                    <td>Full Name:</td>
                    <td>
                        <input type="text" name="fullname" value="<?php echo $FullName; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Username:</td>
                    <td>
                        <input type="text" name="username" value="<?php echo $UserName; ?>">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Update Admin" class="btn-secondary">
                    </td>
                </tr>
            </table>

        </form>
    </div>
</div>








<!-- footer section starts -->
<?php include('partials/footer.php') ?>
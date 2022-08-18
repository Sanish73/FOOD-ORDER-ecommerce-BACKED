<?php include('partials/menu.php'); ?>
<!-- menu section end -->






<!-- main content section starts -->
<div class="main-content">
    <div class="wrapper">
        <h1>Manage Admin</h1>

        <!-- button to add admin -->
        <br>
        <?php
        if (isset($_SESSION['add'])) { //yesley session exist garxa vaney dekhauxa..i mean session ko message dekhauxa
            echo $_SESSION['add'];
            session_unset();
        }

        ?>
        <br><br><br>
        <a href="add-admin.php" class="btn-primary">Add Admin</a>
        <br><br><br>
        <table class="tbl-full">
            <tr>
                <th>S.N</th>
                <th>Full Name</th>
                <th>User Name</th>
                <th>Actions</th>
            </tr>
            <!-- ---------------PHP for table value--------------- -->
            <?php
            $sql = "SELECT * FROM tbl_admin";

            $qry = mysqli_query($conn, $sql) or die("data Error!!!");




            if ($qry) {

                $count = mysqli_num_rows($qry);

                if ($count > 0) {



                    while ($row = mysqli_fetch_array($qry)) { //here i got UNDEFINED ARRAY KEY beacause i wrote "mysqli_fetch_row but i should have write array..
                        $ID = $row['id'];
                        $FULLNAME = $row['full_name'];
                        $USERNAME = $row['username'];
                        $PASSWORD = $row['password'];

            ?>
                        <tr>
                            <td><?php echo ($ID); ?></td>
                            <td><?php echo ($FULLNAME); ?></td>
                            <td><?php echo ($USERNAME); ?></td>
                            <td>
                                <a href="#" class="btn-secondary">Update Admin</a>
                                <a href="#" class="btn-danger">Delete Admin</a>
                            </td>
                        </tr>
            <?php
                    }
                }
            }
            ?>
            <!-- --------------------end of php---------------------------- -->





        </table>
    </div>

</div>





<!-- footer section starts -->
<?php include('partials/footer.php') ?>
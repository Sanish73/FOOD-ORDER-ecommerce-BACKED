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
        <!-- ---------------PHP for table value--------------- -->
        <?php
        $sql = "SELECT * FROM tbl_admin";

        $query = mysqli_query($conn, $sql) or die("data Error!!!");

        if ($query) {
            $row = mysqli_fetch_row($query);

            while ($row) {
                $ID = $row['id'];
                $FULLNAME = $row['full_name'];
                $USERNAME = $row['username'];
                $PASSWORD = $row['password'];
            }
        }
        ?>
        <!-- --------------------end of php---------------------------- -->
        <table class="tbl-full">
            <tr>
                <th>S.N</th>
                <th>Full Name</th>
                <th>User Name</th>
                <th>Actions</th>
            </tr>
            <tr>
                <td><?php echo ($ID); ?></td>
                <td><?php echo ($FULLNAME); ?>/td>
                <td><?php echo ($USERNAME); ?></td>
                <td>
                    <a href="#" class="btn-secondary">Update Admin</a>
                    <a href="#" class="btn-danger">Delete Admin</a>
                </td>
            </tr>

            <tr>
                <td>1.</td>
                <td>Vijay </td>
                <td>Vijay th</td>
                <td>
                    <a href="#" class="btn-secondary">Update Admin</a>
                    <a href="#" class="btn-danger">Delete Admin</a>
                </td>
            </tr>

            <tr>
                <td>1.</td>
                <td>Vijay </td>
                <td>Vijay th</td>
                <td>
                    <a href="#" class="btn-secondary">Update Admin</a>
                    <a href="#" class="btn-danger">Delete Admin</a>
                </td>
            </tr>

        </table>
    </div>

</div>





<!-- footer section starts -->
<?php include('partials/footer.php') ?>
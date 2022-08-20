<?php include('partials/menu.php'); ?>
<!-- menu section end -->


<div class="main-content">
    <div class="wrapper">
        <h1>Manage Category</h1>
        <br><br>
        <a href="<?php echo SITEURL; ?>admin/add-category.php" class="btn-primary">Add Category</a>
        <br><br><br>
        <?php
        if (isset($_SESSION['category-add'])) {
            echo ($_SESSION['category-add']);
            unset($_SESSION['category-add']); //here sanish you can get error if you put session_unset()
            // session_unset();     dont put this// beaause of this the main session that you have put can also be unset results in $_session['user'] destory so
            // put unset($_session[']) this makes only particaular session unset
        }
        if (isset($_SESSION['category-faild-add'])) {
            echo ($_SESSION['category-faild-add']);
            unset($_SESSION['category-faild-add']);
        }

        ?>
        <table class="tbl-full">
            <tr>
                <th>S.N</th>
                <th>Full Name</th>
                <th>User Name</th>
                <th>Actions</th>
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
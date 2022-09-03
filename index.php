<?php include('partials-Fronts/menu.php') ?>


<!-- -----------------Foood Search starts ------------------------  -->
<section class="food-search text-center">
    <div class="container">
        <!-- <h1>Food search</h1> -->
        <form action="">
            <input type="search" name="search" placeholder="Search For Food">
            <input type="submit" name="submit" value="Search" class="btn btn-primary">
        </form>

    </div>

</section>
<!-- -----------------Foood Search Ends ------------------------  -->




<!-- -----------------Categories starts ------------------------  -->
<section class="categories">
    <div class="container">
        <h1 class="text-center">Explore Foods</h1>


        <?php

        //creating sql queries
        $sql = "SELECT * FROM tbl_category";

        $qry = mysqli_query($conn, $sql);

        $count = mysqli_num_rows($qry);

        if ($count > 0) {
            while ($row = mysqli_fetch_assoc($qry)) {
            }
        } else {
            echo ("Categories not Availabel");
        }
        ?>
        <a href="#">
            <div class="box-3 float-container">
                <img src="images/pizza.jpg" alt="Pizza" class="img-responsive img-curve">
                <h3 class="float-text text-white">Pizza</h3>
            </div>
        </a>


        <!-- <a href="#">
                <div class="box-3 float-container">
                    <img src="images/burger.jpg" alt="Burger" class="img-responsive img-curve">
                    <h3 class="float-text text-white">Burger</h3>

                </div>
            </a>
            <a href="#">
                <div class="box-3 float-container">
                    <img src="images/momo.jpg" alt="Momo" class="img-responsive img-curve">
                    <h3 class="float-text text-white">Momo</h3>

                </div>
            </a> -->
        <div class="clearfix"></div>
    </div>
</section>
<!-- -----------------Categories Ends ------------------------  -->


<!-- -----------------food-menu starts ------------------------  -->
<section class="food-menu">
    <div class="container">
        <h1 class="text-center">Special Food</h1>

        <div class="food-menu-box">
            <div class="food-menu-img">
                ` <img src="images/menu-pizza.jpg" alt="Chicken Hawain Pizza" class="img-curve img-responsive">
            </div>

            <div class="food-menu-desc">
                <h4>Chicken Pizza</h4>
                <p class="food-price">$1.3</p>
                <p class="food-desc">this food is one of the kind </p>
                <br>
                <a href="#" class="btn btn-primary">Order Now</a>
            </div>

            <div class="clearfix"></div>
        </div>
        <!-- ------------------------- -->
        <div class="food-menu-box">
            <div class="food-menu-img">
                ` <img src="images/menu-burger.jpg" alt="Chicken Hawain Burger" class="img-curve img-responsive">
            </div>

            <div class="food-menu-desc">
                <h4>Burger</h4>
                <p class="food-price">$3</p>
                <p class="food-desc">this food is one of the kind </p>
                <br>
                <a href="#" class="btn btn-primary">Order Now</a>
            </div>

            <div class="clearfix"></div>
        </div>
        <!-- ------------------------------ -->
        <div class="food-menu-box">
            <div class="food-menu-img">
                ` <img src="images/i01_chevanon.jpg" alt="i01_chevanon" class="img-curve img-responsive">
            </div>

            <div class="food-menu-desc">
                <h4>Chevanon</h4>
                <p class="food-price">$5</p>
                <p class="food-desc">this food is one of the kind </p>
                <br>
                <a href="#" class="btn btn-primary">Order Now</a>
            </div>

            <div class="clearfix"></div>
        </div>
        <!-- ---------------------------  -->
        <div class="food-menu-box">
            <div class="food-menu-img">
                ` <img src="images/pexels-cats-coming-955137.jpg" alt="Yamari" class="img-curve img-responsive">
            </div>

            <div class="food-menu-desc">
                <h4>Yamari</h4>
                <p class="food-price">$3.5</p>
                <p class="food-desc">this food is one of the kind </p>
                <br>
                <a href="#" class="btn btn-primary">Order Now</a>
            </div>

            <div class="clearfix"></div>
        </div>
        <!-- ----------------------------------  -->
        <div class="food-menu-box">
            <div class="food-menu-img">
                ` <img src="images/fried.jpg" alt="Fried Rice" class="img-curve img-responsive">
            </div>

            <div class="food-menu-desc">
                <h4>Fried Rice</h4>
                <p class="food-price">$1</p>
                <p class="food-desc">this food is one of the kind </p>
                <br>
                <a href="#" class="btn btn-primary">Order Now</a>
            </div>

            <div class="clearfix"></div>
        </div>
        <!-- ---------------------------  -->
        <div class="food-menu-box">
            <div class="food-menu-img">
                ` <img src="images/menu-momo.jpg" alt="Momo" class="img-curve img-responsive">
            </div>

            <div class="food-menu-desc">
                <h4>Chicken Momo</h4>
                <p class="food-price">$1.5</p>
                <p class="food-desc">this food is one of the kind </p>
                <br>
                <a href="#" class="btn btn-primary">Order Now</a>
            </div>

            <div class="clearfix"></div>
        </div>


        <div class="clearfix"></div>
    </div>

</section>
<!-- -----------------food-menu ENds ------------------------  -->



<?php include('partials-Fronts/footer.php'); ?>
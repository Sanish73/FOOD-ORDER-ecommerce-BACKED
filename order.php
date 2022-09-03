<?php include('partials-Fronts/menu.php') ?>

<!-- -----------------Foood Search starts ------------------------  -->
<section class="food-search">
    <h1  class=" text-center">Fill this form to Order</h1>

    <form class="order-form" action="" method="POST">
        <fieldset class="order-fieldset">
            <legend >Selected Food</legend>
            <div class="food-menu-box order-menu-box">
                <div class="food-menu-img order-menu-img">
                    ` <img src="images/i01_chevanon.jpg" alt="i01_chevanon" class="img-curve img-responsive">
                </div>

                <div class="food-menu-desc order-menu-desc">
                    <h4>Chevanon</h4>
                    <p class="food-price">$5</p>
                    <h4>Quantity:</h4>
                    <!-- <p class="food-desc">this food is one of the kind </p> -->
                    <br>
                    <!-- <a href="#" class="btn btn-primary">Order Now</a> -->
                    <input type="number" name="quantity" id="quantity">
                </div>

                <div class="clearfix"></div>
            </div>
        </fieldset>
    </form>

    <form class="order-form" action="" method="POST">
        <fieldset class="order-fieldset">
            <legend >Delivery Details</legend>

           <label for="">Full Name:</label>
           <input type="text" name="fullname" placeholder="E.g Sanish Thapa"><br>

           <label for="">Phone Number:</label>
           <input type="text" name="fullname" placeholder="E.g 984******"><br>
           
           <label for="">Email:</label>
           <input type="email" name="fullname" placeholder="E.g food@gmail.com"><br>

           <label for="">Address:</label>
           <textarea name="description" cols="30" rows="5" placeholder="E.g food@gmail.com"></textarea>
          
           <input type="submit" name="submit" value="submit">
        </fieldset>
    </form>
   
</section>
<!-- ----------------Foood Search Ends -----------------------  -->




<?php include('partials-Fronts/footer.php'); ?>
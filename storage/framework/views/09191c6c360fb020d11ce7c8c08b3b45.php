<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/stylecheckout.css">
<body>
<h2>Checkout Form</h2>
<div class="row">
  <div class="col-75">
    <div class="container">
      <form action="<?php echo e(route('checkout.process')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="row">
          <div class="col-50">
            <h3>Billing Address</h3>
            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" id="fname" name="name">
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email">
            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
            <input type="text" id="adr" name="address">
            <label for="city"><i class="fa fa-institution"></i> City</label>
            <input type="text" id="city" name="city">
            <label for="zip">Zip</label>
            <input type="text" id="zip" name="zip">
          </div>
          <?php if(!empty($selectedProducts)): ?>
                <?php $__currentLoopData = $selectedProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cartItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <input type="hidden" name="orderedProducts[<?php echo e($cartItem->id); ?>][nama_product]" value="<?php echo e($cartItem->nama_product); ?>">
                    <input type="hidden" name="orderedProducts[<?php echo e($cartItem->id); ?>][quantity]" value="<?php echo e($cartItem->quantity); ?>">
                    <input type="hidden" name="orderedProducts[<?php echo e($cartItem->id); ?>][price]" value="<?php echo e($cartItem->harga); ?>">
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
          <div class="col-50">
            <h3>Payment</h3>
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cardname">
            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber">
            <label for="expmonth">Exp Month</label>
            <input type="text" id="expmonth" name="expmonth">
            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" name="expyear">
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv">
              </div>
            </div>
          </div>
        </div>
        <label>
          <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
        </label>
        <input type="submit" value="Continue to checkout" class="btn">
      </form>
      <form action="/cart"><?php echo csrf_field(); ?><input type="submit" value="Continue Shopping" class="btn-back"></form>
    </div>
</div>
<div class="col-25">
    <div class="container">
        <?php
            $totalQuantity = 0;
            $totalPrice = 0;
        ?>
        <?php if(!empty($selectedProducts)): ?>
            <?php $__currentLoopData = $selectedProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cartItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $totalQuantity += $cartItem->quantity;
                    $totalPrice += $cartItem->harga * $cartItem->quantity;
                ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <h4>Order Summary <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b><?php echo e($totalQuantity); ?></b></span></h4>
            <?php $__currentLoopData = $selectedProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cartItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <p>
                    <a href="#"></a><?php echo e($cartItem->nama_product); ?> x 
                    <span class="quantity"><?php echo e($cartItem->quantity); ?></span>
                    <span class="price">Rp.<?php echo e($cartItem->harga * $cartItem->quantity); ?></span>
                </p>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <p>Total <span class="price" style="color:black"><b>Rp.<?php echo e($totalPrice); ?></b></span></p>
        <?php else: ?>
            <p>No selected products</p>
        <?php endif; ?>
    </div>
</div>
</div>
</body><?php /**PATH D:\College\Semester 4\xamppp\htdocs\WebFramework\resources\views/pages/checkout.blade.php ENDPATH**/ ?>
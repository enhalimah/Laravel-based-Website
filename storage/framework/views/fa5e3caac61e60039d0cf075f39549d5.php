<?php if(session('removesuccess')): ?>
    <script>
        alert("Product removed from the cart.");
    </script>
<?php endif; ?>
<?php if(session('error')): ?>
    <script>
        alert("Product not found in the cart.");
    </script>
<?php endif; ?>
<?php if(session('failedcheckout')): ?>
    <script>
        alert("<?php echo e(session('failedcheckout')); ?>");
    </script>
<?php endif; ?>
<?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>

<?php $__env->startSection('maincontent'); ?>
<link rel="stylesheet" href="css/stylecart.css">
<section class="contentcart">
    <h1>Your Cart</h1>
        <table class="cart-table">
            <thead>
                <tr>
                    <th>Select</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $cartItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cartItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td>
                        <input type="checkbox" class="product-checkbox" name="selectedProducts[]" value="<?php echo e($cartItem['cart']->id); ?>" onchange="updateTotal()">
                    </td>
                    <td>
                        <img src="<?php echo e($cartItem['image_url']); ?>" alt="<?php echo e($cartItem['cart']->nama_product); ?>" class="cart-product-image">
                        <?php echo e($cartItem['cart']->nama_product); ?>

                    </td>
                    <td><?php echo e($cartItem['cart']->harga); ?></td>
                    <td>
                        <input type="number" value="<?php echo e($cartItem['quantity']); ?>" class="cart-quantity" disabled>
                    </td>
                    <td><?php echo e($cartItem['total']); ?></td>
                    <td>
                    <form onsubmit="return confirm('Are you sure to delete this product from your cart?');" action="<?php echo e(url('/removecart', $cartItem['cart']->nama_product)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="cart-remove-btn">Remove</button>
                    </form>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <div id="totalSection">
            <p>Total Quantity: <span id="totalQuantity">0</span></p>
            <p>Total Price: <span id="totalPrice">0.00</span></p>
        </div>
        <form action="<?php echo e(url('/checkout')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="selectedProducts" id="selectedProductsInput" value="">
            <div class="checkoutButtonContainer">
                <button class="checkoutButton" type="submit" onclick="checkout()">Checkout</button>
            </div>
        </form>
    
</section>
<script>
    function updateTotal() {
        var checkboxes = document.querySelectorAll('.product-checkbox');
        var totalQuantity = 0;
        var totalPrice = 0;

        checkboxes.forEach(function (checkbox) {
            if (checkbox.checked) {
                var row = checkbox.closest('tr');
                var quantity = parseInt(row.querySelector('.cart-quantity').value);
                var price = parseFloat(row.querySelector('td:nth-child(3)').textContent);
                var total = quantity * price;

                totalQuantity += quantity;
                totalPrice += total;
            }
        });

        // Update total quantity and total price on the page
        document.getElementById('totalQuantity').innerText = totalQuantity;
        document.getElementById('totalPrice').innerText = totalPrice.toFixed(2);
    }

    function checkout() {
        var selectedProductsInput = document.getElementById('selectedProductsInput');
        var checkboxes = document.querySelectorAll('.product-checkbox:checked');
        var selectedProducts = [];

        checkboxes.forEach(function (checkbox) {
            selectedProducts.push(checkbox.value);
        });

        selectedProductsInput.value = JSON.stringify(selectedProducts);
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('mainlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\College\Semester 4\xamppp\htdocs\WebFramework\resources\views/pages/cart.blade.php ENDPATH**/ ?>
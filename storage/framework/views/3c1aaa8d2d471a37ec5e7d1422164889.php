

<?php $__env->startSection('maincontent'); ?>
<?php if(session('message')): ?>
    <script>
        alert("<?php echo e(session('message')); ?>");
    </script>
<?php endif; ?>

<?php if(session('error')): ?>
    <div class="alert alert-danger" style="color:red; margin-top: 20px;">
        <center><b><?php echo e(session('error')); ?></b></center>
    </div>
<?php endif; ?>
<link rel="stylesheet" href="/css/style.css">
<div class="product-search">
        <div class="productbox">
        <?php if(isset($products) && count($products) > 0): ?>
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="cards">
                <div class="image-product" style="background-image: url('<?php echo e($data->gambar_product); ?>')"></div>
                    <div class="contentt">
                        <h2><?php echo e($data->nama_product); ?></h2>
                        <h3 class="price">Rp.<?php echo e($data->harga_product); ?></h3>
                        <p><?php echo e($data->desc_product); ?></p>
                        <form action="<?php echo e(url('addcart', $data->id_product)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <input type="number" value="1" min="1" class="form-control" name="quantity">
                            <br>
                            <br>
                            <input class="btn btn-primary" type="submit" value="Add to cart">
                        </form>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <p>No products found.</p>
        <?php endif; ?>
        </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('mainlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\College\Semester 4\xamppp\htdocs\WebFramework\resources\views/pages/products_index.blade.php ENDPATH**/ ?>
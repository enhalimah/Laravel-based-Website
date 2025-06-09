

<?php $__env->startSection('maincontentadmin'); ?>
    <link rel="stylesheet" href="/css/styleadmin.css">

    <main role="main">
        <section class="panel important">
            <center>
                <h1>Add Product</h1>
            </center>
            <form action="<?php echo e(route('productadmin.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>

                <div class="form-group">
                    <label for="nama_product">Product Name:</label>
                    <input type="text" name="nama_product" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="harga_product">Price:</label>
                    <input type="number" name="harga_product" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="stok">Stock:</label>
                    <input type="number" name="stok" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="desc_product">Description:</label>
                    <textarea name="desc_product" class="form-control" rows="4" required></textarea>
                </div>

                <div class="form-group">
                    <label for="gambar_product">Product Image:</label>
                    <input type="file" name="gambar_product" class="form-control" accept="image/*" required>
                </div>

                <button type="submit" class="btn btn-primary">Add Product</button>
            </form>
        </section>
    </main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layoutsadmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\College\Semester 4\xamppp\htdocs\WebFramework\resources\views/pagesadmin/createproduct.blade.php ENDPATH**/ ?>
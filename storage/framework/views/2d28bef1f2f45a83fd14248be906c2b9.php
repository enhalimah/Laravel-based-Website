

<?php $__env->startSection('maincontentadmin'); ?>
<link rel="stylesheet" href="/css/styleadmin.css">
</head>
<body>
<main role="main">
        <section class="panel important">
            <center><h1>Product</h1></center>
            <div class="add">
                <form action="<?php echo e(url('productadmin/add')); ?>" method="get">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="add-btn">Add Product</button>
                </form>
            </div>
            <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Detail</th>
                </tr>
            </thead>
            <?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tbody>
                <tr>
                    <td><?php echo e($item->nama_product); ?></td>
                    <td><?php echo e($item->harga_product); ?></td>
                    <td><?php echo e($item->stok); ?></td>
                    <td><?php echo e($item->desc_product); ?></td>
                    <td><img src="<?php echo e($item->gambar_product); ?>" style="width:100px; height:auto"></td>
                    <td>
                        <form action="<?php echo e(url('productadmin/edit')); ?>/<?php echo e($item->id_product); ?>" method="GET">
                            <?php echo csrf_field(); ?>
                                <button type="submit" class="edit">Edit</button>
                        </form>
                        <form onsubmit="return confirm('Are you sure to delete this product?');" action="/productadmin/<?php echo e($item->id_product); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="delete">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>
        </section>
    </main>
</body>
</head>
<?php if(session('successadd')): ?>
    <script>
        alert("<?php echo e(session('successadd')); ?>");
    </script>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layoutsadmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\College\Semester 4\xamppp\htdocs\WebFramework\resources\views/pagesadmin/productadmin.blade.php ENDPATH**/ ?>
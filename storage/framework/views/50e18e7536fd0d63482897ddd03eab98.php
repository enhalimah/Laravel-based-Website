

<?php $__env->startSection('maincontentadmin'); ?>
<link rel="stylesheet" href="/css/styleadmin.css">
</head>
<body>
<main role="main">
        <section class="panel important">
            <center><h1>User</h1></center>
            <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Detail</th>
                </tr>
            </thead>
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tbody>
                <tr>
                    <td><?php echo e($user->id); ?></td>
                    <td><?php echo e($user->name); ?></td>
                    <td><?php echo e($user->address); ?></td>
                    <td><?php echo e($user->phone); ?></td>
                    <td><?php echo e($user->email); ?></td>
                    <td>
                        <form onsubmit="return confirm('Are you sure to delete this user?');" action="/user/<?php echo e($user->id); ?>" method="POST">
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
<?php if(session('successuser')): ?>
    <script>
        alert("<?php echo e(session('successuser')); ?>");
    </script>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layoutsadmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\College\Semester 4\xamppp\htdocs\WebFramework\resources\views/pagesadmin/user.blade.php ENDPATH**/ ?>
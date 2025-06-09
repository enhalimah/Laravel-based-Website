

<?php $__env->startSection('maincontentadmin'); ?>
<main role="main">
  
  <section class="panel important">
        <?php if(session('username')): ?>
            <div class="greeting">
                <center>
                    <h2>Hai, <?php echo e(session('username')); ?>! Selamat Bekerja!</h2>
                </center>
            </div>
        <?php endif; ?>
  </section>
</main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layoutsadmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\College\Semester 4\xamppp\htdocs\WebFramework\resources\views/pages/admin.blade.php ENDPATH**/ ?>
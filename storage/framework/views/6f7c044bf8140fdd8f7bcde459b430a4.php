<!DOCTYPE html>
<html lang="en">
<head>
    <title>Kudapannya</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>

<?php echo $__env->make('component/header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->yieldContent('maincontent'); ?>

<?php echo $__env->make('component/footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\College\Semester 4\xamppp\htdocs\WebFramework\resources\views/mainlayout.blade.php ENDPATH**/ ?>
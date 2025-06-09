<link rel="stylesheet" href="/css/styleadmin.css">
<header role="banner">
    <a href="homepage"><img src="/images/kudapan.png" width="60" height="60" class="logo"></a>
    <ul class="utilities">
        <br>
        <li class="users">
          <?php if(session('username')): ?>
            <a href="/admin"><?php echo e(session('username')); ?></a>
          <?php endif; ?>
        </li>
        <li class="logout warn"><a href="/logout">Log Out</a></li>
    </ul>
</header>

<nav role='navigation'>
  <br>
  <ul class="main">
    <li class="dashboard"><a href="admin">Dashboard</a></li>
    <li class="user"><a href="user">User</a></li>
    <li class="product"><a href="productadmin">Product</a></li>
  </ul>
</nav>
<?php /**PATH D:\College\Semester 4\xamppp\htdocs\WebFramework\resources\views/componentadmin/layoutsadmin.blade.php ENDPATH**/ ?>
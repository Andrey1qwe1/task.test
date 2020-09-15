<?php include_once(ROOT . '/views/layouts/header.php') ?>
<div class="top-link">
    <?php if(isset($_SESSION['user'])): ?>
    <span><a href="/logout">Log Out</a></span>
    <?php else : ?>
    <span><a href="/login">Login</a></span>
    <?php endif?>
</div>
<h1>Access Denied</h1>
<?php include_once(ROOT . '/views/layouts/footer.php') ?>

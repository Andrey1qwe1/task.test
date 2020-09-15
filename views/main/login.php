<?php include_once(ROOT . '/views/layouts/header.php') ?>

<div class="top-link">
    <a href="register">Register!</a>
</div>
<form action="#" method="post">
    <h2>Sign in</h2>
    <?php if(isset($errors) && is_array($errors)): ?>
        <ul>
            <?php foreach ($errors as $error): ?>
                <li class="error"><?php echo $error ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <label>
        <span>Username</span>
        <input type="text" name="username" placeholder="Username" value="<?php echo $username ?>" required>
    </label>
    <label>
        <span>Password</span>
        <input type="password" name="password" placeholder="Password" value="<?php echo $password ?>" required>
    </label>
    <button type="submit" name="submit" class="btn btn-login">Sign In</button>

</form>
<?php include_once(ROOT . '/views/layouts/footer.php') ?>

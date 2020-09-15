<?php include_once(ROOT . '/views/layouts/header.php') ?>
<div class="top-link">
    <span><a href="/user/view/<?php echo $user['id'] ?>">Go back</a></span>
    <span><a href="/logout">Logout</a></span>
</div>

<form action="#" method="post">
    <h2>Edit user <?php echo $user['username'] ?></h2>
    <?php if(isset($errors) && is_array($errors)): ?>
        <ul>
            <?php foreach ($errors as $error): ?>
                <li class="error"><?php echo $error ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <label>
        <span>First name</span>
        <input type="text" name="name" placeholder="First name" value="<?php echo $user['name'] ?>" required>
    </label>
    <label>
        <span>Second name</span>
        <input type="text" name="surname" placeholder="Second name" value="<?php echo $user['surname'] ?>" required>
    </label>
    <label>
        <span>Username</span>
        <input type="text" name="username" placeholder="Username" value="<?php echo $user['username'] ?>" required>
    </label>
    <label>
        <span>Password</span>
        <input type="text" name="password" placeholder="Password" value="<?php echo $user['password'] ?>" required>
    </label>
    <button type="submit" name="submit" class="btn">Edit</button>
</form>

<?php include_once(ROOT . '/views/layouts/footer.php') ?>
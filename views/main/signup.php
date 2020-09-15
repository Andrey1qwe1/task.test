<?php include_once(ROOT . '/views/layouts/header.php') ?>
<div class="top-link">
    <a href="/login">Log in!</a>
</div>

<form action="#" method="post">
    <h2>Sign Up</h2>
    <?php if(isset($errors) && is_array($errors)): ?>
        <ul>
            <?php foreach ($errors as $error): ?>
                <li class="error"><?php echo $error ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <label>
        <span>First name</span>
        <input type="text" name="name" placeholder="First name" value="<?php echo $name ?>" required>
    </label>
    <label>
        <span>Second name</span>
        <input type="text" name="surname" placeholder="Second name" value="<?php echo $surname ?>" required>
    </label>
    <label>
        <span>Username</span>
        <input type="text" name="username" placeholder="Username" value="<?php echo $username ?>" required>
    </label>
    <label>
        <span>Password</span>
        <input type="password" name="password" placeholder="Password" value="<?php echo $password ?>" required>
    </label>
    <label>
        <span>Birthday</span>
        <input type="date" name="birthday" value="<?php echo $birthday ?>" required>
    </label>
    <label>
        <span>Gender</span>
        <select name="gender" required>
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select>
    </label>
    <button type="submit" name="submit" class="btn">Sign Up</button>
</form>

<?php include_once(ROOT . '/views/layouts/footer.php') ?>

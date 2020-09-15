<?php include_once (ROOT . '/views/layouts/header.php')?>
<div class="top-link">
    <span><a href="/">Users list</a></span>
    <span><a href="/logout">Log Out</a></span>
</div>

<table class="view-user">
    <tbody>
        <tr>
            <td><b>ID</b></td>
            <td><?php echo $user['id'] ?></td>
        </tr>
        <tr>
            <td><b>Username</b></td>
            <td><?php echo $user['username'] ?></td>
        </tr>
        <tr>
            <td><b>First name</b></td>
            <td><?php echo $user['name'] ?></td>
        </tr>
        <tr>
            <td><b>Second name</b></td>
            <td><?php echo $user['surname'] ?></td>
        </tr>
        <tr>
            <td><b>Gender</b></td>
            <td><?php echo $user['gender'] ?></td>
        </tr>
        <tr>
            <td><b>Birthday</b></td>
            <td><?php echo date_format(date_create($user['birthday']), 'd.m.Y') ?></td>
        </tr>
        <tr>
            <td></td>
            <td>
                    <span class="table-link"><a href="/user/edit/<?php echo $user['id'] ?>">Edit</a></span>
                    <span class="table-link"><a href="/user/delete/<?php echo $user['id'] ?>">Delete</a></span>
            </td>
        </tr>
    </tbody>

</table>



<?php include_once (ROOT . '/views/layouts/footer.php')?>

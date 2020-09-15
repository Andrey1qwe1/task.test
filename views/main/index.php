<?php include_once (ROOT . '/views/layouts/header.php')?>

<div class="top-link">
    <span><a href="/user/add">Add user</a></span>
    <span><a href="/logout">Log Out</a></span>
</div>

<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Username</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $user): ?>
    <tr>
        <td><?php echo $user['id'] ?></td>
        <td><?php echo $user['username'] ?></td>
        <td class="table-link">
            <span><a href="/user/view/<?php echo $user['id']; ?>">View</a></span>
            <span><a href="/user/edit/<?php echo $user['id']; ?>">Edit</a></span>
            <span><a href="/user/delete/<?php echo $user['id']; ?>">Delete</a></span>
        </td>
    </tr>
    <?php endforeach;?>

    </tbody>

</table>
<div class="pages">
<?php echo $pagination->get(); ?>
</div>
<?php include_once (ROOT . '/views/layouts/footer.php')?>

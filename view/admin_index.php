<?php
if (!Security::isAdmin()) {
    header("Location: /user");
}
?>
<div id="content">
    <h2>Posts</h2>
    <?php if (empty($post)): ?>
        <div class="dhd">
            <h2 class="item title">Oops! No posts found!</h2>
        </div>
    <?php else: ?>
        <?php foreach ($post as $image): ?>
            <div class="image-row">
                <div class="image-wrapper">
                    <figure>
                        <img src="data:application/octet-stream;base64, <?= base64_encode($image->image);?>"/>
                        <figcaption><?= $image->title;?></figcaption>
                    </figure>
                    <a title="Delete" href="/post/delete?id=<?= $image->id ?>">Delete</a> |
                    <a title="Edit" href="/post/edit?id=<?= $image->id ?>">Edit</a>
                </div>
                <hr>
            </div>
        <?php endforeach ?>
    <?php endif ?>

    <h2>Users</h2>
    <?php if (empty($users)): ?>
        <div class="dhd">
            <h2 class="item title">Oops! No users found!</h2>
        </div>
    <?php else: ?>
        <?php foreach ($users as $user): ?>
            <div class="image-row">
                <div class="image-wrapper">
                    <p><?= $user->username;?></p>
                    <a title="Delete" href="/user/delete?id=<?= $user->id ?>">Delete</a>
                </div>
            </div>
        <?php endforeach ?>
    <?php endif ?>

    <h2>Gallery</h2>
    <?php if (empty($gallery)): ?>
        <div class="dhd">
            <h2 class="item title">Oops! No gallery found!</h2>
        </div>
    <?php else: ?>
        <?php foreach ($gallery as $cat): ?>
            <div class="image-row">
                <div class="image-wrapper">
                    <p><?= $gallery->title;?></p>
                    <a title="Delete" href="/gallery/delete?id=<?= $gallery->id ?>">Delete</a>
                </div>
            </div>
        <?php endforeach ?>
    <?php endif ?>
</div>

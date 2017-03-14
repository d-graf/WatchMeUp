<?php
if (!Security::isAdmin()) {
    header("Location: /user");
}
?>
<div id="content">
    <h2>Posts</h2>
    <?php if (empty($image)): ?>
        <div class="dhd">
            <h2 class="item title">Oops! No posts found!</h2>
        </div>
    <?php else: ?>
        <?php foreach ($image as $post): ?>
            <div class="image-row">
                <div class="image-wrapper">
                    <figure>
                        <img src="data:application/octet-stream;base64, <?= base64_encode($post->image);?>"/>
                        <figcaption><?= $post->title;?></figcaption>
                    </figure>
                    <a title="Löschen" href="/image/delete?id=<?= $post->id ?>">Löschen</a>
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
                    <a title="Löschen" href="/user/delete?id=<?= $user->id ?>">Löschen</a>
                </div>
            </div>
        <?php endforeach ?>
    <?php endif ?>
</div>

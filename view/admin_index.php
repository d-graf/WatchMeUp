<?php
if (!Security::isAdmin()) {
    header("Location: /user");
}
?>
<div id="content">
    <h2>Posts</h2>
    <div class="toggle-posts">Show all posts! <i class="fa fa-chevron-down"></i></div>
    <div class="posts">
    <?php if (empty($image)): ?>
        <div class="dhd">
            <h2 class="item title">Oops! No posts found!</h2>
        </div>
    <?php else: ?>
        <?php foreach ($image as $post): ?>
            <div class="image-row-admin">
                <div class="image-wrapper-admin">
                    <figure class="figure-admin">
                        <img src="data:application/octet-stream;base64, <?= base64_encode($post->image);?>"/>
                        <figcaption class="figcaption-admin"><?= $post->title;?></figcaption>
                    </figure>
                    <div id="links-admin">
                        <a title="Delete" href="/image/delete?id=<?= $post->id ?>"><i class="fa fa-times"></i></a>
                        &nbsp;&nbsp;&nbsp;<a title="Edit" href="/image/edit?id=<?= $post->id ?>"><i class="fa fa-pencil-square-o"></i></a>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    <?php endif ?>
    </div>
    <h2>Users</h2>
    <div class="toggle-user">Show all user! <i class="fa fa-chevron-down"></i></div>
    <div class="user">
    <?php if (empty($users)): ?>
        <div class="dhd">
            <h2 class="item title">Oops! No users found!</h2>
        </div>
    <?php else: ?>
        <?php foreach ($users as $user): ?>
            <div class="image-row-admin-user">
                <div class="image-wrapper-admin-user">
                    <p class="p-admin"><?= $user->username;?></p>
                    <div id="links-admin">
                    <a title="Delete" href="/user/delete?id=<?= $user->id ?>"><i class="fa fa-times"></i></a>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    <?php endif ?>
    </div>
</div>
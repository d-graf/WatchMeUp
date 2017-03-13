<div id="content">
<?php if (empty($image)): ?>
    <div class="dhd">
        <h2 class="item title">Hoopla! Keine User gefunden.</h2>
    </div>
<?php else: ?>
    <?php foreach ($image as $post): ?>
        <div class="image-row">
            <div class="image-wrapper">
                <figure>
                    <img src="data:application/octet-stream;base64, <?= base64_encode($post->image);?>"/>
                    <figcaption><?= $post->title;?></figcaption>
                </figure>
            </div>
        </div>
    <?php endforeach ?>
<?php endif ?>
</div>

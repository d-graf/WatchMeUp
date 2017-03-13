<div id="content">
    <?php
        if (isset($_COOKIE['imageUploaded'])) {
            echo '<script type="text/javascript">$( document ).ready(function(){$( ".image_upload_message" ).delay(5000).fadeOut(400);});</script><div class="image_upload_message">The image is successfully uploaded!</div>';
        }
    ?>
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
            </div>
            <hr>
        </div>
    <?php endforeach ?>
<?php endif ?>
</div>

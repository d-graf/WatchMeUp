<div id="content">
    <?php
        if (isset($_COOKIE['imageUploaded'])) {
            echo '<script type="text/javascript">$( document ).ready(function(){$( ".image_upload_message" ).delay(5000).fadeOut(400);});</script><div class="image_upload_message">The image is successfully uploaded!</div>';
        }
    ?>
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
            </div>
            <hr>
        </div>
    <?php endforeach ?>
<?php endif ?>
</div>

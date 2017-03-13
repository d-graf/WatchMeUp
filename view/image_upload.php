<div id="content">
    <div class="image-row">
        <div class="image-wrapper">
            <h1 id="login">Post on WatchMeUp</h1>

            <?php
            $form = new Form('/image/doUpload');
            echo $form->text()->name('title')->placeholder('title')->type('text');
            echo $form->text()->name('image')->placeholder('image')->type('file');
            echo $form->submit()->label('Post')->name('post');
            $form->end();
            ?>
            <br/>
            <br/>
        </div>
    </div>
</div>
<div id="content">
    <div class="image-row">
        <div class="image-wrapper">
            <h1 id="login">Post on WatchMeUp</h1>

            <?php

            $form = new Form('/user/doUpload');

            echo $form->text()->name('title')->placeholder('title')->type('text');
            echo $form->text()->name('image')->placeholder('image')->type('file');
            echo $form->submit()->label('Post')->name('send');

            $form->end();

            ?>
            <br/>
            <br/>
            <p class="warning">Dieser User exisitert nicht oder das falsche Passwort wurde eingegeben.</p>
        </div>
    </div>
</div>

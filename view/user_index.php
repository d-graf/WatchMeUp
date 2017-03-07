<div id="content">
    <div class="image-row">
        <div class="image-wrapper">
            <h1 id="login">Login to WatchMeUp</h1>

            <?php

            $form = new Form('/user/doLogin');

            echo $form->text()->name('username')->placeholder('name');
            echo $form->text()->name('password')->placeholder('password');
            echo "<input type=\"button\" value=\"No Login yet?\"/>";
            echo $form->submit()->label('Login')->name('send');

            $form->end();

            ?>
        </div>
    </div>
</div>

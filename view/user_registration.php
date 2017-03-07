<div id="content">
    <div class="image-row">
        <div class="image-wrapper">
            <h1 id="login">Register to WatchMeUp</h1>
            <?php
            $form = new Form('/user/doRegister');
            echo $form->text()->name('username')->placeholder('name')->type('text');
            echo $form->text()->name('email')->placeholder('email')->type('email');
            echo $form->text()->name('password')->placeholder('password')->type('password');
            echo $form->text()->name('confpassword')->placeholder('confirm password')->type('password');
            echo $form->submit()->label('Register')->name('send');
            $form->end();
            ?>
        </div>
    </div>
</div>

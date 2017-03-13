<div id="content">
    <div class="image-row">
        <div class="image-wrapper">
            <h1 id="login">Register to WatchMeUp</h1>
            <?php
            $form = new Form('/user/doRegister');
            if(isset($_SESSION["errorName"])){
                echo $_SESSION["errorName"];
                unset($_SESSION['errorName']);
            }
            echo $form->text()->name('username')->placeholder('name')->type('text');
            if(isset($_SESSION["errorEmail"])){
                echo $_SESSION["errorEmail"];
                unset($_SESSION['errorEmail']);
            }
            echo $form->text()->name('email')->placeholder('email')->type('email');
            if(isset($_SESSION["errorPw"])){
                echo $_SESSION["errorPw"];
                unset($_SESSION['errorPw']);
            }
            echo '<p style="font-style:italic;">At least 8 characters, 1 uppercase letter, 1 digit and 1 special char</p>';
            echo $form->text()->name('password')->placeholder('password')->type('password');
            if(isset($_SESSION["errorconfPw"])){
                echo $_SESSION["errorconfPw"];
                unset($_SESSION['errorconfPw']);
            }
            echo $form->text()->name('confpassword')->placeholder('confirm password')->type('password');
            echo $form->submit()->label('Register')->name('send');
            $form->end();
            ?>
        </div>
    </div>
</div>

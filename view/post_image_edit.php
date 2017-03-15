<?php
if (!Security::isAdmin()) {
    header("Location: /user");
}
?>
<script type="text/javascript">
    jQuery(document).ready(function () {
        jQuery('input[name="id"]').hide();
    })
</script>
<div id="content">
            <div class="image-row">
                <div class="image-wrapper">
                    <h1 id="login">Edit Post</h1>
                    <?php
                    $form = new Form('/post/doEdit');
                    if(isset($_SESSION["errorTitle"])){
                        echo $_SESSION["errorTitle"];
                        unset($_SESSION['errorTitle']);
                    }
                    echo $form->text()->name('id')->placeholder('id')->type('text')->value($_GET['id']);
                    echo $form->text()->name('newTitle')->placeholder('title')->type('text')->value($post->title);
                    echo $form->submit()->label('Edit')->name('edit');
                    $form->end();
                    ?>
                </div>
                <hr>
            </div>
</div>

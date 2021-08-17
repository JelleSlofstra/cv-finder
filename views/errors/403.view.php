<?php require 'views/layouts/head.view.php' ?>
<?php require 'views/partials/header.view.php' ?>


<div class="main">
    <div class="center-box">
        <h2 class="error-message">GEEN TOEGANG ...</h2>
        <h4><?= isset($vars['message']) ? $vars['message'] : '' ?></h4>
    </div>
</div>


<?php require 'views/partials/footer.view.php' ?>
<?php require 'views/layouts/bottom.view.php' ?>
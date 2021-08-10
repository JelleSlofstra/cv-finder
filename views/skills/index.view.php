<?php require 'views/partials/header.view.php' ?>

<div class="main">
    <h3>Skills van <?=$vars['user']->first_name?> <?=$vars['user']->last_name?></h3>
    <ul>
        <?php foreach($vars['skills'] as $skill):?>
            <li><?=$skill->name?></li>
        <?php endforeach;?>
    </ul>
    
</div>

<?php require 'views/partials/footer.view.php' ?>
<?php require 'views/partials/header.view.php' ?>

<div class="main">
    <h3>Skills van <?=$vars['user']->first_name?> <?=$vars['user']->last_name?></h3>
    <ul>
        <?php foreach($vars['skills'] as $skill):?>
            <li>
                <div class="row">
                    <div class="col-6">
                        <?=$skill->name?>
                    </div>
                    <div class="col-6">
                        <a href="/skill/<?= $skill->id?>/edit">Edit</a>
                        <a href="/skill/<?= $skill->id?>/destroy">Delete</a>
                    </div>
                </div> 
            </li>                       
        <?php endforeach;?>
    </ul>
    
</div>

<?php require 'views/partials/footer.view.php' ?>
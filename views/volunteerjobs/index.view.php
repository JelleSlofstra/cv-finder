<?php require 'views/partials/header.view.php' ?>

<div class="main">
    <h2>Banen van <?=$vars['user']->first_name?> <?=$vars['user']->last_name?></h2>
    <hr>
    <ul>            
        <?php foreach($vars['volunteerjobs'] as $volunteerjob): ?>
            <li>
                <div class="row">
                    <div class="col-2">
                        <?= $volunteerjob->start_year ?> -
                        <?php if (!$volunteerjob->end_year): ?>
                            heden:
                        <?php else: ?>
                            <?= $volunteerjob->end_year ?>:
                        <?php endif; ?>
                    </div>
                    <div class="col-6">
                        <b> <?= $volunteerjob->job ?></b> 
                        bij <?= $volunteerjob->organization?>
                        <?= $volunteerjob->info ?>
                    </div>
                    <div class="col-3">
                        <a href="/volunteerjob/<?= $volunteerjob->id?>/edit">Edit</a>
                        <a href="/volunteerjob/<?= $volunteerjob->id?>/destroy">Delete</a>
                    </div>
                </div>
            </li>            
        <?php endforeach; ?>
    </ul>  
</div>

<?php require 'views/partials/footer.view.php' ?>
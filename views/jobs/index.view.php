<?php require 'views/partials/header.view.php' ?>

<div class="main">
    <h2>Werkervaring van <?=$vars['user']->first_name?> <?=$vars['user']->last_name?></h2>
    <hr>
    <ul>            
        <?php foreach($vars['jobs'] as $job): ?>
            <li>
                <div class="row">
                    <div class="col-2">
                        <?= $job->start_year ?> -
                        <?php if (!$job->end_year): ?>
                            heden:
                        <?php else: ?>
                            <?= $job->end_year ?>:
                        <?php endif; ?>
                    </div>
                    <div class="col-6">
                        <b> <?= $job->job ?></b> 
                        bij <?= $job->company?>
                        <?= $job->info ?>
                    </div>
                    <div class="col-3">
                        <a href="/job/<?= $job->id?>/edit">Aanpassen</a>
                        <a href="/job/<?= $job->id?>/destroy">Verwijderen</a>
                    </div>
                </div>
            </li>            
        <?php endforeach; ?>
    </ul>
    <hr>
    <a href="/job/create">Voeg nieuwe werkervaring toe.</a> 
</div>

<?php require 'views/partials/footer.view.php' ?>
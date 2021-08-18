<?php require 'views/partials/header.view.php' ?>

<div class="main">
    <h3>Hobby's van <?=$vars['user']->first_name?> <?=$vars['user']->last_name?></h3>
    <hr>
    <ul>
        <?php foreach($vars['hobbies'] as $hobby): ?>
            <li>
                <div class="row">
                    <div class="col-6"><?=$hobby->name?></div>
                    <div class="col-6">
                        <a href="hobby/<?=$hobby->id?>/edit"><button type="button" class="btn btn-outline-dark">Aanpassen</button></a>
                        <a href="hobby/<?=$hobby->id?>/destroy"><button type="button" class="btn btn-outline-dark">Verwijderen</button></a>
                    </div>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
    <hr>
    <a href="/hobby/create"><button type="button" class="btn btn-outline-dark">Voeg een nieuwe hobby toe</button></a>
</div>


<?php require 'views/partials/footer.view.php' ?>
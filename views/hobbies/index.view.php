<?php require 'views/partials/header.view.php' ?>

<h3>Hobby's van <?=$vars['user']->first_name?> <?=$vars['user']->last_name?></h3>
    <ul>
        <?php foreach($vars['hobbies'] as $hobby): ?>
            <li>
                <div class="row">
                    <div class="col-6"><?=$hobby->name?></div>
                    <div class="col-6">
                        <a href="hobby/<?=$hobby->id?>/edit">Edit</a>
                        <a href="hobby/<?=$hobby->id?>/destroy">Delete</a>
                    </div>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
    <a href="/hobby/create">Voeg een nieuwe hobby toe</a>

<?php require 'views/partials/footer.view.php' ?>
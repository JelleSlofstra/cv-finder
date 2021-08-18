<?php require 'views/partials/header.view.php' ?>

<div class="main">
    <h2>Opleidingen van <?=$vars['user']->first_name?> <?=$vars['user']->last_name?></h2>
    <hr>
    <ul>            
        <?php foreach($vars['educations'] as $education): ?>
            <li>
                <div class="row">
                    
                    <div class="col-2">
                        <?= $education->start_year ?> -
                        <?php if (!$education->end_year): ?>
                            heden:
                        <?php else: ?>
                            <?= $education->end_year ?>:
                        <?php endif; ?>
                    </div>

                    <div class="col-6">
                        <b> <?= $education->name ?></b>
                        <?= $education->info ?>
                    </div>

                    <div class="col-4">
                        <a href="/education/<?= $education->id?>/edit"><button type="button" class="btn btn-outline-dark" >Aanpassen</button></a>
                        <a href="/education/<?= $education->id?>/destroy"><button type="button" class="btn btn-outline-dark">Verwijderen</button></a>     
                    </div>    

                </div>
            </li>            
        <?php endforeach; ?>
    </ul>  
    <hr>
    <a  href="/education/create"><button type="button" class="btn btn-outline-dark">Voeg een nieuwe opleiding toe</button></a>
    
</div>

<?php require 'views/partials/footer.view.php' ?>
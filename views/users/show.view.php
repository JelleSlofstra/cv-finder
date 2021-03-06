<?php require 'views/partials/header.view.php' ?>

<div class="main">
    <h2>Persoonlijke informatie</h2>
    <hr>           
    <div class="row"> 
        <div class="col-2">Naam: </div>
        <div class="col-10"><?= $vars['user']->first_name . ' ' . $vars['user']->last_name ?></div>         
    </div>
    <div class="row"> 
        <div class="col-2">E-mail: </div>
        <div class="col-10"><?= $vars['user']->email ?></div> 
    </div>
    <div class="row"> 
        <div class="col-2">Stad: </div>
        <div class="col-10"><?= $vars['user']->city ?></div>  
    </div>
    <div class="row"> 
        <div class="col-2">Geboortedatum: </div>
        <div class="col-10"><?= $vars['user']->birthday ?></div>
    </div> 
    <hr>
    <a href="/user/<?=$vars['user']->id?>/edit"><button type="button" class="btn btn-outline-dark">Pas de gegevens van deze gebruiker aan</button></a>
    
</div>

<?php require 'views/partials/footer.view.php' ?>
<?php require 'views/partials/header.view.php' ?>

<div class="main">
    <h2>Gebruikers</h2>
    <?php foreach($vars["users"] as $user):?>
        <hr>           
    <div class="row"> 
        <div class="col-2">Naam: </div>
        <div class="col-10"><?= $user->first_name . ' ' . $user->last_name ?></div>         
    </div>
    <div class="row"> 
        <div class="col-2">E-mail: </div>
        <div class="col-10"><?= $user->email ?></div> 
    </div>
    <div class="row"> 
        <div class="col-2">Stad: </div>
        <div class="col-10"><?= $user->city ?></div>  
    </div>
    <div class="row"> 
        <div class="col-2">Geboortedatum: </div>
        <div class="col-10"><?= $user->birthday ?></div>
    </div>  
    <?php endforeach;?>
</div>

<?php require 'views/partials/footer.view.php' ?>
<?php require 'views/partials/header.view.php' ?>
    
<div class="main">
    <h1>CV van <?=$vars['user']->first_name?> <?=$vars['user']->last_name?></h1>
    <hr>
    <h3>Persoonlijke informatie</h3>
    <hr>  
    <ul>
        <li>
            <div class="row"> 
                <div class="col-2">Naam: </div>
                <div class="col-10"><?= $vars['user']->first_name . ' ' . $vars['user']->last_name ?></div>         
            </div>
        </li>
        <li>
            <div class="row"> 
                <div class="col-2">E-mail: </div>
                <div class="col-10"><?= $vars['user']->email ?></div> 
            </div>
        </li>
        <li>
            <div class="row"> 
                <div class="col-2">Stad: </div>
                <div class="col-10"><?= $vars['user']->city ?></div>  
            </div>
        </li>
        <li>
            <div class="row"> 
                <div class="col-2">Geboortedatum: </div>
                <div class="col-10"><?= $vars['user']->birthday ?></div>
            </div>
        </li> 
    </ul>         
    
    
    <hr>
    <h3>Werkervaring</h3>
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
                </div>
            </li>            
        <?php endforeach; ?>
    </ul>

    <hr>
    <h3>Opleidingen</h3>
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
                </div>
            </li>            
        <?php endforeach; ?>
    </ul> 
    
    <hr>
    <h3>Vrijwilligerswerk</h3>
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
                </div>
            </li>            
        <?php endforeach; ?>
    </ul>

    <hr>
    <h3>Skills</h3>
    <hr>
    <ul>
        <?php foreach($vars['skills'] as $skill):?>
            <li>
                <div class="row">
                    <div class="col-6">
                        <?=$skill->name?>
                    </div>
                </div> 
            </li>                       
        <?php endforeach;?>
    </ul>

    <hr>
    <h3>Hobbies</h3>
    <hr>
    <ul>
        <?php foreach($vars['hobbies'] as $hobby): ?>
            <li>
                <div class="row">
                    <div class="col-6"><?=$hobby->name?></div>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
</div>

<?php require 'views/partials/footer.view.php' ?>
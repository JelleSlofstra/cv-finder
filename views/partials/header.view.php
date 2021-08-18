<header>
   <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
         <a class="navbar-brand" href="/">Cv-Finder</a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
         </button>
         <?php if(isLoggedIn()):?>
            <div class="collapse navbar-collapse" id="navbarNav">
               <ul class="navbar-nav">
                  <li class="nav-item">
                     <a class="nav-link" href="/user">Peroonlijke info</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="/job">Werkervaring</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="/education">Opleidingen</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="/volunteerjob">Vrijwilligerswerk</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="/skill">Skills</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="/hobby">Hobby's</a>
                  </li>
               </ul>
            </div>
            <div class="navbar-nav">
               <span class="nav-item">
                  Ingelogd als <?= getFullNameFromSession()?> 
               </span>
               <a class="nav-item" href="/logout">Logout</a>
            </div>
         <?php else:?>
            <div class="collapse navbar-collapse" id="navbarNav">
               <ul class="navbar-nav">
                  <li class="nav-item">
                     <a class="nav-link" href="/login">Inloggen</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="/register">Registreren</a>
                  </li>
               </ul>
            </div>
         <?php endif;?>
      </div>
   </nav>
</header>

<div class="row">
   <div class="col-1 sidebar"></div>
   <div class="col-10">
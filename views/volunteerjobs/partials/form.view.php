<form method="<?= $vars['method'] ?>" action="<?= $vars['action'] ?>">
    <div class="container mt-5">
        <div class="row mb-3">
            <div class="col-md-4">
                <input type="text" name="job" placeholder="Functie" value="<?= isset($vars['volunteerjob']) ? $vars['volunteerjob']->job : '' ?>">
            </div>

            <div class="col-md-4">
                <input type="text" name="organization" placeholder="Organisatie" value="<?= isset($vars['volunteerjob']) ? $vars['volunteerjob']->organization : '' ?>">
            </div>

            <div class="col-md-4">
                <input type="text" name="info" placeholder="Informatie" value="<?= isset($vars['volunteerjob']) ? $vars['volunteerjob']->info : '' ?>">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-4">
            <input type="number" name="start_year" value="<?= isset($vars['volunteerjob']) ? $vars['volunteerjob']->start_year : '' ?>">
            </div>

            <div class="col-md-6">
                <input type="number" name="end_year" value="<?= isset($vars['volunteerjob']) ? $vars['volunteerjob']->end_year : '' ?>">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <select name="user_id">
                    <option value="0">Kies een gebruiker...</option>
                    <?php foreach($vars['users'] as $user) : ?>
                        <option value="<?= $user->id ?>"<?= isset($vars['volunteerjob']) && $vars['volunteerjob']->user_id == $user->id ? 'selected' : '' ?>><?= $user->first_name ?> <?= $user->last_name ?></option>
                    <?php endforeach ?>
                </select>
            </div>
        </div>

        <input type="hidden" name="f_token" value="<?= createToken() ?>">

        <input type="submit" value="Opslaan">
    </div>
</form>
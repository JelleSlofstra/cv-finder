<form method="<?= $vars['method'] ?>" action="<?= $vars['action'] ?>">
    <div class="container mt-5">
        <div class="row mb-3">
            <div class="col-md-4">
                <input type="text" name="job" placeholder="Functie" value="<?= isset($vars['job']) ? $vars['job']->job : '' ?>">
            </div>

            <div class="col-md-4">
                <input type="text" name="company" placeholder="Bedrijf" value="<?= isset($vars['job']) ? $vars['job']->company : '' ?>">
            </div>

            <div class="col-md-4">
                <input type="text" name="info" placeholder="Informatie" value="<?= isset($vars['job']) ? $vars['job']->info : '' ?>">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-4">
            <input type="number" name="start_year" value="<?= isset($vars['job']) ? $vars['job']->start_year : '' ?>">
            </div>

            <div class="col-md-6">
                <input type="number" name="end_year" value="<?= isset($vars['job']) ? $vars['job']->end_year : '' ?>">
            </div>
        </div>

        <input type="hidden" name="f_token" value="<?= createToken() ?>">

        <input type="submit" value="Opslaan">
    </div>
</form>
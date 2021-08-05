<form method="<?= $vars['method'] ?>" action="<?= $vars['action'] ?>">
    <div class="container mt-5">
        <div class="row mb-3">
            <div class="col-md-4">
                <input type="text" name="first_name" placeholder="Voornaam" value="<?= isset($vars['user']) ? $vars['user']->first_name : '' ?>">
            </div>

            <div class="col-md-6">
                <input type="text" name="last_name" placeholder="Achternaam" value="<?= isset($vars['user']) ? $vars['user']->last_name : '' ?>">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <input type="email" name="email" placeholder="E-mail" value="<?= isset($vars['user']) ? $vars['user']->email : '' ?>">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <input type="text" name="city" placeholder="Woonplaats" value="<?= isset($vars['user']) ? $vars['user']->city : '' ?>">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <select name="role">
                    <option value="0">Kies een rol...</option>
                    <?php foreach($vars['roles'] as $role) : ?>
                        <option value="<?= $role->id ?>"<?= isset($vars['user']) && $vars['user']->role == $role->id ? 'selected' : '' ?>><?= $role->name ?></option>
                    <?php endforeach ?>
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-4">
                <label>Geboortedatum</label><br/>
                <input type="date" name="birthday" value="<?= isset($vars['user']) ? $vars['user']->birthday : '' ?>">
            </div>
        </div>

        <input type="hidden" name="f_token" value="<?= createToken() ?>">

        <input type="submit" value="Opslaan">
    </div>
</form>
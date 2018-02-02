<h1 class="title">Créer un utilisateur</h1>
<p class="subtitle">Entrez vos informations du nouvel utilisateur</p>

<?php if(Session::get_flash('register_error', false, false)) { ?>
    <div class="notification is-danger">
        Erreur lors de la création de l'utilisateur.
    </div>
<?php } ?>

<?php if(Session::get_flash('register_success', false, false)) { ?>
    <div class="notification is-success">
        Le nouvel utilisateur à bien été enregistré.
    </div>
<?php } ?>

<form action="/admin/registeruser" method="POST">
    <div class="field">
        <p class="control">
            <label for="email" class="label">Adresse mail</label>
            <input class="input" type="email" name="email" id="email">
        </p>
    </div>
    <div class="field">
        <p class="control">
            <label for="username" class="label">Identifiant</label>
            <input class="input" type="text" name="username" id="username">
        </p>
    </div>
    <div class="field">
        <p class="control">
            <label for="password" class="label">Mot de passe</label>
            <input class="input" type="password" name="password" id="password">
        </p>
    </div>
    <div class="field">
        <p class="control">
            <button class="button is-link is-outlined is-rounded">
                Ajouter l'utilisateur
            </button>
        </p>
    </div>
</form>
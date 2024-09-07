<?php

use CMW\Controller\Core\SecurityController;
use CMW\Manager\Env\EnvManager;
use CMW\Manager\Security\SecurityManager;
use CMW\Utils\Website;

Website::setTitle('Connexion');
Website::setDescription('Connectez-vous sur ' . Website::getWebsiteName());
?>

<main class="flex min-h-full h-[90vh] flex-col justify-center px-6 py-12 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
        <h2 class="text-center text-4xl font-bold tracking-tight text-zinc-900">Connexion</h2>
    </div>

    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
        <form class="space-y-6" action="" method="POST">
            <?php (new SecurityManager())->insertHiddenToken() ?>
            <div>
                <label for="login_email" class="label">Email</label>
                <input id="login_email" name="login_email" type="email" placeholder="ada.lovelace@overheat.studio" autocomplete="email" required class="input">
            </div>

            <div>
                <label for="login_password" class="label">Mot de passe</label>
                <input id="login_password" name="login_password" type="password" placeholder="********" autocomplete="current-password" required class="input">
            </div>

            <div class="flex items-center justify-center">
                <input type="checkbox" id="login_keep_connect" name="login_keep_connect" class="h-4 w-4 text-zinc-600 border-zinc-300 rounded focus:ring-zinc-500">
                <label for="login_keep_connect" class="ml-2 block text-sm text-zinc-900">Se souvenir de moi</label>
            </div>

            <div class="flex justify-center" id="captcha">
                <?php SecurityController::getPublicData(); ?>
            </div>

            <div>
                <button type="submit" class="btn xl w-full">Se connecter</button>
            </div>
        </form>
    </div>
</main>

<?php

use CMW\Manager\Env\EnvManager;
use CMW\Manager\Security\SecurityManager;
use CMW\Utils\Website;

Website::setTitle("Connexion - 2FA");
Website::setDescription("Double authentification");
?>

<main class="h-screen">
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="mt-4 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-6" action="<?= EnvManager::getInstance()->getValue('PATH_SUBFOLDER') . 'login/validate/tfa' ?>" method="post">
                <?php (new SecurityManager())->insertHiddenToken() ?>
                <h1 class="font-bold tracking-tight text-4xl text-center">2FA</h1>
                <div>
                    <label for="code" class="label">Mot de passe à usage unique</label>
                    <input id="code" placeholder="123456" name="code" type="text" required class="input">
                </div>

                <div>
                    <button type="submit" class="btn xl w-full">Confirmer</button>
                </div>
            </form>
        </div>
    </div>
</main>
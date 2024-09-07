<?php

use CMW\Utils\Website;

$title = "Page introuvable";
$description = "Erreur";

Website::setTitle("Erreur 404");
Website::setDescription("Page introuvable");
?>

<main class="grid h-[90vh] place-items-center px-6 py-24 sm:py-32 lg:px-8">
    <div class="text-center">
        <p class="text-7xl font-black text-zinc-600">404</p>
        <h1 class="mt-2 text-3xl font-bold tracking-tight text-zinc-900 sm:text-5xl">Not found</h1>
        <p class="text-base leading-7 text-zinc-600">C'est un peu vide ici non...</p>
        <div class="mt-4 flex items-center justify-center gap-x-6">
            <a href="/" class="btn">Retour à l'accueil</a>
        </div>
    </div>
</main>

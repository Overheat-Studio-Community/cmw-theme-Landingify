<?php

use CMW\Model\Core\ThemeModel;
use CMW\Utils\Website;

Website::setTitle("Accueil");
Website::setDescription(Website::getWebsiteDescription());
?>

<header>
    Ceci est un header
</header>

<section>
    <h1> <?= ThemeModel::getInstance()->fetchConfigValue('home_hero_title') ?></h1>
    <h3> <?= ThemeModel::getInstance()->fetchConfigValue('home_hero_subtitle') ?></h3>
</section>
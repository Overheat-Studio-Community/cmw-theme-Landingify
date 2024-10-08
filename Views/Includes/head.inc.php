<?php

use CMW\Controller\Core\CoreController;
use CMW\Manager\Env\EnvManager;
use CMW\Manager\Uploads\ImagesManager;
use CMW\Manager\Views\View;
use CMW\Utils\Website;

/* @var \CMW\Controller\Core\CoreController $core */
/* @var string $title */
/* @var string $description */
/* @var array $includes */

$siteName = Website::getWebsiteName();

?>

    <!-- TODO META FOR SEO -->
    <!DOCTYPE html>
<html lang="<?= EnvManager::getInstance()->getValue('LOCALE') ?>>">
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon"
              href="<?= EnvManager::getInstance()->getValue("PATH_SUBFOLDER") ?>Public/Themes/Sampler/Assets/favicon.ico"/>
        <!-- Core theme CSS (Includes Bootstrap)-->
        <link rel="stylesheet" type="text/css"
              href="<?= EnvManager::getInstance()->getValue("PATH_SUBFOLDER") ?>Admin/Resources/Vendors/Fontawesome-free/Css/fa-all.min.css">
        <link
            href="<?= EnvManager::getInstance()->getValue("PATH_SUBFOLDER") ?>Public/Themes/Landingify/Assets/Css/output.css"
            rel="stylesheet"/>

        <!-- CUSTOM HEADERS -->
        <?= Website::getCustomHeader() ?>

        <title><?= Website::getTitle() ?></title>

        <meta name="description" content="<?= Website::getDescription() ?>">

        <meta name="author" content="CraftMyWebsite, <?= $siteName ?>">
        <meta name="publisher" content="<?= $siteName ?>">
        <meta name="copyright" content="CraftMyWebsite, <?= $siteName ?>">
        <meta name="robots" content="follow, index, all"/>

        <?= ImagesManager::getFaviconInclude() ?>

        <?php
        View::loadInclude($includes, "beforeScript", "styles");
        ?>
    </head>
    <body id="page-top" class="bg-zinc-50">
<?php
View::loadInclude($includes, "beforeScript");
echo CoreController::getInstance()->cmwWarn();
?>
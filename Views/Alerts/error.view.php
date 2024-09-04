<?php
/** @var Alert $alert */

use CMW\Manager\Env\EnvManager;
use CMW\Manager\Flash\Alert;

?>
<link rel="stylesheet" href="<?= EnvManager::getInstance()->getValue('PATH_SUBFOLDER') . 'Admin/Resources/Vendors/Izitoast/iziToast.min.css' ?>">
<script src="<?= EnvManager::getInstance()->getValue('PATH_SUBFOLDER') . 'Admin/Resources/Vendors/Izitoast/iziToast.min.js' ?>"></script>
<script>
    iziToast.show(
        {
            titleSize: '16',
            messageSize: '14',
            icon: 'fa-solid fa-xmark',
            title  : "<?= $alert->getTitle() ?>",
            message: "<?= $alert->getMessage() ?>",
            color: "#41435F",
            iconColor: '#DE2B59',
            titleColor: '#DE2B59',
            messageColor: '#fff',
            balloon: false,
            close: false,
            position: 'bottomRight',
            timeout: 5000,
            animateInside: false,
            progressBar: false,
            transitionIn: 'fadeInLeft',
            transitionOut: 'fadeOutRight',
        });
</script>
<?php
    require_once __DIR__ . DIRECTORY_SEPARATOR . "update_package.class.php" ;
    $updater = new UpdateJob() ;
    $updater->getCustomers() ;
    $updater->updateCusromers();
    $updater->print();

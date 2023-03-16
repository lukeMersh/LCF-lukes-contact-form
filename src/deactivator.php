<?php

namespace LCF;

register_deactivation_hook(__FILE__, function () {
    require_once plugin_dir_path(__FILE__) . 'src/deactivator.php';
    deactivator::deactivate();
}
);

namespace LCF;
class deactivator{
    public static function deactivate(){

    }
}

<?php
/**
 * Author: Monirul Islam
 * Author Url: http://www.misujon.com/
 */

/*======================================= MI BARCODE GENERATOR SETUP FUNCTION ===========================================*/
require_once 'libs/mi_barcode_generator/BarcodeGenerator.php';
require_once 'libs/mi_barcode_generator/BarcodeGeneratorPNG.php';
require_once 'libs/mi_barcode_generator/BarcodeGeneratorJPG.php';

function mi_barcode_generate($code, $image_type = NULL){

    if (isset($image_type) && $image_type == "jpg"){
        $generator = new \Picqer\Barcode\BarcodeGeneratorJPG();
        return 'data:image/png;base64,' . base64_encode($generator->getBarcode($code, $generator::TYPE_CODE_128));
    }else{
        $generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
        return 'data:image/png;base64,' . base64_encode($generator->getBarcode($code, $generator::TYPE_CODE_128));
    }

}

/*======================================= MI BARCODE GENERATOR SETUP FUNCTION END =======================================*/
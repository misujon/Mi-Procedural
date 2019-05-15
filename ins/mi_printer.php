<?php
/**
 * Author: Monirul Islam
 * Author Url: http://www.misujon.com/
 */

/*======================================= MI PRINTER SETUP FUNCTION ===========================================*/
require_once 'libs/mi_printer/autoload.php';
use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

function mi_usb_printer($printer_share_name, $body){
    try {
        $connector = new WindowsPrintConnector($printer_share_name);

        $printer = new Printer($connector);
        $printer -> text($body);
        $printer -> cut();

        $printer -> close();
    } catch (Exception $e) {
        return mi_error_code(888);
    }
}

/*======================================= MI PRINTER SETUP FUNCTION END =======================================*/
<?php
/**
 * Author: Monirul Islam
 * Author Url: http://www.misujon.com/
 */

/*======================================= MI MAILING FUNCTION ==============================================*/

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'libs/mi_mailer/Exception.php';
require 'libs/mi_mailer/PHPMailer.php';
require 'libs/mi_mailer/SMTP.php';

function mi_do_mail($users = array(), $subject, $body){

    $crd = mi_smtp_credentials();

    $mail = new PHPMailer();
//    $mail->SMTPDebug = 2;
    $mail->isSMTP();
    $mail->Host = $crd['mi_mailer_host'];
    $mail->SMTPAuth = true;
    $mail->Username = $crd['mi_mailer_user'];
    $mail->Password = $crd['mi_mailer_pass'];
    $mail->SMTPSecure = $crd['mi_mailer_layer'];
    $mail->Port = $crd['mi_mailer_port'];
    $mail->setFrom($crd['mi_mailer_from_email'], $crd['mi_mailer_from_name']);

    foreach ($users as $u_email){
        $mail->addAddress($u_email);
    }

    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body    = $body;
    $mail->AltBody = $body;

    if ($mail->send()){
        return true;
    }else{
        return mi_error_code(999);
    }
}

/*======================================= MI MAILING FUNCTION END ==========================================*/
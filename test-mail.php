<?php
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/vendor/autoload.php';

$m = new \PHPMailer\PHPMailer\PHPMailer(true);
try {
    $m->isSMTP();
    $m->SMTPDebug = 2;
    $m->Host = getenv('SMTP_HOST');
    $m->Port = (int) getenv('SMTP_PORT');
    $m->SMTPAuth = true;
    $m->Username = getenv('SMTP_USERNAME');
    $m->Password = getenv('SMTP_PASSWORD');
    $m->SMTPSecure = 'tls';
    $m->setFrom(getenv('MAIL_FROM_ADDRESS'), 'WebTecMart');
    $m->addAddress(getenv('CONTACT_NOTIFICATION_EMAIL'));
    $m->Subject = 'Test mail';
    $m->Body = 'SMTP working';
    $m->send();
    echo 'SENT OK';
} catch (Throwable $e) {
    echo 'ERROR: ' . $e->getMessage();
}
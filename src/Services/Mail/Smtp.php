<?php


namespace App\Services\Mail;

use App\Models\Ann;


use PHPMailer\PHPMailer\PHPMailer;
use App\Services\Mail\Exception;

use App\Services\Config;

ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(E_ALL);
class Smtp extends Base
{
    private $mail;
    private $config;

    public function __construct()
    {
        // $this->config = $this->getConfig();
        // $mail = new PHPMailer();
        // //$mail->SMTPDebug = 3;                               // Enable verbose debug output
        // $mail->isSMTP();                                      // Set mailer to use SMTP
        // $mail->Host = $this->config['host'];  // Specify main and backup SMTP servers
        // $mail->SMTPAuth = true;                               // Enable SMTP authentication
        // $mail->Username = $this->config['username'];                 // SMTP username
        // $mail->Password = $this->config['passsword'];                    // SMTP password
        // if ($_ENV['smtp_ssl']) {
        //     $mail->SMTPSecure = ($_ENV['smtp_port'] == 587 ? 'tls' : 'ssl');                            // Enable TLS encryption, `ssl` also accepted
        // }
        // $mail->Port = $this->config['port'];                                    // TCP port to connect to
        // $mail->setFrom($this->config['sender'], $this->config['name']);
        // $mail->addReplyTo($this->config['reply_to'], $this->config['reply_to_name']);
        // $mail->CharSet = 'UTF-8';
        // $this->mail = $mail;
    }

    public function getConfig()
    {
        return [
            'host' => $_ENV['smtp_host'],
            'username' => $_ENV['smtp_username'],
            'port' => $_ENV['smtp_port'],
            'sender' => $_ENV['smtp_sender'],
            'name' => $_ENV['smtp_name'],
            'passsword' => $_ENV['smtp_password'],
            'reply_to' => $_ENV['smtp_reply_to'],
            'reply_to_name' => $_ENV['smtp_reply_to_name']
        ];
    }

    public function send($to, $subject, $text, $files)
    {


        $mail             = new PHPMailer();


        $mail->Host       = "mail.ezvpn.co";
        $mail->IsSMTP();

        $mail->SMTPDebug  = 2;
        $mail->SMTPAuth   = true;
        $mail->Username   = "no-reply@ezvpn.co";
        $mail->Password   = "12345678RaF";
        $mail->SMTPSecure = "ssl";
        $mail->Port       = 25;                   // set the SMTP port for the GMAIL server
        $mail->From       = "no-reply@ezvpn.co";
        $mail->FromName   = "test";
        $mail->AddAddress("admin@ezvpn.co");
        $mail->Subject    = "PHPMailer Test";
        $mail->Body       = "Test";


        if (!$mail->Send()) {
            return "Mailer Error: " . $mail->ErrorInfo;
        } else {
            return "Message sent! ";
        }

        // $mail = $this->mail;
        // $mail->addAddress($to);     // Add a recipient
        // $mail->isHTML();
        // $mail->Subject = $subject;
        // $mail->Body = $text;
        // foreach ($files as $file) {
        //     $mail->addAttachment($file);
        // }
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        // if ($mail->send()) {
        //     return "gggg";
        // }
        // $mail->send();


        // $mail->Debugoutput = function ($str, $level) {
        //     $ss = new Ann();
        //     $ss->content = "ttt" . $str;
        //     $ss->markdown = "hhh" . $level;
        //     $ss->date = '2022-12-13 13:15:42';
        //     $ss->save();
        // };

        // $mail->Debugoutput = function ($str, $level) {
        //     file_put_contents(
        //         'rasoulmail2.log',
        //         date('Y-m-d H:i:s') . "\t" . $str,
        //         FILE_APPEND | LOCK_EX
        //     );
        // };

        return "SA" .  "uuu";
    }
}

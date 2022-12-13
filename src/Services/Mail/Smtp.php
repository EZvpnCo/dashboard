<?php


namespace App\Services\Mail;

use App\Models\Ann;


use PHPMailer\PHPMailer\PHPMailer;
use App\Services\Mail\Exception;

use App\Services\Config;

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


        $mail = new PHPMailer();
        $mail->SMTPDebug = 4;
        $mail->SMTPAuth = true;
        $mail->CharSet = 'utf-8';
        $mail->SMTPSecure = 'ssl';
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = '465';
        $mail->Username = 'xxxxx@gmail.com';
        $mail->Password = 'xxxxx';

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
        $mail->send();


        $mail->DebugOutput = function ($str, $level) {
            $ss = new Ann();
            $ss->content = $str;
            $ss->markdown = "hhhhh0" . $level;
            $ss->date = '2022-12-13 13:15:42';
            $ss->save();
        };

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

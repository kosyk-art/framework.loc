<?php

namespace vendors\kosyk_art\base;

class Mailer {
    public function send($address, $sub, $mes, $from){
        $mail_header = "MIME-Version: 1.0\r\n";
        $mail_header.= "Content-type: text/html; charset=UTF-8\r\n";
        $mail_header.= "From: <$from>\r\n";
        $mail_header.= "Reply-to: <$from>\r\n";
        mail($address, $sub, $mes ,$mail_header);
    }
}

<?php

function enviarMail($from,$to,$bcc='',$asunto,$mensaje,$nombre='',$attachments=FALSE){

    $CI =& get_instance();
    $CI->load->library('email');
    $config['charset'] = 'utf-8';
    $config['wordwrap'] = TRUE;
    $config['mailtype'] = "html";
    $CI->email->initialize($config);

    $CI->email->clear();

    $CI->email->to($to);
    if($bcc != "")
        $CI->email->bcc($bcc);
    $CI->email->from($from, $nombre);
    $CI->email->subject($asunto);
    $CI->email->message($mensaje);

    if ($attachments) {
        foreach ($attachments as $attach) {
            $CI->email->attach($attach);
        }
    }

    if( $CI->email->send())
        return true;

    else
        return false;
        //echo $CI->email->print_debugger();
}
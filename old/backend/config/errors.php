<?php


class Errors { 

    public function response() {
                $code = 200;
                $text = 'OK';
                $protocol = (isset($_SERVER['SERVER_PROTOCOL']) ? $_SERVER['SERVER_PROTOCOL'] : 'HTTP/1.0');
                header($protocol . ' ' . $code . ' ' . $text);
                $GLOBALS['http_response_code'] = $code;
                echo 'SUCCESS';

    } 

}
<?php

namespace Modules\Auth\Services;


use Exception;
use Melipayamak;


class SmsService
{
    public function Send(string $mobile , string $code): void
    {
        try{
            $sms = Melipayamak::sms();
            $to = $mobile;
            $from = '50002710063484';
            $text = "بفرمایید کد تأیید شما در وبسایت آرکا:$code";
            $response = $sms->send($to,$from,$text);
            $json = json_decode($response);
            echo $json->Value; //RecId or Error Number
        }catch(Exception $e){
            echo $e->getMessage();
        }
}
}

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
            $text = '<strong>RKA STYLE</strong><br>برای تکمیل ثبت‌نام، کد زیر را وارد کنید:<br><strong>' . $code . '</strong>'; ;
            $response = $sms->send($to,$from,$text);
            $json = json_decode($response);
            echo $json->Value; //RecId or Error Number
        }catch(Exception $e){
            echo $e->getMessage();
        }
}
}

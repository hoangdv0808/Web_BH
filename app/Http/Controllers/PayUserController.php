<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PayUserController extends Controller
{
    public function momo_payments(Request $reqest){

        if(isset($_POST['payUrl'])){
                $partnerCode = $_POST["partnerCode"];
                     $accessKey = $_POST["accessKey"];
                     $serectkey = $_POST["secretKey"];
                     $orderid = time()."";
                     $orderInfo = $_POST["orderInfo"];
                     $amount = $_POST["amount"];
                     $bankCode = $_POST['bankCode'];
                     $returnUrl = $_POST['returnUrl'];
                     $requestId = time()."";
                     $requestType = "payWithMoMoATM";
                     $extraData = "";
                     //before sign HMAC SHA256 signature
                     $rawHashArr =  array(
                                    'partnerCode' => $partnerCode,
                                    'accessKey' => $accessKey,
                                    'requestId' => $requestId,
                                    'amount' => $amount,
                                    'orderId' => $orderid,
                                    'orderInfo' => $orderInfo,
                                    'bankCode' => $bankCode,
                                    'returnUrl' => $returnUrl,
                                    'notifyUrl' => $notifyurl,
                                    'extraData' => $extraData,
                                    'requestType' => $requestType
                                    );
                     // echo $serectkey;die;
                     $rawHash = "partnerCode=".$partnerCode."&accessKey=".$accessKey."&requestId=".$requestId."&bankCode=".$bankCode."&amount=".$amount."&orderId=".$orderid."&orderInfo=".$orderInfo."&returnUrl=".$returnUrl."&notifyUrl=".$notifyurl."&extraData=".$extraData."&requestType=".$requestType;
                     $signature = hash_hmac("sha256", $rawHash, $serectkey);

                     $data =  array('partnerCode' => $partnerCode,
                                    'accessKey' => $accessKey,
                                    'requestId' => $requestId,
                                    'amount' => $amount,
                                    'orderId' => $orderid,
                                    'orderInfo' => $orderInfo,
                                    'returnUrl' => $returnUrl,
                                    'bankCode' => $bankCode,
                                    'notifyUrl' => $notifyurl,
                                    'extraData' => $extraData,
                                    'requestType' => $requestType,
                                    'signature' => $signature);
                     $result = execPostRequest($endpoint, json_encode($data));
                     $jsonResult = json_decode($result,true);  // decode json

                     error_log( print_r( $jsonResult, true ) );
                     header('Location: '.$jsonResult['payUrl']);
        }
    }

    public function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data))
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        return $result;
    }
}

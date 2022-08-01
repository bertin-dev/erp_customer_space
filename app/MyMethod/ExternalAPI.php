<?php
namespace App\MyMethod;

//use Illuminate\Http\Request;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Exception\RequestException;
use PhpParser\Node\Stmt\Global_;

class ExternalAPI {



     /*private static  $externalListAPI =  array(
    "login" => "https://smp1020.webservice.api.domaine.test.ezpass.smopaye.fr/public/api/auth/login",
    "logout" => "https://smp1020.webservice.api.domaine.test.ezpass.smopaye.fr/public/api/auth/logout",
    "profile" => "https://smp1020.webservice.api.domaine.test.ezpass.smopaye.fr/public/api/user/profile/",
    "transaction" => "https://smp1020.webservice.api.domaine.test.ezpass.smopaye.fr/public/api/transaction/historique/utilisateur",
    "autoRegiter" => "https://smp1020.webservice.api.domaine.test.ezpass.smopaye.fr/public/api/autoregister",
    "PeerToPeerTransaction" => "https://smp1020.webservice.api.domaine.test.ezpass.smopaye.fr/public/api/account/transaction/payment",
    );*/

    private static  $externalListAPI =  array(
        "login" => "127.0.0.1/8000/api/auth/login",
        "logout" => "127.0.0.1/8000/api/auth/logout",
        "profile" => "127.0.0.1/8000/api/user/profile/",
        "transaction" => "127.0.0.1/8000/api/transaction/historique/utilisateur",
        "autoRegiter" => "127.0.0.1/8000/api/autoregister",
        "PeerToPeerTransaction" => "127.0.0.1/8000/api/account/transaction/payment",
    );


     public static function externalAPI (){
        return  (object) self::$externalListAPI;
    }
    public static $callBackData = null;
    public static function getAsyncDatas ($request,$method, $link, $DataTypes = null, $data = null){

        switch ($DataTypes) {
            case "RegisterData":
                $param = [
                    'form_params' => $data,
                    ];
                break;
            case "formDatas":
                $param = [
                    'headers' =>
                    [
                        'Authorization' => 'Bearer '.$request->session()->get('data')->access_token,
                    ],
                    'form_params' => $data,
                    ];
                break;

            default:
            $param = [
                    'headers' =>
                    [
                        'Authorization' => 'Bearer '.$request->session()->get('data')->access_token,
                    ]
                ];
                break;
        }

        $client = new \GuzzleHttp\Client();
        //dd($param);
        $promise = $client->{$method."Async"}(self::externalAPI()->{$link},  $param);
        $promise->then(
            function (ResponseInterface $res) {

                //echo $res->getStatusCode() . "\n";
                $body = $res->getBody();

                //dd($body->getContents());
                $data= json_decode( $body->getContents());

               // dd( $data->access_token);
                if (isset($data->success)) {
                   // callback for sending go datas connexions
                   // echo $body;

                  ExternalAPI::$callBackData = $data;
                }

            },
            function (RequestException $e) {
                dd($e->getResponse());
                echo $e->getResponse()->getBody(true) . "\n";
              // var_dump($e->getRequest()->getHeaders()) ;
            }
        )->wait();

         return  ExternalAPI::$callBackData;

    }




}

?>

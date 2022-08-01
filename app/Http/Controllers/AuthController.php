<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MyMethod\ExternalAPI ;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ExternalAPI $api, Request $request)
    {
        $data = $request->input();


        $client = new \GuzzleHttp\Client();
        $promise = $client->postAsync($api::externalAPI()->login,  ['form_params' => $data]);
        $promise->then(
            function (ResponseInterface $res) {
                //echo $res->getStatusCode() . "\n";
                $body = $res->getBody();
                $data= json_decode( $body->getContents());
                //echo $data;
               // dd( $data->access_token);
                if (isset($data->access_token)) {
                    global $request;
                    $api = (new ExternalAPI);
                   // dd($api);
                    $request->session()->put('data', (object) array_merge((array)$data,$request->input()));
                    // GET profil Datas
                   $this->getDatas($api,$request);
                   // callback for sending go datas connexions
                   echo $body;

                       // dd($data);

                }

            },
            function (RequestException $e) {
               // dd($e->getResponse());
                echo $e->getResponse()->getBody(true) . "\n";
              // var_dump($e->getRequest()->getHeaders()) ;
            }
        )->wait();


    }
    public function Logout(externalAPI $api, Request $request)
    {
        //dd('test');

       // $data = $request->input();

        $client = new \GuzzleHttp\Client();
        $promise = $client->getAsync($api::externalAPI()->logout, ['headers' =>
        [
            'Authorization' => 'Bearer '.$request->session()->get('data')->access_token
        ]] );
        $promise->then(
            function (ResponseInterface $res) {
                //echo $res->getStatusCode() . "\n";
                $body = $res->getBody();
                $data = json_decode( $body->getContents());
                //echo $data;
               // dd( $data->access_token);

                if ($data == "logged out successfully") {
                    global $request;
                    //dd($data);
                    //$request->session()->put('data', $data);
                    $request->session()->forget('data');
                       // echo $body;


                }

            },
            function (RequestException $e) {
                echo $e->getResponse()->getBody(true) . "\n";
              // var_dump($e->getRequest()->getHeaders()) ;
            }
        )->wait();

        $request->session_destroy;

        return redirect(route("Login_routes"));


    }
    public function getDatas(externalAPI $api,Request $request)
    {

        $link = $api::externalAPI()->profile;
        $param = $request->session()->get('data')->phone;
        //dd($link.$param);
        $client = new \GuzzleHttp\Client();
        $promise = $client->getAsync($link.$param, ['headers' =>
        [
            'Authorization' => 'Bearer '.$request->session()->get('data')->access_token
        ]] );
        $promise->then(
            function (ResponseInterface $res) {
                $body = $res->getBody();
                $data = json_decode( $body->getContents());
                global $request;
                $request->session()->put("parameters", $data);

            },
            function (RequestException $e) {
                echo $e->getResponse()->getBody(true) . "\n";
              // var_dump($e->getRequest()->getHeaders()) ;
            }
        )->wait();


    }


}

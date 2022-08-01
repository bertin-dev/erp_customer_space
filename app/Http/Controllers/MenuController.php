<?php

namespace App\Http\Controllers;

use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
//use App\Http\Controllers\ParametreController;

class MenuController extends Controller
{
    function __construct()
    {
         $this->allias = include(app_path() .'/MyMethod/ContorllerAllias.php');
    }

    //
    public function index (Request $request, $page ,$getApiDatas = null ){
       //dd($page);

       //dd($godController);

        if(!empty($getApiDatas)){

            /// lancement de l'API
            $godController= "App\Http\Controllers\\". $this->allias[$page];
            $response = $godController::getDatas($request);
             return response()->json($response, 200, );
        }else{

            if($request->ajax()){
                $param = ["loadJsFunction" =>true];
            }

            return view("pages.Menu.$page",$param);

        }

    }
}

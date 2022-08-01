<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MyMethod\ExternalAPI ;

class PayementsController extends Controller
{
    //
    public static function getDatas($request){
        $api = new ExternalAPI;
        $formDatas = $request->input();
        $data =  $api->getAsyncDatas ($request,"post", "PeerToPeerTransaction", "formDatas", $formDatas);
            //$data = self::formatDatas($data->data);
        return $data;
    }
}

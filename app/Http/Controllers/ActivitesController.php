<?php

namespace App\Http\Controllers;

use App\MyMethod\ExternalAPI ;

class ActivitesController extends Controller
{
    //
    public static function getDatas($request){
        $api = new ExternalAPI;
        $data =  $api->getAsyncDatas ($request,"get", "transaction");
            $data = self::formatDatas($data->data);

        return $data;
    }
    public static function setDatas(){

    }
    public static function formatDatas($data){

       $backData = ["data"=>[]];

        foreach ($data as $key => $val) {
            $back["id"] = $val->id;
            $back["montant"] = $val->Montant;
            $back["frais"] = $val->Frais;
            $back["date"] = $val->Date;
            $back["operation"] = $val->Operation;

            foreach($val->user as $key => $val){
                if(!isset($val->raison_social)){
                    $back[$val->type] = $val->lastname." ".$val->firstname." ".$val->entite;
                }else{
                    $back[$val->type] = $val->raison_social."\n".$val->entite;
                }
            }
            $backData["data"][] =  $back;
        }

        return $backData;
    }

}

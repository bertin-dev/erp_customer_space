<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MyMethod\ExternalAPI ;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */

    public function index(Request $request)
    {

        if ($request->method() =="GET") {
            $api = new ExternalAPI;
            return view('pages.default',["linkRegiter" =>$api::externalAPI()->autoRegiter ,"ViewType" => 'Accounts','View' => "Registers", "Title" => "Register"]);
        }

        if ($request->method() =="POST") {
            $data = $request->input();
            //dd($data);
             /// lancement de l'API

            //$data =  $api->getAsyncDatas ($request,"post", "autoRegiter", 'RegisterData', $data);

        return $data;
     }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

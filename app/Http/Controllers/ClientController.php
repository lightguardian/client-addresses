<?php

namespace App\Http\Controllers;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Client;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $client = Client::all();

        return $client->toJson();
     
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
        $client = Client::where('cnpj', $request->cnpj)->first();

        if($client != null)
        {
            return response()->json([
                'error' => 'cnpj already exists',
            ],409);
        }
        try {
            $client = new Client();

            $client->trade_name = $request->trade_name;
            $client->legal_name = $request->legal_name;

            $client->cnpj = $request->cnpj;
            $client->timestamps = false; 

            $client->save();
            
            return response()->json($client,201);

        } catch (QueryException $exception) {
            
            $errorInfo = $exception->errorInfo;

            return response()->json([
                'error' => 'internal server error',
                //'details' => $errorInfo,
            ],500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = Client::where('id',$id)->first();
        return $client != null  ? $client->toJson() : response()->json([
            'error' => 'client with id {' . $id .'} not found',
        ],404);
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
        try {
            $client = Client::find($id);

            $client->trade_name = $request->trade_name != null ? $request->trade_name : $client->trade_name;
            $client->legal_name = $request->legal_name != null ? $request->legal_name : $client->legal_name;
            $client->cnpj = $request->cnpj != null ? $request->cnpj : $client->cnpj;
            $client->timestamps = false; 

            $client->save();
            $client->timestamps = false; 
            return response()->json($client,200);

        } catch (QueryException $exception) {
            
            $errorInfo = $exception->errorInfo;

            return response()->json([
                'error' => 'internal server error',
                //'details' => $errorInfo,
            ],500);
            
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $client = Client::find($id);

            $client->delete();
            return $client->toJson();

        } catch (QueryException $exception) {
            
            $errorInfo = $exception->errorInfo;

            return response()->json([
                'error' => 'internal server error',
                //'details' => $errorInfo,
            ],500);
        } 
    }
}

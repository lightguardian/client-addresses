<?php

namespace App\Http\Controllers;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Address;
use App\Client;


class AddressController extends Controller
{

   


    private function validation(&$client, &$address,&$client_id, &$address_id) {

        $address = Address::find($address_id);
        $client = Client::find($client_id);
        
        if($client == null)
        {    
            response()->json([
                'error' => 'client {'. $client_id .'} doesn\'t exist',
            ],404)->send();

            return false;

        } elseif($address == null)
        {
            response()->json([
                'error' => 'address {'. $address_id .'} doesn\'t exist',
            ],404)->send();

            return false;
            
        } elseif($address->client_id != $client_id) 
        {
            response()->json([
                'error' => 'address {'. $address_id .'} doesn\'t belong to this client',
            ],406)->send();

            return false;
        } 
        return true;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($client_id)
    {

        $address = Address::where('client_id', $client_id)->get();

        return $address->toJson();
     
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
    public function store(Request $request, $client_id)
    {

        $client = Client::find($client_id);

        if($client == null)
        {
            return response()->json([
                'error' => 'client {'.$client_id.'} doesn\'t exist',
            ],404);
        }

        try {
            $address = new Address();
            $address->client_id = $client_id;
            $address->road = $request->road;
            $address->neighborhood = $request->neighborhood;
            $address->house_number = $request->house_number;
            $address->cep = $request->cep;

            $address->timestamps = false; 

            $address->save();
            
            return response()->json($address,201);

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
    public function show($client_id, $address_id)
    {
        $address = new Address();
        $client = new Client();
        
        if ($this->validation($client, $address, $client_id, $address_id)) {
            return response()->json($address,200);
        } 
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
    public function update(Request $request, $client_id, &$address_id)
    {
        $client = new Client();
        $address = new Address();
       
        try 
        {   
            if ($this->validation($client, $address, $client_id, $address_id)) {

                //Atualiza a coluna do campo caso o valor tenha vindo na requisicao
                $address = $address->where('id',$address_id)->where('client_id',$client_id)->first();
                $address->client_id = $request->client_id != null ? $request->client_id : $address->client_id;
                $address->road = $request->road != null ? $request->road : $address->road;
                $address->neighborhood = $request->neighborhood != null ? $request->neighborhood : $address->neighborhood;
                $address->house_number = $request->house_number != null ? $request->house_number : $address->house_number;
                $address->cep = $request->cep != null ? $request->cep : $address->cep;

                $address->timestamps = false; 

                $address->save();

                return response()->json($address,200);
        } 
        
        } catch (QueryException $exception) 
        {
            
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
    public function destroy($client_id, $address_id)
    {   
        $client = new Client();
        $address = new Address();

        try {
            
          if($this->validation($client, $address,$client_id,$address_id))
          {
            $address->delete();
            return response()->json($address,410);
          }
        } catch(Exception $e)
        {
            $errorInfo = $e->errorInfo;

            return response()->json([
                'error' => 'internal server error',
                //'details' => $errorInfo,
            ],500);
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Input;
use Validator;
use Redirect;

class UploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        // getting file
        $contract_csv = array(
            'contract_csv' => Input::file('contract_csv'),
            'awarded_csv' => Input::file('awarded_csv'),
            'first_name' => Input::file('first_name')
        );

        // setting up rules
        $rules = array(
            'contract_csv' => 'required|mimes:csv',
            'awarded_csv' => 'required|mimes:csv',
            'first_name' => 'required'
        );

        // doing the validation, passing post data, rules and the messages
        $validator = Validator::make($contract_csv, $rules);

        if ($validator->fails()) {
            // send back to the page with the input data and errors
            return Redirect::to('upload/csv')->withInput()->withErrors($validator);
        }

        /*if (Input::hasFile('contract_csv')){

            $contract_csv = Input::file('contract_csv');
            $name = time() . '-' . $contract_csv->getClientOriginalName();
            // Moves file to folder on server
            $contract_csv->move(public_path() . '/uploads/CSV', $name);

            echo "MOved file";

            return 'Ok'; // return for testing

        }*/
    }
        


    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}

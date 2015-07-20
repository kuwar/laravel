<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Input;
use Validator;
use Redirect;
use Session;

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
            'awarded_csv' => Input::file('awarded_csv')
        );

        // setting up rules
        $rules = array(
            'contract_csv' => 'required',
            'awarded_csv' => 'required'
        );

        // doing the validation, passing post data, rules and the messages
        $validator = Validator::make($contract_csv, $rules);

        if ($validator->fails()) {
            // send back to the page with the input data and errors
            return Redirect::to('upload/csv')->withInput()->withErrors($validator);
        }
        else {
            if ( Input::file('contract_csv')->isValid() && Input::file('awarded_csv')->isValid() ) {
                $contract_csv = Input::file('contract_csv');
                $awarded_csv = Input::file('awarded_csv');

                $contract_csv_name = time() . '-' . $contract_csv->getClientOriginalName();
                $awarded_csv_name = time() . '-' . $awarded_csv->getClientOriginalName();
                // Moves file to folder on server
                $contract_csv->move(public_path() . '/uploads/CSV', $contract_csv_name);
                $awarded_csv->move(public_path() . '/uploads/CSV', $awarded_csv_name);

                Session::flash('success', 'Upload successfully'); 
                return Redirect::to('upload/csv');

                return 'Ok'; // return for testing
            }
            else {
                // sending back with error message.
                Session::flash('error', 'Uploaded file is not valid');
                return Redirect::to('upload/csv');
            }
        }
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

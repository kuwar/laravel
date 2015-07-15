<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;

class UserController extends BaseController
{
    public function showProfile($id){
    	echo $id;
    	echo "This is profile controller";
    }
}

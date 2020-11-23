<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Http\Resources\UserResource;

class UserController extends Controller
{
    public function index()    
    {   
    	if (request()->department) {      
        	$users = User::with('departments', 'emails')->whereHas('departments', function ($query) {
            	$query->where('slug', request()->department);
           	})->get();

       	}	else {
        		$users = User::with('departments','emails')->get();       
     	}

    	return UserResource::collection($users);
    }
}

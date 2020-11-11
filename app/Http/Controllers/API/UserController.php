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
    	return UserResource::collection(
    		User::get()
    	);
    }
}

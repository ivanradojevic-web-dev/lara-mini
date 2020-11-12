<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Department;
use App\Http\Resources\DepartmentResource;

class DepartmentController extends Controller
{
    public function index()    
    {   
    	return DepartmentResource::collection(
    		Department::get()
    	);
    }
}

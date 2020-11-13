<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Email;
use App\User;
use App\Http\Resources\EmailResource;
use App\Http\Requests\StoreEmail;

class EmailController extends Controller
{
    public function store(StoreEmail $request)
    {
    	dd($request->input('id'));

    	$user = User::findOrFail($request->input('id'));

    	$email = $user->emails()->create([
    		'address' => $request->input('address'),
    	]);

        return new EmailResource($email); 
    }
}

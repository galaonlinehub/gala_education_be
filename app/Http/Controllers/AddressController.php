<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function show(){
        $countries = Address::all();
        return response()->json($countries,200); 
    }
}

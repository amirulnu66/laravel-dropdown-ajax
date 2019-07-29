<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CountryModel;

use App\StatesModel;

class CountrayController extends Controller
{
    public function index() {

    	 $countries = CountryModel::all();

    	return view('welcome', compact('countries'));
    }

    public function getStates($id) {
    	$states = StatesModel::where('country_id', $id)->pluck('name', 'id');
    	return json_encode($states);

    }



    public function countryList() {
    	$countries = CountryModel::all();
    	return view('country', compact('countries'));
    }


    public function findStateName(Request $request){

    $satet = StatesModel::select('name', 'id')->where('country_id', $request->id)->take(100)->get();

    return response()->json($satet);
}

}

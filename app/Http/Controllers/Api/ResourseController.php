<?php

namespace App\Http\Controllers\Api;

use App\Models\City;
use App\Models\State;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ResourseController extends Controller
{
    function getCountry()
    {
        return $countries = Country::get();
    }
    function getState($country_id)
    {
        return $countries = State::where('country_id',$country_id)->get();
    }
    function getCity($state_id)
    {
        return $countries = City::where('state_id',$state_id)->get();
    }
}
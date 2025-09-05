<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use App\Models\Participation;
use App\Models\Region;
use Illuminate\Http\Request;

class OptionsController extends Controller
{
    public function getCity()
    {
        $cities = City::all()->map->optionsScope();
        return response()->success($cities);
    }

    public function getRegion()
    {
        $regions = Region::all()->map->optionsScope();
        return response()->success($regions);
    }

    public function getCountry()
    {
        $countries = Country::all()->map->optionsScope();
        return response()->success($countries);
    }

    public function getParticipation()
    {
        $participation = Participation::all()->map->optionsScope();
        return response()->success($participation);
    }
}

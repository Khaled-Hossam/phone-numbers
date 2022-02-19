<?php

namespace App\Http\Controllers;

use App\Enums\CountryEnum;
use App\Http\Resources\CountryListResource;


class CountryController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return \Illuminate\Http\Response
     */
    public function countriesListForDropdown()
    {

        return CountryListResource::collection(CountryEnum::DATA);
    }
}

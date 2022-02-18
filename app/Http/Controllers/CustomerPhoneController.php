<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerPhoneFilterRequest;
use App\Services\CategorizePhoneNumbersService;
use App\Services\CustomerFilterService;
use Illuminate\Http\Request;

class CustomerPhoneController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(
        CustomerPhoneFilterRequest $request,
        CategorizePhoneNumbersService $categorizePhoneNumbersService,
        CustomerFilterService $customerFilterService,
    )
    {
        $phonesCategorizedByCountry = $categorizePhoneNumbersService->execute();

        if($request->has('country_code')){
            $phonesCategorizedByCountry = $customerFilterService->filterByCountryCode($phonesCategorizedByCountry, $request->input('country_code'));
        }

        if($request->has('is_valid_phones')){
            $phonesCategorizedByCountry = $customerFilterService->filterByPhoneValidity($phonesCategorizedByCountry, $request->input('is_valid_phones'));
        }

        return $phonesCategorizedByCountry;
    }
}

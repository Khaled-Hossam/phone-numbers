<?php

namespace App\Http\Controllers;

use App\Http\Requests\PhoneNumberFilterRequest;
use App\Http\Resources\PhoneNumberResource;
use App\Services\CategorizePhoneNumbersService;
use App\Services\CustomerPhoneFilterService;
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
        PhoneNumberFilterRequest $request,
        CategorizePhoneNumbersService $categorizePhoneNumbersService,
        CustomerPhoneFilterService $customerPhoneFilterService,
    )
    {
        $phonesCategorizedByCountry = $categorizePhoneNumbersService->execute();

        if($request->has('country_code')){
            $phonesCategorizedByCountry = $customerPhoneFilterService->filterByCountryCode($phonesCategorizedByCountry, $request->input('country_code'));
        }

        if($request->has('is_valid_phones')){
            $phonesCategorizedByCountry = $customerPhoneFilterService->filterByPhoneValidity($phonesCategorizedByCountry, $request->input('is_valid_phones'));
        }

        return PhoneNumberResource::collection( $phonesCategorizedByCountry);
    }
}

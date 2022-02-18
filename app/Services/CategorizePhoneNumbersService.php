<?php

namespace App\Services;

use App\Enums\CountryEnum;
use App\Models\Customer;
use Illuminate\Support\Collection;

class CategorizePhoneNumbersService {

    public function execute() :Collection{
        $phonesCategorizedByCountry = Customer::all()
            ->map(function(Customer $customer){
                preg_match('/\((\d+?)\)/', $customer->phone, $match);
                $customer->country_code = $match[1];
                $customer->valid_phone = $this->isValidPhoneNumber($customer->country_code, $customer->phone);
                $customer->country = CountryEnum::DATA[$customer->country_code]['country_name'];
                return $customer;
            })
            // ->groupBy('country_code')
            // ->when($countryCode, function(Collection $collection) use($countryCode){
            //     $collection->filter(fn($customer)=> $customer->country_code == $countryCode);
            // })
            // ->when($isValidNumber, function(Collection $collection) use($isValidNumber){
            //     $collection->filter(fn($customer)=> $customer->valid_phone == $isValidNumber);
            // })
            ;

        return $phonesCategorizedByCountry;
    }


    private function isValidPhoneNumber($countryCode, $phoneNumber){
        return preg_match(CountryEnum::DATA[$countryCode]['valid_phone_regex'], $phoneNumber);
    }
}

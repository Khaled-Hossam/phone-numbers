<?php

namespace App\Services;

use App\Enums\CountryEnum;
use App\Models\Customer;
use Illuminate\Support\Collection;

class CategorizePhoneNumbersService {

    public function execute() :Collection{
        return Customer::all()
            ->map(function(Customer $customer){
                preg_match('/\((\d+?)\)/', $customer->phone, $match);
                $customer->country_code = $match[1];
                $customer->phone_without_country_code = str_replace($match[0], '', $customer->phone);
                $customer->is_valid_phone = $this->isValidPhoneNumber($customer->country_code, $customer->phone);
                $customer->country = CountryEnum::DATA[$customer->country_code]['country_name'];
                return $customer;
            });
    }


    private function isValidPhoneNumber($countryCode, $phoneNumber){
        return preg_match(CountryEnum::DATA[$countryCode]['valid_phone_regex'], $phoneNumber);
    }
}

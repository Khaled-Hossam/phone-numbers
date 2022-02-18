<?php

namespace App\Services;

use Illuminate\Support\Collection;

class CustomerFilterService {

    public function filterByCountryCode(Collection $collection, $countryCode){
        return $collection->filter(fn($customer)=> $customer->country_code == $countryCode);
    }

    public function filterByPhoneValidity(Collection $collection, $phoneValidity){
        return $collection->filter(fn($customer)=> (bool)$customer->valid_phone === (bool)$phoneValidity);
    }

}

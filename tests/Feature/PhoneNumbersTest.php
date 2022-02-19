<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PhoneNumbersTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_phone_numbers_returns_valid_response_structure()
    {
        $response = $this->getJson('/api/phone-numbers');

        $response->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'country',
                        'country_code',
                        'is_valid_phone',
                        'phone_without_country_code',
                    ],
                ]
            ])
        ;
    }

    public function test_phone_numbers_return_filtered_data_using_phone_validity_filter()
    {
        $response = $this->getJson('/api/phone-numbers?is_valid_phones=1');

        $response->assertStatus(200)
            ->assertJsonMissing([
                'is_valid_phone' => 0,
            ])
        ;
    }

    public function test_phone_numbers_return_filtered_data_using_country_code_filter()
    {
        $response = $this->getJson('/api/phone-numbers?country_code=212');

        $response->assertStatus(200)
            ->assertJsonFragment([
                'country_code' => '+212',
            ])
        ;
    }


    public function test_phone_numbers_return_filtered_data_using_both_country_code_and_phone_validity_filters()
    {
        $response = $this->getJson('/api/phone-numbers?country_code=212&is_valid_phones=1');

        $response->assertStatus(200)
            ->assertJsonFragment([
                'country_code' => '+212',
                'is_valid_phone' => 1,
            ])
        ;
    }


}

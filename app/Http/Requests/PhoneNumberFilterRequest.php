<?php

namespace App\Http\Requests;

use App\Enums\CountryEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PhoneNumberFilterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'is_valid_phones' => ["nullable", "boolean"],
            'country_code' => ['nullable', Rule::in(array_keys(CountryEnum::DATA))],
        ];
    }
}

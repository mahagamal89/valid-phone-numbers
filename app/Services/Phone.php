<?php

namespace App\Services;

use App\Models\Customer;

class Phone
{
    /**
     * @var array
     */
    protected $data = [];

    /**
     * Build the phones data.
     *
     * @return array
     */
    public function build()
    {
        $phoneNumbers = Customer::all()->pluck('phone');

        foreach ($phoneNumbers as $key => $value) {
            $value = explode(' ', $value);
            $countryCodes = '+'.str_replace(['(', ')'], "", $value[0]);
            $this->data[$key]['countryCodes'] = $countryCodes;
            $this->data[$key]['phoneNumbers'] = $value[1];
        }

        $this->getCountries($this->data);

        return $this->data;
    }

    /**
     * Get the related country.
     *
     * @param  array  $data
     *
     * @return void
     */
    public function getCountries($data)
    {
        foreach ($data as $key => $countryCode) {
            foreach (config('countries.phone_numbers_validator') as $countries => $value) {
                if ($countryCode['countryCodes'] === $value['country-code']) {
                    $this->data[$key]['countries'] = $countries;
                }
            }
        }
    }
}
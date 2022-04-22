<?php

namespace App\Services;

use App\Models\Customer;

class State
{
    /**
     * @var array
     */
    protected $phones;

    /**
     * Create a new service instance.
     *
     * @param  array  $phones
     *
     * @return void
     */
    public function __construct(array $phones)
    {
        $this->phones = $phones;
    }

    /**
     * Check the validity of the phone numbers.
     *
     * @return array
     */
    public function isValid()
    {
        $phoneNumbers = Customer::all()->pluck('phone');
        foreach ($this->phones as $key => $value) {
            foreach (config('countries.phone_numbers_validator') as $countries) {
                if ($value['countryCodes'] == $countries['country-code']) {
                    $regex = '/'.$countries['regex'].'/';
                    $this->phones[$key]['state'] = preg_match($regex, $phoneNumbers[$key]) ? 'OK' : 'NOK';
                }
            }
        }

        return $this->phones;
    }
}
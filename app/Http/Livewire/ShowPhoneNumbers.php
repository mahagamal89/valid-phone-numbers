<?php

namespace App\Http\Livewire;

use App\Services\Phone;
use Livewire\Component;
use Livewire\WithPagination;
use App\Services\State;

class ShowPhoneNumbers extends Component
{
    use WithPagination;

    /**
     * @var string
     */
    public $selectedCountry = '';

    /**
     * @var string
     */
    public $selectedPhoneState = '';

    /**
     * Render the view.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.show-phone-numbers', [
            'data' => $this->getData()->paginate(10),
            'countries' => $this->listAllCountries(),
        ])
        ->extends('layouts.app')
        ->section('body');
    }

    /**
     * Get the data.
     *
     * @return \Illuminate\Support\Collection
     */
    public function getData()
    {
        $phones = (new Phone())->build();
        $data = collect((new State($phones))->isValid());

        if (!empty($this->selectedCountry) || !empty($this->selectedPhoneState)) {
            return $this->filter($data);
        }

        return $data;
    }

    /**
     * List all available countries.
     *
     * @return array
     */
    public function listAllCountries()
    {
        return app('phoneNumbersValidator');
    }

    /**
     * Filter the fatwas query.
     *
     * @param  \Illuminate\Support\Collection  $query
     *
     * @return \Illuminate\Support\Collection
     */
    public function filter($query)
    {
        if (!empty($this->selectedCountry) && !empty($this->selectedPhoneState)) {
            return $query->where('countries', $this->selectedCountry)->where('state', $this->selectedPhoneState);
        }

        if (!empty($this->selectedCountry)) {
            return $query->where('countries', $this->selectedCountry);
        }

        if (!empty($this->selectedPhoneState)) {
            return $query->where('state', $this->selectedPhoneState);
        }

    }

    /**
     * Reset pagination before selected country property is updated.
     *
     * @return void
     */
    public function updatingSelectedCountry()
    {
        $this->resetPage();
    }

    /**
     * Reset pagination before selected phone state property is updated.
     *
     * @return void
     */
    public function updatingSelectedPhoneState()
    {
        $this->resetPage();
    }
}

<?php

namespace App\Http\Livewire;

use App\Services\Phone;
use App\Services\State;
use Livewire\Component;

class ShowPhoneNumbers extends Component
{

    /**
     * Render the view.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.show-phone-numbers', [
            'data' => $this->getData(),
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
        
        return (new State($phones))->isValid();
    }
}

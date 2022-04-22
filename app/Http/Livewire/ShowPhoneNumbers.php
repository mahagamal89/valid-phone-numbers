<?php

namespace App\Http\Livewire;

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
        return view('livewire.show-phone-numbers')
        ->extends('layouts.app')
        ->section('body');
    }
}

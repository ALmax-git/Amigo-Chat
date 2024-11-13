<?php

namespace App\Livewire;

use Livewire\Component;

use Illuminate\Support\Facades\Auth;

class Header extends Component
{

    public $items;
    public $Cart_count = 0;
   
     public function logout()
    {
        Auth::guard('web')->logout();  
        return redirect()->route('login');  
    }
    public function render()
    {
        return view('livewire.header');
    }
}

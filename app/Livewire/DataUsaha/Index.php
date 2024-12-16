<?php

namespace App\Livewire\DataUsaha;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Index extends Component
{
    use LivewireAlert;

    public function render()
    {
        return view('livewire.data-usaha.index')
        ->layout('components.layouts.app', ['title' => 'Data Usaha']);
    }
}

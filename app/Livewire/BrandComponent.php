<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Brand;

class BrandComponent extends Component
{
    public $name;

    public $brands;

    public function mount(){
        $this->brands = Brand::all();
    }

    public function saveBrand(){
        $this->validate(['name'=> 'required|string|unique:brands|min:3|max:255']);

        Brand::create(['name'=> $this->name]);

        $this->name ='';

        $this->brands = Brand::all();

        // Флеш повідомлення
        flash('Запис додано.');
    }

    public function render()
    {
        return view('livewire.brand-component',[
            'rows'=> $this->brands,
        ])->layout('components.layouts.admin');
    }
}

<?php

namespace App\Livewire\Admin\Comp;

use Livewire\Component;
use App\Models\Brand;

class Brands extends Component
{
    public $titlePage = 'Довідник брендів';
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
        return view('livewire.admin.comp.brands',[
            'rows'=> $this->brands,
        ])->layout('components.layouts.main');
    }

}

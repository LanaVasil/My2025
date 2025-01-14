<?php

namespace App\Livewire\Comp\Brands;

use Livewire\Component;
use App\Models\Brand;

class AdminBrands extends Component
{
    public $titlePage = 'Довідник брендів';

    public $name;

    public $sort;

    public $brands;

    public function mount(){
        $this->brands = Brand::all();
    }

    public function saveBrand(){
        $this->validate(['name'=> 'required|string|unique:brands|min:3|max:255']);

        Brand::create(['name'=> $this->name, 'sort'=> $this->sort]);

        $this->name ='';
        $this->sort ='';

        $this->brands = Brand::all();

        // Флеш повідомлення
        flash('Запис додано.');
    }
    public function render()
    {
        return view('livewire.comp.brands.admin-brands',[
            'rows'=> $this->brands])
        ->layoutData([
            'titlePage'=>$this->titlePage])
        ->layout('components.layouts.main');
    }
}

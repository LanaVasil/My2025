<?php

namespace App\Livewire\Devices;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Device;
use App\Models\Brand;
use App\Models\DevType;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Barryvdh\Debugbar\Facades\Debugbar;

class DeviceTable extends Component
{
    public $titlePage = 'Довідник пристроїв';

    // !!! Device.status=9 - картриджі не заправляються

    use WithPagination;
    public $pagination=10;
    public $paginationList = [
      '10'=>'10',
      '20'=>'20',
      '50'=>'50',
      '100'=>'100',
    ];

    public $search = '';
    public $sortByColumn = 'name';
    public $sortDirection = 'DESC';

    public $listDevTypes = [];
    public $filterDevTypes = [];
    public $listBrands = [];
    public $filterBrands = [];
    public $statusDevice = [
        '1'=>'актуальні',
        '0'=>'неактуальні',
        '9'=>'не заправляються',
    ];
    public $listStatus = [];
    public $filterStatus = [];
    public $chkIdRows = [];

public function setSort($column)  {


  if ($this->sortByColumn === $column) {
    $this->sortDirection = ($this->sortDirection == "ASC" ? "DESC": "ASC");
    return;
  }

  $this->sortByColumn = $column;
  $this->sortDirection = "ASC";
}
    // public $chkAll = false;

    // Delete record /  Видалити строку
    // public function updatedQ()
    // {
    //   $this->resetPage();
    // }

    // public function mount(){
    //   $this->chkIdRows = collect();
    // }

    // $rows->dev_type->name | $rows->brand->name |  $rows->name
    // Delete the marked term /  Видалити позначені строк
    public function deleteRow($id = 0){
        try {
          if ($id){
            $rows = Device::findOrFail($id);
            session()->flash('success', "Назву: $rows->name видалено");
            $rows->delete();
            return $this->redirect('/devices',navigate:true);

          }else{
            $count = count($this->chkIdRows);
            if ($count){
              Device::query()
              ->whereIn('id', $this->chkIdRows)
              ->delete();
              session()->flash('success', "Видалено $count запис(-ів)");

              $this->$chkIdRows = [];
              $this->$chkAll = false;

              // for ($i=0; $i<$count;$i++){
              //   $rows = Device::findOrFail($this->chkIdRows[$i]);
              //   $message .= " $rows->name;";
              //   $rows->delete();
              // }
              // session()->flash('success', "Видалено $count запис(-ів):$message");
              return $this->redirect('/devices',navigate:true);
            }
          }
        } catch (\Exception $th) {
            dd($th);
        }
    }

// public function updatedChkAll($value){

//   if($value){
//     $this->$chkIdRows = Device::pluck('id');
//       // Debugbar::info( [Device::pluck('id')]);
//   }else{
//     $this->$chkIdRows = [];
//   }
// }

    public function chkDevTypes(){
      // dd($this->listDevTypes);
      $trueValues = array_filter($this->listDevTypes, function($va){
        return $va === true ?? $va;
      });

      if (!empty($trueValues)){
        $this->filterDevTypes = array_keys($trueValues);
      }else{
        $this->filterDevTypes = [];
      }

      $this->resetPage();
    }

    public function chkBrands(){
      // dd($this->listBrands);
      $trueValues = array_filter($this->listBrands, function($va){
        return $va === true ?? $va;
      });
      if (!empty($trueValues)){
        $this->filterBrands = array_keys($trueValues);
      }else{
        $this->filterBrands = [];
      }

      // $this->resetPage();
    }

    public function chkStatus(){
      // dd($this->listBrands);
      $trueValues = array_filter($this->listStatus, function($va){
        return $va === true ?? $va;
      });
      if (!empty($trueValues)){
        $this->filterStatus = array_keys($trueValues);
      }else{
        $this->filterStatus = [];
      }

      $this->resetPage();
    //   session()->flash('success', 'Запис додано.');
    //   session(['key' => 'value']);
    }

    function getDevTypes(){
      return DevType::orderBy('sort', 'asc')->orderBy('name','asc')->get();
    }
    function getBrands(){
      return Brand::orderBy('sort', 'asc')->orderBy('name','asc')->get();
    }

    public function getDevices(){
        return Device::search($this->search)
        ->orderBy($this->sortByColumn, $this->sortDirection)
        ->when(!empty($this->filterDevTypes), function (Builder $query){
          $query->whereIn('dev_type_id', $this->filterDevTypes);
        })
        ->when(!empty($this->filterBrands), function (Builder $query){
          $query->whereIn('brand_id', $this->filterBrands);
        })
        ->when(!empty($this->filterStatus), function (Builder $query){
          $query->whereIn('status', $this->filterStatus);
        })
        ->paginate($this->pagination);
    }

    public function render()
    {

//  Debugbar::info( [$this->getDevices()]);
      return
      view('livewire.devices.device-table',[
        'rows'=>$this->getDevices(),
        'dev_types'=>$this->getDevTypes(),
        'brands'=>$this->getBrands() ])
      ->layoutData([
                'titlePage'=>$this->titlePage])
      ->layout('components.layouts.main');
    }
}

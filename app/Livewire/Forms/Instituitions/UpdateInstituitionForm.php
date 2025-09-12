<?php

namespace App\Livewire\Forms\Instituitions;

use App\Livewire\Forms\Base\InstituitionForm;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class UpdateInstituitionForm extends InstituitionForm
{
    public $instituition;

    public function mount($instituition)
    {
        $this->instituition = $instituition;
        $this->name = $instituition->name;
    }

    protected function rules()
    {
        return array_map(function ($value) {
            return str_replace('unique:instituitions,name', 'unique:instituitions,name,' . $this->instituition->id, $value);
        }, $this->rules);
    }
    
    public function submit()
    {
        $this->validate();
    
        $this->instituition->update([
            'name' => $this->name,
        ]);

        Toaster::success('Orgão atualizado com sucesso!');
    }
}

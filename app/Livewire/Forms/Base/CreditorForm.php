<?php

namespace App\Livewire\Forms\Base;

use Livewire\Component;

class CreditorForm extends Component
{   
    public $name;
    public $isSearch = false;
    
    protected $rules = [
        'name' => 'required|string|unique:creditors,name',
    ];

    protected function rules()
    {
        return $this->rules;
    }

    protected function validationAttributes()
    {
        return [
            'name' => 'nome',
        ];
    }

    public function updated($attr)
    {
        $this->validateOnly($attr);
    }

    public function submit()
    {
        $this->validate();
    }

    public function render()
    {
        return view('livewire.forms.creditor-form');
    }
}

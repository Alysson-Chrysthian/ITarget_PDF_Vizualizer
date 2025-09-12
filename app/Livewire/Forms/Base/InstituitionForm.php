<?php

namespace App\Livewire\Forms\Base;

use Livewire\Component;

class InstituitionForm extends Component
{
    public $name;
    
    protected $rules = [
        'name' => 'required|string|unique:instituitions,name',
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
        return view('livewire.forms.instituition-form');
    }
}

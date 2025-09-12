<?php

namespace App\Livewire\Forms\Creditors;

use App\Livewire\Forms\Base\CreditorForm;
use App\Models\Creditor;
use Livewire\Attributes\On;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class UpdateCreditorForm extends CreditorForm
{
    public $creditor;

    public function mount($creditor)
    {
        $this->creditor = $creditor;
        $this->name = $creditor->name;
    }

    protected function rules()
    {
        return array_map(function ($value) {
            return str_replace('unique:creditors,name', 'unique:creditors,name,' . $this->creditor->id, $value);
        }, $this->rules);
    }

    public function submit()
    {
        $this->validate();

        $this->creditor->update([
            'name' => $this->name,
        ]);        

        Toaster::success('Credor atualizado com sucesso!');
    }
}

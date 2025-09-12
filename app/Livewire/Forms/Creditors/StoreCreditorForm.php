<?php

namespace App\Livewire\Forms\Creditors;

use App\Livewire\Forms\Base\CreditorForm;
use Livewire\Component;
use App\Models\Creditor;
use Masmerise\Toaster\Toaster;

class StoreCreditorForm extends CreditorForm
{
    public function submit()
    {
        $this->validate();

        $creditor = new Creditor;
        $creditor->name = $this->name;

        $creditor->save();

        Toaster::success('Credor criado com sucesso!');

        $this->reset();
    }
}

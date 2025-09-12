<?php

namespace App\Livewire\Forms\Instituitions;

use App\Livewire\Forms\Base\InstituitionForm;
use Livewire\Component;
use App\Models\Instituition;
use Masmerise\Toaster\Toaster;

class StoreInstituitionForm extends InstituitionForm
{
    public function submit()
    {
        $this->validate();

        $instituition = new Instituition;
        $instituition->name = $this->name;

        $instituition->save();

        Toaster::success('Orgão criado com sucesso!');

        $this->reset();
    }
}

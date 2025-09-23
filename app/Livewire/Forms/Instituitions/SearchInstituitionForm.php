<?php

namespace App\Livewire\Forms\Instituitions;

use App\Livewire\Forms\Base\InstituitionForm;
use App\Models\Instituition;
use Livewire\Attributes\On;
use Livewire\Component;

class SearchInstituitionForm extends InstituitionForm
{
    public $name = '', $search = '', $searchTerm = 'id';
    public $isSearch = true;

    public function mount()
    {
        $this->submit();
    }

    protected function rules()
    {
        return array_map(function ($rule) {
            return str_replace('required|', 'nullable|', $rule);
        }, $this->rules);
    }

    public function submit()
    {
        $this->validate();

        $instituitions = Instituition::query()
            ->where($this->searchTerm, 'like', '%' . $this->search . '%')
            ->get();

        $this->dispatch('instituitions-searched', instituitions: $instituitions);
    }

    #[On('refresh-instituitions')]
    public function refreshInstituitions()
    {
        $this->submit();
    }
}

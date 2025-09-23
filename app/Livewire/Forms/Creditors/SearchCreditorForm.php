<?php

namespace App\Livewire\Forms\Creditors;

use App\Livewire\Forms\Base\CreditorForm;
use App\Models\Creditor;
use Livewire\Attributes\On;
use Livewire\Component;
use Override;

class SearchCreditorForm extends CreditorForm
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

        $creditors = Creditor::query()
            ->where($this->searchTerm, 'like', '%' . $this->search . '%')
            ->get();

        $this->dispatch('creditors-searched', creditors: $creditors);
    }

    #[On('refresh-creditors')]
    public function refreshCreditors()
    {
        $this->submit();
    }
}

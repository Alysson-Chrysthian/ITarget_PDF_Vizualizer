<?php

namespace App\Livewire\Forms\Creditors;

use App\Livewire\Forms\Base\CreditorForm;
use App\Models\Creditor;
use Livewire\Attributes\On;
use Livewire\Component;
use Override;

class SearchCreditorForm extends CreditorForm
{
    public $name = '';
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
            ->where('name', 'like', '%' . $this->name . '%')
            ->get();

        $this->dispatch('creditors-searched', creditors: $creditors);
    }

    #[On('refresh-creditors')]
    public function refreshCreditors()
    {
        $this->submit();
    }
}

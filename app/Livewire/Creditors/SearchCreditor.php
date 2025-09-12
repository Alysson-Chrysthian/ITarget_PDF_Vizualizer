<?php

namespace App\Livewire\Creditors;

use App\Models\Creditor;
use Exception;
use Livewire\Attributes\On;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class SearchCreditor extends Component
{
    public $creditors;

    #[On('creditors-searched')]
    public function updateCreditorList($creditors)
    {
        $this->creditors = $creditors;
    }

    public function destroy(Creditor $creditor)
    {
        try {
            $creditor->delete();
        } catch (Exception $e) {
            Toaster::error('não é possivel deletar este elemento pois ele se relaciona com alguma outra parte importante do sistema');
        }
        
        $this->dispatch('refresh-creditors');
    }

    public function render()
    {
        return view('livewire.creditors.search-creditor', [
            'creditors' => $this->creditors,
        ]);
    }
}

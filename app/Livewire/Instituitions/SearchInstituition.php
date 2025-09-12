<?php

namespace App\Livewire\Instituitions;

use App\Models\Instituition;
use Exception;
use Livewire\Attributes\On;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class SearchInstituition extends Component
{
    public $instituitions;

    #[On('instituitions-searched')]
    public function updateInstituitionsList($instituitions)
    {
        $this->instituitions = $instituitions;
    }

    public function destroy(Instituition $instituition)
    {
        try {
            $instituition->delete();
        } catch (Exception $e) {
            Toaster::error('não é possivel deletar este elemento pois ele se relaciona com alguma outra parte importante do sistema');
        }
        
        $this->dispatch('refresh-instituitions');
    }

    public function render()
    {
        return view('livewire.instituitions.search-instituition', [
            'instituitions' => $this->instituitions,
        ]);
    }
}

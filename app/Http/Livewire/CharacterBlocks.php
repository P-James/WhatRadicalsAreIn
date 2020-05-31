<?php

namespace App\Http\Livewire;

use App\Character;
use Livewire\Component;

class CharacterBlocks extends Component
{

    public $search = '';

    public function render()
    {
        return view('livewire.character-blocks', [
            'characters' => Character::where(
                'character',
                $this->search
            )->get()
        ]);
    }
}

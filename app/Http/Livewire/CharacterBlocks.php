<?php

namespace App\Http\Livewire;

use App\Character;
use App\Radical;
use Livewire\Component;

class CharacterBlocks extends Component
{

    public $search = '';

    public function render()
    {
        return view('livewire.character-blocks', [
            'characters' => Character::whereIn('character', mb_str_split($this->search))->get()
        ]);
    }
}

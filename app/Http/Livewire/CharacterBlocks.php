<?php

namespace App\Http\Livewire;

use App\Character;
use App\Radical;
use Livewire\Component;

class CharacterBlocks extends Component
{

    public $search = '';

    public $splitSearch = [];

    public function updatedSearch($query)
    {
        $this->splitSearch = mb_str_split($query);
    }

    public function render()
    {
        return view('livewire.character-blocks', [
            'characters' => Character::whereIn('character', $this->splitSearch)->get()
        ]);
    }
}

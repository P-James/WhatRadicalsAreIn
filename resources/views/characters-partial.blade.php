@isset($characters)
@foreach ($characters as $character)
<li>
    Radical: {{$character->radicals()->first()->radical}},
    Character: {{$character->character}},
    Pinyin: {{$character->pinyin}},
    English: {{$character->meaning}}
</li>
@endforeach
@endisset
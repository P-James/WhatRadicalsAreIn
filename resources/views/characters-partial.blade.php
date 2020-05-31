@isset($characters)
@foreach ($characters as $character)
<li>
    Character: {{$character->character}},
    Pinyin: {{$character->pinyin}},
    English: {{$character->meaning}}
</li>
@endforeach
@endisset
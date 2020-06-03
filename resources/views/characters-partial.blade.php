@isset($characters)

@foreach ($characters as $character)
<character-block 
    radical="{{$character->radicals()->first()->radical}}" 
    character="{{$character->character}}" 
    pinyin="{{$character->pinyin}}" 
    english="{{$character->meaning}}">
</character-block>

@endforeach
@endisset
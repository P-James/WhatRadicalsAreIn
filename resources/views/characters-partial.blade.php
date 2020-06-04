@isset($characters)

@foreach ($characters as $character)
<character-block 
    character="{{$character->character}}" 
    radical="{{$character->radicals()->first()->radical}}" 
    stroke-count="{{$character->radicals()->first()->stroke_count}}"
    radical-variants="{{$character->radicals()->first()->variants}}" 
    pinyin="{{$character->radicals()->first()->pinyin}}" 
    english="{{$character->radicals()->first()->english}}">
</character-block>

@endforeach
@endisset
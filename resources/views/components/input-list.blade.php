@foreach($inputs as $input)
    @php
        $value = $block->options?->{ $lang }?->{ $input->name } ?? '';
        $name = "blocks[$block->id][options][$lang][$input->name]";
          // dump($block);
     //$value = 1;
    @endphp



    @if($input->type==='input')
        <x-inputs.input :label="$input->label" :name="$name" :value="$value" />
    @endif
    @if($input->type==='textarea')
        <x-inputs.textarea :label="$input->label" :name="$name" :value="$value" />
    @endif
    @if($input->type==='image')
        <x-inputs.image-simple :label="$input->label" :name="$name" :value="$value" />
    @endif
    @if($input->type==='number')
        <x-inputs.number :label="$input->label" :name="$name" :value="$value" />
    @endif
    @if($input->type==='checkbox')
        <x-inputs.checkbox :label="$input->label" :name="$name" :value="$value" />
    @endif

@endforeach

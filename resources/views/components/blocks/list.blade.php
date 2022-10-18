<ul class="sortableGroup">
    @foreach($blocks as $block)
        <x-cards.collapsable :title="$block->template->title" :model="$block">
            <input type="text" name="sort[{{ $block->id }}]" value="" hidden>
            <input type="text" name="blocks[{{ $block->id }}][template_id]" value="{{ $block->template->id }}" hidden>
            <x-input-list :inputs="json_decode($block->template->first_fields)"
                          :lang="$lang"
                          :block="$block"
            />
            @if(count(json_decode($block->template->second_fields, true)))
                @foreach($block->blocks as $subBlock)
                    <x-cards.simple :title="$block->template->title" :model="$subBlock">
                        <input type="text" name="sort[{{ $subBlock->id }}]" value="" hidden>
                        <input type="text" name="blocks[{{ $subBlock->id }}][template_id]"
                               value="{{ $block->template->id }}" hidden>
                        <x-input-list :inputs="json_decode($block->template->second_fields)"
                                      :lang="$lang"
                                      :block="$subBlock"
                        />
                        @if(count(json_decode($block->template->third_fields, true)))
                            @foreach($subBlock->blocks as $lastBlock)
                                <x-cards.simple :title="$block->template->title" :model="$lastBlock">
                                <input type="text" name="sort[{{ $lastBlock->id }}]" value="" hidden>
                                <input type="text" name="blocks[{{ $lastBlock->id }}][template_id]"
                                       value="{{ $block->template->id }}" hidden>
                                <x-input-list :inputs="json_decode($block->template->third_fields)"
                                              :lang="$lang"
                                              :block="$lastBlock"
                                />
                                </x-cards.simple>
                            @endforeach
                            <x-buttons.add-block-popup :blockId="$subBlock->id" :templateId="$block->template->id" />
                        @endif
                    </x-cards.simple>
                @endforeach
                <x-buttons.add-block-popup :blockId="$block->id" :templateId="$block->template->id" />
            @endif
        </x-cards.collapsable>
    @endforeach
</ul>

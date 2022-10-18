<x-cards.simple :title="$menu->template->title">
    <input type="text" name="blocks[{{ $menu->id }}][template_id]" value="{{ $menu->template->id }}" hidden>
    <x-input-list :inputs="json_decode($menu->template->first_fields)"
                  :lang="$lang"
                  :block="$menu"
    />
    @if(count(json_decode($menu->template->second_fields, true)))
        @foreach($menu->menus as $subMenu)
            <x-cards.simple :title="$menu->template->title" :model="$subMenu">
                <input type="text" name="sort[{{ $subMenu->id }}]" value="" hidden>
                <input type="text" name="blocks[{{ $subMenu->id }}][template_id]"
                       value="{{ $menu->template->id }}" hidden>
                <x-input-list :inputs="json_decode($menu->template->second_fields)"
                              :lang="$lang"
                              :block="$subMenu"
                />
                @if(count(json_decode($menu->template->third_fields, true)))
                    @foreach($subMenu->menus as $lastMenu)
                        <x-cards.simple :title="$menu->template->title" :model="$lastMenu">
                            <input type="text" name="sort[{{ $lastMenu->id }}]" value="" hidden>
                            <input type="text" name="blocks[{{ $lastMenu->id }}][template_id]"
                                   value="{{ $menu->template->id }}" hidden>
                            <x-input-list :inputs="json_decode($menu->template->third_fields)"
                                          :lang="$lang"
                                          :block="$lastMenu"
                            />
                        </x-cards.simple>
                    @endforeach
                    <x-buttons.add-menu-popup :blockId="$subMenu->id" />
                @endif
            </x-cards.simple>
        @endforeach
        <x-buttons.add-menu-popup :blockId="$menu->id" />
    @endif
</x-cards.simple>

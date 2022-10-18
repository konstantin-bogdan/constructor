<table class="table table-bordered table-valign-middle bg-white">
    <thead>
    <tr>
        @foreach($labels as $label)
            <th>{{ $label }}</th>
        @endforeach
        @if(isset($show))
            <th style="width: 20px">Show</th>
        @endif
        @if(isset($image))
            <th>Image</th>
        @endif
        <th></th>
    </tr>
    </thead>
    <tbody class="sortableGroup">
    @foreach($models as $model)
        <input type="text" name="model" value="{{ class_basename($model) }}" form="saveOrderForm" hidden >
        <tr>
            @foreach($fields as $field)
                <td>
                    <input type="text" name="sort[{{ $model->id }}]" value="" form="saveOrderForm" hidden >
                    {{ $model->{ $field } }}</td>
            @endforeach
            @if(isset($show))
                <td>
                    <x-buttons.on-off :model="$model"/>
                </td>
            @endif
                @if(isset($image))
                    <td><img height="150" src="{{ $model->{$image} }}" alt=""></td>
                @endif
            <td>
                <x-buttons.edit-model :model="$model"/>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

<form action="{{ route('admin.save-order') }}" id="saveOrderForm" method="post">
    @csrf
    @method('put')
</form>

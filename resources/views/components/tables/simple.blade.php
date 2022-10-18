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
        @if(isset($status))
            <th>Status</th>
        @endif
        <th></th>
    </tr>
    </thead>
    <tbody>
    @foreach($models as $model)
        <tr>
            @foreach($fields as $field)
                <td>{{ $model->{ $field } }}</td>
            @endforeach
            @if(isset($show))
                <td>
                    <x-buttons.on-off :model="$model"/>
                </td>
            @endif
                @if(isset($image))
                    <td><img height="150" src="{{ $model->{$image} }}" alt=""></td>
                @endif
                @if(isset($status))
                    @if($model->status=='new')
                        <td><span class="bg-green p-1 text-uppercase">{{ $model->status }}</span></td>
                    @endif
                    @if($model->status=='in process')
                        <td><span class="bg-yellow p-1 text-uppercase">{{ $model->status }}</span></td>
                    @endif
                    @if($model->status=='completed')
                        <td><span class="bg-gray p-1 text-uppercase">{{ $model->status }}</span></td>
                    @endif
                @endif
            <td>
                <x-buttons.edit-model :model="$model"/>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

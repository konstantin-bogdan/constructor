<div class="form-group">

    <input type="checkbox"
           name=" {{ $name }}"
           value="{{ $id }}"
           @checked($checked ?? false)
           @if($disabled ?? false ) disabled @endif
           >
    <label for="">{{ $label }}</label>
</div>

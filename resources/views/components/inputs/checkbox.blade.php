<div class="form-group">
    <input  name=" {{ $name }}" type="checkbox" value="" checked hidden>
    <input type="checkbox"
           name=" {{ $name }}"
           value="1"
           @checked($value ?? false)
           >
    <label for="">{{ $label }}</label>
</div>

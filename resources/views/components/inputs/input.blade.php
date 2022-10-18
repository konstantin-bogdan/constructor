<div class="form-group">
    <label for="">{{ $label }}</label>
    <input type="text"
           name=" {{ $name }}"
           @if(isset( $value))
           value="{{ $value }}"
           @endif
           @if(isset($req))
            required
           @endif
           class="form-control">
</div>

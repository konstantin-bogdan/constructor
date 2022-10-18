<div class="form-group">
    <label for="">{{ $label }}</label>
    <textarea type="text"
           name=" {{ $name }}"
           @if(isset($req))
           required
           @endif
           class="form-control"
            > @if(isset( $value)){{ $value }}@endif</textarea>
</div>


<div class="form-group">
    <label for="customFile">{{ $label }}</label>

        <div class="custom-file">
            <input type="file" name="{{ $name }}"
                   @if(isset($value))
                   value="{{ $value }}"
                   @endif
                   @if(isset($req))
                   required
                   @endif
                   class="custom-file-input" id="{{ str($name)->slug() }}">
            <label class="custom-file-label" for="{{ str($name)->slug() }}">{{ $value ?? 'Choose file'}}</label>
        </div>
</div>

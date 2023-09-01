
<label for="{{$field}}" class="form-label">{{$label}}</label>
<input
    id="{{$field}}"
    type="text"
    name="{{$field}}"
    value="{{ old($field, $inputValue ?? '') }}"
    class="form-control @error($field) is-invalid @enderror"
>

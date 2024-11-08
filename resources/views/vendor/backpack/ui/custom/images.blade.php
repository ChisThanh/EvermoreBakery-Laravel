<div class="form-group col-sm-12 mb-3">
    <label>{{ $field['label'] }}</label>
    <div class="row">
        @for ($i = 0; $i < count($field['images']); $i++)
            <div class="col">
                <img src="{{ asset('storage/' . $field['images'][$i]['url']) }}" class="img-responsive"
                    style="max-width: 100px; max-height: 100px;">
                <input type="checkbox" name="old[]" value="{{ $field['images'][$i]['id'] }}_{{ $field['images'][$i]['url'] }}">
            </div>
            @if ($i == 4)
                </div>
                <div class="row">
            @endif
        @endfor
    </div>
</div>

<form action="{{ $action }}" method="{{ $method }}">
    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="{{ $placeholder }}" name="{{ $name }}">
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="submit">{{ $buttonText }}</button>
        </div>
    </div>
</form>

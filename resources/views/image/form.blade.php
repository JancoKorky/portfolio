<div class="form-group">
    <span class="text-muted">
        <strong>Maximálna veľkosť jedného obrázku je 5MB</strong>
    </span>
    {!! Form::file('images[]', ['class'=>'form-control', 'multiple', 'required']) !!}

    @error('images.*')
    <span class="text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>


<div class="form-group">
    <a class="btn btn-link" href="{{route('user.album.show',[$user->id, $album->id])}}">
        Vrátit sa späť
    </a>

    {!! Form::button($title,['type'=>'submit',
    'class' => 'btn btn-outline-primary'
]) !!}
</div>

<div class="mt-3 form-group">
    {!! Form::text('album_name', null, [
    'class' => 'form-control',
    'placeholder'=> 'Názov albumu'
]) !!}
    @error('album_name')
    <span class="text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

<div class="form-group">
    <a class="btn btn-link" href="{{route('user.album.index',$user->id)}}">
        Vrátit sa späť
    </a>

    {!! Form::button($title,['type'=>'submit',
    'class' => 'btn btn-outline-primary'
]) !!}
</div>

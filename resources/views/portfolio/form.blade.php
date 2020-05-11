<div class="mt-3 form-group">
        <div>
            {!! Form::text('name_by_user', null, [
                'class' => 'form-control my-1 select-this',
                'placeholder'=> 'Názov tohto obrázku',
                'autofocus'
            ] ) !!}
            @error('name_by_user')
            <span class="text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            {!! Form::textarea('description', null, [
                'class' => 'form-control my-1',
                'placeholder'=> 'Text k obrázku',
                'rows'=> 15
            ]) !!}
            @error('description')
            <span class="text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
</div>

<div class="form-group">
    <a class="btn btn-link" href="{{route('user.show',$user->id)}}">
        Vrátit sa späť
    </a>

    {!! Form::button($title,['type'=>'submit',
    'class' => 'btn btn-outline-primary'
]) !!}
</div>

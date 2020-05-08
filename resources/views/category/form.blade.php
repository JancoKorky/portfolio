<span>Pre používateľa: <span class="font-weight-bold">{{ucfirst($user->name)}}</span></span>

<div class="mt-3 form-group">
    {!! Form::text('category_name', null, [
    'class' => 'form-control',
    'placeholder'=> 'Názov kategórie'
]) !!}
    @error('name')
    <span class="text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

<div class="form-group">
    {!! Form::text('description', null, [
    'class' => 'form-control',
    'placeholder'=> 'Popis katégorie'
]) !!}
    @error('description')
    <span class="text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

<div class="form-group">
    <a class="btn btn-link" href="{{route('user.album.index',$user->id)}}">
        Vrátit sa späť
    </a>

    {!! Form::button('Editovať',['type'=>'submit',
    'class' => 'btn btn-outline-primary'
]) !!}
</div>

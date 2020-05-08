<h1>Edit portfólia</h1>
<span>Používateľ: <span class="font-weight-bold">{{ucfirst($user->name)}}</span></span>

<div class="mt-3 form-group">
    {!! Form::text('title', null, [
    'class' => 'form-control',
    'placeholder'=> 'Názov tvojho portfólia'
]) !!}
    @error('title')
    <span class="text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

<div class="form-group">
    {!! Form::textarea('text', null, [
    'class' => 'form-control',
    'placeholder'=> 'Text, napríklad niečo o tebe',
    'rows'=> 15
]) !!}
    @error('text')
    <span class="text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

<div class="form-group">
    <a class="btn btn-link" href="{{redirect()->getUrlGenerator()->previous()}}">
        Vrátit sa späť
    </a>

    {!! Form::button('Editovať',['type'=>'submit',
    'class' => 'btn btn-outline-primary'
]) !!}
</div>

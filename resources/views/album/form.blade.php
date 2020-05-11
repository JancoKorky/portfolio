<div class="mt-3 form-group">
    {!! Form::text('album_name', null, [
    'class' => 'form-control select-this',
    'placeholder'=> 'Názov albumu',
    'autofocus'
]) !!}
    @error('album_name')
    <span class="text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

<div class="form-group">
    @foreach($categories as $category)

        <label class="custom-checkbox">
            @isset($album)
                {!! Form::checkbox('$categories[]', $category->id, $album->categories->contains($category->id)) !!}
                {{ $category->category_name }}

                @else
                {!! Form::checkbox('$categories[]', $category->id) !!}
                {{ $category->category_name }}
            @endisset

        </label>
    @endforeach
</div>



<div class="form-group">
    <a class="btn btn-link" href="{{route('user.album.index',$user->id)}}">
        Vrátit sa späť
    </a>

    {!! Form::button($title,['type'=>'submit',
    'class' => 'btn btn-outline-primary'
]) !!}
</div>

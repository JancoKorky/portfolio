@extends('layouts/app')

@section('content')
    <div class="container">

        @guest
            <div class="jumbotron">
                <h1 class="display-4">Vitajte!</h1>
                <p class="lead">Na tejto stránke si môžete vytvoriť svoje vlastné portfólio.</p>
                <hr class="my-4">
                <p class="lead">
                    <a class="btn btn-primary btn" href="{{ route('login') }}">Prihlásiť</a>
                    @if (Route::has('register'))
                        <a class="btn btn-secondary btn" href="{{ route('register') }}">Registrovať</a>
                    @endif
                </p>
            </div>
        @else
            {{--            <div class="d-none">{!! redirect()->route('user.show',Auth::id())!!}</div>--}}

            <div class="jumbotron">
                <p class="display-4">Ahoj {{ucfirst(Auth::user()->name)}}!</p>
                <p class="lead">Po vstupe do portfólia si môžeš upraviť úvodnú stránku Portfólio, na ktorej môžeš
                    napísať niečo o sebe a pridávať obrázky s názvom a popisom.</p>
                <p class="lead">V galérii si môžeš vytvoriť kategórie. Následne, pri vytváraní alebo úprave albumu, môžeš albumom priradiť
                    vytvorené kategórie.</p>
                <hr class="my-4">
                <p class="lead mb-4">Pokračuj vstupom do portfólia</p>
                <a class="btn btn-outline-primary" href="{{ route('user.show',Auth::id()) }}">
                    Vstúpiť do portfólia
                </a>
            </div>


        @endguest

        {{--<form action="/search" method="POST" role="search">
            {{ csrf_field() }}
            <div class="input-group">
                <input id="country" type="text" class="form-control" name="q"
                       placeholder="Search users"> <span class="input-group-btn">
            <button type="submit" class="btn btn-default">
                <span class="glyphicon glyphicon-search"></span>
            </button>
        </span>
            </div>
        </form>--}}

        {{--<div class="container" style="margin-top: 50px;">
            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                    <h4 class="text-center">Autocomplete Search Box with <br> Laravel + Ajax + jQuery</h4><hr>
                    <div class="form-group">
                        <label>Type a country name</label>
                        <input type="text" name="name" id="name" placeholder="Enter name name" class="form-control">
                    </div>
                    <div id="country_list"></div>
                </div>
                <div class="col-lg-3"></div>
            </div>
        </div>--}}

        {{--       <div class="container box">
                   <h3 align="center">Live search in laravel using AJAX</h3><br />
                   <div class="panel panel-default">
                       <div class="panel-heading">Search Customer Data</div>
                       <div class="panel-body">
                           <div class="form-group">
                               <input type="text" name="search" id="search" class="form-control" placeholder="Search Customer Data" />
                           </div>
                           <div class="table-responsive">
                               <h3 align="center">Total Data : <span id="total_records"></span></h3>
                               <table class="table table-striped table-bordered">
                                   <thead>
                                   <tr>
                                       <th>Customer Name</th>
                                       <th>Address</th>
                                       <th>City</th>
                                       <th>Postal Code</th>
                                       <th>Country</th>
                                   </tr>
                                   </thead>
                                   <tbody>

                                   </tbody>
                               </table>
                           </div>
                       </div>
                   </div>
               </div>--}}


        {{--      <div class="container">
                  @if(isset($details))
                      <p> The Search results for your query <b> {{ $query }} </b> are :</p>
                      <h2>Sample User details</h2>
                      <table class="table table-striped">
                          <thead>
                          <tr>
                              <th>Name</th>
                              <th>Email</th>
                          </tr>
                          </thead>
                          <tbody>
                          @foreach($details as $user)
                              <tr>
                                  <td>{{$user->name}}</td>
                                  <td>{{$user->email}}</td>
                              </tr>
                          @endforeach
                          </tbody>
                      </table>
                  @endif
              </div>--}}

        {{--        {!! Form::open(['url' => 'home']) !!}
                {!! Form::label('name', 'Zadaj meno používateľa') !!}
                {!! Form::text('name') !!}
                {!! Form::close() !!}--}}

        {{--        {{User::query()--}}
        {{--        ->where('name', 'LIKE', "%{$searchTerm}%")--}}
        {{--        ->orWhere('email', 'LIKE', "%{$searchTerm}%")--}}
        {{--        ->get()}}--}}
    </div>

    {{-- <script>
         $(document).ready(function(){

             fetch_customer_data();

             function fetch_customer_data(query = '')
             {
                 $.ajax({
                     url:"{{ route('home.action') }}",
                     method:'GET',
                     data:{query:query},
                     dataType:'json',
                     success:function(data)
                     {
                         $('tbody').html(data.table_data);
                         $('#total_records').text(data.total_data);
                     }
                 })
             }

             $(document).on('keyup', '#search', function(){
                 var query = $(this).val();
                 fetch_customer_data(query);
             });
         });
     </script>--}}

@endsection

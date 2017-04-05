@extends('layouts.app')

@section('content')
        @include('layouts.sidebar')

        <main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
          <h1>Dashboard</h1>
          
          Last few memes uploaded by you...
          <section class="row text-center placeholders">
            @if(count($memes))
            @foreach($memes as $m)
            <div class="col-6 col-sm-3 placeholder">
              <img src="{{ asset('image/'.Auth::user()->id.'/'.$m->meme_img) }}" width="200" height="200" class="img-fluid rounded-circle" alt="Generic placeholder thumbnail">
              <h4>{{$m->title}}</h4>
            </div>
            @endforeach
            @else
              None
            @endif
          </section>

          </div>
        </main>
      </div>
    </div>

@endsection

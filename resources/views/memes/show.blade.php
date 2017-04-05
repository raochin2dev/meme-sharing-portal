@extends('layouts.app')


@section('content')
 <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default" style="padding: 7%;">

				<h1>{{$meme->title}}</h1>
				<img src="{{ asset('image/'.Auth::user()->id.'/'.$meme->meme_img) }}" alt="" width="400px" height="400">
				<br/><br/>
				<p>
					<strong>
						Tags: {{implode(", ",$meme->tags->pluck('name')->toArray())}}
					</strong>
				</p>
				
			</div>
		</div>
	</div>
</div>

@endsection
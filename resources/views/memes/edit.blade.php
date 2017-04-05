@extends('layouts.app')


@section('content')
 <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default" style="padding: 7%;">
				<form method="POST" action="/memes/{{$meme->id}}/edit" enctype="multipart/form-data">
		            {{csrf_field()}}
		            <div class="form-group">
		              <label for="title">Title:</label>
		              <input type="text" class="form-control" id="title" name="title" aria-describedby="amountHelp" placeholder="Enter Title" value="{{$meme->title}}">
		            </div>
		            <div class="class-group" ng-controller="MainCtrl"> 
		              <label for="tags">Tags:</label>
		              <!-- <input type="text" class="form-control" id="email" name="email"> -->
		              <input id="tag1" name="tag1" value="{{implode(',',$meme->tags->pluck('name')->toArray())}}" placeholder="Enter Tags" style="width:100px;" />
		            </div>
		            <input type="hidden" name="isAddExp" value="1">
		            <input type="hidden" id="user_id" name="user_id" value="{{Auth::user()->id}}">
		            <input type="hidden" id="expense_id" name="expense_id">
		            <button type="submit" class="btn btn-primary" id="submitExpense">Submit</button>
	          </form>
			</div>
		</div>
	</div>
</div>

@endsection
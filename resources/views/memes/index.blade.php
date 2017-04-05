@extends('layouts.app')


@section('content')
        @include('layouts.sidebar')

        <main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
          <h1>Memes</h1>
          <button id="addRow" type = "button" class = "btn btn-primary" data-toggle="modal" data-target="#myModal" style="float: right; margin-bottom: 1%;">Add Row</button>
          <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Title.</th>
                            <th>Tags.</th>
                            <th>Link</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($memes as $m)
                        <tr>
                            <td>{{$m->id}}</td>
                            <td>{{$m->title}}</td>
                            <td>{{implode(", ",$m->tags->pluck('name')->toArray())}}</td>
                            <td><a target="_blank" href="/memes/{{$m->id}}">View</a></td>
                            <td><a href="/memes/{{$m->id}}/edit">Edit</a></td>
                            <td><a class="delete" href="/memes/{{$m->id}}/del">Del</a></td>
                        </tr>
                        @endforeach                       
                    </tbody>
                </table>
                <!-- /.table-responsive -->
            </div>
		</main>

        @include('memes.modal')

@endsection
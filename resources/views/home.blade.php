@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="panel-heading">
                    <form action="/create" method="post">
                        <input type="text" name="title" placeholder="Title">
                        <input type="text" name="msg" placeholder="Content">
                        {{csrf_field()}}
                        <input type="submit" name="submit" value="Add record">
                    </form>
                </div>
                <div class="panel-heading"><h2>List of messages:</h2></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        <table class="table table-hover table-bordered">
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>Content</th>
                                <th>Created at</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($messages as $message)
                                <tr>
                                    <td>{{$message->title}}</td>
                                    <td>{{$message->content }}</td>
                                    <td>{{$message->created_at->format('d/m/y H:i')}}</td>
                                <!--  <td>{{$message->created_at->diffForHumans()}}</td> -->
                                    <td>Edit</td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

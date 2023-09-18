@extends('layouts.layout')

@section('title', 'Task List')

@section('content')
  <table class="table table-striped table-bordered task__table container" style="margin-top:60px;">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Title</th>
          <th scope="col">Description</th>
          <th scope="col">Action</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($tasks as $task)
          <tr>
            <td scope="col">{{$loop->iteration}}</td>
            <td scope="col">{{$task->title}}</td>
            <td scope="col">{{$task->description}}</td>
            <td scope="col"><a class="btn btn-primary">Edit</a></td>
            <td scope="col"><a class="btn btn-primary">Show</a></td>
          </tr>
        @endforeach
      </tbody>
    </table>
@endsection
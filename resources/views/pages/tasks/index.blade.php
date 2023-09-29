@extends('layouts.layout')

@section('title', 'Task List')

@section('content')
<section class="container" style="margin-top:80px;">
  @if (session('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
         {{session('success')}}
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
  @endif
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1>Task Table</h1>
            </div>
        </div>
        <div class="row align-items-center" style="margin-top:15px; margin-bottom:15px">
            <div class="col-lg-10">
                <h4 class="m-0" style="margin-top:20px;"> Status Draft</h4>
            </div>
            <div class="col-lg-2">
                <a href="{{ route('tasks.create') }}" class="btn btn-primary" style="width:100%" type="button">Create</a>
            </div>
        </div>
        <table class="table table-striped table-bordered task__table container">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col" colspan="2" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($taskDraft as $task)
                    <tr>
                        <td scope="col">{{ $loop->iteration }}</td>
                        <td scope="col">{{ $task->title }}</td>
                        <td scope="col">{{ $task->description }}</td>
                        <td scope="col"><a href="{{ route('tasks.edit', $task->id) }}"class="btn btn-primary">Edit</a>
                        </td>
                        <td scope="col">
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST"
                                id="destroy-{{ $task->id }}">
                                @csrf
                                @method('DELETE')
                                <a href="#" onclick="document.getElementById('destroy-{{ $task->id }}').submit()"
                                    class="btn btn-primary">Delete</a>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {!! $taskDraft->links() !!}


        <h4 style="margin-top:20px; "> Status Published</h4>
        <table class="table table-striped table-bordered task__table container">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col" colspan="2" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($taskPublished as $task)
                    <tr>
                        <td scope="col">{{ $loop->iteration }}</td>
                        <td scope="col">{{ $task->title }}</td>
                        <td scope="col">{{ $task->description }}</td>

                        <td scope="col"><a href="{{ route('tasks.edit', $task->id) }}"class="btn btn-primary">Edit</a>
                        </td>
                        <td scope="col">
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST"
                                id="destroy-{{ $task->id }}">
                                @csrf
                                @method('DELETE')
                                <a href="#" onclick="document.getElementById('destroy-{{ $task->id }}').submit()"
                                    class="btn btn-primary">Delete</a>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {!! $taskPublished->links() !!}

        <h4 style="margin-top:20px; "> Status Validate</h4>
        <table class="table table-striped table-bordered task__table container">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col" colspan="2" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($taskValidate as $task)
                    <tr>
                        <td scope="col">{{ $loop->iteration }}</td>
                        <td scope="col">{{ $task->title }}</td>
                        <td scope="col">{{ $task->description }}</td>

                        <td scope="col"><a href="{{ route('tasks.edit', $task->id) }}"class="btn btn-primary">Edit</a>
                        </td>
                        <td scope="col">
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST"
                                id="destroy-{{ $task->id }}">
                                @csrf
                                @method('DELETE')
                                <a href="#" onclick="document.getElementById('destroy-{{ $task->id }}').submit()"
                                    class="btn btn-primary">Delete</a>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {!! $taskValidate->links() !!}

        <h4 style="margin-top:20px;">Status Done</h4>
        <table class="table table-striped table-bordered task__table container">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col" colspan="2" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($taskDone as $task)
                    <tr>
                        <td scope="col">{{ $loop->iteration }}</td>
                        <td scope="col">{{ $task->title }}</td>
                        <td scope="col">{{ $task->description }}</td>

                        <td scope="col"><a href="{{ route('tasks.edit', $task->id) }}"class="btn btn-primary">Edit</a>
                        </td>
                        <td scope="col">
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST"
                                id="destroy-{{ $task->id }}">
                                @csrf
                                @method('DELETE')
                                <a href="#" onclick="document.getElementById('destroy-{{ $task->id }}').submit()"
                                    class="btn btn-primary">Delete</a>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {!! $taskDone->links() !!}

    </section>
@endsection

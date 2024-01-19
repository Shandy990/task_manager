@extends('layouts.layout')

@section('title', 'Task List')

@section('content')
    <main class="main-content">
        <div class="content__container">
            <section class="container">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h1>Task Table</h1>
                    </div>
                    @can('is_admin')
                        <div class="col-lg-2">
                            <a href="{{ route('tasks.create') }}" class="btn btn-primary btn-create" style="width:100%"
                                type="button">Create</a>
                        </div>
                        <div class="col-lg-10">
                            <form class="d-inline float-end">
                                <input type="text" name="search" id="search" value="{{ request()->search }}" class="p-1 rounded input__custom"/>
                                <input type="submit" value="Search" class="btn btn-create">
                            </form>
                        </div>
                    @endcan
                </div>

                @can('is_admin')
                    <div class="row justify-content-between">
                        {{-- <div class="col-lg-3">
                            <a href="{{ route('tasks.create') }}" class="btn btn-primary" style="width:100%"
                                type="button">Create</a>
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Select Task Status</option>
                                <option value="draft">Draft</option>
                                <option value="published">Published</option>
                                <option value="validate">Validate</option>
                                <option value="done">Done</option>
                            </select>
                        </div> --}}
                    </div>
                    <div class="row align-items-center" style="margin-top:15px; margin-bottom:15px">
                        <div class="col-lg-10">
                            <h4 class="m-0" style="margin-top:20px;"> Status Draft</h4>
                        </div>
                    </div>
                    <table class="table table-striped table-bordered task__table container">
                        <thead>
                            <tr>
                                <th scope="col" class="table__no">No</th>
                                <th scope="col" class="table__title">Title</th>
                                <th scope="col" class="table__desc">Description</th>
                                <th scope="col" class="table__date">Created At</th>
                                <th scope="col" colspan="2" class="text-center table__action">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($taskDraft as $task)
                                <tr>
                                    <td scope="col">{{ $loop->iteration }}</td>
                                    <td scope="col">{{ $task->title }}</td>
                                    <td scope="col">{{ $task->description }}</td>
                                    <td scope="col">{{ $task->created_at }}</td>
                                    <td scope="col"><a
                                            href="{{ route('tasks.edit', $task->id) }}"class="btn btn-primary btn-edit">Edit</a>
                                    </td>
                                    @can('is_admin')
                                        <td scope="col">
                                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST"
                                                id="destroy-{{ $task->id }}">
                                                @csrf
                                                @method('DELETE')
                                                <a onclick="document.getElementById('destroy-{{ $task->id }}').submit()"
                                                    class="btn btn-primary btn-delete">Delete</a>
                                            </form>
                                        </td>
                                    @endcan
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!! $taskDraft->links() !!}
                @endcan


                <h4 style="margin-top:20px; "> Status Published</h4>
                <table class="table table-striped table-bordered task__table container">
                    <thead>
                        <tr>
                            <th scope="col" class="table__no">No</th>
                            <th scope="col" class="table__title">Title</th>
                            <th scope="col" class="table__desc">Description</th>
                            <th scope="col" class="table__date">Created At</th>
                            <th scope="col" colspan="2" class="text-center table__action">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($taskPublished as $task)
                            <tr>
                                <td scope="col">{{ $loop->iteration }}</td>
                                <td scope="col">{{ $task->title }}</td>
                                <td scope="col">{{ $task->description }}</td>
                                <td scope="col">{{ $task->created_at }}</td>

                                <td scope="col"><a
                                        href="{{ route('tasks.edit', $task->id) }}"class="btn btn-primary btn-edit">Edit</a>
                                </td>
                                @can('is_admin')
                                    <td scope="col">
                                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST"
                                            id="destroy-{{ $task->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <a onclick="document.getElementById('destroy-{{ $task->id }}').submit()"
                                                class="btn btn-primary btn-delete">Delete</a>
                                        </form>
                                    </td>
                                @endcan
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $taskPublished->links() !!}

                <h4 style="margin-top:20px; "> Status Validate</h4>
                <table class="table table-striped table-bordered task__table container">
                    <thead>
                        <tr>
                            <th scope="col" class="table__no">No</th>
                            <th scope="col" class="table__title">Title</th>
                            <th scope="col" class="table__desc">Description</th>
                            <th scope="col" class="table__date">Created At</th>
                            <th scope="col" colspan="2" class="text-center table__action">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($taskValidate as $task)
                            <tr>
                                <td scope="col">{{ $loop->iteration }}</td>
                                <td scope="col">{{ $task->title }}</td>
                                <td scope="col">{{ $task->description }}</td>
                                <td scope="col">{{ $task->created_at }}</td>
                                <td scope="col"><a
                                        href="{{ route('tasks.edit', $task->id) }}"class="btn btn-primary btn-edit">Edit</a>
                                </td>
                                @can('is_admin')
                                    <td scope="col">
                                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST"
                                            id="destroy-{{ $task->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <a onclick="document.getElementById('destroy-{{ $task->id }}').submit()"
                                                class="btn btn-primary btn-delete">Delete</a>
                                        </form>
                                    </td>
                                @endcan
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $taskValidate->links() !!}

                @can('is_admin')
                    <h4 style="margin-top:20px;">Status Done</h4>
                    <table class="table table-striped table-bordered task__table container">
                        <thead>
                            <tr>
                                <th scope="col" class="table__no">No</th>
                                <th scope="col" class="table__title">Title</th>
                                <th scope="col" class="table__desc">Description</th>
                                <th scope="col" class="table__date">Created At</th>
                                <th scope="col" colspan="2" class="text-center table__action">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($taskDone as $task)
                                <tr>
                                    <td scope="col">{{ $loop->iteration }}</td>
                                    <td scope="col">{{ $task->title }}</td>
                                    <td scope="col">{{ $task->description }}</td>
                                    <td scope="col">{{ $task->created_at }}</td>
                                    <td scope="col"><a
                                            href="{{ route('tasks.edit', $task->id) }}"class="btn btn-primary btn-edit">Edit</a>
                                    </td>
                                    @can('is_admin')
                                        <td scope="col">
                                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST"
                                                id="destroy-{{ $task->id }}">
                                                @csrf
                                                @method('DELETE')
                                                <a onclick="document.getElementById('destroy-{{ $task->id }}').submit()"
                                                    class="btn btn-primary btn-delete">Delete</a>
                                            </form>
                                        </td>
                                    @endcan
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!! $taskDone->links() !!}
                @endcan
            </section>
        </div>
    </main>
@endsection

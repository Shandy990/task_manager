@extends('layouts.layout')

@section('title', 'Edit Task')

@section('content')
@dd($task)
    <main class="main-content">
        <div class="content__container">
            <section class="container">
                <form method="POST" action="{{ route('tasks.update', $task->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-12 text-center">
                            <h1>Edit New Task</h1>
                        </div>
                        <div class="col-lg-6">
                            <label for="inputUser" class="form-label">User</label>
                            @can('is_admin')
                                <select id="inputUser" name="user_id" class="form-select input__custom"
                                    aria-label="Default select example">
                                    <option value="" selected>Choose User</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}" @if ((old('user_id') ?? $task->user_id) == $user->id) selected @endif>
                                            {{ $user->name }}</option>
                                    @endforeach
                                </select>
                            @else
                                <input type="text" value="{{ $users->where('id', $task->user_id)->first()->name }}"
                                    name="user_id" id="user_id" class="form-control input__custom" disabled>
                            @endcan
                            @if ($errors->first('user_id'))
                                <span class="text-danger">{{ $errors->first('user_id') }} !</span>
                            @endif
                        </div>
                        <div class="col-lg-6">
                            <label for="inputStatus" class="form-label">Status</label>
                            @can('is_admin')
                                <select id="inputStatus" name="status_id" class="form-select input__custom"
                                    aria-label="Default select example">
                                    <option value="" selected>Choose Status</option>
                                    @foreach ($statuses as $status)
                                        <option value="{{ $status->id }}" @if ((old('status_id') ?? $task->status_id) == $status->id) selected @endif>
                                            {{ $status->title }}</option>
                                    @endforeach
                                </select>
                            @else
                                <input type="text" value="{{ $statuses->where('id', $task->status_id)->first()->title }}"
                                    name="status_id" id="status_id" class="form-control input__custom" disabled>
                            @endcan
                            @if ($errors->first('status_id'))
                                <span class="text-danger">{{ $errors->first('status_id') }} !</span>
                            @endif
                        </div>
                        <div class="col-lg-12">
                            <label for="title" class="form-label" style="margin-top:20px;">Title</label>
                            <input type="text" id="title" name="title" class="form-control input__custom"
                                placeholder="Type Title Here" value="{{ $task->title }}"
                                @cannot('is_admin') disabled @endcannot>
                        </div>
                        <div class="col-lg-12" style="margin-top:20px;">
                            <label for="note" class="form-label">Note</label>
                            <textarea class="form-control input__custom" name="note" placeholder="Leave a comment here" id="note"
                                style="height:100px;">{{ $task->note }}</textarea>
                        </div>
                        <div class="col-lg-12" style="margin-top:20px;">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control input__custom" name="description" placeholder="Leave a comment here" id="description"
                                style="height:100px;" @cannot('is_admin') disabled @endcannot>{{ $task->description }}</textarea>
                        </div>
                        @if ($task->image)
                            <div class="col-12" style="margin-top: 20px">
                                <img src="{{ $task->image->getUrl() }}">
                            </div>
                        @endif
                        <div class="col-lg-12" style="margin-top:20px;">
                            <label for="description" class="form-label">Image</label>
                            <input type="file" name="image" class="form-control input__custom">
                            @if ($errors->first('image'))
                                <span class="text-danger">{{ $errors->first('image') }} !</span>
                            @endif
                        </div>
                        <div class="col-lg-1" style="margin-top:20px;">
                            <button class="btn btn-primary custom__btn-submit" type="submit" name="submit"
                                id="submit">Submit</button>
                        </div>
                        <div class="col-lg-1" style="margin-top:20px;">
                            <a class="btn btn-secondary custom__btn-cancel" type="button" name="cancel" id="cancel"
                                href="/tasks">Cancel</a>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </main>
@endsection

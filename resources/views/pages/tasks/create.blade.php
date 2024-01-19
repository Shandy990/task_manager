@extends('layouts.layout')

@section('title', 'Create Task')

@section('content')
    <main class="main-content">
        <div class="content__container">
            <section class="container">
                <form method="POST" action="{{ route('tasks.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12 text-center">
                            <h1>Create New Task</h1>
                        </div>
                        <div class="col-lg-6">
                            <label for="inputUser" class="form-label">User</label>
                            <select id="inputUser" name="user_id" class="form-select" aria-label="Default select example">
                                <option value="" selected>Choose User</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}" @if (old('user_id') == $user->id)  @endif>
                                        {{ $user->name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->first('user_id'))
                                <span class="text-danger">{{ $errors->first('user_id') }} !</span>
                            @endif
                        </div>
                        <div class="col-lg-6">
                            <label for="inputStatus" class="form-label">Status</label>
                            <select id="inputStatus" name="status_id" class="form-select"
                                aria-label="Default select example">
                                <option value="" selected>Choose Status</option>
                                @foreach ($statuses as $status)
                                    <option value="{{ $status->id }}" @if (old('status_id') == $status->id)  @endif>
                                        {{ $status->title }}</option>
                                @endforeach
                            </select>
                            @if ($errors->first('status_id'))
                                <span class="text-danger">{{ $errors->first('status_id') }} !</span>
                            @endif
                        </div>
                        <div class="col-lg-12">
                            <label for="title" class="form-label" style="margin-top:20px;">Title</label>
                            <input type="text" id="title" name="title" class="form-control"
                                placeholder="Type Title Here" value="{{ old('title') }}">
                            @if ($errors->first('title'))
                                <span class="text-danger">{{ $errors->first('title') }} !</span>
                            @endif
                        </div>
                        <div class="col-lg-12" style="margin-top:20px;">
                            <div class="form-floating">
                                <textarea class="form-control" name="note" placeholder="Leave a comment here" id="note" style="height:100px;">{!! old('note') !!}</textarea>
                                <label for="note" class="form-label">Note</label>
                                @if ($errors->first('note'))
                                    <span class="text-danger">{{ $errors->first('note') }} !</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-12" style="margin-top:20px;">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control input__custom" name="description" placeholder="Leave a comment here" id="description"
                            style="height:100px;" @cannot('is_admin') disabled @endcannot>{!! old('description') !!}</textarea>
                            @if ($errors->first('description'))
                                <span class="text-danger">{{ $errors->first('description') }} !</span>
                            @endif
                        </div>
                        <div class="col-lg-12" style="margin-top:20px;">
                            <label for="description" class="form-label">Image</label>
                            <input type="file" name="image" class="form-control input__custom"> 
                            @if ($errors->first('image'))
                                <span class="text-danger">{{ $errors->first('image') }} !</span>
                            @endif
                        </div>
                        {{-- <div class="col-lg-12" style="margin-top:20px;">
                            <div class="form-floating">
                                <textarea class="form-control" name="description" placeholder="Leave a comment here" id="description"
                                    style="height:100px;">{!! old('description') !!}</textarea>
                                <label for="description" class="form-label">Description</label>
                                @if ($errors->first('description'))
                                    <span class="text-danger">{{ $errors->first('description') }} !</span>
                                @endif
                            </div>
                        </div> --}}
                        <div class="col-lg-1" style="margin-top:20px;">
                            <button class="btn btn-primary" type="submit" name="submit" id="submit">Submit</button>
                        </div>
                        <div class="col-lg-1" style="margin-top:20px;">
                            <a class="btn btn-secondary" type="button" name="cancel" id="cancel"
                                href="/tasks">Cancel</a>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </main>
@endsection

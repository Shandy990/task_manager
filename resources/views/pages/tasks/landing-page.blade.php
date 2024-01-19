@extends('layouts.layout')

@section('title', 'Task Manager')

@section('content')
<main class="main-content">
    <div class="content__container">
        <section class="container">
            <h1 class="landing__title text-center">Task Manager</h1>
            <div class="landing__content row">
                <div class=" col-lg-6 landing__img-container">
                    <img class="landing__img" src="{{ asset('assets/img/tasks.png') }}">
                </div>
                <div class=" col-lg-6 landing__text-container row">
                    <h2 class="landing__text-content-title">Want to organize anything you need to do?</h2>
                    <p class="landing__text-content-body">You can use our Task Manager, a task management website to help you manage your tasks that you need to do.</p>
                    <p class="landing__text-content-footer">Please do Resgister or Login first to access our Task Manager</p>
                    <div class="col-3"><a href="/login" class="btn btn-landing">LOGIN</a></div>
                    <div class="col-3"><a href="/register" class="btn btn-landing">REGISTER</a></div>
                </div>
            </div>
        </section>
    </div>
</main>
@endsection

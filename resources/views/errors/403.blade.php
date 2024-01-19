@extends('errors::minimal')

@section('title', __('Forbidden'))
@section('code', '403')
@section('message', __($exception->getMessage() ?: 'Forbidden'))

{{-- @section('message')
    <div class="col-12 text-center">
        <p>403</p>
        <h1>Forbidden</h1>
    </div>
@endsection --}}
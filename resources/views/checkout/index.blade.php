@extends('layouts.master')

@section('page-title', '結帳')

@section('page-style')

@endsection

@section('page-script')
@endsection

@section('page-content')
    <div class="container">
        <div class="py-5 text-center">
            <img class="d-block mx-auto mb-4" src="{{ asset('svg/bootstrap-solid.svg') }}" alt="" width="72" height="72">
            <h2>已確認收到您的訂單</h2>
            <p class="lead">訂單金額總計：${{ $totalAmount }}</p>
        </div>

        <footer class="my-5 pt-5 text-muted text-center text-small">
            <p class="mb-1">&copy; {{ now()->year }} Laravel 道場</p>
        </footer>
    </div>
@endsection

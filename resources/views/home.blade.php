@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- You are logged in! -->

                    <div class="links">
                        <a href="/home2/1">Mumbai</a>
                        <a href="/home2/2">Delhi</a>
                        <a href="/home2/3">Chennai</a>
                        <a href="/home2/4">Kolkata</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

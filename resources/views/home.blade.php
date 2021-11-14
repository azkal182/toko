@extends('layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header">
            {{ __('Dashboard') }}
        </div>
        <div class="card-body">
            @if(Auth::guard('admin')->check())
                Hello {{Auth::guard()->user()->name}}
            @elseif(Auth::guard('web')->check())
                Hello {{Auth::guard()->user()->name}}
            @endif
        </div>
    </div>
@endsection

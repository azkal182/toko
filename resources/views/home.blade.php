@extends('layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header">
            {{ __('Dashboard') }}
        </div>
        <div class="card-body">
{{--        <div class="row">--}}
{{--            <div class="col-sm-6 col-lg-6">--}}
{{--                <div>{{ Auth::user()->name }}</div>--}}
{{--                <div>{{ Auth::user()->name }}</div>--}}

{{--            </div>--}}
{{--        </div>--}}
            <div class="row mb-3">
                <div class="col-5">
                    <div class="row">
                        <div class="col-4">
                            Name
                        </div>
                        <div class="col-6">
                            : {{ Auth::user()->name }}
                        </div>
                        <div class="col-4">
                            Address
                        </div>
                        <div class="col-6">
                            : {{ Auth::user()->address }}
                        </div>
                        <div class="col-4">
                            Phone
                        </div>
                        <div class="col-6">
                            : {{ Auth::user()->phone }}
                        </div>

                    </div>
                </div>
                <div class="col-5">
                    <h2>Rp. 1.500.000</h2>
                </div>
                <div class="col-2">
                    <button class="btn btn-primary">Print</button>
                </div>
            </div>
{{--            @if(Auth::guard('admin')->check())--}}
{{--                Hello {{Auth::guard()->user()->name}}--}}
{{--            @elseif(Auth::guard('web')->check())--}}
{{--                Hello {{Auth::guard()->user()->name}}--}}
{{--            @endif--}}
            <hr>
            <div>
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Handle</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td colspan="2">Larry the Bird</td>
                        <td>@twitter</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

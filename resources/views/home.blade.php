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
                    <h2>@currency($balance)</h2>
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
                        <th scope="col">Tanggal</th>
                        <th scope="col">Description</th>
                        <th scope="col">QTY</th>
                        <th class="text-end" scope="col">Harga</th>
                        <th class="text-end" scope="col">debit</th>
                        <th class="text-end" scope="col">credit</th>
                        <th class="text-end" scope="col">balance</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($credits as $key => $credit)
                            <tr style="{{ $credit->balance < 0 ? 'background-color: #fadddd' : '' }}">
                                <td>{{ $credits->firstItem()  + $key}}</td>
                                <td>{{ $credit->created_at }}</td>
                                <td>{{ $credit->description }}</td>
                                <td>@if($credit->qty > 0)
                                        @uang($credit->qty)
                                    @else
                                        -
                                    @endif</td>
                                <td class="text-end">
                                    @if($credit->price > 0)
                                        @uang($credit->price)
                                    @else
                                        -
                                    @endif
                                </td>
                                <td class="text-end">
                                    @if($credit->debt > 0)
                                        @uang($credit->debt)
                                    @else
                                        -
                                    @endif
                                </td>
                                <td class="text-end">
                                    @if($credit->credit > 0)
                                        @uang($credit->credit)
                                    @else
                                        -
                                    @endif
                                </td>
                                <td class="text-end">@currency($credit->balance)</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card-footer">
            {{ $credits->links() }}
        </div>
    </div>
@endsection

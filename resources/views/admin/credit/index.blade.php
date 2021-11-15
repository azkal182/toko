@extends('layouts.app')

@section('content')
    @if(session()->has('message'))
        <div class="alert alert-success" role="alert">
            {{ session()->get('message') }}
        </div>
    @endif

    <h3 class="text-center">Daftar Piutang</h3>
    <h3 class="text-center">Reza Putra</h3>

    <div class="card mb-4">
{{--        <div class="card-header">--}}
{{--            {{ __('Credits') }}--}}
{{--        </div>--}}

        <div class="card-body">
        <div>
                <form action="{{ route('admin.credit.import') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <input type="file" id="myFile" name="credit">
                    <input type="submit">
                </form>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">address</th>
                    <th scope="col">phone</th>
                    <th scope="col">balance</th>
                    <th scope="col">action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($customers as $key => $customer)
                    <tr>
                        <td>{{ $customers->firstItem()  + $key}}</td>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->address }}</td>
                        <td>{{ $customer->phone }}</td>
                        <td>{{ $customer->balance }}</td>
                        <td>
                            <button class="btn btn-sm btn-primary" type="button" >
{{--                                <svg class="icon me-2">--}}
{{--                                    <use xlink:href="{{ asset('icons/coreui.svg#cil-pencil') }}"></use>--}}
{{--                                </svg>--}}
                                view
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>

        <div class="card-footer">
            {{ $customers->links() }}
        </div>
    </div>
@endsection

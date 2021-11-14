@extends('layouts.app')

@section('content')
    @if(session()->has('message'))
            <div class="alert alert-success" role="alert">
                {{ session()->get('message') }}
            </div>
    @endif
    <div class="card mb-4">
        <div class="card-header">
            {{ __('Users') }}
        </div>

        <div class="card-body">
            <div>
                <form action="{{ route('admin.customer.import') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <input type="file" id="myFile" name="file">
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
                    <th scope="col">username</th>
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
                        <td>{{ $customer->username }}</td>
                        <td>
                            <button class="btn btn-sm btn-warning" type="button" data-coreui-toggle="tooltip"
                                    data-coreui-placement="top" data-coreui-original-title="Reset Password">
                                <svg class="icon">
                                    <use xlink:href="{{ asset('icons/coreui.svg#cil-https') }}"></use>
                                </svg>
                            </button>
                            <button class="btn btn-sm btn-primary" type="button" data-coreui-toggle="tooltip"
                                    data-coreui-placement="top" data-coreui-original-title="Edit Customer">
                                <svg class="icon">
                                    <use xlink:href="{{ asset('icons/coreui.svg#cil-pencil') }}"></use>
                                </svg>
                            </button>
                            <button class="btn btn-sm btn-danger" type="button" data-coreui-toggle="tooltip"
                                    data-coreui-placement="top" data-coreui-original-title="Delete Customer">
                                <svg class="icon">
                                    <use xlink:href="{{ asset('icons/coreui.svg#cil-trash') }}"></use>
                                </svg>
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

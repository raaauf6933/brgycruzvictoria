@extends('layouts.admin.app')

@section('title', 'Admin | Requests')

@section('content')

    {{-- CONTAINER --}}
    <div class="container-fluid py-4">
        @include('layouts.includes.alert')
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <a class="float-right btn btn-sm btn-success me-3"
                            href="{{ route('admin.requests.create') }}">Create
                            Request +</a><br><br>
                        <div class="table-responsive">
                            <table class="table table-flush table-hover request_dt">
                                <caption>List of Request</caption>
                                <thead class="thead-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Resident</th>
                                        <th>Service</th>
                                        <th>Purpose</th>
                                        <th>Status</th>
                                        <th>Remark</th>
                                        <th>Requested At</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- Display requests --}}
                                </tbody>
                            </table>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- End CONTAINER --}}

@endsection

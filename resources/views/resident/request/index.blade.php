@extends('layouts.resident.app')

@section('title', 'E-Barangay System | Issuance')

@section('content')

    {{-- CONTAINER --}}
    <div class="container-fluid py-4">
        @include('layouts.includes.alert')
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <a class="float-right btn btn-sm btn-success me-3" href="javascript:void(0)"
                            onclick="toggle_modal('#m_request', '.request_form', ['#m_request_title','Add Request'], ['.btn_add_request','.btn_update_request'], {rname:'resident.requests.create', target:['#d_services'], column:['name']})">Create
                            Request +</a><br><br>
                        <div class="table-responsive">
                            <table class="table table-flush table-hover request_dt">
                                <caption>List of Issuance</caption>
                                <thead class="thead-light">
                                    <tr>
                                        <th>#</th>
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

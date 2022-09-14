@extends('layouts.admin.app')

@section('title', 'Admin | Manage Officials')

@section('content')

    {{-- CONTAINER --}}
    <div class="container-fluid py-4">
        @include('layouts.includes.alert')
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <a class="float-right btn btn-sm btn-success me-3" href="javascript:void(0)"
                            onclick="toggle_modal('#m_official', '.official_form', ['#m_official_title','Add Official'], ['.btn_add_official','.btn_update_official'], {rname:'admin.officials.create', target:['#d_positions'], column:['name']})">Create
                            Official +</a><br><br>
                        <div class="table-responsive">
                            <table class="table table-flush table-hover official_dt">
                                <caption>List of Barangay Official</caption>
                                <thead class="thead-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Official</th>
                                        <th>Position</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- Display Officials --}}
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

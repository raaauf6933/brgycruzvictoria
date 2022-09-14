@extends('layouts.admin.app')

@section('title', 'Admin | Manage Blotter')

@section('content')

    {{-- CONTAINER --}}
    <div class="container-fluid py-4">
        @include('layouts.includes.alert')
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <a class="float-right btn btn-sm btn-success me-3" href="javascript:void(0)"
                            onclick="toggle_modal('#m_blotter', '.blotter_form', ['#m_blotter_title','Add Blotter'], ['.btn_add_blotter','.btn_update_blotter'])">Create
                            Report +</a><br><br>
                        <div class="table-responsive">
                            <table class="table table-flush table-hover blotter_dt">
                                <caption>List of Blotter Report</caption>
                                <thead class="thead-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Complainant</th>
                                        <th>Respondent</th>
                                        <th>In-Charge</th>
                                        <th>Status</th>
                                        <th>Reported At</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- Display Blotters --}}
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
@section('script')
    <script>
        initiateFilePond('.blotters')
        $('#blotters_nav').addClass('active')
    </script>
@endsection

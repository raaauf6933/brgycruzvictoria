@extends('layouts.admin.app')

@section('title', 'Admin | Manage Position')

@section('content')

    {{-- CONTAINER --}}
    <div class="container-fluid py-4">
        @include('layouts.includes.alert')
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <a class="float-right btn btn-sm btn-success me-3" href="javascript:void(0)"
                            onclick="toggle_modal('#m_position', '.position_form', ['#m_position_title','Add Position'], ['.btn_add_position','.btn_update_position'], {rname:'admin.positions.create', target:['#d_positions'], column:['name']})">Create
                            Position +</a><br><br>
                        <div class="table-responsive">
                            <table class="table table-flush table-hover position_dt">
                                <caption>List of Position</caption>
                                <thead class="thead-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Position</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- Display positions --}}
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

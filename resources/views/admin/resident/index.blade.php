@extends('layouts.admin.app')

@section('title', 'Admin | Manage Resident')

@section('content')

    {{-- CONTAINER --}}
    <div class="container-fluid py-4">
        @include('layouts.includes.alert')
        <div class="row justify-content-center">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-body">
                        <a class="float-right btn btn-sm btn-success me-3" href="javascript:void(0)"
                            onclick="toggle_modal('#m_resident', '.resident_form', ['#m_resident_title','Add resident'], ['.btn_add_resident','.btn_update_resident'], {rname:'admin.residents.create', target:['#d_puroks'], column:['name']})">Create
                            Resident +</a><br><br>
                        <form>
                            <div class="form-group">
                                <select class="form-control form-control-sm" onchange="filterResident(this)">
                                    <option value="" disabled selected>--- Filter ---
                                    </option>
                                    <option value="0">Voter</option>
                                    <option value="1">Non-Voter</option>
                                </select>
                            </div>
                        </form>
                        <div class="table-responsive">
                            <table class="table table-flush table-hover resident_dt">
                                <caption>List of Resident</caption>
                                <thead class="thead-light">
                                    <tr>
                                        <th>Name</th>
                                        <th>Age</th>
                                        <th>Gender</th>
                                        <th>Purok</th>
                                        <th>Is Voter</th>
                                        <th>Registered At</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- Display residents --}}
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

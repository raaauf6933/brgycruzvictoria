@extends('layouts.admin.app')

@section('title', 'Admin | Create Request')

@section('content')

    {{-- CONTAINER --}}
    <div class="container-fluid py-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <a class="text-success" href="{{ route('admin.requests.index') }}"><i
                                class="fas fa-arrow-left fa-lg"></i>
                        </a>

                        <div class="row">
                            <div class="col-md-4">
                                <img src="{{ asset('img/crud/manage.svg') }}" alt="">
                            </div>
                            <div class="col-md-8">
                                <h1>Create Request <i class="fas fa-plus-circle ml-1"></i></h1> <br>
                                @include('layouts.includes.alert')

                                <form action="{{ route('admin.requests.store') }}" method="post">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <label class="form-label">Select Resident *</label>
                                        <select class="form-control" name="user_id">
                                            <option value=""></option>
                                            @foreach ($residents as $resident)
                                                <option value="{{ $resident->user->id }}">
                                                    {{ $resident->full_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="form-label">Select Service *</label>
                                        <select class="form-control" name="service_id">
                                            <option value=""></option>
                                            @foreach ($services as $id => $service)
                                                <option value="{{ $id }}">
                                                    {{ $service }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="form-label">Purpose *</label>
                                        <textarea class="form-control" name="purpose" rows="5" placeholder="Add Purpose"></textarea>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="form-label">Remark </label>
                                        <textarea class="form-control" name="remark" rows="5" placeholder="Add Remark"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success d-block w-100">Submit</button>
                                    </div>
                                </form>
                            </div>
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
        $("#services_management_nav").addClass("active");
        $("#requests").addClass("font-weight-bold text-success");
    </script>
@endsection

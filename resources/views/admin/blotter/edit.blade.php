@extends('layouts.admin.app')

@section('title', 'Admin | Edit Blotter')

@section('content')

    {{-- CONTAINER --}}
    <div class="container-fluid py-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <a class="text-success" href="{{ route('admin.blotters.index') }}"><i
                                class="fas fa-arrow-left fa-lg"></i>
                        </a>

                        <div class="row">
                            <div class="col-md-4">
                                <img src="{{ asset('img/crud/manage.svg') }}" alt="">
                            </div>
                            <div class="col-md-8">
                                <h1>Edit Blotter <i class="fas fa-edit ml-1"></i></h1> <br>
                                @include('layouts.includes.alert')

                                <form action="{{ route('admin.blotters.update', $blotter) }}" method="post"
                                    id="blotter_form" enctype="multipart/form-data">
                                    @csrf @method('PUT')

                                    <div class="form-group mb-3">
                                        <label class="form-label">Complainant (Complete Name) *</label>
                                        <input type="text" class="form-control" name="complainant"
                                            value="{{ $blotter->complainant }}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="form-label">Respondent (Complete Name) *</label>
                                        <input type="text" class="form-control" name="respondent"
                                            value="{{ $blotter->respondent }}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="form-label">Statement *</label>
                                        <textarea class="form-control" name="statement" rows="5" placeholder="Add Statement">{{ $blotter->statement }}</textarea>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="form-label">In-Charge (Complete Name) *</label>
                                        <input type="text" class="form-control" name="incharge"
                                            value="{{ $blotter->incharge }}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="form-label">Manage Status *</label>
                                        <select class="form-control" name="is_solved">
                                            <option value=""></option>
                                            <option value="0" @if ($blotter->is_solved == '0') selected @endif>Mark as
                                                On Going</option>
                                            <option value="1" @if ($blotter->is_solved == '1') selected @endif>Mark as
                                                Solved</option>
                                        </select>
                                    </div>
                                    <div>
                                        <input class="blotters" type="file" name="image[]" data-allow-reorder="true"
                                            data-max-files="5" multiple>
                                    </div>
                                    <div class="form-group">
                                        <button type="button" class="btn btn-success d-block w-100"
                                            onclick="promptUpdate(event, '#blotter_form')">Save</button>
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
        initiateFilePond('.blotters',
            ["image/png", "image/jpeg", "image/jpg", "image/webp"],
            'Note: Uploading of New Files will overwrite the existing one. <br>Drag & Drop your files or <span class="filepond--label-action"> Browse </span>'
        )
        $('#blotters_nav').addClass('active')
    </script>
@endsection

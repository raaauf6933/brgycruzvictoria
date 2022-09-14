@extends('layouts.admin.app')

@section('title', 'Admin | Manage Announcement')

@section('content')

    {{-- CONTAINER --}}
    <div class="container-fluid py-4">
        <h2 class="font-weight-normal">
            List Of Announcements
            <a class="float-right btn btn-sm btn-success me-3" href="{{ route('admin.announcements.create') }}">Create
                Announcement +
            </a>
        </h2>
        <br>
        @include('layouts.includes.alert')
        <div class="row justify-content-center">
            @forelse ($announcements as $announcement)
                <div class="col-md-12">
                    <div class="card mb-3">
                        <div class="row g-0">
                            <div class="d-none d-md-block col-md-2 border-right">
                                <img class="card-img-top" src="{{ handleNullCoverPhoto($announcement->cover_photo) }}"
                                    id="show_img" alt="cover_photo">
                            </div>
                            <div class="col-md-10">
                                <div class="card-body">
                                    <div class='dropdown float-right'>
                                        <a class='btn btn-sm btn-icon-only text-light' href='#' role='button'
                                            data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                            <i class='fas fa-ellipsis-v'></i>
                                        </a>
                                        <div class='dropdown-menu dropdown-menu-right dropdown-menu-arrow'>
                                            <a class='dropdown-item'
                                                href="{{ route('admin.announcements.show', $announcement) }}">View</a>
                                            <a class='dropdown-item'
                                                href="{{ route('admin.announcements.edit', $announcement) }}">Edit</a>
                                            <a class='dropdown-item' role='button'
                                                onclick="confirm().then(res => res.isConfirmed ? $('#announcement_form-{{ $announcement->id }}').submit() : false)">Delete</a>
                                            <form action="{{ route('admin.announcements.destroy', $announcement) }}"
                                                method="POST" id="announcement_form-{{ $announcement->id }}">@csrf
                                                @method('DELETE')</form>
                                        </div>
                                    </div>
                                    <h2 class="fw-bold">{{ $announcement->title }}</h3>
                                        <p class="me-1">
                                            Barangay Cruz |
                                            {{ formatDate($announcement->created_at) }} <i
                                                class="far fa-calendar ml-1"></i>
                                        </p>
                                        <p class="card-text"><small class="text-muted">Last updated
                                                {{ is_null($announcement->updated_at) ? $announcement->created_at->diffForHumans() : $announcement->updated_at->diffForHumans() }}</small>
                                        </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-md-12">
                    <img class="img-fluid d-block mx-auto" src="{{ asset('img/nodata.svg') }}" alt="nodata">
                    <p class="text-center">Record Not Found</p>
                </div>
            @endforelse

        </div>
    </div>
    {{-- End CONTAINER --}}

@endsection

@section('script')
    <script>
        $('#announcement_nav').addClass('active')
    </script>
@endsection

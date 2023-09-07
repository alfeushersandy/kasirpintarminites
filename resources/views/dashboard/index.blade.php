@extends('layouts.master.master', ['title' => 'Dashboard'])

@section('content')
    <x-container>
        <p>Reimburse</p>
        <div class="col-6 col-lg-3">
            <div class="card card-sm border-0" style="border-radius: 8px;">
                <div class="card-body d-flex align-items-center">
                    <span class='text-white stamp mr-3' style= 'border-radius: 8px;'>
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-category-2" width="24"
                            height="24" viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M14 4h6v6h-6z"></path>
                            <path d="M4 14h6v6h-6z"></path>
                            <circle cx="17" cy="17" r="3"></circle>
                            <circle cx="7" cy="7" r="3"></circle>
                        </svg>
                    </span>
                    <div class="mr-3 lh-sm">
                        <div class="strong">
                            Request
                        </div>
                        <div class="text-muted">{{$request}}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3">
            <div class="card card-sm border-0" style="border-radius: 8px;">
                <div class="card-body d-flex align-items-center">
                    <span class='text-white stamp mr-3' style= 'border-radius: 8px;'>
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-category-2" width="24"
                            height="24" viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M14 4h6v6h-6z"></path>
                            <path d="M4 14h6v6h-6z"></path>
                            <circle cx="17" cy="17" r="3"></circle>
                            <circle cx="7" cy="7" r="3"></circle>
                        </svg>
                    </span>
                    <div class="mr-3 lh-sm">
                        <div class="strong">
                            Pending
                        </div>
                        <div class="text-muted">{{$pending}}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3">
            <div class="card card-sm border-0" style="border-radius: 8px;">
                <div class="card-body d-flex align-items-center">
                    <span class='text-white stamp mr-3' style= 'border-radius: 8px;'>
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-category-2" width="24"
                            height="24" viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M14 4h6v6h-6z"></path>
                            <path d="M4 14h6v6h-6z"></path>
                            <circle cx="17" cy="17" r="3"></circle>
                            <circle cx="7" cy="7" r="3"></circle>
                        </svg>
                    </span>
                    <div class="mr-3 lh-sm">
                        <div class="strong">
                            Approve
                        </div>
                        <div class="text-muted">{{$approve}}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3">
            <div class="card card-sm border-0" style="border-radius: 8px;">
                <div class="card-body d-flex align-items-center">
                    <span class='text-white stamp mr-3' style= 'border-radius: 8px;'>
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-category-2" width="24"
                            height="24" viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M14 4h6v6h-6z"></path>
                            <path d="M4 14h6v6h-6z"></path>
                            <circle cx="17" cy="17" r="3"></circle>
                            <circle cx="7" cy="7" r="3"></circle>
                        </svg>
                    </span>
                    <div class="mr-3 lh-sm">
                        <div class="strong">
                            Reject
                        </div>
                        <div class="text-muted">{{$reject}}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3">
            <div class="card card-sm border-0" style="border-radius: 8px;">
                <div class="card-body d-flex align-items-center">
                    <span class='text-white stamp mr-3' style= 'border-radius: 8px;'>
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-category-2" width="24"
                            height="24" viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M14 4h6v6h-6z"></path>
                            <path d="M4 14h6v6h-6z"></path>
                            <circle cx="17" cy="17" r="3"></circle>
                            <circle cx="7" cy="7" r="3"></circle>
                        </svg>
                    </span>
                    <div class="mr-3 lh-sm">
                        <div class="strong">
                            Verified
                        </div>
                        <div class="text-muted">{{$verified}}</div>
                    </div>
                </div>
            </div>
        </div>
    </x-container>
@endsection
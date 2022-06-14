@extends('layouts.app')

@section('content')
<!-- ========== title-wrapper start ========== -->
<div class="title-wrapper pt-30">
    <div class="row align-items-center">
        <div class="col-md-6">
            <div class="title mb-30">
                <h2>{{ __('Services') }}</h2>
            </div>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
</div>
<!-- ========== title-wrapper end ========== -->

<div class="card-styles">
    <div class="card-style-3 mb-30">
        <div class="card-content">

            <a href="{{route('about.serviceCreate')}}" class="main-btn info-btn btn-hover">Make Service</a>
            <div class="table-wrapper table-responsive mt-3">
                <table class="table striped-table">
                    <thead>
                        <tr>
                            <th>
                                <h6>Image</h6>
                            </th>
                            <th>
                                <h6>Name</h6>
                            </th>
                            <th>
                                <h6>Description</h6>
                            </th>
                            <th>
                                <h6>Status</h6>
                            </th>
                            <th>
                                <h6>Action</h6>
                            </th>

                        </tr>
                        <!-- end table row-->
                    </thead>
                    <tbody>
                        @foreach($services as $service)
                        <tr>
                            <td>
                                @if($service->image)
                                <img src="{{$service->image}}" width="100" height="80" alt="">
                                @else
                                <img src="https://ui-avatars.com/api/?name={{$service->name}}" width="100"
                                    height="80" alt="">
                                @endif
                            </td>
                            <td>
                                <p>{{ $service->name }}</p>
                            </td>
                            <td>
                                <p>{{ isset($service->description)?Str::limit($service->description,20,'...'):'_' }}</p>
                            </td>
                            <td>
                                <p>{{ $service->status }}</p>
                            </td>
                            <td>
                                <a href="{{route('about.serviceEdit',$service->id)}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" fill="none" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </a>
                                |
                                <form method="POST" action="{{ route('about.serviceDelete',$service->id) }}"
                                    style="display: inline">
                                    @csrf
                                    <a href="{{ route('about.serviceDelete',$service->id) }}"
                                        onclick="event.preventDefault(); this.closest('form').submit();"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="20" fill="none" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </a>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        <!-- end table row -->
                    </tbody>
                </table>
                <!-- end table -->

                {{ $services->links() }}
            </div>

        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<!-- ========== title-wrapper start ========== -->
<div class="title-wrapper pt-30">
    <div class="row align-items-center">
        <div class="col-md-6">
            <div class="title mb-30">
                <h2>{{ __('Gallery') }}</h2>
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

            <a href="{{route('gallery.create')}}" class="main-btn info-btn btn-hover">Make image</a>
            <div class="table-wrapper table-responsive mt-3">
                <table class="table striped-table">
                    <thead>
                        <tr>
                            <th>
                                <h6>Image</h6>
                            </th>
                            <th>
                                <h6>Title</h6>
                            </th>
                            <th>
                                <h6>type</h6>
                            </th>
                            <th>
                                <h6>Link</h6>
                            </th>
                            <th>
                                <h6>Action</h6>
                            </th>

                        </tr>
                        <!-- end table row-->
                    </thead>
                    <tbody>
                        @foreach($images as $image)
                        <tr>
                            <td>
                                @if($image->type===1)
                                <video src="{{$image->image_link}}" width="100" height="80" alt=""></video>
                                @else
                                <img src="{{$image->image_link}}" width="100" height="80" alt="">
                                @endif
                            </td>
                            <td>
                                <p>{{ $image->title }}</p>
                            </td>
                            <td>
                                <p>{{ $image->type==1?"Video":"Image" }}</p>
                            </td>
                            <td>
                                <a target="_" href="{{ $image->image_link }}">{{ $image->image_link }}</a>
                            </td>
                            <td>
                                <form method="POST" action="{{ route('gallery.destroy',$image->id) }}"
                                    style="display: inline">
                                    @csrf
                                    @method("DELETE")
                                    <a href="{{ route('gallery.destroy',$image->id) }}"
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

                {{ $images->links() }}
            </div>

        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<!-- ========== title-wrapper start ========== -->
<div class="title-wrapper pt-30">
    <div class="row align-items-center">
        <div class="col-md-6">
            <div class="title mb-30">
                <h2>{{ __('Sliders') }}</h2>
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
            <a href="{{route('slider.create')}}" class="main-btn info-btn btn-hover mb-3">Make Slide</a>
            @if ($message = Session::get('success'))
            <div class="alert-box success-alert">
                <div class="alert">
                    <h4 class="alert-heading">Success</h4>
                    <p class="text-medium">
                        {{ $message }}
                    </p>
                </div>
            </div>
            @endif

            <div class="table-wrapper table-responsive">
                <table class="table striped-table">
                    <thead>
                        <tr>
                            <th>
                                <h6>title</h6>
                            </th>
                            <th>
                                <h6>link</h6>
                            </th>
                            <th>
                                <h6>image</h6>
                            </th>
                            <th>
                                <h6>description</h6>
                            </th>
                            <th>
                                <h6>animation</h6>
                            </th>
                            <th>
                                <h6>description</h6>
                            </th>
                            <th>
                                <h6>direction</h6>
                            </th>
                            <th>

                                <h6>Status</h6>
                            </th>
                            <th>
                                <h6>*</h6>
                            </th>
                        </tr>
                        <!-- end table row-->
                    </thead>
                    <tbody>
                        @foreach($sliders as $slider)
                        <tr>
                            <td>
                                <p>{{ $slider->title }}</p>
                            </td>
                            <td>
                                <p>{{ $slider->link }}</p>
                            </td>
                            <td>
                                <p><img src="{{ $slider->image }}" width="100" height="100" alt=""></p>
                            </td>
                            <td>
                                <p>{{ Str::limit($slider->description,20,'...') }}</p>
                            </td>
                            <td>
                                <p>{{ $slider->animation }}</p>
                            </td>
                            <td>
                                <p>{{ $slider->direction }}</p>
                            </td>
                            <td>
                                <p class="badge text-bg-primary">{{ $slider->status?"Active":"In Active" }}</p>
                            </td>
                            <td>
                                <a href="{{route('slider.edit',$slider->id)}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" fill="none" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </a> |
                                <a href="{{route('slider.show',$slider->id)}}">

                                    @if($slider->status)
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                                    </svg>
                                    @else
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                    @endif

                                </a> |
                                <form method="POST" action="{{ route('slider.destroy',$slider->id) }}"
                                    style="display: inline">
                                    @csrf
                                    @method("DELETE")
                                    <a href="{{ route('slider.destroy',$slider->id) }}"
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

                {{ $sliders->links() }}
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
    <!-- ========== title-wrapper start ========== -->
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title mb-30">
                    <h2>{{ __('Contact us') }}</h2>
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

                <div class="alert-box primary-alert">
                    <div class="alert">
                        <p class="text-medium">
                           Contact us Table
                        </p>
                    </div>
                </div>

                <div class="table-wrapper table-responsive">
                    <table class="table striped-table">
                        <thead>
                        <tr>
                            <th><h6>Name</h6></th>
                            <th><h6>Email</h6></th>
                            <th>
                                <h6>Phone</h6>
                            </th>
                              <th><h6>Message</h6></th>
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
                        @foreach($contacts as $contact)
                            <tr>
                                <td>
                                    <p>{{ $contact->name }}</p>
                                </td>
                                <td>
                                    <p>{{ $contact->email }}</p>
                                </td>
                                <td>
                                    <p>{{ $contact->phone }}</p>
                                </td>
                                <td>
                                    <p>{{ Str::limit($contact->message,20,'...') }}</p>
                                </td>
                                <td>
                                    <p class="badge text-bg-primary">{{ $contact->is_read?"Active":"In Active" }}</p>
                                </td>
                                <td>
                                   <a href="{{route('contact.show',$contact->id)}}"><svg xmlns="http://www.w3.org/2000/svg" width="20" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg></a> |
                                   <a href="mailto:{{$contact->email}}"><svg xmlns="http://www.w3.org/2000/svg" width="20" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg></a>
                                </td>
                            </tr>
                        @endforeach
                        <!-- end table row -->
                        </tbody>
                    </table>
                    <!-- end table -->

                    {{ $contacts->links() }}
                </div>

            </div>
        </div>
    </div>
@endsection

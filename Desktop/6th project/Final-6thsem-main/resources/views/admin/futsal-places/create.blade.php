@extends('admin.layouts.app')
@section('content')



<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->


            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->


                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="fw-bold py-3 mb-4"><span class="text-dark fw-light">Add Venue</span>    
                        </h4>

                        <!-- Basic Layout -->
                        <div class="row">
                            <div class="col-xl">
                                <div class="card mb-4">
                                    
                                    <div class="card-body">
                                        <form action="{{ route('venue.store') }}" method="POST" enctype="multipart/form-data">
                                           @csrf
                                            <div class="mb-3">
                                                <label class="form-label" for="basic-default-fullname">Venue Name</label>
                                                <input type="text" class="form-control" id="basic-default-fullname"
                                                    placeholder="John Doe" name="venuename" />
                                                    @error('venuename')
                                                        {{ $message }}
                                                    @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="basic-default-company">Location</label>
                                                <input type="text" class="form-control" id="basic-default-company"
                                                    placeholder="ACME Inc." name="location"/>
                                                    @error('location')
                                                    {{ $message }}
                                                    @enderror
                                        </div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="basic-default-email">Contact Person Name</label>
                                                <div class="input-group input-group-merge">
                                                    <input type="text" id="basic-default-email" class="form-control"
                                                        placeholder="john.doe" aria-label="john.doe"
                                                        aria-describedby="basic-default-email2" name="contact_person_name" />
                                                        @error('contact_person_name')
                                                        {{ $message }}
                                                        @enderror
                                            </div>
                                                   
                                                </div>
                                                <div class="form-text">You can use letters, numbers & periods</div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="basic-default-phone">Phone No</label>
                                                <input type="text" id="basic-default-phone"
                                                    class="form-control phone-mask" placeholder="658 799 8941" name="phone"/>
                                                    @error('phone')
                                                    {{ $message }}
                                                    @enderror
                                        </div>
                                            </div>
                                            {{-- <div class="mb-3">
                                                <label class="form-label" for="basic-default-message">Message</label>
                                                <textarea id="basic-default-message" class="form-control" placeholder="Hi, Do you have a moment to talk Joe?"></textarea>
                                            </div> --}}
                                            <button type="submit" class="btn btn-primary" name="submit">Send</button>
                                        </form>

                                        
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- / Content -->
               

    </div>  
                @endsection

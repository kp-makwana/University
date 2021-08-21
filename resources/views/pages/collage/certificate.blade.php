@extends('pages.collage.navbar')
@section('content')
    <div>
        <div class="container content-wrapper">
            <!-- SELECT2 EXAMPLE -->
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Student Enrollment Form</h3>
                </div>
                <form action="{{ route('add_student') }}" method="POST" name="add_student" id="add_student">
                @csrf
                <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Student Roll No</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="roll_no"
                                               placeholder="Student First Name *"/>
                                    </div>
                                    <label>Student Name</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="stud_name"
                                               placeholder="Student Middle Name"/>
                                    </div>
                                </div>
                                <div class="form-group">s
                                    <label>Email</label>
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control"
                                               placeholder="Student Email *"/>
                                    </div>
                                    <label>Phone</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="phone"
                                               placeholder="Student Mobile number *"/>
                                    </div>
                                    <label>Address</label>
                                    <div class="form-group">
                                            <textarea type="text" class="form-control" name="address"
                                                      placeholder="Student Address *"></textarea>
                                    </div>
                                </div>
                                <!-- /.form-group -->

                                <!-- /.form-group -->
                            </div>
                            <div class="col-md-6">
                                <!-- /.col -->
                                <div class="form-group">
                                    <label>Streaming</label>
                                    <select name="stream" class="form-control">
                                        <option class="hidden" selected disabled>Select Stream</option>
                                        @foreach(App\Models\Student::STREAMING as $key=>$value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label>Date Of Birth</label>
                                    {{--                            <div class="form-group">--}}
                                    <input type="date" name="dob" class="form-control"
                                           placeholder="Student Last Name *"/>
                                    {{--                            </div>--}}
                                </div>
                                <div class="form-group col-sm-6">
                                    <label>Gender</label>
                                    <div class="maxl">
                                        <select name="gender" class="form-control" id="gender">
                                            <option class="hidden" selected disabled>Select Gender</option>
                                            @foreach(config('constants.GENDER') as $key=>$value)
                                                <option value="{{ $key }}">{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <div class="form-group">
                            <input type="button" class="btn btn-danger align-content-end" value="cancel">
                            <input type="button" class="btn btn-default" value="reset">
                            <input type="submit" class="btn btn-success" value="submit">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
@push('styles')
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet"
          href="{{ asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endpush
@push('scripts')
    <!-- jQuery -->
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    {{--<script src="{{ asset('assets/jquery-validation/additional-methods.min.js') }}"></script>--}}
    <script src="{{ asset('assets/plugins/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>

    <script>
        $(function () {
            $('#add_student').validate({
                rules: {
                    first_name: {
                        required: true,
                    },
                    last_name: {
                        required: true,
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    phone: {
                        required: true,
                        min: 10
                    },
                    address: {
                        required: true,
                    },
                    stream: {
                        required: true,
                    },
                    dob: {
                        required: true,
                    },
                    gender: {
                        required: true,
                    }
                },
                messages: {
                    first_name: {
                        required: "Last Name Must Be Required.",
                        min: "Minimum 3 Character."
                    },
                    last_name: {
                        required: "First Name Must Be Required.",
                        min: "Minimum 3 Character."
                    },
                    email: {
                        required: "Email Must Be Required.",
                        email: "Email Not Proper Format."
                    },
                    phone: {
                        required: "Phone Number Must Be Required.",
                    },
                    address: {
                        required: "Address Must Be Required.",
                        min: "Address Must Be in 5 Character"
                    },
                    stream: {
                        required: "Please Select Stream.",
                    },
                    dob: {
                        required: "Birth Date Must Be Required",
                    },
                    gender: {
                        required: "Select The Gender",
                    }
                },
                errorElement: 'span',
                errorPlacement: function (error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>
@endpush

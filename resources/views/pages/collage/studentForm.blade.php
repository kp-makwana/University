@extends('layouts.navbar')
@section('content')
    <div class="container content-wrapper">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Student Enrollment Form</h3>

            </div>
            <form action="{{ route('add_student') }}" method="POST">
            @csrf
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Student Name</label>
                            <div class="form-group">
                                <input type="text" class="form-control" name="first_name"
                                       placeholder="Student First Name *"/>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="mid_name"
                                       placeholder="Student Middle Name *"/>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="last_name"
                                       placeholder="Student Last Name *"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" placeholder="Student Email *"/>
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
                                <option class="hidden" selected disabled>select</option>
                                @foreach(App\Models\Student::STREAMING as $key=>$value)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Date Of Birth</label>
                            <div class="form-group">
                                <input type="date" name="dob" class="form-control col-4"
                                       placeholder="Student Last Name *"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Gender</label>
                            <div class="maxl">
                                <label class="radio inline">
                                    <input type="radio" name="gender" value="1" checked>
                                    <span> Male </span>
                                </label>
                                <label class="radio inline">
                                    <input type="radio" name="gender" value="0">
                                    <span>Female </span>
                                </label>
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
    <!-- /.container-fluid -->
    </div>
@endsection

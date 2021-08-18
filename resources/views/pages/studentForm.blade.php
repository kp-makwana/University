@extends('layouts.navbar')
@section('content')
    <div class="content-wrapper" style="min-height: 569.381px;">
        <div class="row px-4 py-4">
            <div class="col-12">
                <div class="col-md-9 register-right">

                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <h3 class="register-heading">Add Student</h3>
                            <div class="row register-form">
                                <div class="col-md-12">
                                    <form action="{{ route('add_student') }}" method="POST">
                                        @csrf
                                        <Ul>
                                            Student Name
                                        </Ul>
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
                                        <ul>Date Of Birth</ul>
                                        <div class="form-group">
                                            <input type="date" name="dob" class="form-control col-4"
                                                   placeholder="Student Last Name *"/>
                                        </div>
                                        <ul>Gender</ul>
                                        <div class="form-group">
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
                                        <ul>Select Your highest</ul>
{{--                                        <div class="form-group col-md-4">--}}
{{--                                            <select name="stream" class="form-control">--}}
{{--                                                <option class="hidden" selected disabled>select</option>--}}
{{--                                            @foreach(App\Models\Student::STREAMINGS as $key=>$value)--}}
{{--                                                    <option value="{{ $key }}">{{ $value }}</option>--}}
{{--                                                @endforeach--}}
{{--                                            </select>--}}
{{--                                        </div>--}}
                                        <ul>Email</ul>
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control" placeholder="Student Email *"/>
                                        </div>
                                        <ul>Phone</ul>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="phone"
                                                   placeholder="Student Mobile number *"/>
                                        </div>
                                        <ul>Address</ul>
                                        <div class="form-group">
                                            <textarea type="text" class="form-control" name="address"
                                                      placeholder="Studente numb Mobiler *"></textarea>
                                        </div>
                                        <div class="col-md-12 row">
                                            <div class="align-content-end">
                                                <input type="button" class="btn btn-danger" value="cancel">
                                                {{--                                            <input type="button" class="btn btn-default" value="reset">--}}
                                                <input type="submit" class="btn btn-success" value="submit">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('pages.admin.navbar')
@section('content')
    <div class="container-fluid">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Student List</h3>
                        </div>
                        <div class="card-body">
                            <table id="table" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Activity Name</th>
                                    <th>Description</th>
                                    <th>Record Id</th>
                                    <th>Who is Change</th>
                                    <th>Details</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($activities as $activity)
                                    <tr>
                                        <td>{{ $activity->log_name }}</td>
                                        <td>{{ $activity->description }}</td>
                                        <td>{{ $activity->subject->id }}</td>
                                        <td>{{ $activity->causer->university->name ?? 'Admin' }}</td>
                                        <td>{{ ($activity->properties === [])?'-':$activity->properties }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

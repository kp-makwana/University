@extends('layouts.navbar')
@section('content')

<div class="container-fluid">
    <div class="content-wrapper" >
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
                                <th>Student Name</th>
                                <th>Stream</th>
                                <th>Date Of Birth</th>
                                <th>Email</th>
                                <th>Phone</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($students as $student)
                            <tr>
                                <td>{{ $student->FullName }}</td>
                                <td>BCA</td>
                                <td>{{ $student->date_of_birth }}</td>
                                <td>{{ $student->user->email }}</td>
                                <td>{{ $student->phone }}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>

{{--                        {!! $dataTable->table() !!}--}}

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{--{!! $dataTable->scripts() !!}!--}}
    <script>
        $(function () {
            $('#table').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": false,
                "autoWidth": true,
                "responsive": true,

            });
        });
    </script>
@endsection

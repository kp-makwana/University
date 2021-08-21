<div>
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
                                    <th>Student Name</th>
                                    <th>Collage Name</th>
                                    <th>Issue Date</th>
                                    <th>Stream</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($certificates as $certificate)
                                    <tr>
                                        <td>{{ $certificate->student->fullname }}</td>
                                        <td>MKBU</td>
                                        <td>{{ $certificate->issue_date }}</td>
                                        <td>{{ $certificate->stream_class   }}</td>
                                        <td>{{ \App\Models\Certificate::STATUS[$certificate->status] }}</td>
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
</div>

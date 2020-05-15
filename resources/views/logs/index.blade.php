@extends('layouts.adminlte')

@section('htmlheader_title', $contentheader_title)

@section('contentheader_title', $contentheader_title)

@section('content')
    <div class="card">
        <div class="card-header">
                    <h3 class="card-title">Staff Check-In List</h3>
                    <div class="card-tools">
                        <a href="/report" class="btn btn-sm btn-success">Export Report</a>
                    </div>

        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="staff-table" class="table table-bordered table-striped w-100">
                <thead>
                <tr>
                    <th>Date</th>
                    <th>Name</th>
                    <th>ID</th>
                    <th>Temp</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>

@endsection



@section('js')
    @parent

    <script type="text/javascript">

        $(document).ready(function(){
            var vTable = $('#staff-table').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                order: [[ 0, "asc" ]],
                iDisplayLength: 10,
                ajax: {
                    url: '{!! route('log.ajax') !!}'
                },
                columns: [
                    { data: 'created_at', name: 'created_at' },
                    { data: 'staff_name', name: 'staff_name' },
                    { data: 'staff_id', name: 'staff_id' },
                    { data: 'staff_temp', name: 'staff_temp' },
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                ]
            });
        });
    </script>
@endsection

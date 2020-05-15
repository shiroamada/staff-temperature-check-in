@extends('layouts.adminlte')

@section('htmlheader_title', $contentheader_title)

@section('contentheader_title', $contentheader_title)

@section('content')
    <!-- Default card -->
    <div class="card">
        <div class="card-header with-border">
            @include('layouts.partials.notification')
        </div>
        <div class="card-body">

            <div class="row">
                <div class="col-md-12">

                    {{ Form::open( ['route' => ['log.update', $log->id], 'method' => 'patch', 'role' => 'form', 'class' => 'form-horizontal', 'id' => 'formEdiLog'] ) }}

                    <div class="form-group">
                        <label for="staff_name" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-10">
                            {{Form::text('staff_name', $log->staff_name, ['class' => 'form-control', 'id' => 'name', 'placeholder' => 'Name'])}}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="staff_id" class="col-sm-2 control-label">Work ID</label>
                        <div class="col-sm-10">
                            {{Form::text('staff_id', $log->staff_id, ['class' => 'form-control', 'id' => 'name', 'placeholder' => 'Work ID'])}}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="staff_temp" class="col-sm-2 control-label">Body Temperature (°C)</label>
                        <div class="col-sm-10">
                            {{Form::text('staff_temp', $log->staff_temp, ['class' => 'form-control', 'id' => 'name', 'placeholder' => 'Enter Number Only for °C'])}}
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            {{ Form::submit('Update', ['type' => 'submit', 'class' => 'btn btn-primary' ] ) }}
                            <a class="btn btn-outline-danger" href="/log/delete/{{ $log->id }}">Delete</a>
                            <a class="btn btn-secondary" href="/log">Cancel</a>

                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>

        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

@endsection

@section('js')
    @parent
    <script type="text/javascript">
        $(document).ready(function(){


        });

    </script>
@endsection

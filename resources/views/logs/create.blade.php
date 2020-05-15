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

                    {{ Form::open( ['route' => ['log.store'], 'method' => 'post', 'role' => 'form', 'class' => 'form-horizontal', 'id' => 'formCreateStaff'] ) }}

                    <div class="form-group">
                        <label for="staff_temp" class="col-sm-2 control-label">Body Temperature (°C)</label>
                        <div class="col-sm-10">
                            {{Form::text('staff_temp', NULL, ['class' => 'form-control', 'id' => 'name', 'placeholder' => 'Enter Number Only for °C'])}}
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            {{ Form::submit('Save', ['type' => 'submit', 'class' => 'btn btn-primary' ] ) }}

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

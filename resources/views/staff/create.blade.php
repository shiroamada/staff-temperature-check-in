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

                    {{ Form::open( ['route' => ['staff.store'], 'method' => 'post', 'role' => 'form', 'class' => 'form-horizontal', 'id' => 'formCreateStaff'] ) }}

                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Your Full Name</label>
                        <div class="col-sm-10">
                            {{Form::text('name', NULL, ['class' => 'form-control', 'id' => 'name', 'placeholder' => 'Your Full Name'])}}
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="id" class="col-sm-2 control-label">Staff ID</label>
                        <div class="col-sm-10">
                            {{Form::text('id', NULL, ['class' => 'form-control', 'id' => 'id', 'required' => '', 'placeholder' => 'Your Working ID ('.env('STAFF_ID_FORMAT','MYXXX').')'])}}
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

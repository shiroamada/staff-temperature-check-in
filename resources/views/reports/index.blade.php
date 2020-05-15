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

                    {{ Form::open( ['route' => ['report.export'], 'method' => 'post', 'role' => 'form', 'class' => 'form-horizontal', 'id' => 'formCreateStaff'] ) }}


                    <div class="form-group">
                        <label>Date range:</label>

                        <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text">
                                <i class="far fa-calendar-alt"></i>
                              </span>
                            </div>
                            <input type="text" class="form-control float-right" name="date_filter" id="date_filter">
                        </div>
                        <!-- /.input group -->
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


    <script src="{{asset('vendor/daterangepicker/moment.min.js')}}"></script>
    <script src="{{asset('vendor/daterangepicker/daterangepicker.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/daterangepicker/daterangepicker.css')}}" />

    <script type="text/javascript">
        $(document).ready(function(){
            var start = moment().subtract(29, 'days');
            var end = moment();

            function cb(start, end) {
                $('#date_filter span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            }
            //Date range picker
            $('#date_filter').daterangepicker({
                locale: {
                    cancelLabel: 'Clear',
                    format: 'YYYY-MM-DD'
                },
                startDate: start,
                endDate: end,
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                }
            }, cb);

            cb(start, end);

            $('#date_filter').on('cancel.daterangepicker', function(ev, picker) {
                //do something, like clearing an input
                $('#date_filter').val('');
            });

        });
    </script>

@endsection

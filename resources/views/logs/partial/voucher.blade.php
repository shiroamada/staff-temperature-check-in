<div class="block-flat">
    <div class="header">
        <h3><a name="followup">VOUCHER LIST</a></h3>
    </div>

    <p>
        {{ Form::button('<i class="fa fa-file-o"></i> Generate Voucher', ['type' => 'submit', 'onclick' => 'location.href = "'.action('Admin\VoucherBatchController@create').'?q='.$customer->id.'"', 'class' => 'btn btn-info' ] ) }}
    </p>
    <div class="box">
        <div class="box-body table-responsive">

            @if(count($vouchers))
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th style="width:37.5%" scope="col">
                            Name
                        </th>
                        <th style="" scope="col">
                            Total
                        </th>
                        <th style="">
                            Used
                        </th>
                        <th style="">
                            Un-used
                        </th>
                        <th style="width:37.5%">
                            Action
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($vouchers as $voucher)
                    <tr>
                        <td style="" scope="col">
                            {{ $voucher['name'] }}
                        </td>
                        <td style="">
                            {{ $voucher['total_voucher'] }}
                        </td>
                        <td style="">
                            {{ $voucher['total_used_voucher'] }}
                        </td>
                        </td>
                        <td style="width:17.5%">
                            {{ $voucher['total_unused_voucher'] }}
                        </td>
                        <td style="width:37.5%">
                            <a class="btn btn-info btn-xs" style="margin-right:5px;" href="{{ url('voucher/?q='.$customer->user_name)  }}">View</a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                No Voucher.
            @endif
        </div>
    </div>
</div>

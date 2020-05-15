<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row justify-content-end">
                    <div class="col-10  my-auto">
                        <h3 class="card-title">Customer Overview</h3>
                    </div>
                    <div class="col-2 float-right">
                        {{ Form::button('<i class="fa fa-edit"></i> Edit', ['type' => 'submit', 'onclick' => 'location.href = "'.route('customer.edit', $customer->id).'"', 'class' => 'btn btn-primary float-right' ] ) }}
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">

                    <table class="table table-bordered">
                        <thead><tr>
                            <th style="width:12.5%" scope="col">
                                Customer Name:
                            </th>
                            <th style="width:37.5%">
                                {{ $customer->name }}
                            </th>
                            <th style="width:12.5%" scope="col">

                            </th>
                            <th style="width:37.5%">

                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td style="width:12.5%" scope="col">
                                Gender:
                            </td>
                            <td style="width:37.5%">
                                {{ ucfirst($customer->gender) }}
                            </td>
                            <td style="width:12.5%" scope="col">
                                Date of Birth:
                            </td>
                            <td style="width:37.5%" class="phone">
                                {{ $customer->dob }}
                            </td>
                        </tr>

                        <tr>
                            <td style="width:12.5%" scope="col">
                                Mobile No.:
                            </td>
                            <td style="width:37.5%" class="phone">
                                {{ !empty($customer->mobile) ? $customer->mobile : 'N/A' }}
                            </td>
                            <td style="width:12.5%" scope="col">

                            </td>
                            <td style="width:37.5%">

                            </td>
                        </tr>


                        <tr>
                            <td style="width:12.5%" scope="col">
                                Email Address:
                            </td>
                            <td style="width:37.5%">
                                {{ !empty($customer->email) ? Html::mailto($customer->email) : 'N/A' }}
                            </td>
                            <td style="width:12.5%" scope="col">
                                Last Update:
                            </td>
                            <td style="width:37.5%">
                                {{ $customer->updated_at }} by {{ optional($customer->lastupdateuser)->name }}
                            </td>
                        </tr>



                        <tr>
                            <td style="width:12.5%" scope="col" valign="top">
                                Remark:
                            </td>
                            <td style="width:37.5%" colspan="3" valign="top">
                                {!! !empty($customer->remark) ? nl2br($customer->remark) : 'N/A' !!}
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="spacer">
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>

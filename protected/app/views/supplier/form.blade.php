<div class="page-content row">
    <!-- Page header -->
    <div class="page-header">
        <div class="page-title">
            <h3> {{ $pageTitle }}
                <small>{{ $pageNote }}</small>
            </h3>
        </div>
        <ul class="breadcrumb">
            <li><a href="{{ URL::to('dashboard') }}">{{ Lang::get('core.home') }}</a></li>
            <li><a href="{{ URL::to('supplier?md='.$filtermd) }}">{{ $pageTitle }}</a></li>
            <li class="active">{{ Lang::get('core.addedit') }} </li>
        </ul>

    </div>

    <div class="page-content-wrapper">
        @if(Session::has('message'))
            {{ Session::get('message') }}
        @endif
        <ul class="parsley-error-list">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        {{ Form::open(array('url'=>'supplier/save/'.SiteHelpers::encryptID($row['id']).'?md='.$filtermd.$trackUri, 'class'=>'form-horizontal','files' => true , 'parsley-validate'=>'','novalidate'=>' ')) }}
        <div class="col-md-6">
            <fieldset>
                <legend> General</legend>

                <div class="form-group hidethis " style="display:none;">
                    <label for="Id" class=" control-label col-md-4 text-left"> Id </label>

                    <div class="col-md-6">
                        {{ Form::text('id', $row['id'],array('class'=>'form-control', 'placeholder'=>'',   )) }}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Supplier Name" class=" control-label col-md-4 text-left"> Supplier Name </label>

                    <div class="col-md-6">
                        {{ Form::text('supplier_name', $row['supplier_name'],array('class'=>'form-control', 'placeholder'=>'',   )) }}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Address Street" class=" control-label col-md-4 text-left"> Address Street </label>

                    <div class="col-md-6">
                        {{ Form::text('address_street', $row['address_street'],array('class'=>'form-control', 'placeholder'=>'',   )) }}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Address City" class=" control-label col-md-4 text-left"> Address City </label>

                    <div class="col-md-6">
                        {{ Form::text('address_city', $row['address_city'],array('class'=>'form-control', 'placeholder'=>'',   )) }}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Address County" class=" control-label col-md-4 text-left"> Address County </label>

                    <div class="col-md-6">
                        {{ Form::text('address_county', $row['address_county'],array('class'=>'form-control', 'placeholder'=>'',   )) }}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Address Postcode" class=" control-label col-md-4 text-left"> Address Postcode </label>

                    <div class="col-md-6">
                        {{ Form::text('address_postcode', $row['address_postcode'],array('class'=>'form-control', 'placeholder'=>'',   )) }}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Contact Name" class=" control-label col-md-4 text-left"> Contact Name </label>

                    <div class="col-md-6">
                        {{ Form::text('contact_name', $row['contact_name'],array('class'=>'form-control', 'placeholder'=>'',   )) }}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Contact Number" class=" control-label col-md-4 text-left"> Contact Number </label>

                    <div class="col-md-6">
                        {{ Form::text('contact_number', $row['contact_number'],array('class'=>'form-control', 'placeholder'=>'',   )) }}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Contact Email" class=" control-label col-md-4 text-left"> Contact Email </label>

                    <div class="col-md-6">
                        {{ Form::text('contact_email', $row['contact_email'],array('class'=>'form-control', 'placeholder'=>'',   )) }}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Vat Number" class=" control-label col-md-4 text-left"> Vat Number </label>

                    <div class="col-md-6">
                        {{ Form::text('vat_number', $row['vat_number'],array('class'=>'form-control', 'placeholder'=>'',   )) }}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                @if ($row['id'] != "")
                    <div class="form-group  ">
                        <label for="Active" class=" control-label col-md-4 text-left"> Active </label>

                        <div class="col-md-6">

                            <label class='radio radio-inline'>
                                <input type='radio' name='active' value='0'  @if($row['active'] == '0')
                                       checked="checked" @endif > Inactive </label>
                            <label class='radio radio-inline'>
                                <input type='radio' name='active' value='1'  @if($row['active'] == '1')
                                       checked="checked" @endif > Active </label>
                        </div>
                        <div class="col-md-2">

                        </div>
                    </div>
                @endif
            </fieldset>
        </div>

        <div class="col-md-6">
            <fieldset>
                <legend> Specific</legend>

                <div class="form-group  ">
                    <label for="Site Id" class=" control-label col-md-4 text-left"> Site Id </label>

                    <div class="col-md-6">
                        <select name='site_id' rows='5' id='site_id' code='{$site_id}'
                                class='select2 '></select>
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Account Ref" class=" control-label col-md-4 text-left"> Account Ref </label>

                    <div class="col-md-6">
                        {{ Form::text('account_ref', $row['account_ref'],array('class'=>'form-control', 'placeholder'=>'',   )) }}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Default Pay Method" class=" control-label col-md-4 text-left"> Default Pay
                        Method </label>

                    <div class="col-md-6">
                        <select name='default_pay_method' rows='5' id='default_pay_method' code='{$default_pay_method}'
                                class='select2 '></select>
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Credit Limit" class=" control-label col-md-4 text-left"> Credit Limit </label>

                    <div class="col-md-6">
                        {{ Form::text('credit_limit', $row['credit_limit'],array('class'=>'form-control', 'placeholder'=>'',   )) }}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Credit Terms" class=" control-label col-md-4 text-left"> Credit Terms </label>

                    <div class="col-md-6">
                        {{ Form::text('credit_terms', $row['credit_terms'],array('class'=>'form-control', 'placeholder'=>'',   )) }}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Account Rep Name" class=" control-label col-md-4 text-left"> Account Rep Name </label>

                    <div class="col-md-6">
                        {{ Form::text('account_rep_name', $row['account_rep_name'],array('class'=>'form-control', 'placeholder'=>'',   )) }}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Account Rep Phone" class=" control-label col-md-4 text-left"> Account Rep Phone </label>

                    <div class="col-md-6">
                        {{ Form::text('account_rep_phone', $row['account_rep_phone'],array('class'=>'form-control', 'placeholder'=>'',   )) }}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Account Rep Email" class=" control-label col-md-4 text-left"> Account Rep Email </label>

                    <div class="col-md-6">
                        {{ Form::text('account_rep_email', $row['account_rep_email'],array('class'=>'form-control', 'placeholder'=>'',   )) }}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Delivery Info" class=" control-label col-md-4 text-left"> Delivery Info </label>

                    <div class="col-md-6">
                        {{ Form::text('delivery_info', $row['delivery_info'],array('class'=>'form-control', 'placeholder'=>'',   )) }}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
            </fieldset>
        </div>


        <div style="clear:both"></div>

        <div class="form-group">
            <label class="col-sm-4 text-right">&nbsp;</label>

            <div class="col-sm-8">
                @if($row['id'] != "")
                    <input type="submit" name="apply" class="btn btn-info" value="{{ Lang::get('core.sb_apply') }} "/>
                @else
                    <input type="submit" name="submit" class="btn btn-primary"
                           value="{{ Lang::get('core.sb_save') }}  "/>
                @endif
                <button type="button"
                        onclick="location.href='{{ URL::to('supplier?md='.$masterdetail["filtermd"].$trackUri) }}' "
                        id="submit" class="btn btn-success ">  {{ Lang::get('core.sb_cancel') }} </button>
            </div>

        </div>

        {{ Form::close() }}
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {

        $("#site_id").jCombo("{{ URL::to('supplier/comboselect?filter=sites:id:id|name|address_city') }}",
                {selected_value: '{{ $row["site_id"] }}'});

        $("#default_pay_method").jCombo("{{ URL::to('supplier/comboselect?filter=payment_methods:id:invoice_type') }}",
                {selected_value: '{{ $row["default_pay_method"] }}'});

    });
</script>
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
            <li><a href="{{ URL::to('voucher?md='.$filtermd) }}">{{ $pageTitle }}</a></li>
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
        {{ Form::open(array('url'=>'voucher/save/'.SiteHelpers::encryptID($row['id']).'?md='.$filtermd.$trackUri, 'class'=>'form-horizontal','files' => true , 'parsley-validate'=>'','novalidate'=>' ')) }}
        <div class="col-md-12">
            <fieldset>
                <legend> Vouchers</legend>

                <div class="form-group hidethis " style="display:none;">
                    <label for="Id" class=" control-label col-md-4 text-left"> Id </label>

                    <div class="col-md-6">
                        {{ Form::text('id', $row['id'],array('class'=>'form-control', 'placeholder'=>'',   )) }}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Voucher Ref" class=" control-label col-md-4 text-left"> Voucher Ref <span
                                class="asterix"> * </span></label>

                    <div class="col-md-6">
                        {{ Form::text('voucher_ref', $row['voucher_ref'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true'  )) }}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  " >
                    <label for="Authorized By" class=" control-label col-md-4 text-left"> Authorized By <span class="asterix"> * </span></label>
                    <div class="col-md-6">
                        <select name='authorized_by' rows='5' id='authorized_by' code='{$authorized_by}'
                                class='select2 '  required  ></select>
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Authorized On" class=" control-label col-md-4 text-left"> Authorized On <span
                                class="asterix"> * </span></label>

                    <div class="col-md-6">

                        {{ Form::text('authorized_on', $row['authorized_on'],array('class'=>'form-control datetime', 'style'=>'width:150px !important;')) }}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Amount" class=" control-label col-md-4 text-left"> Amount <span
                                class="asterix"> * </span></label>

                    <div class="col-md-6">
                        {{ Form::text('amount', $row['amount'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true', 'parsley-type'=>'number'   )) }}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Notes" class=" control-label col-md-4 text-left"> Notes </label>

                    <div class="col-md-6">
									  <textarea name='notes' rows='2' id='notes' class='form-control '
                                              >{{ $row['notes'] }}</textarea>
                    </div>
                    <div class="col-md-2">

                    </div>


                </div>

                <div class="form-group">
                    <div class="control-label col-md-4"></div>
                    <div class="col-md-6">

                        <div class="alert alert-info" role="alert">
                            <p><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                <span class="sr-only">Info:</span>

                                <strong>Note: </strong>Use the "notes" field to record optional general information
                                on the voucher, such as: the charity it was given to, or any special conditions
                                attached to it </p>
                        </div>

                    </div>
                    <div class="col-md-2"></div>
                </div>

                <div class="form-group  ">
                    <label for="Paypal Payment Ref" class=" control-label col-md-4 text-left"> Paypal Payment
                        Reference </label>

                    <div class="col-md-6">
                        {{ Form::text('paypal_payment_ref', $row['paypal_payment_ref'],array('class'=>'form-control', 'placeholder'=>'',   )) }}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>

                <div class="form-group  ">
                    <label for="Paypal Payee Name" class=" control-label col-md-4 text-left"> Paypal Payee Name </label>

                    <div class="col-md-6">
                        {{ Form::text('paypal_payee_name', $row['paypal_payee_name'],array('class'=>'form-control', 'placeholder'=>'',   )) }}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Paypal Payment Date" class=" control-label col-md-4 text-left"> Paypal Payment
                        Date </label>

                    <div class="col-md-6">

                        {{ Form::text('paypal_payment_date', $row['paypal_payment_date'],array('class'=>'form-control date', 'style'=>'width:150px !important;')) }}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Charity" class=" control-label col-md-4 text-left"> Charity </label>

                    <div class="col-md-6">

                        <label class='radio radio-inline'>
                            <input type='radio' name='charity' value='0'  @if($row['charity'] == '0')
                                   checked="checked" @endif > No </label>
                        <label class='radio radio-inline'>
                            <input type='radio' name='charity' value='1'  @if($row['charity'] == '1')
                                   checked="checked" @endif > Yes </label>
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                @if($row['id'] != "")
                    <div class="form-group  ">
                        <label for="Active" class=" control-label col-md-4 text-left"> Active </label>

                        <div class="col-md-6">

                            <label class='radio radio-inline'>
                                <input type='radio' name='active' value='0'  @if($row['active'] == '0')
                                       checked="checked" @endif > No </label>
                            <label class='radio radio-inline'>
                                <input type='radio' name='active' value='1'  @if($row['active'] == '1')
                                       checked="checked" @endif > Yes </label>
                        </div>
                        <div class="col-md-2">

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="control-label col-md-4"></div>
                        <div class="col-md-6">

                            <div class="alert alert-warning" role="alert">
                                <p><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                    <span class="sr-only">Warning: </span>

                                    <strong>Warning:</strong> The "active" field is intended to be used in
                                    situations
                                    such as a voucher becoming lost in post. Marking a voucher as inactive will
                                    remove
                                    it from indexing but retain its reference number. You can then reference this
                                    voucher in case of disputes.
                                    <strong>But</strong> you won't be able to re-use this voucher reference numeber</strong><br> On doing this add comments in the box below detailing why you deleted the voucher / what you did to resolve (such as sending another voucher with reference xyz)</p>
                            </div>
                        </div>
                        <div class="col-md-2"></div>
                    </div>

                    <div class="form-group  ">
                        <label for="Deletion Comments" class=" control-label col-md-4 text-left"> Deletion
                            Comments </label>

                        <div class="col-md-6">
                <textarea name='deletion_comments' rows='2' id='deletion_comments' class='form-control '>
                    {{ $row['deletion_comments'] }}
                </textarea>
                        </div>
                        <div class="col-md-2">
                        </div>
                    </div>
                @endif

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
                        onclick="location.href='{{ URL::to('voucher?md='.$masterdetail["filtermd"].$trackUri) }}' "
                        id="submit" class="btn btn-success ">  {{ Lang::get('core.sb_cancel') }} </button>
            </div>

        </div>

        {{ Form::close() }}
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {

        $("#authorized_by").jCombo("{{ URL::to('voucher/comboselect?filter=tb_users:id:id|first_name|last_name') }}",
                {  selected_value : '{{ $row["authorized_by"] }}' });

    });
</script>







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
            <li><a href="{{ URL::to('servicecontacts?md='.$filtermd) }}">{{ $pageTitle }}</a></li>
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
        {{ Form::open(array('url'=>'servicecontacts/save/'.SiteHelpers::encryptID($row['id']).'?md='.$filtermd.$trackUri, 'class'=>'form-horizontal','files' => true , 'parsley-validate'=>'','novalidate'=>' ')) }}
        <div class="col-md-12">
            <fieldset>
                <legend> Service & Maintainance Contacts</legend>

                <div class="form-group hidethis " style="display:none;">
                    <label for="Id" class=" control-label col-md-4 text-left"> Id </label>

                    <div class="col-md-6">
                        {{ Form::text('id', $row['id'],array('class'=>'form-control', 'placeholder'=>'',   )) }}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Name" class=" control-label col-md-4 text-left"> Name <span
                                class="asterix"> * </span></label>

                    <div class="col-md-6">
                        {{ Form::text('name', $row['name'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true'  )) }}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Service Description" class=" control-label col-md-4 text-left"> Service Description
                        <span class="asterix"> * </span></label>

                    <div class="col-md-6">
                        {{ Form::text('service_description', $row['service_description'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true'  )) }}
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
                    <label for="Contact Number" class=" control-label col-md-4 text-left"> Contact Number <span
                                class="asterix"> * </span></label>

                    <div class="col-md-6">
                        {{ Form::text('contact_number', $row['contact_number'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true'  )) }}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Contact Email" class=" control-label col-md-4 text-left"> Contact Email <span
                                class="asterix"> * </span></label>

                    <div class="col-md-6">
                        {{ Form::text('contact_email', $row['contact_email'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true'  )) }}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Contact Out Of Hours" class=" control-label col-md-4 text-left"> Contact Out Of
                        Hours </label>

                    <div class="col-md-6">
                        {{ Form::text('contact_out_of_hours', $row['contact_out_of_hours'],array('class'=>'form-control', 'placeholder'=>'',   )) }}
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
                @if (Input::get('id') != "")
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


        <div style="clear:both"></div>

        <div class="form-group">
            <label class="col-sm-4 text-right">&nbsp;</label>

            <div class="col-sm-8">
                @if (Input::get('id') != "")
                <input type="submit" name="apply" class="btn btn-info" value="{{ Lang::get('core.sb_apply') }} "/>
                @else
                <input type="submit" name="submit" class="btn btn-primary" value="{{ Lang::get('core.sb_save') }}  "/>
                @endif
                <button type="button"
                        onclick="location.href='{{ URL::to('servicecontacts?md='.$masterdetail["filtermd"].$trackUri) }}' "
                        id="submit" class="btn btn-success ">  {{ Lang::get('core.sb_cancel') }} </button>
            </div>

        </div>

        {{ Form::close() }}
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {

        $("#default_pay_method").jCombo("{{ URL::to('servicecontacts/comboselect?filter=payment_methods:id:invoice_type') }}",
                {selected_value: '{{ $row["default_pay_method"] }}'});

    });
</script>
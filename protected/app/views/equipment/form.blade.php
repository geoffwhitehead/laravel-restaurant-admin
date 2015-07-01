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
            <li><a href="{{ URL::to('equipment?md='.$filtermd) }}">{{ $pageTitle }}</a></li>
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
        {{ Form::open(array('url'=>'equipment/save/'.SiteHelpers::encryptID($row['id']).'?md='.$filtermd.$trackUri, 'class'=>'form-horizontal','files' => true , 'parsley-validate'=>'','novalidate'=>' ')) }}
        <div class="col-md-12">
            <fieldset>
                <legend> equipment</legend>

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
                    <label for="Appliance Type" class=" control-label col-md-4 text-left"> Appliance Type <span
                                class="asterix"> * </span></label>

                    <div class="col-md-6">
                        <select name='appliance_type' rows='5' id='appliance_type' code='{$appliance_type}'
                                class='select2 ' required></select>
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class=" form-group">
                    <div class="col-md-4">

                    </div>
                    <div class="alert alert-info col-md-6">
                        <p><span class="glyphicon glyphicon-exclamation-sign"></span>
                            Note: Adding a fridge or freezer to the monitored appliance type will cause it to appear
                            in the temperature record tables</p>
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Site" class=" control-label col-md-4 text-left"> Site </label>

                    <div class="col-md-6">
                        <select name='site_id' rows='5' id='site_id' code='{$site_id}'
                                class='select2 '></select>
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Department" class=" control-label col-md-4 text-left"> Department </label>

                    <div class="col-md-6">
                        <select name='department_id' rows='5' id='department_id' code='{$department_id}'
                                class='select2 '></select>
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Location Description" class=" control-label col-md-4 text-left"> Location
                        Description </label>

                    <div class="col-md-6">
                        {{ Form::text('location_description', $row['location_description'],array('class'=>'form-control', 'placeholder'=>'',   )) }}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Notes" class=" control-label col-md-4 text-left"> Notes </label>

                    <div class="col-md-6">
                        {{ Form::text('notes', $row['notes'],array('class'=>'form-control', 'placeholder'=>'',   )) }}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="col-md-12">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="panel panel-primary ">
                            <div class="panel-heading ">
                                <p><span class="glyphicon glyphicon-exclamation-sign"></span>
                                    Note: Below are optional fields but it's useful to include them. The training
                                    procedure
                                    for
                                    repairing equipment will detail that staff look here <strong> first</strong> before
                                    calling in a chargeable engineer to repair the equipment.</p>

                            </div>
                            <div class="panel-body ">

                                <div class="form-group ">
                                    <label for="Seller" class=" control-label col-md-4 text-left "> Seller </label>

                                    <div class="col-md-6 ">
									  <textarea name='seller' rows='2' id='seller' class='form-control '
                                              >{{ $row['seller'] }}</textarea>
                                    </div>
                                    <div class="col-md-2">

                                    </div>
                                </div>
                                <div class="form-group  ">
                                    <label for="Purchased On" class=" control-label col-md-4 text-left"> Purchased
                                        On </label>

                                    <div class="col-md-6">
                                        {{ Form::text('purchased_on', $row['purchased_on'],array('class'=>'form-control date', 'style'=>'width:150px !important;')) }}
                                    </div>
                                    <div class="col-md-2">

                                    </div>
                                </div>
                                <div class="form-group  ">
                                    <label for="Warranty Period (in Months)" class=" control-label col-md-4 text-left">
                                        Warranty
                                        Period
                                        (in Months) </label>

                                    <div class="col-md-6">
									  <textarea name='warranty_period' rows='2' id='warranty_period'
                                                class='form-control '
                                              >{{ $row['warranty_period'] }}</textarea>
                                    </div>
                                    <div class="col-md-2">

                                    </div>
                                </div>
                                <div class="form-group  ">
                                    <label for="Warranty Contact Number" class=" control-label col-md-4 text-left">
                                        Warranty
                                        Contact
                                        Number </label>

                                    <div class="col-md-6">
									  <textarea name='warranty_contact_number' rows='2' id='warranty_contact_number'
                                                class='form-control '
                                              >{{ $row['warranty_contact_number'] }}</textarea>
                                    </div>
                                    <div class="col-md-2">

                                    </div>
                                </div>
                                <div class="form-group  ">
                                    <label for="Order Number" class=" control-label col-md-4 text-left"> Order
                                        Number </label>

                                    <div class="col-md-6">
									  <textarea name='order_number' rows='2' id='order_number' class='form-control '
                                              >{{ $row['order_number'] }}</textarea>
                                    </div>
                                    <div class="col-md-2">

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                        </div>
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
                    <input type="submit" name="submit" class="btn btn-primary"
                           value="{{ Lang::get('core.sb_save') }}  "/>
                @endif
                <button type="button"
                        onclick="location.href='{{ URL::to('equipment?md='.$masterdetail["filtermd"].$trackUri) }}' "
                        id="submit" class="btn btn-success ">  {{ Lang::get('core.sb_cancel') }} </button>
            </div>

        </div>

        {{ Form::close() }}
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {

        $("#appliance_type").jCombo("{{ URL::to('equipment/comboselect?filter=equipment_types:id:name') }}",
                {selected_value: '{{ $row["appliance_type"] }}'});

        $("#site_id").jCombo("{{ URL::to('equipment/comboselect?filter=sites:id:address_city') }}",
                {selected_value: '{{ $row["site_id"] }}'});

        $("#department_id").jCombo("{{ URL::to('equipment/comboselect?filter=departments:id:name') }}",
                {selected_value: '{{ $row["department_id"] }}'});

    });
</script>
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
            <li><a href="{{ URL::to('employee?md='.$filtermd) }}">{{ $pageTitle }}</a></li>
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
        {{ Form::open(array('url'=>'employee/save/'.SiteHelpers::encryptID($row['employee_id']).'?md='.$filtermd.$trackUri, 'class'=>'form-horizontal','files' => true , 'parsley-validate'=>'','novalidate'=>' ')) }}
        <div class="col-md-12">
            <fieldset>
                <legend> Employee Records</legend>

                <div class="form-group hidethis " style="display:none;">
                    <label for="Employee Id" class=" control-label col-md-4 text-left"> Employee Id </label>

                    <div class="col-md-6">
                        {{ Form::text('employee_id', $row['employee_id'],array('class'=>'form-control', 'placeholder'=>'',   )) }}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="First Name" class=" control-label col-md-4 text-left"> First Name <span class="asterix"> * </span></label>

                    <div class="col-md-6">
                        {{ Form::text('first_name', $row['first_name'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true', 'readonly'  )) }}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Last Name" class=" control-label col-md-4 text-left"> Last Name <span
                                class="asterix"> * </span></label>

                    <div class="col-md-6">
                        {{ Form::text('last_name', $row['last_name'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true', 'readonly'  )) }}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Email Address" class=" control-label col-md-4 text-left"> Email Address <span
                                class="asterix"> * </span></label>

                    <div class="col-md-6">
                        {{ Form::text('email_address', $row['email_address'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true', 'parsley-type'=>'email', 'readonly'   )) }}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>


                <!--a user can only select a site / department that they are currently assigned to-->
                <div class="form-group  ">
                    <label for="Default Site" class=" control-label col-md-4 text-left"> Default Site <span
                                class="asterix"> * </span></label>

                    <div class="col-md-6">
                        <select name='default_site' rows='5' id='default_site' code='{$default_site}'
                                class='select2 ' required></select>
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>

                <div class="form-group  ">
                    <label for="Default Department" class=" control-label col-md-4 text-left"> Default Department
                        <span class="asterix"> * </span></label>

                    <div class="col-md-6">
                        <select name='default_department' rows='5' id='default_department'
                                code='{$default_department}'
                                class='select2 ' required></select>
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>

                <div class="form-group  ">
                    <label for="Address Street" class=" control-label col-md-4 text-left"> Address Street <span
                                class="asterix"> * </span></label>

                    <div class="col-md-6">
                        {{ Form::text('address_street', $row['address_street'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true'  )) }}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Address Town" class=" control-label col-md-4 text-left"> Address Town <span
                                class="asterix"> * </span></label>

                    <div class="col-md-6">
                        {{ Form::text('address_town', $row['address_town'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true'  )) }}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Address County" class=" control-label col-md-4 text-left"> Address County <span
                                class="asterix"> * </span></label>

                    <div class="col-md-6">
                        {{ Form::text('address_county', $row['address_county'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true'  )) }}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Address Postcode" class=" control-label col-md-4 text-left"> Address Postcode <span
                                class="asterix"> * </span></label>

                    <div class="col-md-6">
                        {{ Form::text('address_postcode', $row['address_postcode'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true'  )) }}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Employment Start" class=" control-label col-md-4 text-left"> Employment Start <span
                                class="asterix"> * </span></label>

                    <div class="col-md-6">

                        {{ Form::text('employment_start', $row['employment_start'],array('class'=> 'form-control','width:150px !important;', 'readonly')) }}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>



                <div class="form-group">
                    <div class="col-md-4"></div>
                    <div class="col-md-6  alert alert-info" role="alert">
                        <p><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                            <span class="sr-only">Info:</span>

                            Your bank details will only display in the fields above during registration, once your file has been processed your bank details will be removed from the server<br>Please notify Suchittra Nadon if you submit new pay details after this period. </p>

                        <div class="col-md-2">

                        </div>
                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Phone Number" class=" control-label col-md-4 text-left"> Phone Number <span
                                class="asterix"> * </span></label>

                    <div class="col-md-6">
                        {{ Form::text('phone_number', $row['phone_number'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true'  )) }}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>



                @if($row['processed'] == 0)
                    <div class="form-group  ">
                        <label for="Bank Sortcode" class=" control-label col-md-4 text-left"> Bank Sortcode</label>

                        <div class="col-md-6">
                            {{ Form::text('bank_sortcode', $row['bank_sortcode'],array('class'=>'form-control', 'placeholder'=>'')) }}
                        </div>
                        <div class="col-md-2">

                        </div>
                    </div>
                    <div class="form-group  ">
                        <label for="Bank Account" class=" control-label col-md-4 text-left"> Bank Account Number </label>

                        <div class="col-md-6">
                            {{ Form::text('bank_account', $row['bank_account'],array('class'=>'form-control', 'placeholder'=>'')) }}
                        </div>
                        <div class="col-md-2">

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="Ni Number" class=" control-label col-md-4 text-left"> Ni Number <span
                                    class="asterix"> * </span></label>

                        <div class="col-md-6">
                            {{ Form::text('ni_number', $row['ni_number'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true'  )) }}
                        </div>
                        <div class="col-md-2">

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Date Of Birth" class=" control-label col-md-4 text-left"> Date Of Birth <span
                                    class="asterix"> * </span></label>

                        <div class="col-md-6">

                            {{ Form::text('date_of_birth', $row['date_of_birth'],array('class'=>'form-control date', 'style'=>'width:150px !important;')) }}
                        </div>
                        <div class="col-md-2">

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Gender" class=" control-label col-md-4 text-left"> Gender <span
                                    class="asterix"> * </span></label>

                        <div class="col-md-6">

                            <label class='radio radio-inline'>
                                <input type='radio' name='is_male' value='0' required @if($row['is_male'] == '0')
                                       checked="checked" @endif > Female </label>
                            <label class='radio radio-inline'>
                                <input type='radio' name='is_male' value='1' required @if($row['is_male'] == '1')
                                       checked="checked" @endif > Male </label>
                        </div>
                        <div class="col-md-2">

                        </div>
                    </div>
                @else
                    <div class="form-group  hidethis " style="display:none;">
                        <label for="Ni Number" class=" control-label col-md-4 text-left"> Ni Number <span
                                    class="asterix"> * </span></label>

                        <div class="col-md-6">
                            {{ Form::text('ni_number', $row['ni_number'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true'  )) }}
                        </div>
                        <div class="col-md-2">

                        </div>
                    </div>
                    <div class="form-group  hidethis " style="display:none;">
                        <label for="Date Of Birth" class=" control-label col-md-4 text-left"> Date Of Birth <span
                                    class="asterix"> * </span></label>

                        <div class="col-md-6">

                            {{ Form::text('date_of_birth', $row['date_of_birth'],array('class'=>'form-control date', 'style'=>'width:150px !important;')) }}
                        </div>
                        <div class="col-md-2">

                        </div>
                    </div>
                    <div class="form-group  hidethis " style="display:none;">
                        <label for="Gender" class=" control-label col-md-4 text-left"> Gender <span
                                    class="asterix"> * </span></label>

                        <div class="col-md-6">

                            <label class='radio radio-inline'>
                                <input type='radio' name='is_male' value='0' required @if($row['is_male'] == '0')
                                       checked="checked" @endif > Female </label>
                            <label class='radio radio-inline'>
                                <input type='radio' name='is_male' value='1' required @if($row['is_male'] == '1')
                                       checked="checked" @endif > Male </label>
                        </div>
                        <div class="col-md-2">

                        </div>
                    </div>
                @endif

                @if($row->processed == 0)

                    <div class="form-group">
                        <label for="Scan P45 P46" class=" control-label col-md-4 text-left"> Scan P45 P46 <span
                                    class="asterix"> * </span></label>

                        <div class="col-md-6">
                            <input type='file' name='scan_p45_p46' id='scan_p45_p46'
                                   @if($row['scan_p45_p46'] =='')class='required'
                                   class='required' @endif style='width:150px !important;'/>
                            {{Session::get('company')}}
                            {{ SiteHelpers::showUploadedFile($row['scan_p45_p46'],'/uploads/user_docs/'.Session::get('company').'/'.$row['last_name'].' '.$row['first_name'].' ['.$row['employee_id'].']/') }}

                        </div>
                        <div class="col-md-2">

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="Scan Ni" class=" control-label col-md-4 text-left"> Scan Ni <span
                                    class="asterix"> * </span></label>

                        <div class="col-md-6">
                            <input type='file' name='scan_ni' id='scan_ni' @if($row['scan_ni'] =='')
                                   @endif style='width:150px !important;'  />
                            {{ SiteHelpers::showUploadedFile($row['scan_ni'],'/uploads/user_docs/'.Session::get('company').'/'.$row['last_name'].' '.$row['first_name'].' ['.$row['employee_id'].']/') }}

                        </div>
                        <div class="col-md-2">

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Scan Permit" class=" control-label col-md-4 text-left"> Scan Permit <span
                                    class="asterix"> * </span></label>

                        <div class="col-md-6">
                            <input type='file' name='scan_permit' id='scan_permit' @if($row['scan_permit'] =='')
                                   class='required' @endif style='width:150px !important;'  />
                            {{ SiteHelpers::showUploadedFile($row['scan_permit'],'/uploads/user_docs/'.Session::get('company').'/'.$row['last_name'].' '.$row['first_name'].' ['.$row['employee_id'].']/') }}

                        </div>
                        <div class="col-md-2">

                        </div>
                    </div>

                @endif
                @if(Session::get('gid') == ACCOUNTANT_GID)
                    <div class="form-group">
                        <label for="processed" class=" control-label col-md-4 text-left"> Processed by
                            Accountant?</label>

                        <div class="col-md-6">

                            <label class='radio radio-inline'>
                                <input type='radio' name='processed' value='0' required @if($row['processed'] == '0')
                                       checked="checked" @endif > No </label>
                            <label class='radio radio-inline'>
                                <input type='radio' name='processed' value='1' required @if($row['processed'] == '1')
                                       checked="checked" @endif > Yes </label>
                        </div>
                        <div class="col-md-2">

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-4"></div>
                        <div class="col-md-6  alert alert-info" role="alert">
                            <p><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                <span class="sr-only">Info:</span>

                                Accountant: Once you have confirmed all the information is correct, all files have been
                                submitted, and have processed the employee, please check this radio button. It will
                                limit future edits to this file by the employee and remove their bank details from the
                                server</p>

                            <div class="col-md-2">

                            </div>
                        </div>
                    </div>
                @endif
            </fieldset>
        </div>


        <div style="clear:both"></div>

        <div class="form-group">
            <label class="col-sm-4 text-right">&nbsp;</label>

            <div class="col-sm-8">
                <input type="submit" name="apply" class="btn btn-info" value="{{ Lang::get('core.sb_apply') }} "/>
                <button type="button"
                        onclick="location.href='{{ URL::to('employee?md='.$masterdetail["filtermd"].$trackUri) }}' "
                        id="submit" class="btn btn-success ">  {{ Lang::get('core.sb_cancel') }} </button>
            </div>

        </div>

        {{ Form::close() }}
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {

        $("#default_site").jCombo("{{ URL::to('employee/comboselect?filter=sites:id:name|address_city') }}",
                {selected_value: '{{ $row["default_site"] }}'});

        $("#default_department").jCombo("{{ URL::to('employee/comboselect?filter=departments:id:name') }}",
                {selected_value: '{{ $row["default_department"] }}'});

    });
</script>
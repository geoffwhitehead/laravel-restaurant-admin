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
            <li><a href="{{ URL::to('jobs?md='.$filtermd) }}">{{ $pageTitle }}</a></li>
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
        {{ Form::open(array('url'=>'jobs/save/'.SiteHelpers::encryptID($row['id']).'?md='.$filtermd.$trackUri, 'class'=>'form-horizontal','files' => true , 'parsley-validate'=>'','novalidate'=>' ')) }}
        <div class="col-md-12">
            <fieldset>
                <legend> Jobs</legend>

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
                        {{ Form::text('check_name', $row['check_name'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true'  )) }}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Description" class=" control-label col-md-4 text-left"> Description <span
                                class="asterix"> * </span></label>

                    <div class="col-md-6">
                        {{ Form::text('description', $row['description'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true'  )) }}
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for=" Category" class=" control-label col-md-4 text-left"> Category <span
                                class="asterix"> * </span></label>

                    <div class="col-md-6">
                        <select name='check_category' rows='5' id='check_category' code='{$check_category}'
                                class='select2 ' required></select>
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group  ">
                    <label for="Frequency" class=" control-label col-md-4 text-left"> Frequency <span
                                class="asterix"> * </span></label>

                    <div class="col-md-6">
                        <select name='check_frequency' rows='5' id='check_frequency' code='{$check_frequency}'
                                class='select2 ' required></select>
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>

                <div class="form-group  ">
                    <label for="Monitor this job?" class=" control-label col-md-4 text-left"> Monitor this job? <span
                                class="asterix"> * </span></label>

                    <div class="col-md-6">

                        <label class='radio radio-inline'>
                            <input type='radio' name='monitor_in_checks' value='0'
                                   requred @if($row['monitor_in_checks'] == '0') checked="checked" @endif > No </label>
                        <label class='radio radio-inline'>
                            <input type='radio' name='monitor_in_checks' value='1'
                                   requred @if($row['monitor_in_checks'] == '1') checked="checked" @endif > Yes </label>
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

                                <strong>Note: </strong> The monitor field is used when applying status colours on the index page. If you don't want a job to be monitored (ie. whether the job has been completed this week ot not, select "no" for this field.).</p>
                        </div>

                    </div>
                    <div class="col-md-2"></div>
                </div>


                <!--i have made the options below only available for user below or = to level 3. This will be chosen automatially for other users based on their position-->
                @if(Session::get('lvl') <= GLOBAL_USER)

                    <div class="form-group  ">
                        <label for="Site" class=" control-label col-md-4 text-left"> Site <span
                                    class="asterix"> * </span></label>

                        <div class="col-md-6">
                            <select name='site_id' rows='5' id='site_id' code='{$site_id}'
                                    class='select2 ' required></select>
                        </div>

                        <div class="col-md-2">

                        </div>
                    </div>
                    <div class="form-group  ">
                        <label for="Department" class=" control-label col-md-4 text-left"> Department <span
                                    class="asterix"> * </span></label>

                        <div class="col-md-6">
                            <select name='department_id' rows='5' id='department_id' code='{$department_id}'
                                    class='select2 ' required></select>
                        </div>
                        <div class="col-md-2">

                        </div>
                    </div>
                    @else
                    <div class="form-group  ">
                        <label for="Site" class=" control-label col-md-4 text-left"> Site <span
                                    class="asterix"> * </span></label>

                        <div class="col-md-6 hidethis" style="display:none;">
                            {{ Form::text('site_id', Session::get('sid'), array('class'=>'form-control','placeholder'=>'','required'=>'true'  )) }}
                        </div>
                        <div class="col-md-6">
                            {{ Form::text('ignore', Session::get('site'), array( 'class'=>'form-control','placeholder'=>'', 'readonly'=>'true' )) }}
                        </div>

                        <div class="col-md-2">

                        </div>
                    </div>
                    <div class="form-group  ">
                        <label for="Department" class=" control-label col-md-4 text-left"> Department <span
                                    class="asterix"> * </span></label>

                        <div class="col-md-6 hidethis" style="display:none;">
                            {{ Form::text('department_id', Session::get('did'), array('class'=>'form-control','placeholder'=>'','required'=>'true'  )) }}
                        </div>
                        <div class="col-md-6">
                            {{ Form::text('ignore', Session::get('dep'), array( 'class'=>'form-control','placeholder'=>'', 'readonly'=>'true' )) }}
                        </div>
                        <div class="col-md-2">

                        </div>
                    </div>
                @endif
                @if($row['id'] != "")
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
                @if(Input::get('id') != "")
                    <input type="submit" name="apply" class="btn btn-info" value="{{ Lang::get('core.sb_apply') }} "/>
                @else
                    <input type="submit" name="submit" class="btn btn-primary"
                           value="{{ Lang::get('core.sb_save') }}  "/>
                @endif
                <button type="button"
                        onclick="location.href='{{ URL::to('jobs?md='.$masterdetail["filtermd"].$trackUri) }}' "
                        id="submit" class="btn btn-success ">  {{ Lang::get('core.sb_cancel') }} </button>
            </div>

        </div>

        {{ Form::close() }}
    </div>
</div>
<script type="text/javascript">

    $(document).ready(function () {

		$("#check_category").jCombo("{{ URL::to('jobs/comboselect?filter=check_categories:id:name') }}",
        {selected_value : '{{ $row["check_category"] }}'}) ;

        $("#check_frequency").jCombo("{{ URL::to('jobs/comboselect?filter=check_time_periods:id:name') }}",
                {selected_value: '{{ $row["check_frequency"] }}'});

        $("#site_id").jCombo("{{ URL::to('jobs/comboselect?filter=sites:id:address_city') }}",
                {selected_value: '{{ $row["site_id"] }}'});

        $("#department_id").jCombo("{{ URL::to('jobs/comboselect?filter=departments:id:name') }}",
                {selected_value: '{{ $row["department_id"] }}'});

    });
</script>
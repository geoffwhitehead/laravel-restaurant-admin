<div class="page-content row">
    <!-- Page header -->
    <div class="page-header">
        <div class="page-title">
            <h3> {{ $pageTitle }}
                <small>{{ $pageNote }}</small>
            </h3>
        </div>


        <ul class="breadcrumb">
            <li><a href="{{ URL::to('dashboard') }}">{{ Lang::get('core.home'); }}</a></li>
            <li><a href="{{ URL::to('users') }}">{{ $pageTitle }}</a></li>
            <li class="active"> Add</li>
        </ul>
    </div>
    @if(Session::has('message'))
        {{ Session::get('message') }}
    @endif

    <div class="page-content-wrapper">

        <div class="panel panel-default">

            <div class="panel-body">

                <ul class="parsley-error-list">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                {{ Form::open(array('url'=>'users/save/'.SiteHelpers::encryptID($row['id']), 'class'=>'form-horizontal','files' => true ,'parsley-validate novalidate'=>'')) }}

                <div class="col-md-6">

                    <div class="form-group hidethis " style="display:none;">
                        <label for="ipt" class=" control-label col-md-4 text-right"> Id </label>

                        <div class="col-md-8">
                            {{ Form::text('id', $row['id'],array('class'=>'form-control', 'placeholder'=>'')) }}
                        </div>
                    </div>
                    <div class="form-group  ">
                        <label for="ipt"
                               class=" control-label col-md-4 text-right"> {{ Lang::get('core.group') }} </label>

                        <div class="col-md-8">
                            <select name='group_id' rows='5' id='group_id' code='{$group_id}'
                                    class='select2 ' required></select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-4"></div>
                        <div class="col-md-8  alert alert-warning" role="alert">
                            <p><span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span>
                                <span class="sr-only">Warning:</span>

                                Administrators and managing directors are given global access and different views to
                                most sections, be careful not to accidentally assign someone to these groups.
                        </div>
                    </div>
                    <div class="form-group  ">
                        <label for="ipt"
                               class=" control-label col-md-4 text-right">  {{ Lang::get('core.username') }} </label>

                        <div class="col-md-8">
                            {{ Form::text('username', $row['username'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true')) }}
                        </div>
                    </div>
                    <div class="form-group  ">
                        <label for="ipt"
                               class=" control-label col-md-4 text-right"> {{ Lang::get('core.firstname') }} </label>

                        <div class="col-md-8">
                            {{ Form::text('first_name', $row['first_name'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true')) }}
                        </div>
                    </div>
                    <div class="form-group  ">
                        <label for="ipt"
                               class=" control-label col-md-4 text-right"> {{ Lang::get('core.lastname') }} </label>

                        <div class="col-md-8">
                            {{ Form::text('last_name', $row['last_name'],array('class'=>'form-control ', 'required'=>'true')) }}
                        </div>
                    </div>
                    <div class="form-group  ">
                        <label for="ipt"
                               class=" control-label col-md-4 text-right"> {{ Lang::get('core.email') }} </label>

                        <div class="col-md-8">
                            {{ Form::text('email', $row['email'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true' )) }}
                        </div>
                    </div>
                    @if($row['id'] != "")
                        <div class="form-group">
                            <div class="col-md-4"></div>
                            <div class="col-md-8  alert alert-info" role="alert">
                                <p><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                    <span class="sr-only">Info:</span>

                                    Changes to these details will only affect the login account, they will not be
                                    reflected in the employee file</p>
                            </div>
                        </div>
                        @endif
                                <!--ADDED CODE FROM OTHER TABLES HERE-->
                        @if($row['id'] == "")
                            <div class="form-group  ">
                                <label for="ipt"
                                       class=" control-label col-md-4 text-right">Employment Start </label>

                                <div class="col-md-8">
                                    {{ Form::text('employment_start', "" ,array('class'=>'form-control date', 'style'=>'width:150px !important;')) }}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="ipt" class=" control-label col-md-4 text-right"> Company </label>

                                <div class="col-md-8">
                                    <select name='company_id' rows='5' id='company_id' code='{$company_id}'
                                            class='select2 '
                                            required>
                                        @foreach ($companies as $company)
                                            <option value="{{$company->id}}">{{$company->company_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="ipt" class=" control-label col-md-4 text-right"> Default Site </label>

                                <div class="col-md-8">
                                    <select name='site_id' rows='5' id='site_id' code='{$site_id}' class='select2 '
                                            required>
                                        @foreach ($sites as $site)
                                            <option value="{{$site->id}}">{{$site->name}}
                                                , {{$site->address_city}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="ipt" class=" control-label col-md-4 text-right"> Default Department </label>

                                <div class="col-md-8">
                                    <select name='department_id' rows='5' id='department_id' code='{$department_id}'
                                            class='select2 '
                                            required>
                                        @foreach ($departments as $department)
                                            <option value="{{$department->id}}">{{$department->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4"></div>
                                <div class="col-md-8  alert alert-info" role="alert">
                                    <p><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                        <span class="sr-only">Info:</span>

                                        An assignment will be automatically created for the user based on their default
                                        site/department. If the employee works at multiple locations or you would like
                                        them to be able to log into other sites you will need to manually add an
                                        assignment for them

                                </div>
                            </div>
                            @endif

                                    <!--END MODIFICATION-->


                            <div class="form-group  ">
                                <label for="ipt" class=" control-label col-md-4 text-right"> Status </label>

                                <div class="col-md-8">

                                    <label class='checked'>
                                        <input type='radio' name='active' value='0' required @if($row['active'] == '0')
                                               checked="checked" @endif > Inactive </label>
                                    <label class='checked'>
                                        <input type='radio' name='active' value='1' required @if($row['active'] == '1')
                                               checked="checked" @endif > Active </label>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-sm-4 text-right">&nbsp;</label>

                                <div class="col-sm-8">
                                    <button type="submit"
                                            class="btn btn-primary ">  {{ Lang::get('core.sb_savechanges') }} </button>
                                </div>

                            </div>

                </div>


                <div class="col-md-6">

                    <div class="form-group">

                        <label for="ipt" class=" control-label col-md-4 text-left"> </label>

                        <div class="col-md-8">
                            @if($row['id'] !='')
                                    <div class="alert alert-info" role="alert">
                                        <p><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                            <span class="sr-only">Info:</span>
                                            Leave blank if you don't want to change the password field
                                        </p>
                                    </div>
                            @else
                                Create Password
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ipt" class=" control-label col-md-4"> {{ Lang::get('core.newpassword') }} </label>

                        <div class="col-md-8">
                            <input name="password" type="password" id="password" class="form-control input-sm" value=""
                            @if($row['id'] =='')
                                   required
                                    @endif
                                    />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="ipt" class=" control-label col-md-4"> {{ Lang::get('core.conewpassword') }} </label>

                        <div class="col-md-8">
                            <input name="password_confirmation" type="password" id="password_confirmation"
                                   class="form-control input-sm" value=""
                            @if($row['id'] =='')
                                   required
                                    @endif
                                    />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 text-right">&nbsp;</label>

                        <div class="col-sm-8">
                            <button type="submit"
                                    class="btn btn-primary ">  {{ Lang::get('core.sb_savechanges') }} </button>
                        </div>

                    </div>


                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>

</div>
<script type="text/javascript">
    $(document).ready(function () {
        $("#group_id").jCombo("<?php echo URL::to("users/comboselect?filter=tb_groups:group_id:name&limit=WHERE:level:>=:".$level);?>",
                {selected_value: '{{ $row['group_id'] }}'});

    });

</script>
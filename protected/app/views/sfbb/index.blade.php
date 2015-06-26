{{--*/ usort($tableGrid, "SiteHelpers::_sort") /*--}}
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
            <li class="active">{{ $pageTitle }}</li>
        </ul>

    </div>

    <div class="page-content-wrapper">
        @if (Session::get('did') == GLOBAL_DEP or Session::get('did') == KITCHEN_DEP )
            @if ($count_recent[0]->cnt == 0)
                <div class="form container">
                    {{ Form::open(array('url'=>'sfbb/save/','class'=>'form-horizontal','files' => true , 'parsley-validate'=>'','novalidate'=>' ')) }}
                    <div class="col-md-12">
                        <fieldset>
                            <legend> Submit a SFBB End of Day Log</legend>

                            <div class="form-group hidethis " style="display:none;">
                                <label for="Id" class=" control-label col-md-4 text-left"> Id </label>

                                <div class="col-md-6">
                                    {{ Form::text('id', "",array('class'=>'form-control', 'placeholder'=>'',   )) }}
                                </div>
                                <div class="col-md-2">

                                </div>
                            </div>
                            <div class="form-group  ">
                                <label for="site_id" class=" control-label col-md-4 text-left"> Site <span
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
                                <label for="opening_comments" class=" control-label col-md-4 text-left"> Comments on the
                                    Opening
                                    Checks </label>

                                <div class="col-md-6">
                                    {{ Form::text('opening_comments', "All OK",array('class'=>'form-control', 'placeholder'=>'',   )) }}
                                </div>
                                <div class="col-md-2">

                                </div>
                            </div>
                            <div class="form-group  ">
                                <label for="closing_comments" class=" control-label col-md-4 text-left"> Comments on the
                                    Closing
                                    Checks </label>

                                <div class="col-md-6">
                                    {{ Form::text('closing_comments', "All OK",array('class'=>'form-control', 'placeholder'=>'',   )) }}
                                </div>
                                <div class="col-md-2">

                                </div>
                            </div>
                            <div class="form-group  ">
                                <label for="Notes" class=" control-label col-md-4 text-left"> Notes </label>

                                <div class="col-md-6">
                                    {{ Form::text('notes', "",array('class'=>'form-control', 'placeholder'=>'',   )) }}
                                </div>
                                <div class="col-md-2">

                                </div>
                            </div>

                            <div class="form-group  ">
                                <div class="col-md-4"></div>

                                <div class="alert alert-info col-md-6" role="alert">
                                    <p><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                        <span class="sr-only">Info:</span>

                                        Use the Notes section to include any information on additional / extra checks.
                                        Or
                                        any general problems that occurred that don't relate to specifically opening or
                                        closing checks </p>
                                </div>
                                <div class="col-md-2"></div>

                            </div>
                            <div class="form-group  ">
                                <label for="checks" class=" control-label col-md-4 text-left"> Completed Opening and
                                    Closing
                                    Checks? </label>

                                <div class="col-md-6">
                                    {{ Form::checkbox('checks') }}
                                </div>
                                <div class="col-md-2"></div>

                            </div>
                            <div class="form-group  ">
                                <div class="col-md-4"></div>

                                <div class="alert alert-warning col-md-6" role="alert">
                                    <p><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                        <span class="sr-only">Info:</span>

                                        By ticking the checkbox and submitting the log you are confirming that the safe
                                        methods were followed and effectively supervised today.</p>
                                </div>
                                <div class="col-md-2"></div>

                            </div>

                        </fieldset>
                    </div>


                    <div style="clear:both"></div>

                    <div class="form-group">
                        <label class="col-sm-4 text-right">&nbsp;</label>

                        <div class="col-sm-8">
                            <input type="submit" name="log_submit" class="btn btn-primary" value="Submit" disabled/>
                        </div>

                    </div>

                    {{ Form::close() }}

                </div>
            @else
                <div class="col-md-12">
                    <div class="alert alert-success" role="alert">
                        <p><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                            <span class="sr-only">Info:</span>

                            <strong></strong><br> Your site has already submitted a log within the last working day (16
                            hrs).
                            Check the log below for details </p>
                    </div>
                </div>
            @endif




            <div class="toolbar-line ">
                @if($access['is_add'] ==1)
                    <a href="{{ URL::to('sfbb/add?md='.$masterdetail["filtermd"].$trackUri) }}"
                       class="tips btn btn-xs btn-info" title="{{ Lang::get('core.btn_create') }}">
                        <i class="fa fa-plus"></i>&nbsp;{{ Lang::get('core.btn_create') }}</a>
                @endif
                @if($access['is_remove'] ==1)
                    <a href="javascript://ajax" onclick="SximoDelete();" class="tips btn btn-xs btn-danger"
                       title="{{ Lang::get('core.btn_remove') }}">
                        <i class="fa fa-trash-o"></i>&nbsp;{{ Lang::get('core.btn_remove') }}</a>
                @endif
                @if($access['is_excel'] ==1)
                    <a href="{{ URL::to('sfbb/download?md='.$masterdetail["filtermd"].$trackUri) }}"
                       class="tips btn btn-xs btn-default" title="{{ Lang::get('core.btn_download') }}">
                        <i class="fa fa-download"></i>&nbsp;{{ Lang::get('core.btn_download') }} </a>
                @endif
                @if(Session::get('gid') ==1)
                    <a href="{{ URL::to('module/config/sfbb') }}" class="tips btn btn-xs btn-default"
                       title="{{ Lang::get('core.btn_config') }}">
                        <i class="fa fa-cog"></i>&nbsp;{{ Lang::get('core.btn_config') }} </a>
                @endif

            </div>


            @if(Session::has('message'))
                {{ Session::get('message') }}
            @endif
            {{ $details }}

            {{ Form::open(array('url'=>'sfbb/destroy/', 'class'=>'form-horizontal' ,'id' =>'SximoTable' )) }}
            <div class="table-responsive" style="min-height:300px;">
                <table class="table table-striped ">
                    <thead>
                    <tr>
                        <th> No</th>
                        <th><input type="checkbox" class="checkall"/></th>

                        @foreach ($tableGrid as $t)
                            @if($t['view'] =='1')
                                <th>{{ $t['label'] }}</th>
                            @endif
                        @endforeach
                        <th>{{ Lang::get('core.btn_action') }}</th>
                    </tr>
                    </thead>

                    <tbody>
                    <tr id="sximo-quick-search">
                        <td> #</td>
                        <td></td>
                        @foreach ($tableGrid as $t)
                            @if($t['view'] =='1')
                                <td>
                                    {{ SiteHelpers::transForm($t['field'] , $tableForm) }}
                                </td>
                            @endif
                        @endforeach
                        <td style="width:130px;">
                            <input type="hidden" value="Search">
                            <button type="button" class=" do-quick-search btn btn-xs btn-info"> GO</button>
                        </td>
                    </tr>
                    @foreach ($rowData as $row)
                        <tr>
                            <td width="50"> {{ ++$i }} </td>
                            <td width="50"><input type="checkbox" class="ids" name="id[]" value="{{ $row->id }}"/></td>
                            @foreach ($tableGrid as $field)
                                @if($field['view'] =='1')
                                    <td>
                                        @if($field['attribute']['image']['active'] =='1')
                                            {{ SiteHelpers::showUploadedFile($row->$field['field'],$field['attribute']['image']['path']) }}
                                        @else
                                            {{--*/ $conn = (isset($field['conn']) ? $field['conn'] : array() ) /*--}}
                                            {{ SiteHelpers::gridDisplay($row->$field['field'],$field['field'],$conn) }}
                                        @endif
                                    </td>
                                @endif
                            @endforeach
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown"
                                            aria-expanded="false">
                                        <i class="fa fa-cog"></i> <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu  icons-left pull-right">
                                        {{--*/ $id = SiteHelpers::encryptID($row->id) /*--}}
                                        @if($access['is_detail'] ==1)
                                            <li>
                                                <a href="{{ URL::to('sfbb/show/'.$id.'?md='.$masterdetail["filtermd"].$trackUri)}}"><i
                                                            class="fa  fa-search"></i> {{ Lang::get('core.btn_view') }}
                                                </a>
                                            </li>
                                        @endif
                                        @if($access['is_edit'] ==1)
                                            <li>
                                                <a href="{{ URL::to('sfbb/add/'.$id.'?md='.$masterdetail["filtermd"].$trackUri)}}"><i
                                                            class="fa fa-edit"></i> {{ Lang::get('core.btn_edit') }}</a>
                                            </li>
                                        @endif
                                        @foreach($subgrid as $md)
                                            <li>
                                                <a href="{{ URL::to($md['module'].'?md='.$md['master'].'+'.$md['master_key'].'+'.$md['module'].'+'.$md['key'].'+'.$id) }}"><i
                                                            class="icon-eye2"></i> {{ $md['title'] }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </td>
                        </tr>

                    @endforeach

                    </tbody>

                </table>
                <input type="hidden" name="md" value="{{ $masterdetail['filtermd']}}"/>
            </div>
            {{ Form::close() }}
            @include('footer')

        @else
            <div class="alert alert-info col-md-12" role="alert">
                <p><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                    <span class="sr-only">Info:</span>
                    You need to be logged in with global site access or in a kitchen department to view this page</p>
            </div>
        @endif
    </div>

</div>


<script>
    $(document).ready(function () {

        $('.do-quick-search').click(function () {
            $('#SximoTable').attr('action', '{{ URL::to("sfbb/multisearch")}}');
            $('#SximoTable').submit();
        });


        $('Input').on('ifChecked', function (event) {
            $("input[type='submit']").prop('disabled', false);
        });
        $('Input').on('ifUnchecked', function (event) {
            $("input[type='submit']").prop('disabled', true);
        });


    });
</script>		
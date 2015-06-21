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
        <div class="toolbar-line ">
            @if($access['is_add'] ==1)
                <a href="{{ URL::to('deposit/add?md='.$masterdetail["filtermd"].$trackUri) }}"
                   class="tips btn btn-xs btn-info" title="{{ Lang::get('core.btn_create') }}">
                    <i class="fa fa-plus"></i>&nbsp;{{ Lang::get('core.btn_create') }}</a>
            @endif

            @if($access['is_excel'] ==1)
                <a href="{{ URL::to('deposit/download?md='.$masterdetail["filtermd"].$trackUri) }}"
                   class="tips btn btn-xs btn-default" title="{{ Lang::get('core.btn_download') }}">
                    <i class="fa fa-download"></i>&nbsp;{{ Lang::get('core.btn_download') }} </a>
            @endif
            @if(Session::get('gid') ==1)
                <a href="{{ URL::to('module/config/deposit') }}" class="tips btn btn-xs btn-default"
                   title="{{ Lang::get('core.btn_config') }}">
                    <i class="fa fa-cog"></i>&nbsp;{{ Lang::get('core.btn_config') }} </a>
            @endif
            <a href="javascript://ajax" onclick="MarkUsed();" class="tips btn btn-xs btn-success"
               title="Mark as Used">
                <i class="fa fa-plus-circle"></i>&nbsp;Mark Deposits as Used
            </a>
        </div>


        @if(Session::has('message'))
            {{ Session::get('message') }}
        @endif
        {{ $details }}

        {{ Form::open(array('url'=>'deposit/confirm/', 'class'=>'form-horizontal' ,'id' =>'SximoTable' )) }}
        <div class="table-responsive" style="min-height:300px">
            <table class="table table-striped ">
                <thead>
                <tr>
                    <th>Status</th>
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
                    <td></td>
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
                        <!-- added status colours here-->
                        @if($row->active == 0)
                            <td width="50" class="editable" style="background:slategrey">
                        @elseif($row->no_show_flag == 1)
                            <td width="50" class="editable" style="background:#000000">
                        @elseif($row->used == 1 and $row->used_sale_id != "")
                            <td width="50" class="editable" style="background:darkseagreen">
                                <i class="fa fa-check fa-lg"></i>
                        @elseif($row->used == 1 and date('Y-m-d', strtotime($row->booking_date_time)) >= date('Y-m-d'))
                            <td width="50" class="editable" style="background:darkseagreen">
                                <i class="fa fa-check-circle-o fa-2x"></i>
                        @elseif(date('Y-m-d', strtotime($row->booking_date_time)) == date('Y-m-d'))
                            <td width="50" class="editable" style="background:#ffff00">
                        @elseif(date('Y-m-d', strtotime($row->booking_date_time)) > date('Y-m-d'))
                            <td width="50" class="editable" style="background:darkseagreen">
                        @elseif(date('Y-m-d', strtotime($row->booking_date_time)) < date('Y-m-d'))
                            <td width="50" class="editable" style="background:indianred">
                        @else
                            <td width="50" class="editable" style="background:pink">?
                        @endif


                        </td>
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
                                            <a href="{{ URL::to('deposit/show/'.$id.'?md='.$masterdetail["filtermd"].$trackUri)}}"><i
                                                        class="fa  fa-search"></i> {{ Lang::get('core.btn_view') }}</a>
                                        </li>
                                    @endif
                                    @if($access['is_edit'] ==1)
                                        <li>
                                            <a href="{{ URL::to('deposit/add/'.$id.'?md='.$masterdetail["filtermd"].$trackUri)}}"><i
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
        <div class="col-md-12 alert alert-info" role="alert">
            <p><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                <span class="sr-only">Info:</span>

                <strong>Note:</strong> Marking deposits as used will add them to the end of day sale. For no shows, edit
                the deposit and click "no show". For refunds, edit the deposit and click "no show", then add a comment
                explaining for the cash variance in the end of day sale.<br>

                <br>

                <strong>Green:</strong> OK<br>
                <strong>Yellow:</strong> Action is required<br>
                <strong>Red:</strong> Deposit has not been assigned and is past its booking date<br>
                <strong>Black:</strong> Marked as no show <br>
                <strong>Grey:</strong> Inactive <br>
                <i class="fa fa-check fa-lg"></i> : Used and assigned to a sale<br>
                <i class="fa fa-check-circle-o fa-lg"></i> : Flagged as Used <br>
            </p>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {

        $('.do-quick-search').click(function () {
            $('#SximoTable').attr('action', '{{ URL::to("deposit/multisearch")}}');
            $('#SximoTable').submit();
        });

    });
</script>		
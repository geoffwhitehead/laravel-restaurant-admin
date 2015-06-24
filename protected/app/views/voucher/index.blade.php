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
                <a href="{{ URL::to('voucher/add?md='.$masterdetail["filtermd"].$trackUri) }}"
                   class="tips btn btn-xs btn-info" title="{{ Lang::get('core.btn_create') }}">
                    <i class="fa fa-plus"></i>&nbsp;{{ Lang::get('core.btn_create') }}</a>
            @endif

            @if($access['is_excel'] ==1)
                <a href="{{ URL::to('voucher/download?md='.$masterdetail["filtermd"].$trackUri) }}"
                   class="tips btn btn-xs btn-default" title="{{ Lang::get('core.btn_download') }}">
                    <i class="fa fa-download"></i>&nbsp;{{ Lang::get('core.btn_download') }} </a>
            @endif
            @if(Session::get('gid') ==1)
                <a href="{{ URL::to('module/config/voucher') }}" class="tips btn btn-xs btn-default"
                   title="{{ Lang::get('core.btn_config') }}">
                    <i class="fa fa-cog"></i>&nbsp;{{ Lang::get('core.btn_config') }} </a>
            @endif
            <a href="javascript://ajax" onclick="MarkUsed();" class="tips btn btn-xs btn-success"
               title="Mark as Used">
                <i class="fa fa-plus-circle"></i>&nbsp;Use Vouchers
            </a>
        </div>


        @if(Session::has('message'))
            {{ Session::get('message') }}
        @endif
        {{ $details }}

        {{ Form::open(array('url'=>'voucher/confirm/', 'class'=>'form-horizontal' ,'id' =>'SximoTable' )) }}
        <div class="table-responsive" style="min-height:300px;">
            <table class="table table-striped ">
                <thead>
                <tr>
                    <th> Status</th>
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
                        @if($row->used == 1 and $row->used_sale_id != "")
                            <td width="50" class="editable" style="background:darkseagreen"></td>
                        @elseif($row->used == 1)
                            <td width="50" class="editable" style="background:#ffff00"></td>
                        @elseif($row->used == 0)
                            <td width="50" class="editable" style="background:slategrey"></td>
                        @else
                            <td width="50" class="editable" style="background:pink">?</td>
                        @endif


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
                                            <a href="{{ URL::to('voucher/show/'.$id.'?md='.$masterdetail["filtermd"].$trackUri)}}"><i
                                                        class="fa fa-search"></i> {{ Lang::get('core.btn_view') }}</a>
                                        </li>
                                    @endif
                                    @if($access['is_edit'] ==1)
                                        <li>
                                            <a href="{{ URL::to('voucher/add/'.$id.'?md='.$masterdetail["filtermd"].$trackUri)}}"><i
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
        <div class="alert alert-info" role="alert">
            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
            <span class="sr-only">Info:</span>
            <strong>Status Colours: </strong><br>
            <strong>Green:</strong> Voucher used and applied to a sale<br>
            <strong>Yellow:</strong> Voucher marked as used<br>
            <strong>Grey:</strong> Voucher unused<br>
            <br>

        </div>
        @include('footer')

    </div>
</div>
<script>
    $(document).ready(function () {

        $('.do-quick-search').click(function () {
            $('#SximoTable').attr('action', '{{ URL::to("voucher/multisearch")}}');
            $('#SximoTable').submit();
        });

    });
</script>		
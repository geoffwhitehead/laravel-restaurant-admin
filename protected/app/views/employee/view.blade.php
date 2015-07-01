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
            <li><a href="{{ URL::to('employee?md='.$masterdetail["filtermd"]) }}">{{ $pageTitle }}</a></li>
            <li class="active"> {{ Lang::get('core.detail') }} </li>
        </ul>
    </div>


    <div class="page-content-wrapper">
        <div class="toolbar-line">
            <a href="{{ URL::to('employee?md='.$masterdetail["filtermd"].$trackUri) }}"
               class="tips btn btn-xs btn-default" title="{{ Lang::get('core.btn_back') }}"><i class="icon-table"></i>&nbsp;{{ Lang::get('core.btn_back') }}
            </a>
            @if($access['is_add'] ==1)
                <a href="{{ URL::to('employee/add/'.$id.'?md='.$masterdetail["filtermd"].$trackUri) }}"
                   class="tips btn btn-xs btn-primary" title="{{ Lang::get('core.btn_edit') }}"><i
                            class="icon-pencil3"></i>&nbsp;{{ Lang::get('core.btn_edit') }}</a>
            @endif
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead><h3>Public</h3></thead>
                <tbody>

                <tr>
                    <td width='30%' class='label-view text-right'>Employee Id</td>
                    <td>{{ $row->employee_id }} </td>

                </tr>

                <tr>
                    <td width='30%' class='label-view text-right'>First Name</td>
                    <td>{{ $row->first_name }} </td>

                </tr>

                <tr>
                    <td width='30%' class='label-view text-right'>Last Name</td>
                    <td>{{ $row->last_name }} </td>

                </tr>

                <tr>
                    <td width='30%' class='label-view text-right'>Email</td>
                    <td>{{ $row->email_address }} </td>

                </tr>

                <tr>
                    <td width='30%' class='label-view text-right'>Company</td>
                    <td>{{ SiteHelpers::gridDisplayView($row->company_id,'company_id','1:companies:id:company_name') }} </td>

                </tr>

                <tr>
                    <td width='30%' class='label-view text-right'>Default Site</td>
                    <td>{{ SiteHelpers::gridDisplayView($row->default_site,'default_site','1:sites:id:name|address_city') }} </td>

                </tr>

                <tr>
                    <td width='30%' class='label-view text-right'>Default Dept</td>
                    <td>{{ SiteHelpers::gridDisplayView($row->default_department,'default_department','1:departments:id:name') }} </td>

                </tr>


                <tr>
                    <td width='30%' class='label-view text-right'>Start of Employment</td>
                    <td>{{ $row->employment_start }} </td>

                </tr>


                <tr>
                    <td width='30%' class='label-view text-right'>Phone Number</td>
                    <td>{{ $row->phone_number }} </td>

                </tr>


                <tr>
                    <td width='30%' class='label-view text-right'>Is Male</td>
                    <td>{{ $row->is_male }} </td>

                </tr>


                <tr>
                    <td width='30%' class='label-view text-right'>Updated By</td>
                    <td>{{ SiteHelpers::gridDisplayView($row->updated_by,'updated_by','1:employee_records:employee_id:employee_id|first_name|last_name') }} </td>

                </tr>

                <tr>
                    <td width='30%' class='label-view text-right'>Updated On</td>
                    <td>{{ $row->updated_on }} </td>

                </tr>

                <tr>
                    <td width='30%' class='label-view text-right'>Active</td>
                    <td>{{ $row->active }} </td>

                </tr>


                </tbody>
            </table>
            <br>

            @if (Session::get('lvl') <= GLOBAL_USER or Auth::id() == $row->employee_id)
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead><h3>Protected</h3></thead>
                        <tbody>

                        <tr>
                            <td width='30%' class='label-view text-right'>Street</td>
                            <td>{{ $row->address_street }} </td>

                        </tr>

                        <tr>
                            <td width='30%' class='label-view text-right'>Town</td>
                            <td>{{ $row->address_town }} </td>

                        </tr>

                        <tr>
                            <td width='30%' class='label-view text-right'>County</td>
                            <td>{{ $row->address_county }} </td>

                        </tr>

                        <tr>
                            <td width='30%' class='label-view text-right'>Postcode</td>
                            <td>{{ $row->address_postcode }} </td>

                        </tr>
                        @if(Session::get('lvl') <= GLOBAL_USER)
                            <tr>
                                <td width='30%' class='label-view text-right'>Employment End</td>
                                <td>{{ $row->employment_end }} </td>

                            </tr>
                        @endif

                        <tr>
                            <td width='30%' class='label-view text-right'>Bank Sortcode</td>
                            <td>{{ $row->bank_sortcode }} </td>

                        </tr>

                        <tr>
                            <td width='30%' class='label-view text-right'>Bank Account</td>
                            <td>{{ $row->bank_account }} </td>

                        </tr>
                        <tr>
                            <td width='30%' class='label-view text-right'>Ni Number</td>
                            <td>{{ $row->ni_number }} </td>

                        </tr>

                        <tr>
                            <td width='30%' class='label-view text-right'>DOB</td>
                            <td>{{ $row->date_of_birth }} </td>

                        </tr>
                        <tr>
                            <td width='30%' class='label-view text-right'>Scan P45-6</td>
                            <td>{{ $row->scan_p45_p46 }} </td>

                        </tr>

                        <tr>
                            <td width='30%' class='label-view text-right'>Scan Ni</td>
                            <td>{{ $row->scan_ni }} </td>

                        </tr>

                        <tr>
                            <td width='30%' class='label-view text-right'>Scan Permit</td>
                            <td>{{ $row->scan_permit }} </td>

                        </tr>

                        <tr>
                            <td width='30%' class='label-view text-right'>Reg Complete</td>
                            <td>{{ $row->reg_complete }} </td>

                        </tr>

                        <tr>
                            <td width='30%' class='label-view text-right'>Processed</td>
                            <td>{{ $row->processed }} </td>

                        </tr>

                        @endif
                        </tbody>
                    </table>
                </div>
        </div>
    </div>
</div>
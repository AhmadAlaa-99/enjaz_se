<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title"><span>Main</span></li>
                <li>
                    <a href="{{route('enjaz')}}"><i data-feather="home"></i> <span>واجهة الموقع</span></a>
                </li>
                @can('صلاحيات المستأجر')
                    <li>

                        <a href="{{ url('/' . ($page = 'Tenant/leases')) }}"><i data-feather="file-text"></i>
                            <span>بيانات العقد</span></a>
                    </li>


                    <li class="submenu">
                        <a href="#"><i data-feather="star"></i> <span>طلبات الصيانة </span> <span
                                class="menu-arrow"></span></a>
                        <ul>
                            <li><a href="{{ url('/' . ($page = 'Tenant/request_form')) }}">ارسال الطلب</a></li>
                            <li><a href="{{ url('/' . ($page = 'Tenant/maints_requests')) }}">طلباتي</a></li>

                        </ul>
                    </li>
                @endcan
                @can('الاحصائيات')
                    <li class="{{ Request::segment(1)==='statistics' ? 'active' : null }}">
                        <a href="{{ url('/' . ($page = 'statistics')) }}">
                            <i data-feather="pie-chart"></i>
                            <span>الاحصائيات</span></a>
                    </li>
                @endcan
                @can('اضافة عقد استئجار')
                    <li class="{{ Request::segment(2)==='contract_residential' || Request::segment(2)==='contract_commercial' ? 'active' : null }}" >
                        <a href="{{ route('contract_residential') }}"><i data-feather="clipboard"></i>  <span>اضافة عقد
                                استئجار</span></a>
                    </li>
                @endcan
                @can('حركة الاستئجار')
                    <li class="{{ Request::segment(2)==='contract_effictive' || Request::segment(2)==='contract_finished'|| Request::segment(2)==='contract_details'  ? 'active' : null }}">
                        <a href="{{ route('contract_effictive') }}"><i data-feather="grid"></i> <span>حركة
                                الاستئجار</span></a>
                    </li>
                @endcan
                @can('ادارة العقارات')
                    <li class="{{ Request::segment(2)==='realties' || Request::segment(2)==='rented_units'|| Request::segment(2)==='empty_units'||Request::segment(2)==='site_units'||Request::segment(2)==='realty_units_show' ? 'active' : null }}">
                        <a href="{{ url('/' . ($page = 'Admin/realties')) }}"><i data-feather="package"></i><span>ادارة
                                العقارات</span></a>
                    </li>
                @endcan
                @can('ادارة المستأجرين')
                    <li class="{{ Request::segment(2)==='tenants' || Request::segment(2)==='archive_tenants'|| Request::segment(2)==='tenant_details' ? 'active' : null }}">
                        <a href="{{ url('/' . ($page = 'Admin/tenants')) }}"><i data-feather="users"></i> <span>ادارة
                                المستأجرين</span></a>
                    </li>
                @endcan
                @can('حركة التأجير')
                    <li class="{{ Request::segment(2)==='effictive' || Request::segment(2)==='finished'|| Request::segment(2)==='receives_reports'? 'active' : null }}">
                        <a href="{{ url('/' . ($page = 'Admin/effictive')) }}"><i data-feather="bar-chart-2"></i> <span>حركة
                                التأجير</span></a>
                    </li>
                @endcan
                @can('طلبات الصيانة')
                    <li class="{{ Request::segment(2)==='wait_request' || Request::segment(2)==='accept_requests'|| Request::segment(2)==='maintenance_payments' ? 'active' : null }}" >
                        <a href="{{ url('/' . ($page = 'Admin/wait_request')) }}"><i data-feather="star"></i> <span>طلبات
                                الصيانة</span></a>
                    </li>
                @endcan
                @can('السجل المالي')
                    <li class="{{ Request::segment(2)==='proceeds' || Request::segment(2)==='receivables'|| Request::segment(2)==='realties_proceeds'? 'active' : null }}">
                        <a href="{{ url('/' . ($page = 'Admin/proceeds')) }}"><i data-feather="credit-card"></i> <span>السجل
                                المالي</span></a>
                    </li>
                @endcan
                @can('اعدادات الحساب')
                    <li >

                        <a href="{{ url('/' . ($page = 'User/settings')) }}"><i data-feather="lock"></i>
                            <span>اعدادات الحساب</span></a>
                    </li>
                @endcan
                @can('اعدادات الادمن')
                    <li class="submenu" class="{{ Request::segment(2)==='roles' || Request::segment(2)==='users'|| Request::segment(2)==='Account_settings'|| Request::segment(2)==='site_data' ? 'active' : null }}">
                        <a href="#"><i data-feather="settings"></i> <span> الاعدادات </span> <span
                                class="menu-arrow"></span></a>
                        <ul>
                            <li><a href="{{ url('/' . ($page = 'Admin/roles')) }}">ادارة الصلاحيات</a></li>
                            <li><a href="{{ url('/' . ($page = 'Admin/users')) }}">ادارة المستخدمين</a></li>
                            <li><a href="{{ url('/' . ($page = 'Admin/Account_settings')) }}">اعدادات الموقع</a></li>
                             <li><a href="{{ url('/' . ($page = 'Admin/site_data')) }}">بيانات الموقع</a></li>
                        </ul>
                    </li>
                @endcan


            </ul>
        </div>
    </div>
</div>

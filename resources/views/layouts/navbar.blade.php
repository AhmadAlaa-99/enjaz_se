<!-- Navigation start -->
<nav class="navbar navbar-expand-lg custom-navbar">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ENJAZAdminNavbar" aria-controls="ENJAZAdminNavbar" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i></i>
						<i></i>
						<i></i>
					</span>
				</button>
				<div class="collapse navbar-collapse" id="ENJAZAdminNavbar">
					<ul class="navbar-nav">
<!--
                    @can(' المستأجر -   البيانات الايجارية')
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="appsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="icon-person nav-icon"></i>
								 البيانات الايجارية
							</a>
							<ul class="dropdown-menu" aria-labelledby="appsDropdown">
								<li>
									<a class="dropdown-item" href="{{ url('/' . $page='Tenant/owners/create') }}" > بيانات الوحدة</a>
								</li>
								<li>
									<a class="dropdown-item" href="{{ url('/' . $page='Tenant/leases') }}">بيانات العقد</a>
								</li>
							</ul>
						</li>
                         @endcan
                    -->
 @can('ادارة الاستئجار - الوسيط')
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="appsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="icon-home nav-icon"></i>
                                ادارة  الاستئجار

                             </a>
							<ul class="dropdown-menu" aria-labelledby="appsDropdown">
							<li>
									<a class="dropdown-item" href="" >اضافة  عقد</a>
                                    <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="layoutsDropdown">
										<li>


											<a class="dropdown-item" href="{{route('contract_residential') }}">سكني</a>
										</li>
										<li>
											<a class="dropdown-item" href="{{route('contract_commercial') }}">تجاري</a>
										</li>
                                    </ul>
								</li>
                                <li>
									<a class="dropdown-item" href="" >حركة الاستئجار</a>
                                    <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="layoutsDropdown">
										<li>
											<a class="dropdown-item" href="{{route('contract_effictive') }}">العقود الجارية</a>
										</li>
										<li>
											<a class="dropdown-item" href="{{route('contract_effictive') }}">العقود المنهية</a>
										</li>
                                    </ul>
								</li>


							</ul>
						</li>
                        @endcan

                        @can('ادارة العقارات - الوسيط')
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="appsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="icon-home nav-icon"></i>
								 ادارة العقارات
							</a>
							<ul class="dropdown-menu" aria-labelledby="appsDropdown">

								<li>
									<a class="dropdown-item" href="{{ url('/' . $page='Admin/realties') }}">المنشات العقارية</a>
								</li>
								<li>
									<a class="dropdown-toggle sub-nav-link" href="#" id="layoutsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										 الوحدات الايجارية
									</a>
									<ul class="dropdown-menu dropdown-menu-right" aria-labelledby="layoutsDropdown">
										<li>


											<a class="dropdown-item" href="{{ url('/' . $page='Admin/empty_units') }}">الشاغرة</a>
										</li>
										<li>
											<a class="dropdown-item" href="{{ url('/' . $page='Admin/rented_units') }}">المؤجرة</a>
										</li>
                                    </ul>
								</li>
							</ul>
						</li>
                        @endcan
@can( 'الوسيط العقاري -  ادارة المستأجرين'))

						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="appsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="icon-people nav-icon"></i>
								 ادارة المستأجرين
							</a>
							<ul class="dropdown-menu" aria-labelledby="appsDropdown">
								<li>
									<a class="dropdown-item" href="{{ url('/' . $page='Admin/tenants') }}">بيانات  المستأجرين</a>
								</li>
                                <li>
									<a class="dropdown-item" href="{{ url('/' . $page='Admin/archive_tenants') }}">بيانات الارشيف</a>
								</li>

							</ul>
						</li>
                        @endcan
                         @can('حركة التأجير - الوسيط العقاري')

						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="appsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="icon-pencil nav-icon"></i>
								   حركة التأجير
							</a>
							<ul class="dropdown-menu" aria-labelledby="appsDropdown">
                                          <li>
										<a class="dropdown-item" href="{{ url('/' . $page='Admin/effictive') }}">العقود الجارية</a>
										</li>
										<li>
											<a class="dropdown-item" href="{{ url('/' . $page='Admin/finished') }}">العقود المنتهية</a>
										</li>
                                        <li>
                                        <a class="dropdown-item" href="{{ url('/' . $page='Admin/receives_reports') }}">تقارير التسليم</a>										</li>

							</ul>
						</li>
                        @endcan






                            @can('طلبات الصيانة - الوسيط')
                            	<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="appsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="icon-refresh nav-icon"></i>
								  طلبات الصيانة
							</a>
							<ul class="dropdown-menu" aria-labelledby="appsDropdown">
                                <li>
									<a class="dropdown-item" href="{{ url('/' . $page='Admin/wait_request') }}">الطلبات الجديدة</a>
								</li>
								<li>
									<a class="dropdown-item"  href="{{ url('/' . $page='Admin/accept_requests') }}">الطلبات المنجزة </a>
								</li>
                                <li>
                                <a class="dropdown-item" href="{{ url('/' . $page='Admin/maintenance_payments') }}">مدفوعات الصيانة</a>
								</li>
                                       	</ul>
						</li>
                                @endcan


                               @can('الصيانة - المستأجر')
                               	<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="appsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="icon-refresh nav-icon"></i>
								  طلبات الصيانة
							</a>
							<ul class="dropdown-menu" aria-labelledby="appsDropdown">

                                <li>
									<a class="dropdown-item" href="{{ url('/' . $page='Tenant/request_form') }}">ارسال الطلب</a>
								</li>
                                <li>
									<a class="dropdown-item" href="{{ url('/' . $page='Tenant/maints_requests') }}">طلباتي</a>
								</li>

							</ul>
						</li>
                              @endcan
                         @can(' السجل المالي- الوسيط')
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="appsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="icon-attach_money nav-icon"></i>
								    السجل المالي
							</a>


							<ul class="dropdown-menu" aria-labelledby="appsDropdown">
                                    <li>
                                             <a class="dropdown-item" href="{{ url('/' . $page='Admin/proceeds') }}">الواردات المالية</a>
									</li>
									<li>
                                           <a class="dropdown-item" href="{{ url('/' . $page='Admin/receivables') }}">الذمم المالية</a>
									</li>
                                    <li>
                                           <a class="dropdown-item" href="{{ url('/' . $page='Admin/realties_proceeds') }}">المنشأت العقارية</a>
									</li>
                                  <li>

							</ul>
						</li>
                        @endcan
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="appsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="icon-sync nav-icon"></i>
								     الاعدادات
							</a>
							<ul class="dropdown-menu" aria-labelledby="appsDropdown">
								<li>
                                    <!--
								<a class="dropdown-item" href="{{ url('/' . $page='Admin/tasks') }}">ادارة المهام</a>
-->                             @can('الاعدادات  - الوسيط')
                                <a class="dropdown-item" href="{{ url('/' . $page='Admin/roles') }}">ادارة الصلاحيات</a>
								<a class="dropdown-item" href="{{ url('/' . $page='Admin/users') }}">ادارة المستخدمين</a>
                                <a class="dropdown-item" href="{{ url('/' . $page='Admin/statistics') }}">الاحصائيات</a>
                                <a class="dropdown-item" href="{{ url('/' . $page='Admin/Account_settings') }}">اعدادات الحساب</a>
                                @endcan

                                @can('الاعدادات المستأجر')
                                <a class="dropdown-item" href="{{ url('/' . $page='Tenant/leases') }}">بيانات العقد</a>
                                @endcan
                                <a class="dropdown-item" href="{{ url('/' . $page='profile') }}">الملف الشخصي</a>
								</li>
							</ul>
						</li>

					</ul>
				</div>
			</nav>
			<!-- Navigation end -->


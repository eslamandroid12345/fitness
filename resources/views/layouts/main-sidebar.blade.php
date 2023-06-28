<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg" style="overflow: scroll">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu item Dashboard-->
                    <li>


                    </li>
                    <!-- menu title -->
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">{{trans('sidebar.dashboard')}}</li>

                    {{--start--}}
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#booking">
                            <div class="pull-left"><i class="fas fa-cogs"></i><span
                                    class="right-nav-t">{{trans('sidebar.setting')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="booking" class="collapse" data-parent="#sidebarnav">

                            <li><a  href="{{route('setting.index')}}">{{trans('sidebar.setting_app')}}</a></li>

                        </ul>

                    </li>
                    {{--end--}}



                    {{--start--}}
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#plans">
                            <div class="pull-left"><i class="fas fa-money"></i><span
                                        class="right-nav-t">{{trans('sidebar.plans')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="plans" class="collapse" data-parent="#sidebarnav">

                            <li><a  href="{{route('programs.index')}}">{{trans('sidebar.all_plans')}}</a></li>
                            <li><a href="{{route('programs.create')}}">{{trans('sidebar.add_new_plans')}}</a></li>

                        </ul>

                    </li>
                    {{--end--}}


                    {{--start--}}
{{--                    <li>--}}
{{--                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#weeks">--}}
{{--                            <div class="pull-left"><i class="fas fa-calendar-check-o"></i><span--}}
{{--                                        class="right-nav-t">{{trans('sidebar.weeks')}}</span></div>--}}
{{--                            <div class="pull-right"><i class="ti-plus"></i></div>--}}
{{--                            <div class="clearfix"></div>--}}
{{--                        </a>--}}
{{--                        <ul id="weeks" class="collapse" data-parent="#sidebarnav">--}}

{{--                            <li><a  href="#">{{trans('sidebar.all_weeks')}}</a></li>--}}
{{--                            <li><a  href="#">{{trans('sidebar.add_new_week')}}</a></li>--}}

{{--                        </ul>--}}


{{--                    </li>--}}
                    {{--end--}}


                    {{--start--}}
{{--                    <li>--}}
{{--                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#days">--}}
{{--                            <div class="pull-left"><i class="fas fa-calendar"></i><span--}}
{{--                                        class="right-nav-t">{{trans('sidebar.days')}}</span></div>--}}
{{--                            <div class="pull-right"><i class="ti-plus"></i></div>--}}
{{--                            <div class="clearfix"></div>--}}
{{--                        </a>--}}
{{--                        <ul id="days" class="collapse" data-parent="#sidebarnav">--}}

{{--                            <li><a  href="#">{{trans('sidebar.all_days')}}</a></li>--}}
{{--                            <li><a  href="#">{{trans('sidebar.add_new_day')}}</a></li>--}}

{{--                        </ul>--}}


{{--                    </li>--}}
                    {{--end--}}



                    {{--start--}}
{{--                    <li>--}}
{{--                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#exercises">--}}
{{--                            <div class="pull-left"><i class="fas fa-random"></i><span--}}
{{--                                        class="right-nav-t">{{trans('sidebar.exercises')}}</span></div>--}}
{{--                            <div class="pull-right"><i class="ti-plus"></i></div>--}}
{{--                            <div class="clearfix"></div>--}}
{{--                        </a>--}}
{{--                        <ul id="exercises" class="collapse" data-parent="#sidebarnav">--}}

{{--                            <li><a  href="#">{{trans('sidebar.all_exercises')}}</a></li>--}}
{{--                            <li><a  href="#">{{trans('sidebar.add_new_exercise')}}</a></li>--}}

{{--                        </ul>--}}


{{--                    </li>--}}
                    {{--end--}}



                    {{--start--}}
{{--                    <li>--}}
{{--                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#exercises-program">--}}
{{--                            <div class="pull-left"><i class="fas fa-random"></i><span--}}
{{--                                        class="right-nav-t">{{trans('sidebar.exercise_programs')}}</span></div>--}}
{{--                            <div class="pull-right"><i class="ti-plus"></i></div>--}}
{{--                            <div class="clearfix"></div>--}}
{{--                        </a>--}}
{{--                        <ul id="exercises-program" class="collapse" data-parent="#sidebarnav">--}}

{{--                            <li><a  href="#">{{trans('sidebar.all_exercise_programs')}}</a></li>--}}
{{--                            <li><a  href="#">{{trans('sidebar.add_new_exercise_program')}}</a></li>--}}

{{--                        </ul>--}}


{{--                    </li>--}}
                    {{--end--}}




                    {{--start--}}
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#users">
                            <div class="pull-left"><i class="fas fa-users"></i><span
                                        class="right-nav-t">{{trans('sidebar.clients')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="users" class="collapse" data-parent="#sidebarnav">

                            <li><a  href="#">{{trans('sidebar.all_clients')}}</a></li>

                        </ul>

                    </li>
                    {{--end--}}


                    {{--start--}}
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#admins">
                            <div class="pull-left"><i class="fas fa-user-circle"></i><span
                                        class="right-nav-t">{{trans('sidebar.dashboard_employees')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="admins" class="collapse" data-parent="#sidebarnav">

                            <li><a  href="#">{{trans('sidebar.all_employees')}}</a></li>
                            <li><a  href="#">{{trans('sidebar.add_new_employee')}}</a></li>

                        </ul>

                    </li>
                    {{--end--}}


                    {{--start--}}
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#subscribes">
                            <div class="pull-left"><i class="fas fa-paper-plane"></i><span
                                        class="right-nav-t">{{trans('sidebar.clients_subscribes')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="subscribes" class="collapse" data-parent="#sidebarnav">

                            <li><a  href="{{route('admin.user.subscribes')}}">{{trans('sidebar.subscribes')}}</a></li>

                        </ul>

                    </li>
                    {{--end--}}



                    {{--start--}}
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#contacts">
                            <div class="pull-left"><i class="fas fa-phone-square"></i><span
                                        class="right-nav-t">{{trans('sidebar.all_contacts')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="contacts" class="collapse" data-parent="#sidebarnav">

                            <li><a  href="{{route('admin.contacts')}}">{{trans('sidebar.all_problems')}}</a></li>

                        </ul>

                    </li>
                    {{--end--}}



                    {{--start--}}
{{--                    <li>--}}
{{--                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#payments">--}}
{{--                            <div class="pull-left"><i class="fas fa-save"></i><span--}}
{{--                                        class="right-nav-t">{{trans('sidebar.payment_transactions')}}</span></div>--}}
{{--                            <div class="pull-right"><i class="ti-plus"></i></div>--}}
{{--                            <div class="clearfix"></div>--}}
{{--                        </a>--}}
{{--                        <ul id="payments" class="collapse" data-parent="#sidebarnav">--}}

{{--                            <li><a  href="#">{{trans('sidebar.all_payment_transactions')}}</a></li>--}}

{{--                        </ul>--}}

{{--                    </li>--}}
                    {{--end--}}

                    <!-- sections-->


                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->


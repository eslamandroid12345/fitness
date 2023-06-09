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
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">لوحه التحكم الخاصه بالادمن</li>

                    {{--start--}}
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#booking">
                            <div class="pull-left"><i class="fas fa-cogs"></i><span
                                    class="right-nav-t">الاعدادات</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="booking" class="collapse" data-parent="#sidebarnav">

                            <li><a  href="#">اعدادات التطبيق</a></li>

                        </ul>

                    </li>
                    {{--end--}}



                    {{--start--}}
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#programs">
                            <div class="pull-left"><i class="fas fa-flash"></i><span
                                        class="right-nav-t">البرامج</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="programs" class="collapse" data-parent="#sidebarnav">

                            <li><a  href="#">جميع البرامج</a></li>
                            <li><a  href="#">اضافه برنامج جديد</a></li>

                        </ul>


                    </li>
                    {{--end--}}



                    {{--start--}}
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#weeks">
                            <div class="pull-left"><i class="fas fa-calendar-check-o"></i><span
                                        class="right-nav-t">الاسابيع</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="weeks" class="collapse" data-parent="#sidebarnav">

                            <li><a  href="#">جميع الاسابيع</a></li>
                            <li><a  href="#">اضافه اسبوع</a></li>

                        </ul>


                    </li>
                    {{--end--}}


                    {{--start--}}
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#days">
                            <div class="pull-left"><i class="fas fa-calendar"></i><span
                                        class="right-nav-t">الايام</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="days" class="collapse" data-parent="#sidebarnav">

                            <li><a  href="#">جميع الايام</a></li>
                            <li><a  href="#">اضافه يوم</a></li>

                        </ul>


                    </li>
                    {{--end--}}



                    {{--start--}}
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#exercises">
                            <div class="pull-left"><i class="fas fa-random"></i><span
                                        class="right-nav-t">التمارين</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="exercises" class="collapse" data-parent="#sidebarnav">

                            <li><a  href="#">جميع التمارين</a></li>
                            <li><a  href="#">اضافه تمرين جديد</a></li>

                        </ul>


                    </li>
                    {{--end--}}



                    {{--start--}}
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#exercises-program">
                            <div class="pull-left"><i class="fas fa-random"></i><span
                                        class="right-nav-t">تمارين البرامج</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="exercises-program" class="collapse" data-parent="#sidebarnav">

                            <li><a  href="#">جميع تمارين البرامج</a></li>
                            <li><a  href="#">اضافه تمرين للبرنامج</a></li>

                        </ul>


                    </li>
                    {{--end--}}


                    {{--start--}}
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#plans">
                            <div class="pull-left"><i class="fas fa-money"></i><span
                                        class="right-nav-t">الخطط</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="plans" class="collapse" data-parent="#sidebarnav">

                            <li><a  href="#">جميع الخطط</a></li>
                            <li><a  href="#">اضافه خطه جديد</a></li>

                        </ul>

                    </li>
                    {{--end--}}

                    {{--start--}}
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#users">
                            <div class="pull-left"><i class="fas fa-users"></i><span
                                        class="right-nav-t">العملاء</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="users" class="collapse" data-parent="#sidebarnav">

                            <li><a  href="#">جميع العملاء</a></li>

                        </ul>

                    </li>
                    {{--end--}}


                    {{--start--}}
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#admins">
                            <div class="pull-left"><i class="fas fa-user-circle"></i><span
                                        class="right-nav-t">موظفين لوحه التحكم</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="admins" class="collapse" data-parent="#sidebarnav">

                            <li><a  href="#">جميع الموظفين</a></li>
                            <li><a  href="#">اضافه موظف جديد</a></li>

                        </ul>

                    </li>
                    {{--end--}}


                    {{--start--}}
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#subscribes">
                            <div class="pull-left"><i class="fas fa-paper-plane"></i><span
                                        class="right-nav-t">اشتراكات العملاء</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="subscribes" class="collapse" data-parent="#sidebarnav">

                            <li><a  href="#">جميع الاشتراكات</a></li>

                        </ul>

                    </li>
                    {{--end--}}



                    {{--start--}}
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#contacts">
                            <div class="pull-left"><i class="fas fa-phone-square"></i><span
                                        class="right-nav-t">تواصل معنا</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="contacts" class="collapse" data-parent="#sidebarnav">

                            <li><a  href="#">جميع الشكاوي</a></li>

                        </ul>

                    </li>
                    {{--end--}}



                    {{--start--}}
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#payments">
                            <div class="pull-left"><i class="fas fa-save"></i><span
                                        class="right-nav-t">حركات الدفع</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="payments" class="collapse" data-parent="#sidebarnav">

                            <li><a  href="#">جميع حركات الدفع</a></li>

                        </ul>

                    </li>
                    {{--end--}}

                    <!-- sections-->


                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->


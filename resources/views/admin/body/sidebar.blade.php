<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" data-key="t-menu">Menu</li>

                <li>
                    <a href="{{ route('admin.dashboard') }}">
                        <i data-feather="home"></i>
                        <span data-key="t-dashboard">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="grid"></i>
                        <span data-key="t-apps">Category</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{ route('all.category') }}">
                                <span data-key="t-calendar">All Category</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('add.category') }}">
                                <span data-key="t-chat">Add Category</span>
                            </a>
                        </li>

                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="grid"></i>
                        <span data-key="t-apps">City</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{ route('all.city') }}">
                                <span data-key="t-calendar">All City</span>
                            </a>
                        </li>
                    </ul>
                </li>


                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="grid"></i>
                        <span data-key="t-apps">Manage Product</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{ route('admin.all.product') }}">
                                <span data-key="t-calendar">All Product</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('admin.add.product') }}">
                                <span data-key="t-chat">Add Product</span>
                            </a>
                        </li>

                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="grid"></i>
                        <span data-key="t-apps">Manage Restraurant</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{ route('pending.restraurant') }}">
                                <span data-key="t-calendar">Pending Restraurant</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('approve.restraurant') }}">
                                <span data-key="t-chat">Approve Restraurant</span>
                            </a>
                        </li>

                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="grid"></i>
                        <span data-key="t-apps">Manage Banner</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{ route('all.banner') }}">
                                <span data-key="t-calendar">All Banner</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="grid"></i>
                        <span data-key="t-apps">Manage Orders</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{ route('pending.order') }}">
                                <span data-key="t-calendar">Pending Order</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('confirm.order') }}">
                                <span data-key="t-calendar">Confirm Order</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('processing.order') }}">
                                <span data-key="t-calendar">Processing Order</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('deliverd.order') }}">
                                <span data-key="t-calendar">Deliverd Order</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="grid"></i>
                        <span data-key="t-apps">Manage Reports</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{ route('admin.all.report') }}">
                                <span data-key="t-calendar">All Report</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="grid"></i>
                        <span data-key="t-apps">Manage Review</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{ route('admin.pending.review') }}">
                                <span data-key="t-calendar">Pending Review</span>
                            </a>

                            <a href="{{ route('admin.approve.review') }}">
                                <span data-key="t-calendar">Approve Review</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="grid"></i>
                        <span data-key="t-apps">Role & Permission</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{ route('all.permission') }}">
                                <span data-key="t-calendar">All Permission</span>
                            </a>

                            <a href="{{ route('all.roles') }}">
                                <span data-key="t-calendar">All Roles</span>
                            </a>

                            <a href="{{ route('add.roles.permission') }}">
                                <span data-key="t-calendar">Roles in Permission</span>
                            </a>

                            <a href="{{ route('all.roles.permission') }}">
                                <span data-key="t-calendar">All Roles in Permission</span>
                            </a>
                        </li>
                    </ul>
                </li>


                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="grid"></i>
                        <span data-key="t-apps">Manage Admin</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{ route('all.admin') }}">
                                <span data-key="t-calendar">All Admin</span>
                            </a>

                            <a href="{{ route('add.admin') }}">
                                <span data-key="t-calendar">Add Admin</span>
                            </a>

                        </li>
                    </ul>
                </li>

            </ul>

             <div class="card sidebar-alert border-0 text-center mx-4 mb-0 mt-5">
                <div class="card-body">
                    <img src="assets/images/giftbox.png" alt="">
                    <div class="mt-4">
                        <h5 class="alertcard-title font-size-16">Unlimited Access</h5>
                        <p class="font-size-13">Upgrade your plan from a Free trial, to select ‘Business Plan’.</p>
                    </div>
                </div>
            </div>

        </div>
        <!-- Sidebar -->
    </div>
</div>

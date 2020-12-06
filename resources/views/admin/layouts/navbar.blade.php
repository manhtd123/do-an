<div class="side-nav expand-lg">
    <div class="side-nav-inner">
        <ul class="side-nav-menu scrollable">
            <li class="side-nav-header">
                <span>Quản lí bán hàng</span>
            </li>
            <li class="nav-item dropdown open">
                <a class="dropdown-toggle" href="{{ route('admin.home') }}">
                    <span class="icon-holder">
                        <i class="fa fa-eye"></i>
                    </span>
                    <span class="title">Tổng quan</span>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i class="fa fa-cubes"></i>
                    </span>
                    <span class="title">Hàng hóa</span>
                    <span class="arrow">
                        <i class="mdi mdi-chevron-right"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="{{ route('category.index') }}">
                        <span class="icon-holder">
                            <i class="fa fa-newspaper-o"></i>
                        </span>Chủng loại</a>
                    </li>
                    <li>
                        <a href="{{ route('product.index') }}">
                        <span class="icon-holder">
                            <i class="fa fa-th"></i>
                        </span>Danh mục</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i class="fa fa-table"></i>
                    </span>
                    <span class="title">Phòng/bàn</span>
                    <span class="arrow">
                        <i class="mdi mdi-chevron-right"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="{{ route('table.index') }}">
                        <span class="icon-holder">
                            <i class="fa fa-table"></i>
                        </span>Bàn</a>
                    </li>
                    <li>
                        <a href="{{ route('tableGroup.index') }}">
                        <span class="icon-holder">
                            <i class="fa fa-undo"></i>
                        </span>Nhóm/tầng</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i class="fa fa-exchange"></i>
                    </span>
                    <span class="title">Giao dịch</span>
                    <span class="arrow">
                        <i class="mdi mdi-chevron-right"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="{{ route('billTable.index') }}">
                        <span class="icon-holder">
                            <i class="fa fa-calendar-o"></i>
                        </span>Hóa đơn bàn</a>
                    </li>
                    <li>
                        <a href="{{ route('dealProduct.index') }}">
                        <span class="icon-holder">
                            <i class="fa fa-wpforms"></i>
                        </span>Hóa đơn nhập hàng</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i class="fa fa-male"></i>
                    </span>
                    <span class="title">Đối tác</span>
                    <span class="arrow">
                        <i class="mdi mdi-chevron-right"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="{{ route('customer.index') }}">
                        <span class="icon-holder">
                            <i class="fa fa-user-circle"></i>
                        </span>Khách hàng</a>
                    </li>
                    <li>
                        <a href="{{ route('producer.index') }}">
                        <span class="icon-holder">
                            <i class="fa fa-undo"></i>
                        </span>Nhà cung cấp</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i class="fa fa-bar-chart"></i>
                    </span>
                    <span class="title">Báo cáo</span>
                    <span class="arrow">
                        <i class="mdi mdi-chevron-right"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="{{ route('admin.sell') }}">
                        <span class="icon-holder">
                            <i class="fa fa-file-o"></i>
                        </span>Bán hàng</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.products') }}">
                        <span class="icon-holder">
                            <i class="fa fa-cubes"></i>
                        </span>Hàng hóa</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.producers') }}">
                        <span class="icon-holder">
                            <i class="fa fa-undo"></i>
                        </span>Nhà cung cấp</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.customers') }}">
                        <span class="icon-holder">
                            <i class="fa fa-user-circle"></i>
                        </span>Khách hàng</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.employee') }}">
                        <span class="icon-holder">
                            <i class="fa fa-male"></i>
                        </span>Nhân viên</a>
                    </li>
                </ul>
            </li>
            <li class="side-nav-header">
                <span>Quản lí hệ thống</span>
            </li>
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i class="fa fa-male"></i>
                    </span>
                    <span class="title">Quản lí người dùng</span>
                    <span class="arrow">
                        <i class="mdi mdi-chevron-right"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="{{ route('department.index') }}">
                        <span class="icon-holder">
                            <i class="fa fa-users"></i>
                        </span>Bộ phận</a>
                    </li>
                    <li>
                        <a href="{{ route('user.index') }}">
                        <span class="icon-holder">
                            <i class="fa fa-user-circle-o"></i>
                        </span>Tài khoản</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
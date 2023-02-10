<div class="br-logo"><a href=""><span>[</span>bracket <i>plus</i><span>]</span></a></div>
    <div class="br-sideleft sideleft-scrollbar">
        <ul class="br-sideleft-menu">
            <li class="br-menu-item">
                <a href="{{ route('dashboard') }}" class="br-menu-link active">
                    <i class="menu-item-icon icon ion-ios-home-outline tx-24"></i>
                    <span class="menu-item-label">Dashboard</span>
                </a>
            <label class="sidebar-label pd-x-10 mg-t-25 mg-b-20 tx-info">Car Listing</label>
            </li><!-- br-menu-item -->
            <li class="br-menu-item">
                <a href="#" class="br-menu-link with-sub @if (Route::is('brand.manage') || Route::is('brand.create') || Route::is('brand.edit'))
                    active
                @endif">
                    <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
                    <span class="menu-item-label">Brands</span>
                </a><!-- br-menu-link -->
                <ul class="br-menu-sub">
                    <li class="sub-item"><a href="{{ route('brand.create') }}" class="sub-link @if (Route::is('brand.create'))
                        active
                    @endif">Add New Brand</a></li>
                    <li class="sub-item"><a href="{{ route('brand.manage') }}" class="sub-link @if (Route::is('brand.manage'))
                        active
                    @endif">Manage All Brands</a></li>
                </ul>
            </li>
            <li class="br-menu-item">
                <a href="#" class="br-menu-link with-sub @if (Route::is('car.manage') || Route::is('car.create') || Route::is('car.edit'))
                    active
                @endif">
                    <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
                    <span class="menu-item-label">Cars</span>
                </a><!-- br-menu-link -->
                <ul class="br-menu-sub">
                    <li class="sub-item"><a href="{{ route('car.create') }}" class="sub-link @if (Route::is('car.create'))
                        active
                    @endif">Add New Car</a></li>
                    <li class="sub-item"><a href="{{ route('car.manage') }}" class="sub-link @if (Route::is('car.manage'))
                        active
                    @endif">Manage All Cars</a></li>
                </ul>
            </li>
            <label class="sidebar-label pd-x-10 mg-t-25 mg-b-20 tx-info">Additional Packages</label>
            <li class="br-menu-item">
                <a href="#" class="br-menu-link with-sub @if (Route::is('extra.manage') || Route::is('extra.create') || Route::is('extra.edit'))
                    active
                @endif">
                    <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
                    <span class="menu-item-label">Extras</span>
                </a><!-- br-menu-link -->
                <ul class="br-menu-sub">
                    <li class="sub-item"><a href="{{ route('extra.create') }}" class="sub-link @if (Route::is('extra.create'))
                        active
                    @endif">Add New Extra</a></li>
                    <li class="sub-item"><a href="{{ route('extra.manage') }}" class="sub-link @if (Route::is('extra.manage'))
                        active
                    @endif">Manage All Extras</a></li>
                </ul>
            </li>
            <li class="br-menu-item">
                <a href="#" class="br-menu-link with-sub @if (Route::is('protection.manage') || Route::is('protection.create') || Route::is('protection.edit'))
                    active
                @endif">
                    <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
                    <span class="menu-item-label">Protetions</span>
                </a><!-- br-menu-link -->
                <ul class="br-menu-sub">
                    <li class="sub-item"><a href="{{ route('protection.create') }}" class="sub-link @if (Route::is('protection.create'))
                        active
                    @endif">Add New Protection</a></li>
                    <li class="sub-item"><a href="{{ route('protection.manage') }}" class="sub-link @if (Route::is('protection.manage'))
                        active
                    @endif">Manage All Protections</a></li>
                </ul>
            </li>
            {{-- <li class="br-menu-item">
                <a href="mailbox.html" class="br-menu-link">
                    <i class="menu-item-icon icon ion-ios-email-outline tx-24"></i>
                    <span class="menu-item-label">Mailbox</span>
                </a><!-- br-menu-link --> --}}
            </li><!-- br-menu-item -->

            <label class="sidebar-label pd-x-10 mg-t-25 mg-b-20 tx-info">Location Management</label>
            {{-- Division --}}
            <li class="br-menu-item">
                <a href="#" class="br-menu-link with-sub
                @if (Route::is('division.manage') || Route::is('division.create') || Route::is('division.edit'))
                active
                @endif
                ">
                    <i class="menu-item-icon icon ion-ios-world-outline tx-20"></i>
                    <span class="menu-item-label">Division</span>
                </a>
                <ul class="br-menu-sub">
                    <li class="sub-item"><a href="{{ route('division.create') }}" class="sub-link @if (Route::is('division.create')) active @endif ">Add New Division</a></li>
                    <li class="sub-item"><a href="{{ route('division.manage') }}" class="sub-link @if (Route::is('division.manage')) active @endif ">Manage All Divisions</a></li>
                </ul>
            </li>
            {{-- District --}}
            <li class="br-menu-item">
                <a href="#" class="br-menu-link with-sub
                @if (Route::is('district.manage') || Route::is('district.create') || Route::is('district.edit'))
                active
                @endif
                ">
                    <i class="menu-item-icon icon ion-ios-world-outline tx-20"></i>
                    <span class="menu-item-label">District</span>
                </a>
                <ul class="br-menu-sub">
                    <li class="sub-item"><a href="{{ route('district.create') }}" class="sub-link @if (Route::is('district.create')) active @endif ">Add New District</a></li>
                    <li class="sub-item"><a href="{{ route('district.manage') }}" class="sub-link @if (Route::is('district.manage')) active @endif ">Manage All Districts</a></li>
                </ul>
            </li>
        </ul><!-- br-sideleft-menu -->

        
        <label class="sidebar-label pd-x-10 mg-t-25 mg-b-20 tx-info">Order Management</label>

        <li class="br-menu-item">
            <a href="{{ route('order.manage') }}" class="br-menu-link 
            @if (Route::is('order.manage') || Route::is('order.details') || Route::is('order.edit'))
            active
            @endif
            ">
                <i class="menu-item-icon icon ion-ios-printer-outline tx-24"></i>
                <span class="menu-item-label">Manage All Orders</span>
            </a>
        </li>

        <label class="sidebar-label pd-x-10 mg-t-25 mg-b-20 tx-info">Manage CMS</label>
        <li class="br-menu-item">
            <a href="#" class="br-menu-link with-sub
                @if (Route::is('customer.manage') || Route::is('customer.create') || Route::is('customer.edit'))
                    active
                @endif
            ">
                <i class="menu-item-icon icon ion-ios-people-outline tx-20"></i>
                <span class="menu-item-label">Customers</span>
            </a><!-- br-menu-link -->
            <ul class="br-menu-sub">
                <li class="sub-item"><a href="{{ route('customer.create') }}" class="sub-link @if (Route::is('customer.create'))
                    active
                @endif">Add New Customer</a></li>
                <li class="sub-item"><a href="{{ route('customer.manage') }}" class="sub-link @if (Route::is('customer.manage'))
                    active
                @endif">Manage All Customers</a></li>
            </ul>
        </li>

        <label class="sidebar-label pd-x-10 mg-t-25 mg-b-20 tx-info">Subscribers</label>
        <li class="br-menu-item">
            <a href="{{ route('subscriber.manage') }}" class="br-menu-link
                @if (Route::is('subscriber.manage'))
                    active
                @endif
            ">
                <i class="menu-item-icon icon ion-ios-email-outline tx-24"></i>
                <span class="menu-item-label">Subsribers Overview</span>
            </a><!-- br-menu-link -->
        </li>

        <label class="sidebar-label pd-x-10 mg-t-25 mg-b-20 tx-info">Global Settings</label>
        {{-- Settings --}}
        <li class="br-menu-item">
            <a href="#" class="br-menu-link with-sub
            @if (Route::is('setting.manage') || Route::is('setting.edit'))
            active
            @endif
            ">
                <i class="menu-item-icon icon ion-ios-settings tx-20"></i>
                <span class="menu-item-label">Web Settiings</span>
            </a>
            <ul class="br-menu-sub">
                <li class="sub-item"><a href="{{ route('setting.manage') }}" class="sub-link @if (Route::is('setting.manage')) active @endif ">Manage Settings</a></li>
            </ul>
        </li>
        <br>
</div><!-- br-sideleft -->
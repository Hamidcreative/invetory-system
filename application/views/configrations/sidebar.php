
<aside class="sidenav-main nav-expanded nav-lock nav-collapsible sidenav-dark sidenav-active-rounded">
    <div class="brand-sidebar">
        <h1 class="logo-wrapper"><a class="brand-logo darken-1" href="index.html"><!--<img src="<?/*=base_url()*/?>assets/images/logo/materialize-logo.png" alt=""/>--><span class="logo-text hide-on-med-and-down">Inventory System</span></a><a class="navbar-toggler" href="#"><i class="material-icons">radio_button_checked</i></a></h1>
    </div>
    <ul class="sidenav sidenav-collapsible leftside-navigation collapsible sidenav-fixed menu-shadow" id="slide-out" data-menu="menu-navigation" data-collapsible="accordion">
        <li class="bold"><a class="waves-effect waves-cyan " href="<?=base_url('dashboard')?>"><i class="material-icons">settings_input_svideo</i><span class="menu-title" data-i18n="">Dashboard</span></a></li>
        <li class="bold">
            <a class="collapsible-header waves-effect waves-cyan " href="#"><i class="material-icons">face</i><span class="menu-title" data-i18n="">Users</span></a>
            <div class="collapsible-body">
                <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                    <li><a class="collapsible-body" href="<?=base_url('users')?>" data-i18n=""><i class="material-icons">radio_button_unchecked</i><span> Users</span></a></li>
                    <li><a class="collapsible-body" href="<?=base_url('user/add')?>" data-i18n=""><i class="material-icons">radio_button_unchecked</i><span>Add user</span></a></li>
                </ul>
            </div>
        </li>
        <li class="bold">
            <a class="collapsible-header waves-effect waves-cyan " href="#"><i class="material-icons">local_grocery_store</i><span class="menu-title" data-i18n="">Warehouses</span></a>
            <div class="collapsible-body">
                <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                    <li><a class="collapsible-body" href="<?= base_url('warehouse')?>" data-i18n=""><i class="material-icons">radio_button_unchecked</i><span> Warehouses</span></a></li>
                    <li><a class="collapsible-body" href="<?= base_url('warehouse/add')?>" data-i18n=""><i class="material-icons">radio_button_unchecked</i><span>Add Warehouse</span></a></li>
                </ul>
            </div>
        </li>
        <li class="bold">
            <a class="collapsible-header waves-effect waves-cyan " href="#"><i class="material-icons">local_grocery_store</i><span class="menu-title" data-i18n="">Warehouse Types</span></a>
            <div class="collapsible-body">
                <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                    <li><a class="collapsible-body" href="<?= base_url('warehouse/types')?>" data-i18n=""><i class="material-icons">radio_button_unchecked</i><span> Warehouse Types</span></a></li>
                    <li><a class="collapsible-body" href="<?= base_url('warehouse/types/add')?>" data-i18n=""><i class="material-icons">radio_button_unchecked</i><span>Add Warehouse Type</span></a></li>
                </ul>
            </div>
        </li>
        <li class="bold">
            <a class="collapsible-header waves-effect waves-cyan " href="#"><i class="material-icons">photo_filter</i><span class="menu-title" data-i18n="">Spare Parts</span></a>
            <div class="collapsible-body">
                <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                    <li><a class="collapsible-body" href="<?= base_url('inventory')?>" data-i18n=""><i class="material-icons">radio_button_unchecked</i><span>Spare Parts</span></a></li>
                    <li><a class="collapsible-body" href="<?= base_url('inventory/add')?>" data-i18n=""><i class="material-icons">radio_button_unchecked</i><span> Add Spare Part</span></a></li>
                </ul>
            </div>
        </li>
        <li class="bold">
            <a class="collapsible-header waves-effect waves-cyan " href="#"><i class="material-icons">photo_filter</i><span class="menu-title" data-i18n="">Spare Parts Types</span></a>
            <div class="collapsible-body">
                <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                    <li><a class="collapsible-body" href="<?=base_url('inventory/types')?>" data-i18n=""><i class="material-icons">radio_button_unchecked</i><span>Spare Parts Types</span></a></li>
                    <li><a class="collapsible-body" href="<?=base_url('inventory/types/add')?>" data-i18n=""><i class="material-icons">radio_button_unchecked</i><span> Add Spare Part type </span></a></li>
                </ul>
            </div>
        </li>
        <li class="bold">
            <a class="collapsible-header waves-effect waves-cyan " href="#"><i class="material-icons">description</i><span class="menu-title" data-i18n="">Reports</span></a>
            <div class="collapsible-body">
                <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                    <li><a class="collapsible-body" href="#" data-i18n=""><i class="material-icons">radio_button_unchecked</i><span>Inventory Report</span></a></li>
                    <li><a class="collapsible-body" href="<?=base_url('reports')?>" data-i18n=""><i class="material-icons">radio_button_unchecked</i><span> User Report </span></a></li>
                </ul>
            </div>
        </li>
        <li class="bold"><a class="waves-effect waves-cyan " href="#"><i class="material-icons">settings</i><span class="menu-title" data-i18n="">Profile</span></a></li>

        <li class="bold"><a class="waves-effect waves-cyan " href="<?=base_url('auth/logout')?>"><i class="material-icons">power_settings_new</i><span class="menu-title" data-i18n="">Logout</span></a></li>
    </ul>
    <div class="navigation-background"></div><a class="sidenav-trigger btn-sidenav-toggle btn-floating btn-medium waves-effect waves-light hide-on-large-only" href="#" data-target="slide-out"><i class="material-icons">menu</i></a>
</aside>
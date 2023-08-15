<aside class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ asset('assets/images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">@lang("global.app.title")</h4>
        </div>
        <div class="toggle-icon ms-auto"> <i class="bi bi-list"></i></div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li class="{{ request()->is('admin/dashboard') || request()->is('admin/') ? 'mm-active' : '' }}">
            <a href="{{ route('admin.dashboard') }}">
                <div class="parent-icon"><i class="bi bi-house-fill"></i></div>
                <div class="menu-title">@lang('global.sidebar.dashboard')</div>
            </a>
        </li>
        <li class="{{ request()->is('Cashier/transaction/*') ? 'mm-active' : '' }}">
            <a href="{{ route('cashier.transaction.index') }}">
                <div class="parent-icon"><i class="lni lni-cart"></i></i></div>
                <div class="menu-title">@lang('global.transaction.transaction')</div>
            </a>
        </li>
        @if (!Auth::user()->can('isManager'))
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class="lni lni-database"></i></div>
                    <div class="menu-title">@lang('global.sidebar.master')</div>
                </a>
                <ul>
                    @can('isAccounting')
                        <li>
                            <a href="{{ route('accounting.accounts.index') }}"><i class="bi bi-circle {{ request()->is('accounting/accounts/*') ? 'mm-active' : '' }}"></i>@lang('global.account.title')</a>
                        </li>
                    @endcan
                    @can('isCashier')
                        <li>
                            <a href="{{ route('cashier.material.index') }}"><i class="bi bi-circle {{ request()->is('cahsier/material/*') ? 'mm-active' : '' }}"></i>@lang('global.material.title')</a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endif
        @if (!Auth::user()->can('isCashier'))
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class="lni lni-book"></i></div>
                    <div class="menu-title">Accounting</div>
                </a>
                <ul>
                    <li>
                        <a href="{{ route('accounting.journal.index') }}">
                            <i class="bi bi-circle {{ request()->is('accounting/journal/*') ? 'mm-active' : '' }}"></i>
                            @lang('global.journal.journal')
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('accounting.ledger.index') }}">
                            <i class="bi bi-circle {{ request()->is('accounting/ledger/*') ? 'mm-active' : '' }}"></i>
                            @lang('global.ledger.ledger')
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('accounting.trialbalance.index') }}">
                            <i class="bi bi-circle {{ request()->is('accounting/trialbalance/*') ? 'mm-active' : '' }}"></i>
                            @lang('global.trialbalance.trialbalance')
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('accounting.incomestatement.index') }}">
                            <i class="bi bi-circle {{ request()->is('accounting/incomestatement/*') ? 'mm-active' : '' }}"></i>
                            @lang('global.incomestatement.incomestatement')
                        </a>
                    </li>
                </ul>
            </li>
        @endif
        <li>
            <a href="{{ route('admin.auth.logout') }}"  onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                <div class="parent-icon"><i class="bx bx-log-out"></i></i></div>
                <div class="menu-title">@lang('global.app.logout')</div>
            </a>
            <form id="logout-form" action="{{ route('admin.auth.logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
    </ul>
    <!--end navigation-->
 </aside>

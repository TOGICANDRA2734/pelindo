<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <ul class="nav side-menu">
            @if (Auth::user()->role === 'admin' || Auth::user()->role === 'activator')
                <li>
                    <a><i class="fa fa-home"></i> Home </a>
                </li>
            @endif

            @if (auth::user()->role === 'kapal')
                <li>
                    <a href="#"><i class="fa fa-edit"></i> Ship Registration</a>
                </li>

                <li>
                    <a href="#"><i class="fa fa-edit"></i> Sync Data Ship</a>
                </li>

                <li>
                    <a href="#"><i class="fa fa-edit"></i> View Proximity</a>
                </li>
            @endif


            @if (Auth::user()->role === 'admin' || Auth::user()->role === 'activator')
                <li>
                    <a href="#"><i class="fa fa-edit"></i> Ship Registration</a>
                </li>
            @endif


            <li><a><i class="fa fa-table"></i> Master <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="tables.html">Company</a></li>
                    <li><a href="tables_dynamic.html">Master Ship</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-bar-chart-o"></i> Report <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    @if (auth::user()->role === 'kapal')
                        <li><a href="chartjs.html">Document Monitoring</a></li>
                    @elseif(Auth::user()->role === 'admin' || Auth::user()->role === 'activator')
                        <li><a href="chartjs.html">Ship Activity</a></li>
                        <li><a href="chartjs2.html">Ship Per Company</a></li>
                        <li><a href="morisjs.html">Ship Run Time</a></li>
                        <li><a href="echarts.html">TID Registration</a></li>
                        <li><a href="other_charts.html">TID Renewal</a></li>
                        <li><a href="other_charts.html">TID Damage/Lost</a></li>
                        <li><a href="other_charts.html">TID Per Category</a></li>
                        <li><a href="other_charts.html">Document Monitoring</a></li>
                        <li><a href="other_charts.html">Conditional Approval</a></li>
                    @endif

                </ul>
            </li>
        </ul>
    </div>
</div>

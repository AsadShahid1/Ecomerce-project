 <!-- sidebar menu -->
 <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <ul class="nav side-menu">
            <li><a href="{{route('dashboard')}}"><i class="fa fa-home"></i>Dashboard</a>
            </li>
            <hr style="background-color: silver; width :90%;">
            <li>
                <a href="{{route('order')}}"><i class="fa fa-shopping-cart"></i>Orders</a>
            </li>
            <li>
                <a href="{{route('userwishlist')}}"><i class="fa fa-heart"></i>Wishlists</a>
            </li>
            <li>
                <a href="/shop"><i class="fa fa-shopping-cart"></i>Shop Now</a>
            </li>
        </ul>
    </div>
    {{-- <div class="menu_section">
        <h3>Settings</h3>
        <hr style="background-color: silver ; width:90%;">
        <ul class="nav side-menu">
            <li><a><i class="fa fa-bug"></i> Website Setting <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{ route('setting.index')}}">View Setting <i class="fa fa-arrow-right "
                                style="float: right;"></i></a></li>
                </ul>
            </li>
        </ul>
    </div> --}}

</div>
<!-- /sidebar menu -->


</div>
</div>

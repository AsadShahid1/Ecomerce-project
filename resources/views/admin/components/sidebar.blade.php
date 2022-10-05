 <!-- sidebar menu -->
 <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
     <div class="menu_section">
         <ul class="nav side-menu">
             <li><a href="/adminpanel"><i class="fa fa-home"></i>Dashboard</a>
             </li>
             <hr style="background-color: silver; width :90%;">
             <li><a><i class="fa fa-user"></i> Manage Users <span class="fa fa-chevron-down"></span></a>
                 <ul class="nav child_menu">
                     <li><a href="{{route('users.index')}}">View Users <i class="fa fa-arrow-right "
                                 style="float: right;"></i></a></li>
                 </ul>
             </li>
             <li><a><i class="fa fa-shopping-basket"></i> Manage Categories <span class="fa fa-chevron-down"></span></a>
                 <ul class="nav child_menu">
                     <li><a href="{{route('category.index')}}">View Categories <i class="fa fa-arrow-right "
                                 style="float: right;"></i></a></li>
                 </ul>
             </li>

             <li><a><i class="	fa fa-apple"></i> Manage Brands <span class="fa fa-chevron-down"></span></a>
                 <ul class="nav child_menu">
                     <li><a href="{{route('brand.index')}}">View Brands <i class="fa fa-arrow-right "
                                 style="float: right;"></i></a></li>
                 </ul>
             </li>
             <li><a><i class="fa fa-product-hunt"></i> Manage Products <span class="fa fa-chevron-down"></span></a>
                 <ul class="nav child_menu">
                     <li><a href="{{ route('product.index') }}">View Products <i class="fa fa-arrow-right "
                                 style="float: right;"></i></a></li>
                     <li><a href="{{ route('product.create') }}">Add Products <i class="fa fa-arrow-right "
                                 style="float: right;"></i></a></li>
                 </ul>
             </li>
             <li><a><i class="fa fa-clone"></i> Manage Offers<span class="fa fa-chevron-down"></span></a>
                 <ul class="nav child_menu">
                     <li><a href="{{ route('offer.index') }}">View Offers <i class="fa fa-arrow-right "
                                 style="float: right;"></i></a></li>
                 </ul>
             </li>
             <li><a><i class="fa fa-shopping-cart"></i> Manage Orders<span class="fa fa-chevron-down"></span></a>
                 <ul class="nav child_menu">
                     <li><a href="{{ route('order.index') }}">View Orders <i class="fa fa-arrow-right "
                                 style="float: right;"></i></a></li>
                 </ul>
             </li>
         </ul>
     </div>
     <div class="menu_section">
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
     </div>

 </div>
 <!-- /sidebar menu -->

 <!-- /menu footer buttons -->
 <div class="sidebar-footer hidden-small">
     <a data-toggle="tooltip" data-placement="top" title="Settings" href="{{ route('setting.index') }}">
         <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
     </a>
     <a data-toggle="tooltip" data-placement="top" title="FullScreen">
         <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
     </a>
     <a data-toggle="tooltip" data-placement="top" title="Lock">
         <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
     </a>

     <!-- Authentication -->
     <form method="POST" action="{{ route('logout') }}">
         @csrf

         <x-dropdown-link :href="route('logout')"
             onclick="event.preventDefault();
                                  this.closest('form').submit();">
             <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
     </x-dropdown-link>
     </form>
     {{-- <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
          <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
        </a> --}}
 </div>
 <!-- /menu footer buttons -->
 </div>
 </div>

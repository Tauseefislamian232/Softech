<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="{{route('dashboard')}}">
          <i class="mdi mdi-view-dashboard menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('front-end')}}">
          <i class="mdi mdi-home menu-icon"></i>
          <span class="menu-title">Front End</span>
        </a>
      </li>
      {{-- <li class="nav-item nav-category"> Ajax Cruds</li> --}}
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <i class="menu-icon mdi mdi-floor-plan"></i>
          <span class="menu-title">Employee AJAX</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ url('add-employee') }}"> Add New Employee</a></li>
            {{-- <li class="nav-item"> <a class="nav-link" href="{{ route('') }}">Show Employees</a></li> --}}
        </div>
      </li>

      <li class="nav-item nav-category">Store MIS</li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#students" aria-expanded="false" aria-controls="auth">
          <i class="menu-icon mdi mdi-account-circle-outline"></i>
          <span class="menu-title">Products Details</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="students">
          <ul class="nav flex-column sub-menu">

            <li class="nav-item"> <a class="nav-link" href="{{route('add-product-category')}}">Product Category </a></li>
            {{-- <li class="nav-item"> <a class="nav-link" href="{{route('add-product')}}">List New Product </a></li> --}}
            <li class="nav-item"> <a class="nav-link" href="{{route('show-product')}}"> Show Product </a></li>
          </ul>
        </div>
      </li>

      <li class="nav-item nav-category">Users Details</li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
          <i class="menu-icon mdi mdi-account-circle-outline"></i>
          <span class="menu-title">User Pages</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="auth">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ route('add-user')}}"> Add User </a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('show-user')}}"> Show User </a></li>
            {{-- <li class="nav-item"> <a class="nav-link" href="admin/pages/samples/login.html"> Login </a></li> --}}
            <li class="nav-item"> <a class="nav-link" href="admin/pages/samples/login.html"> Login </a></li>
          </ul>
        </div>
      </li>

      <li class="nav-item nav-category">Laravel Joining</li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#joining" aria-expanded="false" aria-controls="auth">
          <i class="menu-icon mdi mdi-account-circle-outline"></i>
          <span class="menu-title">Laravel Eloquent Joining()</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="joining">
          <ul class="nav flex-column sub-menu">

            <li class="nav-item"> <a class="nav-link" href="{{route('innerjoin')}}">Inner Join </a></li>
            <li class="nav-item"> <a class="nav-link" href="{{route('leftjoin')}}"> Left Join </a></li>
            <li class="nav-item"> <a class="nav-link" href="{{route('rightjoin')}}"> Right Join </a></li>
            <li class="nav-item"> <a class="nav-link" href="{{route('crossjoin')}}"> Cross Join </a></li>
            <li class="nav-item"> <a class="nav-link" href="{{route('advancejoin')}}"> Advance Join </a></li>
          </ul>
        </div>
      </li>

      {{-- <li class="nav-item nav-category">help</li>
      <li class="nav-item">
        <a class="nav-link" href="http://bootstrapdash.com/demo/star-admin2-free/docs/documentation.html">
          <i class="menu-icon mdi mdi-file-document"></i>
          <span class="menu-title">Documentation</span>
        </a>
      </li> --}}
    </ul>
  </nav>

<aside class="aside is-placed-left is-expanded">
    <div class="aside-tools">
        <h2 class="font-semibold text-xl leading-tight">
          {{ isset($header) ? $header : "FilmSales Admin"}}
      </h2>
    </div>
    <div class="menu is-menu-main">
      <ul class="menu-list">
        <li class="active">
          <a href="{{route('admin_home')}}">
            <span class="icon"><i class="mdi mdi-desktop-mac"></i></span>
            <span class="menu-item-label">Dashboard</span>
          </a>
        </li>

        <li>
          <a href="{{route('users_index')}}">
            <span class="icon"><i class="mdi mdi-account-circle"></i></span>
            <span class="menu-item-label">Users</span>
          </a>
        </li>

        <li>
          <a href="{{route('genres_index')}}">
            <span class="icon"><i class="mdi mdi-view-list"></i></span>
            <span class="menu-item-label">Genre</span>
          </a>
        </li>
{{-- 
        <li>
          <a href="#">
            <span class="icon"><i class="mdi mdi-coin"></i></span>
            <span class="menu-item-label">Transactions</span>
          </a>
        </li> --}}

      </ul>
    </div>
  </aside>
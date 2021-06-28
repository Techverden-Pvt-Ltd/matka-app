<ul class="nav">
  <li {{Route::is('dashboard.index') ? 'class=active' : ''}}>
    <a href="{{route('dashboard.index')}}">
      <i class="nc-icon nc-bank"></i>
      <p>Dashboard</p>
    </a>
  </li>
  <li {{Route::is('market.index') ? 'class=active' : ''}}>
    <a href="{{route('market.index')}}">
      <i class="nc-icon nc-diamond"></i>
      <p>Market</p>
    </a>
  </li>
  <li {{Route::is('user.index') ? 'class=active' : ''}}>
    <a href="{{route('user.index')}}">
      <i class="nc-icon nc-single-02"></i>
      <p>User</p>
    </a>
  </li>
</ul>
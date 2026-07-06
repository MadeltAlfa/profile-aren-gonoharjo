<div class="sidebar">
  <div class="sb-logo">
    <div class="sb-logo-icon"><i class="fa-solid fa-seedling"></i></div>
    <div>
      <div class="sb-logo-text">AREN</div>
      <div class="sb-logo-sub">Gonoharjo</div>
    </div>
  </div>
  <div class="sb-nav">
    <a href="{{ route('dashboard') }}" class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}" style="text-decoration:none;">
      <div class="nav-icon"><i class="fa-solid fa-chart-line"></i></div>
      Dashboard
    </a>
  </div>
  <div class="sb-profile">
    <div class="profile-ava"><i class="fa-solid fa-user"></i></div>
    <div>
      <div class="profile-name">{{ Auth::user()->name ?? 'Admin' }}</div>
      <div class="profile-role">Administrator</div>
    </div>
    <div style="display:flex; gap:6px; margin-left:auto;">
      <a href="{{ route('profile.edit') }}" title="Edit Profil" style="background:transparent; border:1px solid rgba(244,239,227,.2); color:var(--on-ink-mut); padding:6px 10px; border-radius:6px; cursor:pointer; font-size:11px; transition:all .15s; display:inline-flex; align-items:center; text-decoration:none;" onmouseover="this.style.background='rgba(244,239,227,.08)'" onmouseout="this.style.background='transparent'">
          <i class="fa-solid fa-user-pen"></i>
      </a>
      <form method="POST" action="{{ route('logout') }}" style="display:inline;">
          @csrf
          <button type="submit" class="sb-logout" style="cursor: pointer; margin-left:0;" title="Logout"><i class="fa-solid fa-power-off"></i></button>
      </form>
    </div>
  </div>
</div>

<div class="monitor-header">
    <div class="mh-brand">
      <div class="brand-icon"><i class="fa-solid fa-seedling"></i></div>
      <div>
        <div class="brand-name">AREN GONOHARJO</div>
        <div class="brand-sub">Admin Panel</div>
      </div>
    </div>
    <div class="mh-right">
      <div class="conn-pill">
        <div class="conn-dot"></div>{{ Auth::user()->name ?? 'Admin' }}
      </div>
      <form method="POST" action="{{ route('logout') }}" style="display:inline;">
          @csrf
          <button type="submit" class="mon-logout-btn" style="cursor: pointer;"><i class="fa-solid fa-arrow-right-from-bracket"></i> Keluar</button>
      </form>
    </div>
</div>
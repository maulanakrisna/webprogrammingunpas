<div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-secondary">
    <div class="offcanvas-md offcanvas-end bg-body-secondary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="sidebarMenuLabel">Unpas</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard')? 'active' : '' }}" aria-current="page" href="/dashboard">
                <i class="bi bi-speedometer"></i>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard')? 'active' : '' }}" href="/dashboard/posts">
                <i class="bi bi-file-post"></i>
              My Posts
            </a>
          </li>
        </ul>

        <hr class="my-3">

        <ul class="nav flex-column mb-auto">
          <li class="nav-item">
            <form action="logout" method="POST" class="nav-link d-flex align-items-center gap-2">
              @csrf
                  <button type="submit" class="dropdown-item"><i class="bi bi-door-closed"></i> Logout</button>
              </form>
          </li>
        </ul>
      </div>
    </div>
  </div>

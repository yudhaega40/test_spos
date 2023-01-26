<div class="topnav">
  <div class="header border-bottom" id="header">
    <ul class="topnav-list list-unstyled">
      <div class="nav-item dropdown no-arrow" role="group" aria-label="Button group with nested dropdown">
        <a class="nav-link dropdown" href="#" id="userDropdown" role="button" data-toggle="dropdown"
          data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="mr-2 d-none d-lg-inline text-gray-600 medium"><?php echo session('username'); ?></span>
          <img class="img-profile rounded-circle" src="{{ asset('/img/undraw_profile.svg') }}">
        </a>
        <ul class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
          <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modal_logout"
              data-bs-aksi="logout">
              <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
              Logout
            </a></li>
        </ul>
      </div>
    </ul>
  </div>
</div>

<div class="modal fade modal-logout" id="modal_logout" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="label_modal_logout" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Logout</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Apakah anda yakin ingin logout?</p>
        <br>
      </div>
      <div class="modal-footer">
        <a href="/logout" id="btn_aksi" class="btn btn-danger">Ya</a>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
      </div>
    </div>
  </div>
</div>


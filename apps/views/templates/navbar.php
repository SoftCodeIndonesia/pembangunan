<!--Start topbar header-->
<header class="topbar-nav">
 <nav class="navbar navbar-expand fixed-top">
  <ul class="navbar-nav mr-auto align-items-center">
    <li class="nav-item">
      <a class="nav-link toggle-menu" href="javascript:void();">
       <i class="icon-menu menu-icon"></i>
     </a>
    </li>
  </ul>
     
  <ul class="navbar-nav align-items-center right-nav-link">
    <li class="nav-item">
      <a class="nav-link <?= !empty($_SESSION['userdata']) ? 'dropdown-toggle dropdown-toggle-nocaret' : '' ?>" data-toggle="<?= !empty($_SESSION['userdata']) ? 'dropdown' : '' ?>" href="<?= !empty($_SESSION['userdata']) ? '#' : BASE_URL . 'Login' ?>">
        <span class="user-profile"><h6 class="mt-2 user-title"><?= !empty($_SESSION['userdata']) ? $_SESSION['userdata']['name'] : 'Login' ?></h6></span>
      </a>
      <ul class="dropdown-menu dropdown-menu-right">
       <li class="dropdown-item user-details">
        <a href="javaScript:void();">
           <div class="media">
            <div class="media-body">
            <h6 class="mt-2 user-title"><?= !empty($_SESSION['userdata']) ? $_SESSION['userdata']['name'] : '' ?></h6>
            <p class="user-subtitle"><?= !empty($_SESSION['userdata']) ? $_SESSION['userdata']['rule'] : '' ?></p>
            </div>
           </div>
          </a>
        </li>
        <li class="dropdown-item"><a href="<?= BASE_URL ?>login/logout" class="nav-link"><i class="icon-power mr-2"></i> Logout</li></a>
      </ul>
    </li>
  </ul>
</nav>
</header>
<!--End topbar header-->
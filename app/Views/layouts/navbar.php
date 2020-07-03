<nav class="navbar navbar-expand-md bg-img navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="/">
  <img src="images/logo.svg" alt="" width="30"> Peperoni App</a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="nav navbar-nav ml-auto">
      <li class="nav-item">

      <a class="nav-link text-uppercase" href="#">
  <!-- get the email to show on menu -->
        <?php $username = strstr(session()->get('email'),'@',true) ?>
              <?= $username ?>
        |</a>

        <a class="nav-link text-uppercase" href="/">Logout</a>

      </li>
    </ul>
  </div>
</nav>
<?php
  $searchStage = "";
  $searchSpacebox = "";

  if (! empty($_GET["search"])) {
    $searchResult = $sqlConnection -> getSpaceboxRepo() -> searchSpacebox($_GET["search"]);
    $searchSpacebox = $_GET["search"];
    $hiddenResults = [];
    $searchStage = 2;
    if (empty($searchResult)) {
      $searchSpacebox = "";
    }
  }
?>

<div class="overlay"></div>

<header class="main-header">
  <a href="index.php" class="logo-query2"><img src="img/logo-2.png" alt="logotipo" width="200px"></a>
  <a href="#" class="toggle-nav">
    <span class="ion-chevron-down"></span>
  </a>
  <nav class="main-nav">

    <ul>
      <li><a href="index.php"><span class="icon left ion-ios-home"></span>Inicio</a></li>

      <?php if (! isset($loggedUser)): ?>
        <li><a href="faq.php"><span class="icon left ion-help-circled"></span>F.A.Q.</a></li>
      <?php endif; ?>

      <?php if (! isset($loggedUser)): ?>
        <li><a href="register.php"><span class="icon left ion-ios-heart"></span>Registrarse</a></li>
      <?php endif; ?>

      <?php if (isset($loggedUser) && isset($userSpacebox) && $loggedUser -> getUsername() != "admin"): ?>
        <li><a href="editspace.php"><span class="icon left ion-planet"></span>Mi Spacebox</a></li>
      <?php endif; ?>

      <?php if (isset($loggedUser) && ! isset($userSpacebox) && $loggedUser -> getUsername() != "admin"): ?>
          <li><a href="createspace.php"><span class="icon left ion-ios-compose"></span>Crear Spacebox</a></li>
      <?php endif; ?>

      <?php if (! isset($loggedUser)): ?>
        <li><a href="login.php"><span class="icon left ion-happy"></span>Iniciar sesión</a></li>
      <?php endif; ?>

      <?php if (isset($loggedUser) && $loggedUser -> getPrivileges() >= 2): ?>
        <li><a href="admincp.php"><span class="icon left ion-help-buoy"></span>ADMIN-CP</a></li>
      <?php endif; ?>

      <?php if (isset($loggedUser) && $loggedUser -> getUsername() != "admin"): ?>
        <li><a href="account.php"><span class="icon left ion-android-person"></span>Mi cuenta</a></li>
      <?php endif; ?>

      <?php if (isset($loggedUser)): ?>
        <li><a href="logout.php"><span class="icon left ion-sad"></span>Cerrar sesión</a></li>
      <?php endif; ?>

      <li>
        <div class="search-bar-q1">
          <form action="index.php" method="get">
        		<input type="text" name="search" placeholder="buscar..." value="<?= $searchSpacebox; ?>">
        	</form>
        </div>
      </li>
    </ul>

  </nav>

  <div class="search-bar-q2">
    <form action="index.php" method="get">
  		<input type="text" name="search" placeholder="Buscar..." value="<?= $searchSpacebox; ?>">
  		<button type="submit"><span class="ion-search"></span></button>
  	</form>
  </div>

  <a href="index.php"><img src="img/logo-2.png" alt="logotipo" class="logo-query1" width="300px"></a>
</header>

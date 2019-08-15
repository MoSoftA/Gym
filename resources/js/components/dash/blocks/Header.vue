<template>
    <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block" style="padding: 8px">
        <router-link to="/" exact>Home<span
								class="sr-only">(current)</span></router-link>
      </li>
    </ul>

  </nav>
  <!-- /.navbar -->
</template>

<style>
li a{
  font-size: 18px;
  font-weight: bold;  
  color: black;
  padding: 7px; 
}
</style>

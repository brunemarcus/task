<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="home.php">Welcome, <b style="color:#3931DC;"><?php echo $_SESSION['username']; ?></b></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="customer.php">Customer Registration</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="manage.php">Manage my clients</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="src/action.php?logout">Logout</a>
    </li>
  </ul>
</nav>
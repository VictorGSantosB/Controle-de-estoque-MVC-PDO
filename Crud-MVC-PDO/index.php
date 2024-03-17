<?php 
session_start();
if(!isset($_SESSION['id'])){
  header("Location:view/login.php?msgErrorLog=erroL");
  exit();
}


require 'configurations/conection.php';


$sql = "SELECT COUNT(*) AS total_produtos FROM produtos";
$resultado = $conn->query($sql);


if ($resultado) {
    
    $row = $resultado->fetch(PDO::FETCH_ASSOC);
    $totalProdutos = $row['total_produtos'];
} else {
    $totalProdutos = 0;
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- Montserrat Font -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="view/css/styles.css">
  </head>
  <body>
    <div class="grid-container">

      <!-- Header -->
      <header class="header">
        <div class="menu-icon" onclick="openSidebar()">
          <span class="material-icons-outlined">menu</span>
        </div>
        <div class="header-left">
          <span class="material-icons-outlined">search</span>
        </div>
        <div class="header-right">
          <span class="material-icons-outlined">notifications</span>
          <span class="material-icons-outlined">email</span>
          <span class="material-icons-outlined">account_circle</span>
          <?php echo $_SESSION['login'];?>
        </div>
      </header>
      <!-- End Header -->

      <!-- Sidebar -->
      <aside id="sidebar">
        <div class="sidebar-title">
          <div class="sidebar-brand">
            <span class="material-icons-outlined">shopping_cart</span> STORE
          </div>
          <span class="material-icons-outlined" onclick="closeSidebar()">close</span>
        </div>

        <ul class="sidebar-list">
          <li class="sidebar-list-item">
            <a href="#">
              <span class="material-icons-outlined">dashboard</span> Dashboard
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="view/listarprodutos.php" >
              <span class="material-icons-outlined">inventory_24</span> Products
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="#" >
              <span class="material-icons-outlined">category</span> Categories
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="#" >
              <span class="material-icons-outlined">groups</span> Customers
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="#" >
              <span class="material-icons-outlined">fact_check</span> Inventory
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="#" >
              <span class="material-icons-outlined">poll</span> Reports
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="#" >
              <span class="material-icons-outlined">settings</span> Settings
            </a>
          </li>
        </ul>
      </aside>
      <!-- End Sidebar -->

      <!-- Main -->
      <main class="main-container">
        <div class="main-title">
          <h2>DASHBOARD</h2>
        </div>

        <div class="main-cards">

          <div class="card">
            <div class="card-inner">
              <h3>PRODUCTS</h3>
              <span class="material-icons-outlined">inventory_2</span>
            </div>
            <h1><?php echo $totalProdutos; ?></h1>
          </div>

          <div class="card">
            <div class="card-inner">
              <h3>CATEGORIES</h3>
              <span class="material-icons-outlined">category</span>
            </div>
            <h1>25</h1>
          </div>

          <div class="card">
            <div class="card-inner">
              <h3>CUSTOMERS</h3>
              <span class="material-icons-outlined">groups</span>
            </div>
            <h1>1500</h1>
          </div>

          <div class="card">
            <div class="card-inner">
              <h3>ALERTS</h3>
              <span class="material-icons-outlined">notification_important</span>
            </div>
            <h1>56</h1>
          </div>

        </div>

        <div class="charts">

          <div class="charts-card">
            <h2 class="chart-title">Top 5 Products</h2>
            <div id="bar-chart"></div>
          </div>

          <div class="charts-card">
            <h2 class="chart-title">Purchase and Sales Orders</h2>
            <div id="area-chart"></div>
          </div>

        </div>
      </main>
      <!-- End Main -->

    </div>

    <!-- Scripts -->
    <!-- ApexCharts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.5/apexcharts.min.js"></script>
    <!-- Custom JS -->
    <script src="view/js/script.js"></script>
  </body>
</html>
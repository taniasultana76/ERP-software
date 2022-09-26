
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column" style="background-image:linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)),url(../img/ol.jpg);background-size:cover">
 
      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

           <li  class="nav-item" ><img src="../img/Logo.png" style="width: 200%;height: 35px;float: right;margin-top: 30%"></li>

            <div class="topbar-divider d-none d-sm-block" ></div>

            <!-- Nav Item - User Information -->

            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline " style=color:Green;><b>Welcome To JES</b></span>
                <i class="fas fa clock"></i>
                
              <?php 

                $query = 'SELECT ID,FIRST_NAME,USERNAME,PASSWORD
                          FROM users u
                          JOIN employee e ON e.EMPLOYEE_ID=u.EMPLOYEE_ID';
                $result = mysqli_query($db, $query) or die (mysqli_error($db));
      
                while ($row = mysqli_fetch_assoc($result)) {
                          $a = $_SESSION['MEMBER_ID'];
                }
                          
            ?>

              <!-- Dropdown - User Information -->
               <!-- Dropdown - User Information -->
               </span>
          </a>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->
          
        <!-- Begin Page Content -->
        <div class="container-fluid">
  <nav class="navbar navbar-expand-lg  bg-white fixed-top " id="navbar" aria-label="Offcanvas navbar large">
      <div class="container-fluid">
          <a href="home.php">
              <img src="assets/logo.png" alt="logo de site web " class="mainNavLogo"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar2"
              aria-controls="offcanvasNavbar2">
              <span class="navbar-toggler-icon"></span>
          </button>
          <div class="offcanvas offcanvas-end text-bg-white" tabindex="-1" id="offcanvasNavbar2"
              aria-labelledby="offcanvasNavbar2Label">
              <div class="offcanvas-header">
                  <img src="assets/logo.png" alt="logo de site web" class="logo"></a>

                  <button type="button" class="btn-close btn-close-dark" data-bs-dismiss="offcanvas"
                      aria-label="Close"></button>
              </div>
              <div class="offcanvas-body">
                  <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                      <li class="nav-item">
                          <a class="nav-link active" aria-current="page" href="home.php">Home</a>
                      </li>

                      <li class="nav-item">
                          <a class="nav-link" href="about.php">About</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="contact.php">Contact</a>
                      </li>

                      <li class="nav-item">

                          <div class="btn-group test">
                              <button type="button" class="dropdown-toggle nav-link " data-bs-toggle="dropdown"
                                  aria-haspopup="true" aria-expanded="false">
                                  <i class="bi bi-person-lines-fill"></i>
                                  <?php
                            echo $userName;
                            ?>
                                  <!-- Display the user's name with an icon -->
                              </button>
                              <div class="test">
                                  <div class="dropdown-menu">
                                      <a class="dropdown-item nav-link" href="profil.php"><i
                                              class="bi bi-person-fill"></i>
                                          Profile</a>
                                      <a class="dropdown-item nav-link" href="settings.php"><i
                                              class="bi bi-gear-fill"></i>
                                          Settings</a>
                                      <div class="dropdown-divider"></div>
                                      <a class="dropdown-item nav-link" href="signOut.php"><i
                                              class="bi bi-box-arrow-right"></i>
                                          Logout</a>
                                  </div>
                              </div>
                          </div>

                      </li>
                      <?php
                        if(isset($_SESSION["admin"]))
                        {
                        ?>
                        <li class="nav-item">
                              <a class="nav-link" href="admin_dashboard/list_users.php">
                               Dashboard</a>
                        </li>
                        <?php 
                        }
                        ?>
                  </ul>
              </div>
          </div>
      </div>
  </nav>
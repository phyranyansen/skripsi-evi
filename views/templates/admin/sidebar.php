
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="<?= base_url().'assets/bootstrap2/dist/img/AdminLTELogo.png';?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

   

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?= base_url().'dashboard'; ?>" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            </a>
           
          </li>
         
          
          <li class="nav-header">Data</li>
          <li class="nav-item">
            <a href="<?= base_url().'plan'; ?>" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Plan
                <span class="badge badge-info right">2</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url().'kuesioner'; ?>" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
               Kuesioner 
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url().'hasil-survey'; ?>" class="nav-link">
              <i class="nav-icon fas fa-list-alt"></i>
              <p>
               Hasil Survey
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url().'criteria'; ?>" class="nav-link">
              <i class="nav-icon fa fa-tasks"></i>
              <p>
               Criteria
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url().'company'; ?>" class="nav-link">
              <i class="nav-icon fas fa-building"></i>
              <p>
               Company 
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/kanban.html" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
               Users
              </p>
            </a>
          </li>
         
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  
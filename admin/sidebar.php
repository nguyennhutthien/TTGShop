     <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-bars"></i>
              <p>
                Danh mục
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="category.php" class="nav-link">
                <i class="nav-icon fas fa-list"></i>
                  <p>Quản lý danh mục</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item menu-open">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-info"></i>
              <p>
                Thương hiệu
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="brand.php" class="nav-link">
                <i class="nav-icon fas fa-list"></i>
                  <p>Quản lý thương hiệu</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item menu-open">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-laptop"></i>
              <p>
                Sản phẩm
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="addproduct.php" class="nav-link">
                <i class="nav-icon fas fa-plus"></i>
                  <p>Thêm sản phẩm</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="product.php" class="nav-link">
                <i class="nav-icon fas fa-list"></i>
                  <p>Hiển thị sản phẩm</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="searchproduct.php" class="nav-link">
                <i class="nav-icon fas fa-search"></i>
                  <p>Tìm kiếm sản phẩm</p>
                </a>
              </li>
            </ul>
          </li>
          <?php 
            include('connect.php');
            $neworder=mysqli_query($connect,"SELECT COUNT(*) as total FROM `order` WHERE xacnhan=b'0'");

          ?>
          <li class="nav-item menu-open">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
                Đơn hàng
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="neworder.php" class="nav-link">
                <i class="nav-icon fas fa-bookmark"></i>
                  <p>
                    Đơn hàng mới (
                    <?php 
                      while($row=mysqli_fetch_assoc($neworder)){
                        echo $row['total'];
                      }
                    ?> )
                  </p>
                </a>
              </li>
            </ul>
            <?php 
              include('connect.php');
              $order=mysqli_query($connect,"SELECT COUNT(*) as total FROM `order` WHERE xacnhan=b'1'");
              ?>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="order.php" class="nav-link">
                <i class="nav-icon fas fa-truck"></i>
                  <p>Đơn đã xác nhận (
                  <?php 
                      while($row1=mysqli_fetch_assoc($order)){
                        echo $row1['total'];
                      }
                    ?> )
                  </p>
                </a>
              </li>
            </ul>
            <?php 
              include('connect.php');
              $ordersuccess=mysqli_query($connect,"SELECT COUNT(*) as total FROM `order` WHERE tinhtrang='Giao hàng thành công'");
              ?>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="ordersuccess.php" class="nav-link">
                <i class="nav-icon fas fa-check"></i>
                  <p>Đơn đã giao (
                  <?php 
                      while($row2=mysqli_fetch_assoc($ordersuccess)){
                        echo $row2['total'];
                      }
                    ?> )
                  </p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="searchorder.php" class="nav-link">
                <i class="nav-icon fas fa-search"></i>
                  <p>Tìm kiếm đơn hàng</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
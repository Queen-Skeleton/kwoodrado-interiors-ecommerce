<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Kwoodrado Interiors | Categories Panel</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/admin/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/admin/dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <?php include("../include/navbar.php"); ?>

  <!-- Sidebar -->
  <?php include("../include/sidebar.php"); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Manage Categories</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Categories</li>
              <li class="breadcrumb-item"><a href="create-new.php">Add</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">List of Product Categories</h3>

            <div class="card-tools">
              <div class="input-group input-group-sm" style="width: 150px;">
                <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                <div class="input-group-append">
                  <button type="submit" class="btn btn-default">
                    <i class="fas fa-search"></i>
                  </button>
                </div>
              </div>
            </div>
          </div>
          <!-- /.card-header -->
          <?php
            // Parse configuration file
            $config = parse_ini_file("../../config.ini");

            // Create connection to database
            $conn = mysqli_connect($config["db_server"], $config["db_user"], $config["db_password"], $config["db_name"]);

            // Retrieve categories
            $categories_result = mysqli_query($conn, "SELECT id, name FROM product_category");
          ?>
          <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Category</th>
                  <th>Thumbnail</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php while($row = mysqli_fetch_assoc($categories_result)): ?>
                <tr>
                  <td><?= $row["id"] ?></td>
                  <td><?= $row["name"] ?></td>
                  <td></td>
                  <td>
                    <div class="btn-group">
                      <a href="update-existing.php?id=<?= $row["id"] ?>" class="btn btn-sm btn-primary">
                        <i class="fas fa-edit"></i> Update
                      </a>
                      <a href="actions/delete-category.php?id=<?= $row["id"] ?>"
                        class="btn btn-sm btn-danger"
                        onclick="return confirm('Proceed to delete category named: <?= $row["name"] ?>?');">
                        <i class="fas fa-trash"></i> Delete
                      </a>
                    </div>
                  </td>
                </tr>
                <?php endwhile; ?>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
          <div class="card-footer clearfix">
            <ul class="pagination pagination-sm m-0 float-right">
              <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
              <li class="page-item"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
            </ul>
          </div>
        </div>
        <?php mysqli_close($conn); ?>
        <!-- /.card -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Footer -->
  <?php include("../include/footer.php"); ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="/admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/admin/dist/js/adminlte.min.js"></script>
</body>
</html>

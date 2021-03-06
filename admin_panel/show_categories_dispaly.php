<?php
include('../database.php');
//include_once('connect.php');
$query = "select * from categories";
$res = mysqli_query($con, $query);
//$result = mysql_query($query);
?>

<!DOCTYPE html>
<html>

<head>
  <?php
  include 'head.php';
  ?>
  <title> Fetch Data From Database </title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body class="sb-nav-fixed">
  <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <?php
    include 'top_menu.php';
    ?>
  </nav>
  <div id="layoutSidenav">
    <div id="layoutSidenav_nav">
      <?php
      include 'sidenav.php';
      ?>
    </div>
    <div id="layoutSidenav_content">
      <main>
        <div style="margin:70px;">

          <table class="table table-bordered ">
            <tr>
              <th colspan="4">
                <h2 style="text-align: center;">News Categories</h2>
              </th>
            </tr>
            <th> Serial No </th>

            <th> News Categories </th>
            <th> News Categories (Bangla) </th>
            </tr>

            <?php
            $serial = 1;
            while ($rows = mysqli_fetch_array($res)) {
            ?>
              <tr>
                <td><?php echo $serial++; ?></td>

                <td><?php echo $rows['categories_name']; ?></td>
                <td><?php echo $rows['categories_name_ban']; ?></td>
                <td class="text-center"><a class="btn btn-dark btn-sm" href="update_categories.php?tid=<?php echo $rows['categories_id']; ?>"> Edit</a>

                  <a class="btn btn-danger btn-sm" onclick="confirmation(<?php echo $rows['categories_id']; ?>)"> Delete</a>

              </tr>
            <?php
            }
            ?>

          </table>


        </div>
      </main>
      <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid">
          <?php
          include 'footer.php';
          ?>
        </div>
      </footer>
    </div>
  </div>

  <script>
    function confirmation(delid) {
      if (confirm("Do you want to delete?")) {
        window.location.href = 'delete_categories.php?tid=' + delid + '';
        return true;
      }



    }
  </script>



  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="js/scripts.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
  <script src="assets/demo/chart-area-demo.js"></script>
  <script src="assets/demo/chart-bar-demo.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
  <script src="assets/demo/datatables-demo.js"></script>
</body>

</html>
<?php session_start() ?>
<?php
if (!isset($_SESSION['username'])) {
  header('Location: login.php');
}
if (isset($_GET['logout'])) {
  session_destroy();
  header("Location: login.php");
}
?>
<?php
function showData($id = 0)
{
  include './db/condb.php';

  $sql = 'SELECT * FROM ledgerid';
  if ($id == 0) {
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $rows = $stmt->fetchAll();
  } else {
    $sql .= " WHERE ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $id);
    $stmt->execute();
    $rows = $stmt->fetch();
  }
  return $rows;
}
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Income&Expenses</title>
  <link rel="stylesheet" href="customCSS/custom_index_page.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
  <!-- create Navbar -->
  <nav class="navbar bg-body-tertiary">
    <div class="container">
      <a class="navbar-brand" href="#">
        <p class="h3">Account</p>
      </a>
      <div class="nav justify-content-end">
        <li class="nav-item">
          <a class="nav-link" href="#"><?= $_SESSION['username'] ?></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?logout='1'" aria-disabled="true">Logout</a>
        </li>
      </div>
    </div>
  </nav>

  <!-- include model add -->
  <?php include "./template/model_add.php"; ?>



  <!-- Content -->
  <div class="container">
    <!-- 🃏🃏 Card content-->
    <section class="vh-500 gradient-custom-2">
      <div class="container py-5 h-00">
        <div class="row d-flex justify-content-center align-items-center h-00">
          <div class="col-md-12 col-xl-10">

            <!-- content card -->
            <div class="card mask-custom">
              <div class="card-body p-4 text-white">
                <div class="text-center pt-3 pb-2 text-info">
                  <span class="my-4 h1">Account</span>
                </div>
                <!-- Button trigger modal -->
                <div>
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#insertData">Add</button>
                </div>
                <!-- 💻💻 TableView-->
                <table class="table text-white mb-0 table-hover table-borderless">
                  <thead>
                    <tr class="text-center">
                      <th scope="col">ID</th>
                      <th scope="col">Date</th>
                      <th scope="col">Destrition</th>
                      <th scope="col">Income</th>
                      <th scope="col">Expenses</th>
                      <th scope="col">Balance</th>
                      <th scope="col"></th>
                    </tr>
                  </thead>
                  <?php $rows = showData() ?>
                  <?php $sumBalance = 0; ?>
                  <?php $sumIncome = 0; ?>
                  <?php $sumExpenses = 0; ?>
                  <?php $count = 1 ?>
                  <?php foreach ($rows as $data) : ?>
                    <?php if ($data['user_id'] == $_SESSION['username_id']) : ?>
                      <?php $balance = $data['Income'] - $data['Expenses'] ?>
                      <?php $sumBalance += $balance; ?>
                      <?php $sumIncome += $data['Income'];  ?>
                      <?php $sumExpenses += $data['Expenses']; ?>
                      <?php include "./template/model_edit.php" ?>
                      <tbody class="text-center">
                        <tr class="fw-normal">
                          <td><?= $count ?></td>
                          <td><?= $data['Date'] ?></td>
                          <td><?= $data['Description'] ?></td>
                          <td><?= $data['Income'] ?></td>
                          <td><?= $data['Expenses'] ?></td>
                          <td><?= $balance ?></td>
                          <td class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#edit_<?= $data['ID'] ?>">Edit</button>
                            <form action="./db/check.php" method="post">
                              <input type="text" value=<?= $data['ID'] ?> name="ledgerid_id" hidden>
                              <button type="submit" name="delete" class="btn btn-danger">Delete</button>
                            </form>
                            </a>
                          </td>
                          <?php $count += 1; ?>
                        <?php endif ?>
                      <?php endforeach ?>
                        <tr>
                          <td colspan="3">รวม</td>
                          <td><?= $sumIncome ?></td>
                          <td><?= $sumExpenses ?></td>
                          <td><?= $sumBalance ?></td>
                        </tr>
                      </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>




  </div>
  <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
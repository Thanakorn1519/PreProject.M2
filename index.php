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
  <!-- opacity image -->
  <!-- Content -->
  <div class="container">

    <!-- 🃏🃏 Card content-->
    <section class="vh-500 gradient-custom-2">
      <div class="container py-5 h-00">
        <div class="row d-flex justify-content-center align-items-center h-00">
          <div class="col-md-12 col-xl-10">

            <div class="card mask-custom">
              <div class="card-body p-4 text-white">

                <div class="text-center pt-3 pb-2 text-info">
                  <span class="my-4 h1">Account</span>
                </div>
                <div>
                  <a href="page/page_add.php">
                    <button type="button" class="btn btn-success">ADD</button>
                  </a>
                </div>
                <!-- 💻💻 TableView-->
                <table class="table text-white mb-0">
                  <thead>
                    <tr>
                      <th scope="col">ID</th>
                      <th scope="col">Date</th>
                      <th scope="col">Destrition</th>
                      <th scope="col">Income</th>
                      <th scope="col">Expenses</th>
                      <th scope="col">Balance</th>
                      <th scope="col"></th>

                    </tr>
                  </thead>
                  <?php
                  include 'page/condb.php';
                  $sql = "SELECT * FROM ledgerid";
                  $result = $conn->query($sql);
                  $count = 1;
                  $netBalance = 0;
                  $netIncome = 0;
                  $netExpenses = 0;
                  if ($result->num_rows > 0) {
                    // output data of each row
                    while ($row = $result->fetch_assoc()) {
                      $Balance = $row["Income"] - $row["Expenses"];
                      $netBalance += $Balance;
                      $netIncome += $row["Income"];
                      $netExpenses += $row["Expenses"];
                      echo '
                      <tbody class="text-center">
                      <tr class="fw-normal">
                        <td>
                          ' . $count . '
                        </td>
                        <td>' . $row["Date"] . '</td> 
                        <td>' . $row["Destrition"] . '</td> 
                        <td>' . $row["Income"] . '</td> 
                        <td>' . $row["Expenses"] . '</td> 
                        <td>' . $Balance . '</td> 
                        <td>
                        <a href = "./page/page_edit.php?target_id=' . $row["ID"] . '">
                          <button type="button" class="btn btn-primary">Edit</button>
                        </a>
                        <a href = "./page/check.php?value=delete&&target_id=' . $row["ID"] . '">
                          <button type="submit" class="btn btn-danger"">Delete</button
                        </a>
                        </td> 
                      </tr>';
                      $count++;
                    }
                  } else {
                    echo "0 results";
                  }
                  $conn->close();
                  ?>
                  <?php
                  echo '<tr class="fw-normal">
                    <td colspan="3">รวม</td>
                    <td class="text-center">' . $netIncome . '</td>
                    <td class="text-center">' . $netExpenses . '</td>
                    <td class="text-center">' . $netBalance . '</td>
                    <td class="text-center"></td>
                    </tr>'
                  ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>




  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
<?php
require "Pegawai.php";
$employees = [
  new Pegawai('01111', 'Andi', 'Manager', 'Kristen', 'Menikah'),
  new Pegawai('02734', 'Tatang', 'Asisten Manager', 'Islam', 'Menikah'),
  new Pegawai('07842', 'Kusnadi', 'Kepala Bagian', 'Islam', 'Lajang'),
  new Pegawai('02763', 'Dadang', 'Staff', 'Islam', 'Lajang'),
  new Pegawai('01234', 'Surya', 'Manager', 'Budha', 'Menikah'),
];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Employee Salary</title>
  <style>
    .container {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
    }

    table tr td {
      padding: 5px;
    }

    .card {
      border: 1px solid gray;
      border-radius: 10px;
      padding: 10px;
    }
  </style>
</head>

<body>
  <h1>Data Gaji Pegawai</h1>
  <hr>
  <div class="container">
    <?php
    foreach ($employees as $key => $employee) {
      $salary = $employee->getSalary();
      $familiy_allowance = $employee->getFamilyAllowance($salary);
      $position_allowance = $employee->getPositionAllowance($salary);
      $temp_salary = $employee->getTempSalary($salary, $familiy_allowance, $position_allowance);
      $zakat = $employee->getZakat($temp_salary);
      $total = $employee->getTotalSalary($temp_salary, $zakat);

      $employee->printData($salary, $familiy_allowance, $position_allowance, $zakat, $total);
    }
    ?>
  </div>
</body>

</html>
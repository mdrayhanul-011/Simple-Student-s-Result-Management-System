<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Marks Sheet</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    body {
      background-color: #f5f7fa;
      min-height: 100vh;
      padding-top: 95px;
      padding-bottom: 60px;

    }


    header {
      background-color: #05315e;
      color: white;
      padding: 30px 40px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      position: fixed;
      top: 0;
      width: 100%;
      z-index: 999;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .site-title {
      font-size: 26px;
      font-weight: bold;
      text-transform: uppercase;
    }

    nav a {
      text-decoration: none;
      color: white;
      padding: 8px 12px;
      border-radius: 4px;
      transition: background-color 0.3s;
    }

    nav a:hover {
      background-color: rgb(2, 2, 73);
    }

    h2 {
      border-bottom: 3px solid blue;
      width: 29%;
      padding: 0 10px;
      margin: 20px auto;
      text-align: center;
    }

    table {
      width: 90%;
      margin: 20px auto;
      border-collapse: collapse;
    }

    table a {
      text-decoration: none;
    }

    table,
    th,
    td {
      border: 1px solid rgb(140, 187, 239);
      padding: 10px;
      text-align: center;
    }

    th {
      background-color: #05315e;
      color: white;
    }

    tr:nth-child(even) {
      background-color: rgb(216, 216, 216);
    }

    tr:nth-child(odd) {
      background-color: white;
    }

    tr:hover {
      background-color: rgb(158, 158, 159);
      color: white;
    }

    footer {
      position: fixed;
      bottom: 0;
      left: 0;
      width: 100%;
      background-color: #05315e;
      color: white;
      text-align: center;
      padding: 20px 0;
      font-size: 16px;
    }
  </style>
</head>

<body>

  <header>
    <div class="site-title">Students Dashboard</div>
    <nav>
      <a href="index.php" target="_blank">Home</a>
      <a href="giveMarks.php" target="_blank">Insert Marks</a>
      <a href="viewDB.php" target="_blank">Students Details</a>
      <a href="gpaCalculate.php" target="_blank">Check GradePoint</a>
      
    </nav>
  </header>
  <?php
  include "connectionDB.php";
  $result = $connectdb->query("Select * from students");
  echo "<h2>Marks Sheet</h2>";
  if ($result->num_rows > 0) {
    echo "<table border = '1'>
        <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Roll No</th>
        <th>DSA</th>
        <th>CAO</th>
        <th>DC</th>
        <th>OS</th>
        <th>Math</th>
        <th>Web Engineering</th>
        <th>Edit</th>
        <th>Delete</th>
        <tr>";
    while ($row = $result->fetch_assoc()) {
      echo "<tr>
            <td>" . $row['ID'] . "</td>
            <td>" . $row['Name'] . "</td>
            <td>" . $row['Roll_no'] . "</td>
            <td>" . $row['DSA'] . "</td>
            <td>" . $row['CAO'] . "</td>
            <td>" . $row['DC'] . "</td>
            <td>" . $row['OS'] . "</td>
            <td>" . $row['Math'] . "</td>
            <td>" . $row['WebEngr'] . "</td>
            <td><a href='edit.php?update_id=" . $row["ID"] . "' style='color: blue;'>Edit</a></td>
            <td><a href='viewDB.php?delete_id=" . $row["ID"] . "' style='color: red;'>Delete</a></td>
            </tr>";
    }
    echo "</table>";
  } else {
    echo "<h3 style='text-align: center;'>No records found</h3>";
  }
  $connectdb->close();
  ?>
  <footer>
    &copy; CSE 9th Batch, Session 2021-2022
  </footer>
</body>

</html>
<?php
include "connectionDB.php";

if (isset($_GET['delete_id'])) {
  $id = $_GET['delete_id'];
  $deleteQuery = "DELETE FROM students WHERE ID = '$id'";
  if ($connectdb->query($deleteQuery)) {
    echo "<p style='text-align:center; color:green; padding:10px;'><b>Record deleted successfully.</b></p>";
  } else {
    echo "<p style='text-align:center; color:red; padding:10px;'><b>Error deleting record: " . $connectdb->error . "</b></p>";
  }
}
?>
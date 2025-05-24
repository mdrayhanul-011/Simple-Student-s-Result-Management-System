<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Calculate GradePoint</title>
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

    .form-container {
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
      width: 80%;
      padding: 30px 40px;
      margin: 40px auto;
      border: 1px solid #ccc;
      box-shadow: 0 1px 5px rgba(0, 0, 0, 0.05);
      border-radius: 6px;
    }

    #check {
      background-color: rgb(221, 239, 249);
    }

    #result {
      background-color: rgb(226, 253, 227)
    }

    h2 {
      text-align: center;
      font-size: 26px;
      margin-bottom: 25px;
      color: #333;
    }

    form label {
      display: flex;
      justify-content: space-between;
      align-items: center;
      width: 100%;
      margin-bottom: 30px;
      font-weight: bold;
      font-size: 18px;
    }

    form label input {
      float: right;
      width: 400px;
      padding: 12px 10px;
      font-weight: normal;
      font-size: 12px;
      border: 1px solid #ccc;
      border-radius: 4px;
      margin-left: 40px;
    }

    form button {
      display: block;
      width: 60%;
      padding: 10px;
      margin: 5px auto;
      background-color: #05315e;
      color: white;
      border: none;
      border-radius: 4px;
      font-size: 16px;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    .styled-table {
      margin: 5px auto;
      border-collapse: collapse;
      width: 80%;
      border: 1px solid #ccc;
    }

    .styled-table th,
    .styled-table td {
      border: 1px solid rgb(72, 108, 194);
      padding: 10px;
      text-align: center;
    }

    .styled-table th {
      background-color: #05315e;
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
      <a href="index.php">Home</a>
      <a href="giveMarks.php">Insert Marks</a>
      <a href="viewDB.php" target="_blank">Students Details</a>
      <a href="gpaCalculate.php">Check GradePoint</a>
      
    </nav>
  </header>

  <div class="form-container" id="check">
    <h2>Calculate GradePoint of a Student</h2>
    <form action="" method="post">
      <label for="roll">Enter student roll no:
        <input type="text" name="roll" placeholder="Enter roll no." required>
      </label>
      <button type="submit" name="calculate">Calculate GradePoint</button>
    </form>
  </div>
  <div class="form-container" id="result">
    <?php
    include 'connectionDB.php';

    function calculateGPA($marks)
    {
      if ($marks >= 90) return 4.0;
      elseif ($marks >= 80) return 3.7;
      elseif ($marks >= 70) return 3.3;
      elseif ($marks >= 60) return 3.0;
      elseif ($marks >= 50) return 2.7;
      elseif ($marks >= 40) return 2.0;
      else return 0.0;
    }

    if (isset($_POST['calculate'])) {
      $roll = $_POST['roll'];

      $sql = "SELECT * FROM students WHERE Roll_no = '$roll'";
      $result = $connectdb->query($sql);

      if ($result && $result->num_rows > 0) {
        $student = $result->fetch_assoc();

        $totalGPA = 0;
        $subjectCount = 0;

        foreach ($student as $column => $value) {

          if (!in_array($column, ['ID', 'Name', 'Roll_no'])) {
            $totalGPA += calculateGPA($value);
            $subjectCount++;
          }
        }

        $finalGPA = $subjectCount > 0 ? $totalGPA / $subjectCount : 0;

        echo "<h2 style='text-align:center;'>Show GradePoint of Student</h2>";
        echo "<table class='styled-table'>";
        echo "<tr><th>Name</th><th>Roll No</th><th>GPA</th></tr>";
        echo "<tr>";
        echo "<td>" . $student['Name'] . "</td>";
        echo "<td>" . $student['Roll_no'] . "</td>";
        echo "<td>" . number_format($finalGPA, 2) . "</td>";
        echo "</tr></table>";
      } else {
        echo "<p style='color:red; text-align:center;'>No student found with this roll number.</p>";
      }
    }
    ?>

  </div>
  <footer>
    &copy; CSE 9th Batch, Session 2021-2022
  </footer>

</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Insert Students Marks</title>
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
      border-radius: 30px;
      transition: background-color 0.3s;
    }

    nav a:hover {
      background-color: rgb(2, 2, 73);
    }

    main {
      padding: 13px 40px;
      margin:5px auto;
      margin-top: 15px;
      background-color: rgb(161, 186, 243);
      max-width: 1000px;
      box-shadow: 0 1px 5px rgba(0, 0, 0, 0.05);
      border-radius: 6px;
    }

    h2 {
      text-align: center;
      margin-bottom: 20px;
      font-size: 28px;
    }

    form label {
      display: inline-block;
      width: 100%;
      margin-bottom: 5px;
      font-weight: bold;
      font-size: 18px;
    }
    form label input {
      float: right;
      width: 700px;
      padding: 8px 10px;
      font-weight: normal;
      font-size: 14px;
      color: #333;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    form input[type="submit"] {
      background-color:rgb(28, 90, 152);
      color: white;
      width: 50%;
      margin-left: 24%;
      margin-top: 10px;
      border: none;
      padding: 10px 20px;
      font-size: 16px;
      font-weight: bold;
      cursor: pointer;
      border-radius: 4px;
    }

    form input[type="submit"]:hover {
      background-color: rgb(8, 8, 105);
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

  <main>
    <h2>Insert Marks of Students</h2>
    <form action="" method="post">
      <label>Name:
        <input type="text" name="name" placeholder="Enter student name" required>
      </label><br>

      <label>Roll No:
        <input type="text" name="roll" placeholder="Enter roll number" required>
      </label><br>

      <label>DSA:
        <input type="text" name="DSA" placeholder="Enter DSA marks">
      </label><br>

      <label>CAO:
        <input type="text" name="CAO" placeholder="Enter CAO marks">
      </label><br>

      <label>DC:
        <input type="text" name="DC" placeholder="Enter DC marks">
      </label><br>

      <label>OS:
        <input type="text" name="OS" placeholder="Enter OS marks">
      </label><br>

      <label>Math:
        <input type="text" name="Math" placeholder="Enter Math marks">
      </label><br>

      <label>Web Engineering:
        <input type="text" name="WebEngr" placeholder="Enter Web Engineering marks">
      </label><br><br>
      <input type="submit" value="Insert Marks">
    </form>
  </main>

  <footer>
    &copy; CSE 9th Batch, Session 2021-2022
  </footer>

</body>

</html>

<?php
include "connectionDB.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['name'];
  $roll = $_POST['roll'];
  $DSA = $_POST['DSA'];
  $CAO = $_POST['CAO'];
  $DC = $_POST['DC'];
  $OS = $_POST['OS'];
  $Math = $_POST['Math'];
  $WebEngr = $_POST['WebEngr'];

  $sql = "INSERT INTO students(ID, Name, Roll_no, DSA, CAO, DC, OS, Math, WebEngr)
            VALUES(NULL, '$name', '$roll', '$DSA', '$CAO', '$DC', '$OS', '$Math', '$WebEngr')";

  $insert = $connectdb->query($sql);

  if ($insert) {
    echo "<h4 style='color: green; text-align: center; padding-top: 5px;'><b>Student Marks inserted successfully.</b></h4>";
    echo "<p style='text-align: center; margin:5px 0;'><a href='viewDB.php' style='color: blue; text-decoration: none; font-size:14px; font-weight: bold;'>Go back to Students Details</a></p>";
  } else {
    echo "<h3 style='text-align: center; padding: 10px; color: red;'>Error inserting marks: " . $connectdb->error . "</h3>";
  }

  $connectdb->close();
}
?>
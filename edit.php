<?php
include "connectionDB.php";

$name = $roll = $dsa = $cao = $dc = $os = $math = $web = "";
$id = $_GET['update_id'] ?? null;

if ($id) {
  $sql = "SELECT * FROM students WHERE ID='$id'";
  $result = mysqli_query($connectdb, $sql);

  if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $name = $row['Name'];
    $roll = $row['Roll_no'];
    $dsa = $row['DSA'];
    $cao = $row['CAO'];
    $dc = $row['DC'];
    $os = $row['OS'];
    $math = $row['Math'];
    $web = $row['WebEngr'];
  }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = $_POST['name'];
  $roll = $_POST['roll'];
  $dsa = $_POST['DSA'];
  $cao = $_POST['CAO'];
  $dc = $_POST['DC'];
  $os = $_POST['OS'];
  $math = $_POST['Math'];
  $web = $_POST['WebEngr'];

  $updateQuery = "UPDATE students SET 
                    Name='$name', 
                    Roll_no='$roll', 
                    DSA='$dsa', 
                    CAO='$cao', 
                    DC='$dc', 
                    OS='$os', 
                    Math='$math', 
                    WebEngr='$web' 
                  WHERE ID='$id'";
}
?>
<?php
$statusMessage = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (mysqli_query($connectdb, $updateQuery)) {
    $statusMessage = "<h4 style='color: green; text-align: center; padding-top: 5px;'><b>Student details updated successfully.</b></h4>
    <p style='text-align: center; margin-bottom: 20px;'><a href='viewDB.php' style='color: blue; text-decoration: none; font-size:14px; font-weight: bold;'>Go back to Students Details</a></p>";
  } else {
    $statusMessage = "<h3 style='color: red; text-align: center; padding-top: 20px;'><b>Error updating details: " . $connectdb->error . "</b></h3>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Update Student's Details</title>
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
      background-color: rgb(41, 173, 164);
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
      background-color: rgb(13, 119, 129);
      color: white;
      width: 50%;
      font-weight: bold;
      margin-left: 24%;
      margin-top: 10px;
      border: none;
      padding: 10px 20px;
      font-size: 16px;
      cursor: pointer;
      border-radius: 4px;
    }

    form input[type="submit"]:hover {
      background-color: rgba(20, 85, 100, 0.79);
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
    <h2>Update Student Details</h2>
    <form action="" method="post">
      <label>Name:
        <input type="text" name="name" placeholder="Enter student name" value="<?php echo $name ?>">
      </label><br>

      <label>Roll No:
        <input type="text" name="roll" placeholder="Enter roll number" value="<?php echo $roll ?>">
      </label><br>

      <label>DSA:
        <input type="text" name="DSA" placeholder="Enter DSA marks" value="<?php echo $dsa ?>">
      </label><br>

      <label>CAO:
        <input type="text" name="CAO" placeholder="Enter CAO marks" value="<?php echo $cao ?>">
      </label><br>

      <label>DC:
        <input type="text" name="DC" placeholder="Enter DC marks" value="<?php echo $dc ?>">
      </label><br>

      <label>OS:
        <input type="text" name="OS" placeholder="Enter OS marks" value="<?php echo $os ?>">
      </label><br>

      <label>Math:
        <input type="text" name="Math" placeholder="Enter Math marks" value="<?php echo $math ?>">
      </label><br>

      <label>Web Engineering:
        <input type="text" name="WebEngr" placeholder="Enter Web Engineering marks" value="<?php echo $web ?>">
      </label><br><br>
      <input type="submit" name="submit" value="Update Details">
    </form>
  </main>
  <?php
  if (!empty($statusMessage)) {
    echo "<div style='margin-top: 0;'>$statusMessage</div>";
  } ?>

  <footer>
    &copy; CSE 9th Batch, Session 2021-2022
  </footer>
</body>

</html>
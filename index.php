<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Students Dashboard</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
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
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      z-index: 999;
      background-color: #05315e;
      color: #ffffff;
      padding: 30px 40px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .site-title {
      font-size: 26px;
      font-weight: 700;
      text-transform: uppercase;
    }

    nav a {
      color: #ffffff;
      text-decoration: none;
      padding: 8px 12px;
      border-radius: 30px;
      transition: background-color 0.3s;
      font-weight: 500;
    }

    nav a:hover {
      background-color: rgb(2, 2, 73);
    }

    main {
      padding: 35px 40px;
      max-width: 1000px;
      margin: 0 auto;
    }

    .dashboard-content {
      background-color: #ffffff;
      padding: 25px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.08);
    }

    .dashboard-content h2 {
      color: #05315e;
      margin-bottom: 10px;
      font-size: 24px;
      font-weight: 600;
    }

    .dashboard-content h3 {
      color: #05315e;
      margin-top: 25px;
      font-size: 20px;
      font-weight: 600;
    }

    .dashboard-content p {
      font-size: 15px;
      color: #333333;
      line-height: 1.6;
    }

    .features-list {
      list-style: none;
      margin-top: 15px;
      padding-left: 0;
    }

    .features-list li {
      background-color: #f2f6fa;
      border-left: 5px solid #05315e;
      border-radius: 6px;
      padding: 12px 18px;
      margin-bottom: 10px;
      font-size: 16px;
      transition: all 0.3s ease;
    }

    .features-list li strong {
      font-weight: 600;
    }

    .features-list li:hover {
      background-color: #dde8f3;
      transform: translateX(5px);
      cursor: pointer;
    }

    footer {
      position: fixed;
      bottom: 0;
      left: 0;
      width: 100%;
      background-color: #05315e;
      color: #ffffff;
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
    <section class="dashboard-content">
      <h2>Welcome to the Student Management Dashboard</h2>
      <p>
        This system lets you maintain student records effortlessly—insert marks, search by roll number, calculate grade points, and review full student details in just a few clicks.
      </p>

      <h3>Available Functionalities</h3>
      <ul class="features-list">
        <li><strong>Insert Marks:</strong> Add new student information, including name, roll number, and subject marks.</li>
        <li><strong>Check GradePoint:</strong> Enter a roll number to calculate a student’s GPA/grade point instantly from their marks.</li>
        <li><strong>Students Details:</strong> View a comprehensive, filterable table of all students with their academic records.</li>
        <li><strong>Edit/Update:</strong> Modify existing student information if corrections are needed.</li>
      </ul>
    </section>
  </main>
  <footer>
    &copy; CSE 9th Batch, Session 2021-2022
  </footer>

</body>

</html>
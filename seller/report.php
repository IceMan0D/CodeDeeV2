<?php 
$title ="ผลตอบรับ";
require_once('../admin/check_permission.php');
require_once('../conn.php');
include_once('views/head.php'); 
include_once('views/navbar.php');

// Check if user is logged in
//session_start();
if(!isset($_SESSION['sale_login'])) {
    // Redirect to login page or handle unauthorized access
    exit("Unauthorized access");
}

// Get the seller's user ID from the session
$user_id = $_SESSION['sale_login'];

// Query to retrieve the data for the chart
$stmt = $conn->prepare('SELECT course_name, COUNT(*) AS num_courses 
                        FROM course  inner join user on course.user_username = user.user_username
                        WHERE user_id = :user_id 
                        GROUP BY course_name');
$stmt->bindParam(':user_id', $user_id);
$stmt->execute();
$chart_data = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Format data for use in JavaScript
$labels = [];
$data = [];

foreach ($chart_data as $row) {
    $labels[] = $row['course_name']; // corrected here
    $data[] = $row['num_courses'];
}

?>

<head>
    <!-- Include necessary CSS and JS libraries -->
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>report1</title>
</head>

<body>
    <div class="container">
        <canvas id="myChart"></canvas>
    </div>

    <script>
    // JavaScript code to render the chart
    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($labels); ?>,
            datasets: [{
                label: 'Number of Courses',
                data: <?php echo json_encode($data); ?>,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    </script>

    <?php include 'views/footer.php'; ?>
</body>
<?php
    session_start();
    if($_SESSION["Role"] == null)
    {        
        header("Location: login.php");
    }
    else
    {
        if($_SESSION["Role"] == "admin")
        {}
        else
        {
            header("Location: login.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>RemindersList - Admin Dashboard</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <!-- Favicons -->
  <link href="../assets/img/favicon.png" rel="icon">
  <link rel="stylesheet" href="../assets/css/admindashboard.css">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
   <!-- FontAwesome icon -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/admindashboard.css">

<!--css style-->
<style> 
   


</style>
<!--End of css style-->

</head>

<!--Start of Body-->
<body>

<?php
    include("../included/adminheader.php");
    include("../included/dbconn.php");
?>
<br><br><br><br>

<!-- Start of the pop out modal for sending notification to a specific users-->
<div id="modal" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    <h2>Send Announcements</h2>
    <form id="messageForm" action="store-notification-data.php" method="post">
      <input type="hidden" id="receiverId" name="receiverId" value="">
      <textarea name="messageContent" rows="4" placeholder="Enter your message"></textarea>
      <input type="radio" name="intendedTo" value= "all"> All Users
      <input type="radio" name="intendedTo" value= "specific">Specific Users
      <button type="submit">Send</button>
    </form>
  </div>
</div>
<!--End of the pop out modal code-->

<!--holds the Counting of Data-->
<div class="container-top">
    <div class="numberofusers">
        <?php
            $conn = getConnection();
            // Retrieve the total number of users with inactive account status
            $query = "SELECT COUNT(*) AS totalNumberOfUsers FROM users WHERE role = 'user'";
            $result = mysqli_query($conn, $query);

            if ($result) {
                $row = mysqli_fetch_assoc($result);
                $totalNumberOfUsers = $row['totalNumberOfUsers'];
            } else {
                // Handle the query error
                $totalNumberOfUsers = "error";
            }
            mysqli_close($conn);
        ?>
        <h2>Number Of Users: <br><br><?php echo $totalNumberOfUsers; ?></h2>
    </div>
    <div class="numberofactiveusers">
        <?php
            $conn = getConnection();
            // Retrieve the total number of users with inactive account status
            $query = "SELECT COUNT(*) AS totalactiveUsers FROM users WHERE status = 'active' AND role = 'user'";
            $result = mysqli_query($conn, $query);

            if ($result) {
                $row = mysqli_fetch_assoc($result);
                $totalactiveUsers = $row['totalactiveUsers'];
            } else {
                // Handle the query error
                $totalactiveUsers = 0;
            }
            mysqli_close($conn);
        ?>
            <h2>Active Users: <br><br> <?php echo $totalactiveUsers; ?></h2>
    </div>
    <div class="numberofinactiveusers">
        <?php
            $conn = getConnection();
            // Retrieve the total number of users with inactive account status
            $query = "SELECT COUNT(*) AS totalInactiveUsers FROM users WHERE status = 'inactive' AND role = 'user'";
            $result = mysqli_query($conn, $query);

            if ($result) {
                $row = mysqli_fetch_assoc($result);
                $totalInactiveUsers = $row['totalInactiveUsers'];
            } else {
                // Handle the query error
                $totalInactiveUsers = 0;
            }
            mysqli_close($conn);
        ?>
        <h2>Inactive Users: <br><br><?php echo $totalInactiveUsers; ?></h2>
    </div>
    <div class="deactivedaccounts">
        <?php
            $conn = getConnection();
            // Retrieve the total number of users with inactive account status
            $query = "SELECT COUNT(*) AS deactivatedUsers FROM users WHERE accountStatus = 'deactivated' AND role = 'user'";
            $result = mysqli_query($conn, $query);

            if ($result) {
                $row = mysqli_fetch_assoc($result);
                $deactivedUsers = $row['deactivatedUsers'];
            } else {
                // Handle the query error
                $deactivedUsers = 0;
            }
            mysqli_close($conn);
        ?>
        <h2>Deactivated Accounts: <br><br><?php echo $deactivedUsers; ?></h2> 
    </div>
    <div class="activedaccounts">
        <?php
            $conn = getConnection();
            // Retrieve the total number of users with inactive account status
            $query = "SELECT COUNT(*) AS activatedUsers FROM users WHERE accountStatus = 'activated' AND role = 'user'";
            $result = mysqli_query($conn, $query);

            if ($result) {
                $row = mysqli_fetch_assoc($result);
                $activedUsers = $row['activatedUsers'];
            } else {
                // Handle the query error
                $activedUsers = 0;
            }
            mysqli_close($conn);
        ?>
        <h2>Activated Accounts: <br><br><?php echo $activedUsers; ?></h2>
    </div>
</div>
<!--Ends of the container-top. The data holder-->


<div class="main">
    <!-- rendering of data from the database system. 
    Container for rendering all the list of users that were stored in the database.-->
    <div class="container-left">
        <?php
            $conn = getConnection();
            // Retrieve user information from the database
            $query = "SELECT * FROM users where role = 'user' " ;
            $result = mysqli_query($conn, $query);
        ?>
        <div class="title">
            <i class="fa-solid fa-list-ol"></i>
            <h1>List-of-Users</h1>
        </div> 

        <!-- rendering information using html table. -->
        <table>
            <tr>
                <th>UserId</th>
                <th>Email</th>
                <th>Password</th>
                <th>Gender</th>
                <th>Status</th>
                <th>AccountStatus</th>
                <th>Operation</th>
            </tr>
            <!--fetching data in the database-->
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $row['userid']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['password']; ?></td>
                    <td><?php echo $row['gender']; ?></td>
                    <td><?php echo $row['status']; ?></td>
                    <td><?php echo $row['accountStatus']; ?></td>
                    <td class= "operation-icon">
                        <a href="#" onclick="return deactivateAccount(event, <?php echo $row['userid']; ?>);">
                            <i class="fa-solid fa-users-slash"></i>
                        </a>
                        <a href="#" onclick="return activateAccount(event, <?php echo $row['userid']; ?>);">
                            <i class="fa-solid fa-users"></i>
                        </a>
                        <a href="" class="fa-message" data-userid="<?php echo $row['userid']; ?>" onclick="openModal(event, <?php echo $row['userid']; ?>);">
                            <i class="fa-solid fa-message"></i>
                        </a>
                    </td>
                </tr>
            <?php } ?>
        </table>   
        <!--End of html table for rendering all the registered users-->
    </div> 
    <!--End of the presentation of registered users-->
  
    <!--rendering through pie chart the amount of male and female registered users-->
    <div class="pie-chart-right-top">
        <?php
            $query1 = "SELECT count(*) as male FROM users WHERE gender = 'male' and role = 'user'";
            $query2 = "SELECT count(*) as female FROM users WHERE gender = 'female' and role = 'user'";
            $query3 = "SELECT count(*) as others FROM users WHERE gender = 'others' and role = 'user'";
                
            $result1 = mysqli_query($conn, $query1);
            $result2 = mysqli_query($conn, $query2);
            $result3 = mysqli_query($conn, $query3);
            $row1 = mysqli_fetch_assoc($result1);
            $row2 = mysqli_fetch_assoc($result2);
            $row3 = mysqli_fetch_assoc($result3);
        ?>
        <canvas id="myChart" width="400" height="500"></canvas>
    </div>
    <!--End of the presentation of the amount of male and female users being registered in the database-->
</div>
<!--End of the main container-->


<div class="secondmain">
    <!--Displaying the amount of users registered in the specific month-->
    <div class="bargraph1">
        <?php
            $query = "SELECT createdAt FROM users"; 
            $result = mysqli_query($conn, $query);
                
            if ($result) {
                $timestamps = [];
                while ($row = mysqli_fetch_assoc($result)) {
                    $timestamps[] = $row['createdAt'];
                }
            // Group timestamps by months
                $monthlyRegistrations = [];
                foreach ($timestamps as $timestamp) {
                    $month = date('F', strtotime($timestamp)); // Get month name from timestamp
                    $monthlyRegistrations[$month] = isset($monthlyRegistrations[$month]) ? $monthlyRegistrations[$month] + 1 : 1;
                }
            // Prepare data for Chart.js
                $months = array_keys($monthlyRegistrations);
                $registrationCounts = array_values($monthlyRegistrations);
            } else {
                echo "Error fetching data: " . mysqli_error($conn);
            }
        ?>
        <canvas id="barChart1"></canvas>
    </div>

    <div class="bargraph2">
        <?php
            $conn = getConnection();
            $query = "SELECT MONTH(date) as month, COUNT(*) as activity_count FROM activity GROUP BY MONTH(date)";
            $result = mysqli_query($conn, $query);

            $activitymonths = [];
            $activityCounts = [];

            while ($row = mysqli_fetch_assoc($result)) {
            // Convert the numeric month to its respective name (e.g., 1 => "January")
            $monthName = date("F", mktime(0, 0, 0, $row['month'], 1));
            $activitymonths[] = $monthName;
            $activityCounts[] = $row['activity_count'];
            }   

            // Close the database connection
            mysqli_close($conn);
        ?>
        
             <canvas id="monthlyActivityChart" width="500" height="300"></canvas>
    </div>
    <!--End of the presentation of data through bargrpah-->
</div>

<?php
  include_once("../included/footer.php");
?>

</body>

<!--Start of a javascript code-->
<script>

//Javascript code for handling the deactivation and activation of the user account
function deactivateAccount(event, userId) {
    event.preventDefault(); // Prevent the default behavior of the anchor element
    if (confirm('Are you sure you want to deactivate the account?')) {
        // Perform AJAX request to deactivate the account
        // Example using Fetch API:
        fetch(`deactivate-account.php?id=${userId}`, {
            method: 'GET'
        })
        .then(response => {
            if (response.ok) {
                // Deactivation successful, you can handle the response if needed
                // Reload the page or update UI accordingly
                location.reload(); // Reload the page after deactivation
            } else {
                // Handle errors here
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }
    return false;
}

function activateAccount(event, userId) {
    event.preventDefault(); // Prevent the default behavior of the anchor element
    if (confirm('Are you sure you want to activate the account?')) {
        // Perform AJAX request to activate the account
        // Example using Fetch API:
        fetch(`activate-account.php?id=${userId}`, {
            method: 'GET'
        })
        .then(response => {
            if (response.ok) {
                // Activation successful, you can handle the response if needed
                // Reload the page or update UI accordingly
                location.reload(); // Reload the page after activation
            } else {
                // Handle errors here
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }
    return false;
}

// javascript code that handles the pie chart creation
var xValues = ["Male", "Female" ,"Others"];
var yValues = [<?php echo $row1['male'] ?>, <?php echo $row2['female'] ?>, <?php echo $row3['others'] ?>];
var barColors = ["#00FF00", "#008000", "#004400"];

new Chart("myChart", {
  type: "pie",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {    
    title: {
      display: true,
    },
    maintainAspectRatio: false 
  }
});

//Javascript for the creation of the bar graph
// Get the canvas element and its 2d context
var ctx = document.getElementById('barChart1').getContext('2d');
// Data for the chart (months and registration counts)
var months = <?php echo json_encode($months); ?>;
var registrationCounts = <?php echo json_encode($registrationCounts); ?>;
// Create the bar chart
var barChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: months, // X-axis labels (months)
        datasets: [{
            label: 'Number of Registrations',
            data: registrationCounts, // Y-axis data (registration counts)
            backgroundColor: '#008000', // Bar color with transparency
            borderColor: '#00FF00',// Border color
            borderWidth: 1 // Border width
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true // Start Y-axis at zero
            }
        },
        plugins: {
            legend: {
                display: false // Set to false to hide the legend
            }
        }
    }
});


// Get the canvas element and its 2d context
var ctxMonthly = document.getElementById('monthlyActivityChart').getContext('2d');

// Create the bar chart for monthly activity
var monthlyActivityChart = new Chart(ctxMonthly, {
    type: 'bar',
    data: {
        labels: <?php echo json_encode($activitymonths); ?>, // X-axis labels (months)
        datasets: [{
            label: 'Number of Activities',
            data: <?php echo json_encode($activityCounts); ?>, // Y-axis data (activity counts)
            backgroundColor: 'rgba(75, 192, 192, 0.2)', // Bar color with transparency
            borderColor: 'rgba(75, 192, 192, 1)', // Border color
            borderWidth: 1 // Border width
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true // Start Y-axis at zero
            }
        }
    }
});


//Javascript for handling the pop out modal for sending notification to the specific users.
function openModal(event, receiverId) {
    event.preventDefault();
    document.getElementById('receiverId').value = receiverId;
    // Code to open the modal

    // Get the modal element and the close button
    var modal = document.getElementById("modal");
    var closeButton = document.getElementsByClassName("close")[0];

    // Show the modal
    modal.style.display = "block";

    // Hide the modal when the close button or overlay is clicked
    closeButton.addEventListener("click", function () {
        modal.style.display = "none";
    });

    window.addEventListener("click", function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    });
}

</script>
</html>
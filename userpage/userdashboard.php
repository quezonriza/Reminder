<?php
    session_start();
    if($_SESSION["Role"] == null)
    {        
        header("Location: login.php");
    }
    else
    {
        if($_SESSION["Role"] == "user")
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
  <title>RemindersList - Userdashboard</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <!-- Favicons -->
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
   <!-- FontAwesome icon -->
   <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
   <link rel="stylesheet" href="../assets/css/userdashboard.css">

</head>

<style>
/* Modal styles */
.modal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    color: green;
  }
  
  .modal-content {
    background-color: rgba(169, 193, 177, 0.867);
    margin: 10% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
    max-width: 400px;
  }

.modal-content h2{
    font-size: 25px;
    font-weight: bold;
    text-align: center;
    padding:10px;
}
  
  .close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
    cursor: pointer;
  }
  
  .close:hover,
  .close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
  }
  button{
    background-color:rgb(0,153,112);
    border: 1px solid green;
    padding: 5px;
    color: white;
    font-weight: bold;
  }

</style>

<body>
<?php
    include_once("../included/userheader.php");
?>
<!-- The modal form -->
<div id="myModal" class="modal">
  <div class="modal-content">
    <span class="close" onclick="closeModal()">&times;</span>
    <img src="../assets/img/userdashboard/giphy.gif" alt="">
    <h2>Add Your Activity</h2>
    <form class="formfield" action="store-activity.php" method="post">
        <input type="hidden" name="userid" value="<?php echo $_SESSION['userid']; ?>">
        <input type="hidden" name="activityid">
        <div class="title">
            <i class="fa-solid fa-pen-to-square"></i>
            <input type="text" name="title" placeholder="Title...">
        </div>
        <div class="date">
            <i class="fa-solid fa-calendar-days"></i>
            <input type="date" name="date" class="date-input">
        </div>
        <div class="time">
            <i class="fa-solid fa-clock"></i>
            <input type="time" name="time">
        </div>
        <div class="location">
            <i class="fa-solid fa-location-pin"></i>
            <input type="text" name="location" placeholder="Location...">
        </div>
        <div class="ootd">
            <i class="fa-solid fa-person-dress"></i>
            <textarea name="ootd" id="" cols="30" rows="10" placeholder= "Plan Your Ootd"></textarea>
        </div>
        <div class="checkbox">
            <input type="radio" name="priority" value="High"> High Priority 
            <input type="radio" name="priority" value="Low" > Low Priority
        </div>
        <div class="btn-add">
            <input class= "addActivityForm" type="submit" value="Add">
        </div>
    </form>
  </div>
</div>
<!-- main container -->
<div class="main">
<!-- first container -->
    <div class="container-1">
        <div class="icon">
            <i class="fa-solid fa-square-check"></i>
        </div>
        <div class="activitytitle">
            <h1>My Activity-s</h1>
        </div>
    </div>
<!-- end of the first container -->

<!--button for adding activity-->
    <button onclick="openModal(event)">Add Activity</button>
<!-- third container -->
    <div class="container-3">
        <div class="dropdown">
            <label for="">Filter</label>
            <select onchange="window.location.href = this.value;">
                <option value="">Choose Filter</option>
                <option value="userdashboard.php?filter=inprogress">In Progress</option>
                <option value="userdashboard.php?filter=completed">Completed</option>
                <option value="userdashboard.php?filter=deleted">Deleted</option>
            </select>
        </div>

        <div class="dropdown">
            <label for="">Priority</label>
            <select onchange="window.location.href = this.value;">
                <option value="">priority</option>
                <option value="userdashboard.php?filter=priority&priority=high">High</option>
                <option value="userdashboard.php?filter=priority&priority=low">Low</option>
            </select>
        </div>
    </div>
<!-- end of the third container -->
<!-- Fourth container -->
<!-- rendering of data from the databse system -->
    <div class="container-4">
        <i class="fa-solid fa-clipboard-list"></i>
        <h1>Activity-List</h1>
        <?php
            $conn = getConnection();

            $statusCondition = "status IN ('done', 'inprogress', 'deleted')";
            // Handle the filter selection
            if (isset($_GET['filter'])) {
                $filter = $_GET['filter'];

                switch ($filter) {
                    case 'completed':
                        $statusCondition = "status = 'done'";
                        break;
                    case 'inprogress':
                        $statusCondition = "status = 'inprogress'";
                        break;
                    case 'deleted':
                        $statusCondition = "status = 'deleted'";
                        break;
                    case 'priority':
                        if (isset($_GET['priority']) && $_GET['priority'] === 'high') {
                            $priorityCondition = "priority = 'high'";
                        } else {
                            $priorityCondition = "priority = 'low'";
                        }
                        break;
                    default:
                        $statusCondition = "status IN ('done', 'inprogress', 'deleted')";
                        break;
                }
            } else {
                // Default filter condition (all activities)
                $statusCondition = "status IN ('done', 'inprogress', 'deleted')";
            }

                            // Retrieve user information from the database
            $query = "SELECT * FROM activity WHERE userid = ".$_SESSION["userid"]." AND $statusCondition";

            if (isset($priorityCondition)) {
                $query .= " AND $priorityCondition";
            }

            $query .= " ORDER BY Date";
            $result = mysqli_query($conn, $query);
            ?>

            <?php while ($row = mysqli_fetch_assoc($result)) { ?>

                <form action="store-done-activity.php?id=<?php echo $row['activityid']; ?>"  method="post">
                <div class="data-item" id="data">
                    <div class="titles"> Title: <?php echo $row['title']; ?></div>
                    <div>
                        Date: <?php echo $row['date']; ?>
                        Time: <?php echo $row['time']; ?>
                    </div>
                    <div>Location: <?php echo $row['location']; ?></div>
                    <div>Ootd: <?php echo $row['ootd']; ?></div>
                    <div>Remarks: <?php echo $row['remarks']; ?></div>
                    <div class="remarks">
                        <textarea name="remarks" id="" cols="30" rows="10" placeholder="Write Your Comments Here..."></textarea>
                    </div>
                    
                    <div class="button">
                        <a href="delete-activity.php?id=<?php echo $row['activityid']; ?>" onclick="return confirm('Are you sure you want to delete this activity?');"><i class="fa-solid fa-trash-can"></i></a>
                        <a href="edit-activity.php?id=<?php echo $row['activityid']; ?>"><i class="fa-regular fa-pen-to-square"></i></a>
                        <input type="hidden" name="activityid" value="<?php echo $row['activityid']; ?>">
                        <input type="submit" class="done-button" value="Done">
                    </div>
                 </div>
                 </form>

                 <br>
            <?php } ?>
        </div>

        <!-- end of the fourth container -->


       </div>
       <!-- end of the main container -->
<!-- JavaScript code -->

<script>
// Open the modal form
function openModal(event) {
    event.preventDefault();
  var modal = document.getElementById("myModal");
  modal.style.display = "block";
}

// Close the modal form
function closeModal() {
  var modal = document.getElementById("myModal");
  modal.style.display = "none";
}

// Close the modal form when clicking outside of it
window.onclick = function(event) {
  var modal = document.getElementById("myModal");
  if (event.target == modal) {
    modal.style.display = "none";
  }
};
</script>

</body>
</html>




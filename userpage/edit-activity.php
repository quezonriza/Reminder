<!-- edit-form.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>Edit User</title>
</head>
<body>
    <?php
    include("../included/dbconn.php");

    $conn = getConnection();

    $activityId = $_GET['id'];

    $updateQuery = "SELECT * FROM activity WHERE activityid = $activityId";

    $result = mysqli_query($conn, $updateQuery);
    $row = mysqli_fetch_assoc($result); // Assuming $result contains the user's data
    ?>
    <h1>Edit User</h1>
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>

<form action="save-edit-activity.php?id=<?php echo $row['activityid']; ?>"  method="post">
<div class="data-item" id="data">
    <div class="titles"> Title: value= "<?php echo $row['title']; ?>"</div>
    <div>
        Date: value ="<?php echo $row['date']; ?>"
        Time: value="<?php echo $row['time']; ?>"
    </div>
    <div>Location: value = "<?php echo $row['location']; ?>"</div>
    <div>Ootd: value="<?php echo $row['ootd']; ?>"</div>
    <div>Remarks: value ="<?php echo $row['remarks']; ?>"</div>
    <div class="remarks">
        <textarea name="remarks" id="" cols="30" rows="10" placeholder="Write Your Comments Here..."></textarea>
    </div>
    
    <div class="button">
        <input type="submit" class="done-button" value="Save">
    </div>
 </div>
 </form>
 <br>
<?php } ?>
</body>
</html>
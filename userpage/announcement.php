<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
  </style>
<body>
<?php
      include("../included/dbconn.php");
  ?>
      <div class="notificationmodal-content">
        <h2>Announcements</h2>
        <?php
                $conn = getConnection();
                // Retrieve user information from the database
                $query = "SELECT * FROM announcement WHERE userid = ".$_SESSION["userid"]."";
                $result = mysqli_query($conn, $query);
        ?>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>

            <form action="delete-announcement.php?id=<?php echo $row['announcementId']; ?>"  method="post">
              <div>
                  <div>
                      Date and Time: <?php echo $row['createdAt']; ?>
                  </div>
                  <div> 
                    <?php echo $row['messageContent']; ?>
                  </div>
                  <div class="button">
                      <input type="submit" class="done-button" value="Delete">
                  </div>
              </div>
            </form>
          <br>
        <?php } ?>
      </div>
  
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<style>
  body {
    font-family: Arial, sans-serif;
    background-color: #ffffff; /* White background */
    color: #008000; /* Green text color */
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}

.data-item {
    background-color: #008000; /* Green background color */
    color: #ffffff; /* White text color */
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0px 0px 10px 0px rgba(0, 128, 0, 0.3); /* Optional: Add shadow */
    margin-bottom: 20px;
    text-align: center;
    width: 300px; /* Set width as needed */
}

.done-button {
    background-color: #ffffff; /* White background for the button */
    color: #008000; /* Green text color for the button */
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    margin-top: 10px;
}

.done-button:hover {
    background-color: #008000; /* Green background for the button on hover */
    color: #ffffff; /* White text color for the button on hover */
}

.div{
  margin-top:50%;
}

</style>
<body>
 
<?php
    include_once("../included/userheader.php");
?>
 <br><br><br><br>

 <div class="div">


<?php
            $conn = getConnection();
                            // Retrieve user information from the database
            $query = "SELECT * FROM announcement ";
            $result = mysqli_query($conn, $query);
            ?>

            <?php while ($row = mysqli_fetch_assoc($result)) { ?>

                <form action="deleted-announcement.php?id=<?php echo $row['announcementId']; ?>"  method="post">
                <div class="data-item" id="data">
                    <div>
                        Date  and Time:  <?php echo $row['createdAt']; ?>
                    </div>
                    <div>Message: <?php echo $row['messageContent']; ?></div>
                 
              
                        <input type="submit" class="done-button" value="Delete">
                 </div>
                 </form>

                 <br>
            <?php } ?>
        </div>

        </div>
<?php
  include_once("../included/footer.php");
?>
</body>
</html>
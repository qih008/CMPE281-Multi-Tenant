<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>CMPE281 Multi-Tenant Page</title>
<link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="stylesheet" href="../css/cmpe281.css">

</head>
<body>
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">CMPE281 Multi-Tenant</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="./index.html">Home</a></li> 
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Qing <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Han Chen</a></li>
                <li><a href="#">Shuzhong Chen</a></li>
                <li><a href="#">Jiarui Hu</a></li>
                <li><a href="#">Qing Huang</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">
      
        <img src = "../map.jpg" style="position:absolute; top:100px; left:50px">
        
        <div style="position:absolute; top:250px; left:900px">
          <h4> Grading Result for Qing</h4>
          <?php
            // mysqli
            $servername = "cmpe281project.cnfzqfanrgnm.us-west-2.rds.amazonaws.com";
            $username = "qing";
            $password = "*********";
            $dbname = "cmpe281project";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            }

           //$sql = "SELECT GRADE, DONE, COMMENT FROM Qing_Huang where ID='4'";
           $sql = "SELECT RECORD_ID, TENANT_ID, TENANT_TABLE, COLUMN_1, COLUMN_2, COLUMN_3, COLUMN_4 FROM TENANT_DATA WHERE RECORD_ID='1006'";
           
           $result = $conn->query($sql);

           if ($result->num_rows > 0) {
           // output data of each row
             while($row = $result->fetch_assoc()) {
               echo "Grade is: " . $row["GRADE"]. "<br>";
               echo "Complete: " . $row["DONE"]. "<br>";
               echo "Comment: " . $row["COMMENT"]. "<br>";

               if(($row["COLUMN_2"] != "")){
                 echo "Grade is: " . $row["COLUMN_2"]. "<br>";
               }
               if(($row["COLUMN_3"] != "")){
                 echo "Complete: " . $row["COLUMN_3"]. "<br>";
               }
               if(($row["COLUMN_4"] != "")){
                 echo "Comment: " . $row["COLUMN_4"]. "<br>";
               }
             }
           } else {
             echo "0 results";
           }
           $conn->close();
        ?>
        </div>

    </div> <!-- /container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>


</body>
</html>
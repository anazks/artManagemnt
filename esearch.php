<html>
<head>
    <title>Search Exhibition</title>
</head>
<style>
    table{
             border-collapse: collapse;
             width: 60%;
             padding: 150px;
             margin-left: 280px;
     } 
    th, td {
             text-align: center;
             padding: 8px;
             border-radius: 12px;
            }
    tr:nth-child(even) 
    {
    	background-color: #f2f2f2;
        font-family: "arial";
        font-weight: bold;
        
    }
    th {
    background-color: mediumslateblue;
    color: white;
    font-family:  "verdana";
    font-weight: bold;
    
}
input[type=text] {
    width: 110px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 9px;
    font-size: 16px;
    background-color: white;
    background-position: 10px 10px; 
    background-repeat: no-repeat;
    padding: 25px 20px 22px 10px;
    -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
    font-weight: bold;
    font-size: 30px;
}
input[type=text]:focus {
    width: 60%;
}
div{
	font-family: "verdana";
	font-weight: bold;
	font-size: 30px;
	font-style: bold;
	margin-left:25px;
	margin-top: 35px;
}
.btn{
    background-color: forestgreen;
    color: white;
    padding: 16px 10px;
    margin: 8px 20px 20px 50px;
    border-radius: 24px;
    cursor: pointer;
    width: 10%;
    opacity: 0.7;
    align-content: center;
    font-family: "verdana";
    font-weight: bold;
    -webkit-box-shadow: 0px 6px 0px green;
    -moz-box-shadow: 0px 6px 0px green;
    box-shadow: 0px 6px 0px green;
    -webkit-transition: all .1s ease-in-out;
    -moz-transition: all .2s ease-in-out;
    transition: all .2s ease-in-out;
    -webkit-transform: translate(0, 5px) rotateX(25deg);
    -moz-transform: translate(0, 4px);
    transform: translate(0, 4px)
    }
.btn:hover 
{
    opacity: 1;
    background-color:forestgreen;
}
b{
	font-family: "verdana";
	background-color: lightcyan;
    color: black;
    margin-left:80px;
    border-radius: 8px;
    text-align: center;
    font-size: 30px;
    width: 85%;
    
}
span{
    font-family: "verdana";
    background-color: lightcyan;
    color: black;
    margin-top:4px;
    border-radius: 8px;
    text-align: center;
    font-size: 30px;
    margin-left:0px;
    width: 35%;  
    font-weight: bold;
}
</style>
<body style="background-color: lavender">
    <h1><center><font style="border:9px solid grey" face="arial">SEARCH FROM EXHIBITION TABLE </font></center></h1>
	<form action="esearch.php" method="POST">
		<div>Enter Exhibition ID:<input type="text" name="E_ID"><br></div>
		<br><br>
		<button type="submit" value ="Find" class="btn">SEARCH</button>
	</form>
<?php
$host="localhost";
$user="root";
$password="";
$con= new mysqli($host,$user,$password,"art_gallery");
if ($con->connect_error) {
		    die("Connection failed: " . $con->connect_error);
		}
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	$n1=$_POST['E_ID'];
	echo "<b><br>Entered Exhibition ID is $n1<br></b>";
	
	$sql="SELECT * from exhibition where eid='$n1'";

				$result = $con->query($sql);

			if ($result->num_rows > 0) {
                echo "<b><br>Search Successful<br><br></b>";
		    echo "<br><br><br><br><table><tr><th>E_ID</th><th>G_ID</th><th>Start Date</th><th><br>End Date<br></br></th></tr>";
		   		    while($row = $result->fetch_assoc()) {
		       echo "<tr><td>" . $row["eid"]. "</td><td>" . $row["gid"]. "</td><td>" .$row["startdate"]. "</td><td><br>"
              . $row["enddate"]. "<br></br></td></tr>";
		    }
		    echo "</table>";
		} else {
		    echo "<span><br><br>OPPS!!! Search Unsuccessful!<br><br>There is no such Exhibition ID exists. Please Enter Correct Exhibition ID and Search again.</span>";
		}
		}

		$con->close();
?>

</body>
</html>
<?php

//Establishing Connection

$servername = "localhost";
$username = "root";
$password = "1234";

// Creating connection

$conn = new mysqli($servername, $username, $password);

//Checking connection

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";
echo "<br>";

//--------------------------------------------------------------------------------------------------------

// Creating Database

$sql = "CREATE DATABASE myDB";
if (mysqli_query($conn,$sql)) {
 echo "Database created successfully";
} 
else 
{
 echo "Error creating database: " . $conn->error;
}


$conn2 = new mysqli($servername, $username, $password, "myDB");
//----------------------------------------------------------------------------------------------------------


// Creating Table

$q ="CREATE TABLE Movies(movie_name varchar(40), actor varchar(40), actress varchar(40), director varchar(40), year int(4))";

if(mysqli_query($conn2,$q))
 echo "Successfull";
 else
    echo "Unsuccessfull";

//----------------------------------------------------------------------------------------------------------

//Inserting Values 

 $q1 = "INSERT INTO Movies VALUES ('The Shawshank Redemption', 'Tim Robbins', '','Frank Darabont', '1994'),
('Dilwale Dulhaniya Le Jayenge','Shahrukh Khan','Kajol', 'Aditya Chopra','1995'),('Kuch Kuch Hota Hai','Shahrukh Khan', 'Kajol', 'Karan johar','1998'),('Shutter Island', 'Leonardo DiCaprio', 'Michelle Williams', 'Martin Scorsese', '2010'),('Inception','Leonardo DiCaprio','Marion Cotillard','Cristopher Nolan', '2010'), ('Gangs of Wasseypur 1', 'Manoj Bajpayee','Richa Chadha', 'Anurag Kashyap','2012'),('Gangs of Wasseypur 2', 'Nawazuddin Siddiqui','Huma Quereshi', 'Anurag Kashyap', '2012')";
if(mysqli_query($conn2,$q1))
{
  echo "Values Inserted";
}
else

{
    echo "Unsuccessfull";
}

// --------------------------------------------------------------------------------------------------------
// To display all the data from the table
$s = "SELECT * from Movies";

$result=mysqli_query($conn2,$s);
echo "<br>";
echo "<table border='1'>";
while ($row = mysqli_fetch_assoc($result)) { 
    echo "<tr>";
    foreach ($row as $field => $value) { 
        echo "<td>" . $value . "</td>";  
    }
    echo "</tr>";
}
echo "</table>";

//----------------------------------------------------------------------------------------------------------

//Query : Display all the movies where Actor name is "Shahrukh Khan"


$s1 = "SELECT * from Movies WHERE actor ='Shahrukh Khan'";

$result=mysqli_query($conn2,$s1);
echo "<br>";
echo "<table border='1'>";
while ($row = mysqli_fetch_assoc($result)) { 
    echo "<tr>";
    foreach ($row as $field => $value) { 
        echo "<td>" . $value . "</td>";  
    }
    echo "</tr>";
}
echo "</table>";

//---------------------------------------------------------------------------------------------------------

//Query : Display the movie names which were released in 2010 or before 2010

$s2 = "SELECT movie_name from Movies WHERE year <= 2010";

$result=mysqli_query($conn2,$s2);
echo "<br>";
echo "<table border='1'>";
while ($row = mysqli_fetch_assoc($result)) { 
    echo "<tr>";
    foreach ($row as $field => $value) { 
        echo "<td>" . $value . "</td>";  
    }
    echo "</tr>";
}
echo "</table>";

//---------------------------------------------------------------------------------------------------------


//Closing Connection

$conn2->close();


?>



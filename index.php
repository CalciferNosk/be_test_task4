<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "task4";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT book_name, CONCAT(first_name , ' ',last_name) AS AuthorName, publish_date AS PublisDate
FROM	authors AS A 
INNER	JOIN	books AS B
ON	A.id = B.author_id";

$result = $conn->query($sql);


	echo '<h1>LIST OF ALL RECORD</h1>';
	echo '<table  border = 1>';
  	
  	echo 	'<tr>
  			<th>Book Name</th>
 			<th>Author Name</th>
  			<th>Publis Date</th>
  			</tr>';
  while($row = $result->fetch_assoc()) {

	echo 	'<tr>
  			<td>' . $row['book_name'] . '</td>
 			<td>' . $row['AuthorName'] . '</td>
 			<td>' . $row['PublisDate'] . '</td>
  			</tr>';
  		}
  	echo '</table>';





  	$sql = "SELECT book_name, CONCAT(first_name , ' ',last_name) AS AuthorName, publish_date AS PublisDate
		FROM	authors AS A 
		INNER	JOIN	books AS B
		ON	A.id = B.author_id
		ORDER by B.publish_date LIKE'2021-01-%' DESC LIMIT 1";

	$result = $conn->query($sql);


		echo '<h1>last published book in January 2021</h1>';
		echo '<table  border = 1>';
	  	
	  	echo 	'<tr>
	  			<th>Book Name</th>
	 			<th>Author Name</th>
	  			<th>Publis Date</th>
	  			</tr>';
	  while($row = $result->fetch_assoc()) {

		echo 	'<tr>
	  			<td>' . $row['book_name'] . '</td>
	 			<td>' . $row['AuthorName'] . '</td>
	 			<td>' . $row['PublisDate'] . '</td>
	  			</tr>';
	  		}
	  	echo '</table>';


?>
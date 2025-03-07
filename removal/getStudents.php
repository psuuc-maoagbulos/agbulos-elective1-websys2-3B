<?php
include("config.php");

// Retrieve data from the database using JOIN
$query = "SELECT studentInfo.studentID, studentInfo.name, studentInfo.contactNumber, studentInfo.yearLevel, studentInfo.section, studentInfo.email, grade.mark
          FROM studentInfo
          INNER JOIN grade ON studentInfo.studentID = grade.studentID";
$result = $conn->query($query);

// Display data in a table
while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row['studentID'] . "</td>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['contactNumber'] . "</td>";
    echo "<td>" . $row['yearLevel'] . "</td>";
    echo "<td>" . $row['section'] . "</td>";
    echo "<td>" . $row['email'] . "</td>";
    echo "<td>" . $row['mark'] . "</td>";
    echo "</tr>";
}

$conn->close();
?>
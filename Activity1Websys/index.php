<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Social Media Profile</title>
</head>
<style>
    /* styles.css */

    body {
        font-family: Arial, sans-serif;
        background-color: #f0f0f0;
        margin: 0;
        padding: 0;
    }

    h1 {
        text-align: center;
        color: #333;
    }

    form {
        max-width: 500px;
        margin: 0 auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
        color: #333;
    }

    input[type="text"],
    input[type="file"],
    textarea {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 3px;
        font-size: 16px;
    }

    input[type="submit"] {
        background-color: #3498db;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 3px;
        font-size: 18px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    input[type="submit"]:hover {
        background-color: #2980b9;
    }

    /* Radio Button Styles */
    .form-check-input {
        display: inline-block;
        margin-right: 10px;
    }

    .profile-picture-container {
        width: 150px; 
        height: 150px; 
        border-radius: 50%; 
        overflow: hidden; 
        position: relative;
    }

    .profile-picture-container img {
        width: 100%; 
        height: auto; 
    }
</style>
<body>
    <h1>Enter your data</h1>
    <form action="process.php" method="post" enctype="multipart/form-data">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required><br>

        <label for="profile_picture">Profile Picture:</label>
        <input type="file" name="profile_picture" id="profile_picture"><br>

        <label for="Current city">Current City:</label>
        <input type="text" name="Current_city" id="current_city"><br>

        <label for="Hometown">Hometown:</label>
        <input type="text" name="Hometown"><br>

        <label for="sex">Sex:</label>
        <input type="radio" name="sex" class="form-check-input" id="male" value="Male" />
        <label for="male" class="form-check-label">Male</label>

        <input type="radio" name="sex" class="form-check-input" id="female" value="Female" />
        <label for="female" class="form-check-label">Female</label>

        <input type="radio" name="sex" class="form-check-input" id="other" value="Other" />
        <label for="other" class="form-check-label">Other</label><br>

        <label for="birthday" name="bday">Birthday:</label>
        <input type="date" name="birthday" id="bday"><br>

        <label for="relationship">Relationship Status:</label>
        <select name="relationship status" id="relationship status">
            <option value="Single">Single</option>
            <option value="Married">Married</option>
            <option value="Widow">Widow</option>
            <option value="Complicated">Complicated</option>
        </select><br>

        <label for="Employer">Employment Status:</label>
<input type="radio" name="employment_status" class="form-check-input" id="employed" value="employed" />
<label for="employed" class="form-check-label">Employed</label>

<input type="radio" name="employment_status" class="form-check-input" id="unemployed" value="unemployed" />
<label for="unemployed" class="form-check-label">Unemployed</label>

<input type="radio" name="employment_status" class="form-check-input" id="student" value="student" />
<label for="student" class="form-check-label">Student</label><br>


        <label for="Education">Education:</label>
        <select name="education" id="education">
            <option value="Elementary">Elementary</option>
            <option value="High School">High School</option>
            <option value="Undergraduate">Undergraduate</option>
            <option value="N/A">Did not attend School</option>
        </select><br>

        <label for="Political Views">Political Views:</label>
        <label for="Democracy">
            <input type="checkbox" id="Democracy" name="checkbox[]" value="Democracy"> Democracy
        </label>
        <label for="Environmentalism">
            <input type="checkbox" id="Environmentalism" name="checkbox[]" value="Environmentalism"> Environmentalism
        </label>
        <label for="Communism">
            <input type="checkbox" id="Communism" name="checkbox[]" value="Communism"> Communism
        </label>
        <label for="Other">
            <input type="checkbox" id="Other" name="checkbox[]" value=""> Other
        </label><br>

        <label for="book">Favorite Book:</label>
        <input type="text" name="book" id="Book"><br>

        <label for="Quote">Favorite Quote:</label><br>
        <textarea name="Quote" id="Quote" rows="4" cols="50"></textarea><br>

        <h4>Contact Information</h4>

        <label for="street">Street:</label>
        <input type="text" name="street" required>

        <label for="city">City:</label>
        <input type="text" name="city" required>

        <label for="province">Province:</label>
        <input type="text" name="province" required>

        <label for="zip">Zip Code:</label>
        <input type="text" name="zip" required>
        <br>

    <input type="submit" value="Update_Profile">
    </form>
</body>

</html>

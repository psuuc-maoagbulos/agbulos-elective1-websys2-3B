<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>
<body>
    <h1>HFTML FORM</h1>
    <div class="container">
        <form action="connect.php" method="post">
  <div>
    <label>Name</label>
    <input type="text" name="name" placeholder="Enter your name" required>
  </div>
  <div>
    <label>Email</label>
    <input type="email" name="email" placeholder="Enter your email" required>
  </div>
  <div>
    <label>Gender</label>
   <input type="radio" name=" gender" value="male"> Male
   <input type="radio" name=" gender" value="female"> Female
   <input type="radio" name=" gender" value="others" > Others
  </div>
  <div>
    <label>Mobile</label>
    <input type="text" name="mobile" placeholder="Enter your mobile number" required>
  </div>
  <div>
    <label>Password</label>
    <input type="password" name="password" placeholder="Enter your password"required>
  </div>
  <div>
    <label>_ I'm gay?</label>
    <select name=option>
        <option value="yes">yes</option>
        <option value="no">no</option>
        <option value="maybe">maybe</option>
    </select>
  </div>
  <div>
    <button type="submit">Submit</button>
  </div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report User</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            margin: 20px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #ff8c00; /* Orange color for heading */
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input, textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ff8c00; /* Orange border for input elements */
        }

        #dropArea {
            border: 2px dashed #ff8c00;
            padding: 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .rep {
            margin-top: 10px;
            background-color: #ff8c00; /* Orange background color for button */
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .rep:hover {
            background-color: #ff6f00; /* Darker orange color on hover */
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</head>
<body>

    <div class="container">
        <h1>Report User</h1>
        <form id="reportForm" action="report.php" method="post" enctype="multipart/form-data">
        <?php
            session_start();
require '../connection.php';
if(isset($_SESSION['username'])){
  $username=$_SESSION['username'];
  $stmt="select * from account where username ='$username'";
  $container=$conn->query($stmt);
  while($data=$container->fetch_assoc()){

           ?>
  <label for="reporterName">Your Username:</label>
            <input type="text" id="reporterName" name="reporterName" value="<?php echo$data['username'] ?>" >
<?php   }

}  ?>
          

            <label for="reportDescription">Report Description:</label>
            <textarea id="reportDescription" name="reportDescription" rows="4" ></textarea>

           <div id="dropArea">
    <input type="file" name="img" id="reporterImageInput" required>
    
    <!-- Font Awesome icon -->
    

    <p>Click to select</p>
</div>

            <input type="submit" name="rep" class="rep" value="Submit Report" >
        </form>
    </div>
    <?php
require '../connection.php';

if (isset($_POST['rep'])) {
    $username = $_SESSION['username'];
    $name = $_POST['reporterName'];
    $report = $_POST['reportDescription'];

    // Validate form fields
    if (empty($name) || empty($report) || empty($_FILES['img']['name'])) {
        echo "<script>
            Swal.fire({
                title: 'Validation Error',
                text: 'Please fill in all the required fields and select an image.',
                icon: 'error'
            });
        </script>";
    } else {
        // Continue with form processing
        $imgname = $_FILES['img']['name'];
        $imgtmp_name = $_FILES['img']['tmp_name'];
        $uploadDirectory = "../user_dashboard/reportimage/";

        if (move_uploaded_file($imgtmp_name, $uploadDirectory . $imgname)) {
            // File uploaded successfully
            $stmt = $conn->prepare("INSERT INTO reports (name, report, image, username) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $name, $report, $imgname, $username);
            $stmt->execute();

            echo "<script>
                Swal.fire({
                    title: 'Report Submitted',
                    text: 'Thank you for submitting your report. We will review it soon.',
                    icon: 'success'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Redirect or perform any additional action
                    }
                });
            </script>";
        } else {
            echo "Error uploading file";
            echo $imgname;
        }
    }
}
?>



    <script>
      

      const dropArea = document.getElementById('dropArea');
const fileInput = document.getElementById('reporterImageInput');

// Prevent default behaviors for drag-related events
['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
    dropArea.addEventListener(eventName, preventDefaults, false);
});

// Highlight on dragenter and dragover
['dragenter', 'dragover'].forEach(eventName => {
    dropArea.addEventListener(eventName, highlight, false);
});

// Unhighlight on dragleave and drop
['dragleave', 'drop'].forEach(eventName => {
    dropArea.addEventListener(eventName, unhighlight, false);
});

// Handle file drop
dropArea.addEventListener('drop', handleFileSelect, false);

function preventDefaults(e) {
    e.preventDefault();
    e.stopPropagation();
}

function highlight() {
    dropArea.classList.add('dragover');
}

function unhighlight() {
    dropArea.classList.remove('dragover');
}

function handleFileSelect(event) {
    const fileList = event.dataTransfer.files;

    if (fileList.length > 0) {
        const fileName = fileList[0].name;
        dropArea.innerHTML = `<p>File selected: ${fileName}</p>`;
        fileInput.files = fileList;
    }
}


    </script>

</body>
</html>

<?php
include('database.php');
session_start();


$query = "SELECT post.*, users.username FROM post
          JOIN users ON post.user_id = users.id
          ORDER BY post.dateTime_created DESC";

$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Simple Blog</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: antiquewhite;
        }

        header {
            background-color: cornflowerblue;
            color: #ffffff;
            padding: 10px 0;
        }

        header h1 {
            margin: 0;
        }

        nav ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        nav ul li {
            display: inline;
            margin-right: 15px;
        }

        nav a {
            color: #ffffff;
            text-decoration: none;
            font-size: large;
            font-weight: 700;
        }

        main {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            margin: 20px 0;
        }

        article {
            border: 1px solid #dee2e6;
            border-radius: 5px;
            padding: 15px;
            margin-bottom: 20px;
        }

        article img {
            max-width: 100%;
            height: auto;
            margin-top: 10px;
            margin-bottom: 10px;
        }

        article h2 {
            color: #007bff;
            cursor: pointer;
            transition: color 0.3s;
        }

        article h2:hover {
            color: darkgray; 
        }

        .comment-section {
            margin-top: 20px;
        }

        .comment-section h4 {
            color: #007bff;
            margin-bottom: 10px;
        }

        .comment {
            border-bottom: 1px solid #dee2e6;
            margin-bottom: 10px;
            padding-bottom: 10px;
        }

        .comment strong {
            color: #007bff;
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1>Blog Entry</h1>
            <nav>
                <ul class="nav justify-content-end">
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="create_entry.php">Create Blog Entry</a></li>
                    <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main class="container">
        <?php while ($row = $result->fetch_assoc()) : ?>
            <article>
                <h2 onclick="toggleComments('<?= $row['blogID'] ?>')"><?= $row['blog_title'] ?></h2>
                <div id="commentSection_<?= $row['blogID'] ?>" style="display: none;" class="comment-section">
                    <h4>Comments:</h4>
                    <?php
                    $blogId = $row['blogID'];
                    $commentsQuery = "SELECT comments.*, users.username FROM comments
                                     JOIN users ON comments.user_id = users.id
                                     WHERE comments.blogID = $blogId";
                    $commentsResult = $conn->query($commentsQuery);
                    ?>

                    <?php while ($comment = $commentsResult->fetch_assoc()) : ?>
                        <div class="comment">
                            <p><strong><?= $comment['username'] ?> says: </strong><?= $comment['comment'] ?><br><b><?= $comment['DateTime'] ?></b></p>
                        </div>
                    <?php endwhile; ?>

                    <form action='add_comment.php' method='post'>
                        <input type='hidden' name='blogID' value='<?= $blogId ?>'>
                        <div class='form-group'>
                            <label for='comment'>Add Comment:</label>
                            <textarea name='comment' class='form-control' required></textarea>
                        </div>
                        <button type='submit' class='btn btn-primary'>Submit Comment</button>
                    </form>
                </div>
                <p><?= nl2br($row['blog_content']) ?></p>
                <p>Category: <?= $row['blog_cat'] ?></p>
                <p>Posted by: <?= $row['username'] ?></p>
                <?php if ($row['blog_pic']) : ?>
                    <img src='uploads/<?= $row['blog_pic'] ?>' alt='Blog Image' class='img-fluid'>
                <?php endif; ?>
                <p><?= $row['dateTime_created'] ?></p>
            </article>
        <?php endwhile; ?>
    </main>

    <script>
        function toggleComments(blogId) {
            var commentSection = document.getElementById('commentSection_' + blogId);
            commentSection.style.display = (commentSection.style.display === 'none' || commentSection.style.display === '') ? 'block' : 'none';
        }
    </script>
</body>
</html>

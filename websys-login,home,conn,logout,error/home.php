<?php session_start(); ?>

<?php if (!isset($_SESSION['user'])) {
    header("Refresh:2;url=index.php");
} else { ?>
    OY WELCOME INSAN <?php echo $_SESSION['user']; ?>
    <br>
    <a href="logout.php">LOGOUT!</a>
<?php } ?>

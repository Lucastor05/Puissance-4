
<?php
function active($url) {
    if ($_SERVER["PHP_SELF"] == $url)
    {
        echo 'class="active"';
    }
}

function absolute() {
    if ($_SERVER["PHP_SELF"] == '/memory.php' || $_SERVER["PHP_SELF"] == '/scores.php'|| $_SERVER["PHP_SELF"] == '/login.php'|| $_SERVER["PHP_SELF"] == '/myaccount.php'|| $_SERVER["PHP_SELF"] == '/register.php')
    {
        echo 'class="topnav"';
    }elseif ($_SERVER["PHP_SELF"] == '/index.php' || $_SERVER["PHP_SELF"] == '/contact.php'){
        echo 'class="topnavAbsolute"';
    }
}

?>

<nav <?php echo absolute(); ?>>
    <a href="memory.php" class="nomSite">The Power Of Mermory</a>
    <div class="divnav">
        <!--Different lien vers les pages-->
        <a <?php echo active('/index.php'); ?> href="index.php">ACCUEIL</a>
        <a <?php echo active('/memory.php'); ?> href="memory.php">JEU</a>
        <a <?php echo active('/scores.php'); ?> href="scores.php">SCORES</a>
        <a <?php echo active('/contact.php'); ?> href="contact.php">NOUS CONTACTER</a>
        <a <?php echo active('/myaccount.php'); ?> href="myaccount.php">MON ESPACE</a>
    </div>
</nav>
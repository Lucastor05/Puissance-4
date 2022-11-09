
<?php
function active($url) {
    if ($_SERVER["PHP_SELF"] == $url)
    {
        echo 'class="active"';
    }
}

function absolute() {
    if ($_SERVER["PHP_SELF"] == '/Puissance-4/memory.php' || $_SERVER["PHP_SELF"] == '/Puissance-4/scores.php'|| $_SERVER["PHP_SELF"] == '/Puissance-4/login.php'|| $_SERVER["PHP_SELF"] == '/Puissance-4/myaccount.php'|| $_SERVER["PHP_SELF"] == '/Puissance-4/register.php')
    {
        echo 'class="topnav"';
    }elseif ($_SERVER["PHP_SELF"] == '/Puissance-4/index.php' || $_SERVER["PHP_SELF"] == '/Puissance-4/contact.php'){
        echo 'class="topnavAbsolute"';
    }
}

?>

<nav <?php echo absolute(); ?>>
    <a href="memory.php" class="nomSite">The Tower Of Mermory</a>
    <div class="divnav">
        <!--Different lien vers les pages-->
        <a <?php echo active('/Puissance-4/index.php'); ?> href="index.php">ACCUEIL</a>
        <a <?php echo active('/Puissance-4/memory.php'); ?> href="memory.php">JEU</a>
        <a <?php echo active('/Puissance-4/scores.php'); ?> href="scores.php">SCORES</a>
        <a <?php echo active('/Puissance-4/contact.php'); ?> href="contact.php">NOUS CONTACTER</a>
        <a <?php echo active('/Puissance-4/myaccount.php'); ?> href="myaccount.php">MON ESPACE</a>
    </div>
</nav>
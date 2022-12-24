<header>
    <div id="korisnik_info"></div>
    <div id="logout">
        <form action="" method="post">
            <input type="submit" value="logout" name="logout" id="btn_logout">
        </form>
    </div>
</header>

<?php
    if(isset($_POST["logout"])){
    unset($_SESSION["logovani_korisnik"]);
    header("Location: .");
    }

?>
<?php
    $server = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "project";

    $conn = mysqli_connect($server, $dbuser, $dbpass, $dbname);

    if(!$conn){
        ?>
            <script>
                alert("Connection To Database Failed");
                mysqli_close($conn);
            </script>
        <?php
    }
?>
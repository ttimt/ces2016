<?php
    if (isset($_POST['submit']) && !empty($_POST['fbusername']))
    {
        $username = $_POST['fbusername'];
        $link = "https://www.facebook.com/";
        $url = $link . $username;

        $ch = curl_init($url);
        curl_setopt( $ch, CURLOPT_POST, false );
        curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, true );
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/40.0.2214.93 Safari/537.36");
        curl_setopt( $ch, CURLOPT_HEADER, false );
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $source = curl_exec( $ch );

        $pos_entity = strpos($source, "\"entity_id\"");
        $source_cut = substr($source, $pos_entity);

        $pos_curly = strpos($source_cut, "}");
        $source_cut = substr($source_cut, 0, $pos_curly);

        echo 'Search entity_id result: ' . $pos_entity . "\n";
        echo 'Search } result: ' . $pos_curly . "\n";
        echo "<textarea rows=\"6\" cols=\"50\">";
        echo $source_cut;
        echo '</textarea>';
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <h2>Get Facebook ID from username v2.5</h2>
    </head>
    <body>
        <form action="" method="post">
            <input type="text" name="fbusername" placeholder="Enter FB username here:"/>
            <input type="submit" name="submit" value="Search ID" />
        </form>
    </body>
</html>

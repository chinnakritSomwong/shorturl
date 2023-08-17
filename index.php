<?php
require_once('core/url.Class.php');
$URLShortener = new URLShortener;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X_UA_Compatible" content="ie=edge">
    <title>URL Shorterner</title>
    <link rel='stylesheet' href="css/style.css">
</head>
<body>
    <?php
        echo $URLShortener -> mainForm();
    ?>
    <div class="qrcode" id="imgBox" >
        <img src="" id="qrImage">
    </div>
    <script>
        let imgBox = document.getElementById("imgBox");
        let qrImage = document.getElementById("qrImage");
        let qrText = document.getElementById("$insertData");


        function generateQR(){
            qrImage.src = "https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=Example="
            + qrText.value;
        }
    </script>
    <body>  
    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "url_shortener";

        $conn = new mysqli($servername, $username, $password, $dbname);

        
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT id, long_url, short_url FROM shortended_urls";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table >
            <tr>
                <th>ID</th>
                <th>Long URL</th>
                <th>Short URL</th>
            </tr>";
            
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["id"]. "</td><td>" . $row["long_url"]. "</td><td>" . $row["short_url"]. "</td></tr>";
            }
            echo "</table>";
        } else {
            echo "0 results";
        }

        $conn->close();
    ?>
 
    </body>  
        
 
</body>
 
</html>
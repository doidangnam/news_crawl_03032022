<?php

use Models\Client;
use Refactor\Factory\ContentParser\TextParser;

    include('./autoload.php');
    define('REGEX_VALIDATED_URL', "/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i");
    define('ACCEPTED_SITE', ['vnexpress.net', 'dantri.com.vn', 'vietnamnet.vn']);
    
    // CHECK IF USER ADDED LINK 
    if (isset($_GET['link'])) {
        $link = filter_var($_GET['link'],FILTER_SANITIZE_SPECIAL_CHARS);
        $site = parse_url($link)['host'];
        $arr = [];
    }

    if (isset($_POST['save_to_db'])) {
        try {
            $site = $_POST['site'];
            $date = $_POST['date'];
            $title = $_POST['title'];
            $description = $_POST['description'];
            $details = $_POST['details'];
            $images = $_POST['images'];
            
            include('./database/connectdb.php');
            $sql = sprintf("INSERT INTO news (site, date, title, description, details, images) VALUES ('%s', '%s', '%s', '%s', '%s', '%s')", $site, $date, $title, $description, $details, $images);
            $isSucceeded = $conn->query($sql);
            
            if ($isSucceeded) {
                echo '<script language="javascript">';
                echo 'alert(`SUCCESS! ADDED 1 RECORD TO DB`)';
                echo '</script>';
            }
        } catch (\Exception $e) {
            die ("Error: " . $sql . "<br>" . $conn->error);
        }
        $conn->close();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- FORM GET CONTENT FROM LINK -->
    <form action="" method="GET">
        <label for="link"> Put link here! </label>
        <input type="text" id="link" name="link" value="<?php echo $link ?>" />
        <?php 

        // CHECK WHETHER URL IS VALID
        if (!preg_match(REGEX_VALIDATED_URL, $link) && isset($link)) {
            echo '<script language="javascript">';
            echo 'alert(`Invalid URL`)';
            echo '</script>';
        } elseif (in_array($site, ACCEPTED_SITE)) {
            echo("Valid $site URL");
            $crawler = new Helpers\Crawler($link);
            $clientGetText = new Client(new TextParser($crawler, $site));
            $arr = $clientGetText->getContent();

            // Array for storage and display
            // $arr = $content->getArrayElements();
            // $images = $imageArr->getArrayElements();
            
            // $imageSrc = [];
            // foreach ($images[1] as $image) {
            //     preg_match( '/src="([^"]*)"/i', $image, $src );
            //     array_push($imageSrc,($src)[1]);
            // }
        ?>
        
            <!-- Display Information of the article -->
            <table>
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Details</th>
                        <th>Images</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $arr['date'][0] ?></td>
                        <td><?php echo $arr['title'][0] ?></td>
                        <td><?php echo $arr['description'][0] ?></td>
                        <td><?php foreach ($arr['details'][0] as $detail) {
                                echo $detail;
                            } ?>
                        </td>
                        <td><?php foreach ($images[1] as $image) {
                                print_r($image);
                            } ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        <?php
        
        // USER INPUTS THE UNACCEPTED LINK
        } elseif (!in_array($link, ACCEPTED_SITE) && isset($_GET['link'])) {
            echo '<script language="javascript">';
            echo 'alert(`This address is currently unavailable!`)';
            echo '</script>';
        }
        ?>
    </form>

    <!-- FORM:SAVE TO DB -->
    <?php if ($arr['title'] != NULL && trim($link) != 0) { ?> 
        <form action="" method="POST">
            <input name="site" type="hidden" value='<?php echo $site ?>' >
            <input name="date" type="hidden" value='<?php echo $arr['date'][0] ?>'>
            <input name="title" type="hidden" value='<?php echo $arr['title'][0] ?>' >
            <input name="description" type="hidden" value='<?php echo $arr['description'][0] ?>'>
            <input name="details" type="hidden" value='<?php echo implode("|", $arr['details'][0]) ?>' >
            <input name="images" type="hidden" value='<?php echo implode("|", $imageSrc) ?>' >
            <button type="submit" name="save_to_db">SAVE TO DATABASE!</button>
        </form>
    <?php } ?>
</body>
</html>
<?php
    require_once('./Logic.php');
    require_once('./Parser.php');
    require_once('./VnexpressParser.php');

    define('REGEX_VALIDATED_EMAIL', "/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i");
    if (isset($_GET['link'])) {
        $link = $_GET['link'];
    }
    // $content = file_get_contents("https://vnexpress.net/tong-giam-doc-cong-ty-bat-dong-san-o-dong-nai-bi-bat-4434711.html");
    
    // preg_match('#<span class="date">(.*?)</span>#si', $content, $date);
    // preg_match('#<h1 class="title-detail">(.*?)</h1>#si', $content, $title);
    // preg_match('#<p class="description">(.*?)</p>#si', $content, $description);
    // preg_match_all('#<p class="Normal">(.*?)</p>#si', $content, $details);
    // echo '<pre>';
    // print_r($date);
    // echo '</pre>';
    // echo '<pre>';
    // print_r($title);
    // echo '</pre>';

    // echo '<pre>';
    // print_r($description);
    // echo '</pre>';

    // echo '<pre>';
    // print_r($details);
    // echo '</pre>';
    
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
    <form action="" method="GET">
        <label for="link">Put link here!</label>
        <input type="text" id="link" name="link" value="<?php echo $link ?>"/>
        <?php 
        if (!preg_match(REGEX_VALIDATED_EMAIL,$link)) {
            echo("Invalid URL");
        } else {
            echo("Valid URL");
            $logic = new Logic($link);
            $content = new VnexpressParser($logic);
            $arr = $content->parse();
        ?>
            <table>
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Details</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $arr['date'][0] ?></td>
                        <td><?php echo $arr['title'][0] ?></td>
                        <td><?php echo $arr['description'][0] ?></td>
                        <td><?php foreach($arr['details'][0] as $detail) {
                                echo $detail;
                            } ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        <?php
        }
        ?>
    </form>
</body>
</html>
<?php
    // ADD NEEDED FILES 
    require_once('./Logic.php');
    require_once('./Parser.php');
    require_once('./VnexpressParser.php');
    require_once('./DantriParser.php');
    require_once('./VietnamnetParser.php');
    require_once('./Constant.php');
    // CHECK IF USER ADDED LINK
    if (isset($_GET['link'])) {
        $link = $_GET['link'];
        $site = parse_url($link)['host'];
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
    <form action="" method="GET">
        <label for="link"> Put link here! </label>
        <input type="text" id="link" name="link" value="<?php echo $link ?>" />
        <?php 
        // CHECK WHETHER EMAIL IS VALID
        if (!preg_match(REGEX_VALIDATED_EMAIL,$link)) {
            echo("Invalid URL");
        } else {
            echo("Valid $site URL");
            $logic = new Logic($link);

            if ($site == "vnexpress.net") {
                $content = new VnexpressParser($logic);
            }

            if ($site == "dantri.com.vn") {
                $content = new DantriParser($logic);
            }

            if ($site == "vietnamnet.vn") {
                $content = new VietnamnetParser($logic);
            }

            $arr = $content->parse();
        ?>
            <!-- Display Information of the article -->
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
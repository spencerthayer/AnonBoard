<?php
    define("ROOT",getcwd());
    $settings_file = ROOT."/settings.json";
    if(file_exists($settings_file)){
        header("Location: /");
        die;
    }
    // $handle = fopen($settings_file, "w") or die("Cannot open file:  ".$settings_file);
    // $settings = json_decode(file_get_contents($settings_file),true);
    // echo $settings["isHTTPS"];
    // echo $settings["maxAge"];
    if (isset($_POST["add"])) {
        // $file = file_get_contents($settings_file);
        // $data = json_decode($file, true);
        unset($_POST["add"]);
        $data = array(
            "isHTTPS" => $_POST["isHTTPS"],
            "siteName" => $_POST["siteName"],
            "maxPosts" => $_POST["maxPosts"],
            "maxAge" => $_POST["maxAge"],
            "proxyURI" => $_POST["proxyURI"],
            "adminPass" => $_POST["adminPass"],
            );
        file_put_contents($settings_file, json_encode($data));
        header("Location: /");
        die;
        }
    function rand_pass($length){
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0~`!1@2#3$4%5^6&7*8(9)0_-+={[}]|\:;<,>.?/";
        return substr(str_shuffle($chars),0,$length);
        }
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
    <link rel="stylesheet" href="/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="/css/main.css"/>
    <link rel="stylesheet" href="/css/fancylinks.css"/>
</head>
<body>
    <div class="container">
        <form action="/settings.php" method="POST">
            <div class="form-group clear">
                <label class="col-sm-3 control-label">HTTPS:</label>
                <label class="radio-inline">
                    <input type="radio" name="isHTTPS" id="" value="TRUE" checked="checked"> YES
                </label>
                <label class="radio-inline">
                    <input type="radio" name="isHTTPS" id="" value="FALSE"> NO
                </label>
                <!--<div class="col-sm-10">
                    <input type="text" class="form-control" value="1" name="isHTTPS" placeholder="" />
                </div>-->
            </div>
            <div class="form-group clear">
                <label class="col-sm-2 control-label">Site Name:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="" name="siteName" placeholder="Leave blank to use domain as name." />
                </div>
            </div>
            <div class="form-group clear">
                <label class="col-sm-2 control-label">Maximum Posts:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="0" name="maxPosts" placeholder="" />
                </div>
            </div>
            <div class="form-group clear">
                <label class="col-sm-2 control-label">Post Expiration:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="0" name="maxAge" placeholder="" />
                </div>
            </div>
            <div class="form-group clear">
                <label class="col-sm-2 control-label">Proxy URI:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="https://ssl-proxy.my-addr.org/myaddrproxy.php/https/" name="proxyURI" placeholder="" />
                </div>
            </div>
            <div class="form-group clear">
                <label class="col-sm-2 control-label">Admin Password:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?=rand_pass(24);?>" name="adminPass" placeholder="adminPass" />
                </div>
            </div>
            <input type="submit" class="btn btn-large red-bg clear" name="add" />
        </form>
    </div>
</body>
</html>
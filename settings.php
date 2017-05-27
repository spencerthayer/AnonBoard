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
    $length = rand(16,24);
    function rand_pass($length){
        $lowerCase = "abcdefghijklmnopqrstuvwxyz";
        $upperCase = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $digits = "1234567890";
        $special = "!@#$%^&*(){}<>|\/_-=+;:,.?'`~";
        $chars = $lowerCase.$upperCase.$digits.$special;
        return substr(str_shuffle($chars),0,$length);
        }
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
    <meta name="ROBOTS" content="NOINDEX, NOFOLLOW">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0"/>
    <link rel="stylesheet" href="/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="/css/main.css"/>
    <link rel="stylesheet" href="/css/fancylinks.css"/>
</head>
<body>
    <div class="container">
        <div class="page-header">
            <h1>Setting Up AnonBoard v0.9.1</h1>
            <p class="lead">To start using your installation of <a href="https://github.com/spencerthayer/AnonBoard" target="_blank">AnonBoard</a> fill out the form below. Keep a record of the administration password in order to manage posts and change settings.</p>
        </div>
        <form action="/settings.php" method="POST">
            <div class="form-group clear">
                <label class="col-sm-2 control-label">HTTPS:</label>
                <div class="col-sm-10">
                    <label class="radio-inline">
                        <input type="radio" name="isHTTPS" id="" value="TRUE" checked="checked"> YES
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="isHTTPS" id="" value="FALSE"> NO
                    </label>
                    <span id="helpBlock" class="help-block">
                        One can optionally run AnonBoard without an SSL certificate but don't.
                    </span>
                </div>
            </div>
            <div class="form-group clear">
                <label class="col-sm-2 control-label">Site Name:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="" name="siteName" placeholder="Leave blank to use domain as name." />
                    <span id="helpBlock" class="help-block">
                        Change the site name to anything.
                    </span>
                </div>
            </div>
            <div class="form-group clear">
                <label class="col-sm-2 control-label">Maximum Posts:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="0" name="maxPosts" placeholder="" />
                    <span id="helpBlock" class="help-block">
                        Change to limit the number of posts. 0 for no limit.
                    </span>
                </div>
            </div>
            <div class="form-group clear">
                <label class="col-sm-2 control-label">Post Expiration:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="0" name="maxAge" placeholder="" />
                    <span id="helpBlock" class="help-block">
                        Change to limit the number of days a post remains active. 0 for no limit.
                    </span>
                </div>
            </div>
            <div class="form-group clear">
                <label class="col-sm-2 control-label">Proxy URI:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="https://ssl-proxy.my-addr.org/myaddrproxy.php/https/" name="proxyURI" placeholder="" />
                    <span id="helpBlock" class="help-block">
                        If you pick another proxy it must work with HTTPS hotlinks.
                    </span>
                </div>
            </div>
            <div class="form-group clear">
                <label class="col-sm-2 control-label">Admin Password:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" value="<?=rand_pass($length);?>" name="adminPass" placeholder="adminPass" />
                    <span id="helpBlock" class="help-block">
                        If you don't like the generated password, change it to any strong password.
                    </span>
                </div>
                <label class="col-sm-1 control-label">
                    <a href="/">
                        <i class="fa fa-refresh" aria-hidden="true"></i>
                    </a>
                    <?=$length;?>
                </label>
            </div>
            <div class="form-group clear">
                <input type="submit" class="btn btn-large red-bg clear" name="add" />
            </div>
        </form>
    </div>
    <script type="text/javascript" src="https://use.fontawesome.com/2b49769613.js"></script>
</body>
</html>
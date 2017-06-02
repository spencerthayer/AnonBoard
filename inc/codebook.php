<?php
$URLpath = "http://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
$delimiters = array("?","-");
$paths = explode( $delimiters[0], str_replace($delimiters, $delimiters[0], $URLpath) );
// echo "1: ".$paths[0]."<br/>".
//   "2: ".$paths[1]."<br/>".
//   "3: ".$paths[2]."<br/>".
//   "4: ".$paths[3]."<br/>".
//   "5: ".$paths[4]."<br/>".
//   "6: ".$paths[5]."<br/>";
if(empty($paths[1])){
  $numStart = (date("z")-1);
} else {
  $numStart = ($paths[1]-1);
}
if(empty($paths[2])){
  $numFinish = 365;
} else {
  $numFinish = $paths[2];
}

function writeCodebook($startNum,$finishNum) {
    // for ($x = 1; $x <= $finishNum; $x++) {
    $numRange = range($startNum,$finishNum);
    for ($x = 1; $x < count($numRange); $x++) {
        // echo $numRange[$x]."<br/>";
        echo    "<div class=\"form-group row coderow\">".
                    "<label class=\"number col-sm-1 control-label\">".$numRange[$x]."</label>".
                    "<div class=\"col-sm-11\">".
                        "<input class=\"passphrase form-control\" value=\"".
                            rand_pass(64,128).
                        "\"/>".
                    "</div>".
                "</div>";
        }
    }

// writeCodebook($numStart,$numFinish);

/**/?>
<div class="clearfix"> <br/> </div>
<a class="anchor" id="post"></a>
<div class="row">
  <!--<legend>Non Functional Form Demo <sub>/js/aes-form.js</sub></legend>-->
  <div class="container submitForm">
      <form
        role="form"
        action="/codebook"
        method="post"
        enctype="multipart/form-data"
        >
		<div class="col-lg-8">
        <h3>Build a New Codebook</h3>
        <p>
        Customize your Codebook by adding a <a href="/codebook?1-12">range in the URL</a>.
        </p>
        <div class="form-group">
      		<div class="row">
                <div class="form-group col-md-5" role="form" style="text-align:right;">
                    <label for="topic"><?php echo $siteURL."/"; ?></label>
                </div>
                <div class="form-group col-md-7" role="form">
                    <input type="" name="url" id="url" class="form-control" placeholder="Pick the URL for your Codebook." required />
                </div>
          </div>
        <textarea
            type="text"
            class="form-control"
            name="postTxt"
            id="postTxt"
            accept-charset="UTF-8"
            style="display:none;"
            required
            ><?php writeCodebook($numStart,$numFinish); ?></textarea>
        <input
            name="postCrypted"
            id="postCrypted"
            class="form-control"
            style="background-color:#333;color:#666;border-color:#333;border-radius:0 0 4px 4px;resize:none;"
            value=""
            />
            </div>
          <!-- PASSPHRASE CONTROLS -->
      		<div class="row">
                <div class="form-group col-md-2" role="form">
                    <div class="note rightext pass" for="passphrase">
                    Passphrase:
                    </div>
                </div>
                <div class="form-group col-md-10" role="form">
                <input
                class="form-control"
                type="password"
                name="passphrase"
                id="passphrase"
                style="border-radius:4px 4px 0 0;"
                />
                </div>
          </div>
          <!-- /PASSPHRASE CONTROLS -->
			</div>
      <!-- SIDEBAR -->
      <div class="col-lg-4">
        <!-- INFORMATION -->
        <h3>Your Information</h3>
        <h4 style="color:#fff;">
          Before you post, are you anonymous?
        </h4>
        <blockquote> <!--class="blockquote-reverse"-->
          <?php
            if($domainName != "localhost") {
              echo $ip."<br/>";
              if($userinfo->status == "fail") {
                echo $userinfo->message."<br/>";
              } else {
                echo $userinfo->as."<br/>".
                $userinfo->org."<br/>".
                "<a href=\"https://google.com/maps/place/".$userinfo->lat.",".$userinfo->lon."\" target=\"_blank\">".
                $userinfo->city.", ".$userinfo->region.", ".$userinfo->countryCode." ".$userinfo->zip.
                "</a>";
              }
            } else {
              ECHO "<p>NOT CONNECTED TO INTERNET</p>";
            }
            ?>
        </blockquote>
        <p>
          If the information above isn't fake please <a href="<?php echo $proxyURI.$this->board; ?>">click here</a> to anonymize your connection.
        </p>
        <!-- SUBMIT -->
        <button type="submit" class="btn btn-large red-bg" value="post">SUBMIT POST</button>
        <!-- /SUBMIT -->
        <!-- /INFORMATION -->
			</div>
      <!-- SIDEBAR -->
    </form>
	</div>
</div>
<?/**/?>
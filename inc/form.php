<!-- <?php echo $isThread; ?> -->
<div class="clearfix"> <br/> </div>
<a class="anchor" id="post"></a>
<div class="row">
  <div class="container submitForm">
      <form
        role="form"
        action="/<?php if($isThread=="true") { echo $threadID; } ?>"
        method="post"
        enctype="multipart/form-data"
        onchange="generatePassword();"
        onkeypress="generatePassword();"
        >
			<div class="col-lg-8">
        <h3><?php if($isThread=="false") {
          echo "Post A New Topic";
        } else {
          echo "Reply to Topic #".$threadID;
        } ?></h3>
				  <div class="form-group">
				    <label for="topic">Title*</label>
				    <input type="" name="topic" id="topic" class="form-control" placeholder="The subject or theme of the post's discourse." required>
				  </div>
      		<div class="row">
					  <div class="form-group col-xs-6 col-md-4">
					    <label for="anonym">Anonym</label>
					    <input type="" name="anonym" class="form-control" id="anonym" placeholder="Defaults to anonymous.">
					  </div>
					  <div class="form-group col-xs-6 col-md-4">
					    <label for="password">Pass</label>
					    <input type="" name="password" class="form-control" id="password" placeholder="Password to delete post.">
					  </div>
					  <div class="form-group col-xs-6 col-md-2">
					    <label for="code">Code</label>
					    <input type="" name="code" class="form-control" id="code" placeholder="<?php if($isThread=="false") {
                echo "Tip: ".date("z")."";
              } else {
              } ?>" value="<?php if($isThread=="false") {
              } else {
                echo $thread['code'];
              } ?>">
					  </div>
            <div class="form-group col-xs-6 col-md-2">
              <label for="expires">Expires</label>
                <?php
                  if($maxAge==0) {
          					    echo "<input type=\"number\" min=\"0\" step=\"1\" name=\"expires\" class=\"form-control\" id=\"expires\" placeholder=\"Day #\">";
                    } else {
                        for ($i = 2; $i <= $maxAge; $i++) {
                          echo "<select type=\"\" name=\"expires\" class=\"form-control\" id=\"anonym\" placeholder=\"\">";
                          echo "<option value=\"\" selected=\"selected\">Never</option>";
                          echo "<option value=\"1\">1 Day</option>";
                          echo "<option value=\"".$i."\">".$i." Days</option>";
                          echo "</select>";
                        }
                    }
                ?>
            </div>
					</div>
				  <div class="form-group">
				  	<label>Text*<sub> This section can be encrypted.</sub></label>
				  	<textarea class="form-control" name="post" id="post" rows="5" required></textarea>
				  </div>
          <div class="form-group">
				  	<label>Attach an Image</label>
            <div class="input-group">
                <label class="input-group-btn">
                    <span class="btn btn-primary red-bg">
                        Browse&hellip; <input type="file" name="image" id="image" class="form-control" accept="image/*" style="display: none;" />
                    </span>
                </label>
                <input type="text" class="form-control" readonly>
            </div>
        </div>
          <!-- PASSPHRASE CONTROLS -->
      		<div class="row">
      			<div class="form-group col-md-2" role="form">
      					<div class="note rightext pass" for="passphrase">
                  Passphrase:
                </div>
      			</div>
      			<div class="form-group col-md-10" role="form">
      					<input class="form-control" type="password" id="passphrase" style="border-radius:4px 4px 0 0;" />
      			</div>
      		</div>
			</div>
      <div class="col-lg-4">
        <h3>Your Information</h3>
        <h4 style="color:#fff;">
          Before you post, are you anonymous?
        </h4>
        <blockquote> <!--class="blockquote-reverse"-->
          <?php /**/
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
            /**/ ?>
        </blockquote>
        <p>
          If the information above isn't fake please <a href="<?php echo $proxyURI.$this->board; ?>">click here</a> to anonymize your connection.
        </p>
        <!-- SUBMIT -->
        <button type="submit" class="btn btn-large red-bg" value="post">SUBMIT POST</button>
        <!-- /SUBMIT -->
			</div>
    </form>
	</div>
</div>


<!-- <form name="e" method="post" action="">
    Value to encrypt: <input type="text" name="val" value="<?php echo isset($_POST["val"]) ? $_POST["val"] : "My string - Could also be an JS array/object"?>" class="val" size="45"/><br/>
    Passphrase: <input type="text" name="pass" class="pass" value="<?php echo isset($_POST["pass"]) ? $_POST["pass"] : "my secret passphrase"?>" size="45"/><br/>
    <input type="submit" name="encrypt" value="Send to server and encrypt, than decrypt with cryptoJS"/>
    <?php
    if(isset($_POST["encrypt"])){
        include("./cryptojs-aes.php");
        ?>
        <hr/>
        <br/><br/>
        Encrypted value generated by PHP: <input type="text" value="<?php echo htmlentities(cryptoJsAesEncrypt($_POST["pass"], $_POST["val"]))?>" size="90" disabled="disabled" class="encrypted"/><br/>
        Decrypted value: <input type="text" value="" size="90" disabled="disabled"/> <input class="decrypt" type="button" value="Decrypt now with cryptoJS"/>
        <?php
    }
    ?>
</form> -->

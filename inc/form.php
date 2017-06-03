<?php //include(ROOT."/inc/"."cryptojs-aes".".php"); ?>
<!-- <?php echo $isThread; ?> -->
<div class="clearfix"> <br/> </div>
<a class="anchor" id="post"></a>
<div class="row">
  <!--<legend>Non Functional Form Demo <sub>/js/aes-form.js</sub></legend>-->
  <div class="container submitForm">
      <form
        role="form"
        action="/<?php if($isThread=="true") { echo $threadID; } ?>"
        method="post"
        enctype="multipart/form-data"
        <?//onchange="generatePassword();"
        //onkeypress="generatePassword();"?>
        >
			<div class="col-lg-8">
        <h3><?php if($isThread=="false") {
          echo "Post A New Topic";
        } else {
          echo "Reply to Topic #".$threadID;
        } ?></h3>
				  <div class="form-group">
				    <label for="topic">Title*</label>
				    <input type="" name="topic" id="topic" class="form-control" placeholder="The subject or theme of the post's discourse." required />
				  </div>
				  <div class="form-group">
				  	<label>Text*<sub> This section can be encrypted.</sub></label>
            <!--<textarea class="form-control" name="plaintxt" id="plaintxt" class="width-full">This is test text.</textarea>-->
            <textarea
              type="text"
              class="form-control"
              name="postTxt"
              id="postTxt"
              rows="5"
              size="45"
              <?php /* value="<?php echo isset($_POST["postTxt"]) ? $_POST["postTxt"]:"" ?>" */ ?>
              value=""
              style="border-radius:4px 4px 0 0;resize:vertical;"
              accept-charset="UTF-8"
              required
              ></textarea>
              <!--<textarea class="form-control" name="postCrypted" id="postCrypted" class="width-full" style="background-color:#333;color:#666;border-color:#333;border-radius:0 0 4px 4px;resize:none;"></textarea>-->
            <input
              name="postCrypted"
              id="postCrypted"
              class="form-control"
              style="background-color:#333;color:#666;border-color:#333;border-radius:0 0 4px 4px;resize:none;"
              value=""
              />
              <!--<output class="small grey" id="time-encrypt"></output>-->
              <!--<textarea class="form-control" name="decrtext" id="decrtext" readonly class="width-full"></textarea>-->
              <!--<output class="small grey" id="time-decrypt"></output>-->
				  </div>
          <!-- PASSPHRASE CONTROLS -->
      		<div class="row">
      			<div class="form-group col-md-2" role="form">
      					<div class="note rightext pass" for="passphrase">
                  Passphrase:
                  <div class="form-check form-check-inline">
                    <label class="form-check-label">
                      <input class="form-check-input" type="checkbox" id="isEncrypted "name="isEncrypted" value="true">
                      <small>Encrypt</small>
                    </label>
                  </div>
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
        <!-- FORM IMAGE -->
        <div class="form-group" style="margin-top:20px;">
          <label>Attach an Image
            <span class="help-block" style="display:inline;">
                ONLY JPG, JPEG, PNG, GIF, and SVG files are allowed.
            </span>
          </label>
          <div class="input-group">
            <label class="input-group-btn">
                <span class="btn btn-primary red-bg">
                    Browse&hellip; <input type="file" name="image" id="image" class="form-control" accept="image/*" style="display: none;" placeholder="ONLY JPG, JPEG, PNG, GIF, and SVG files are allowed." />
                </span>
            </label>
            <input type="text" class="form-control" readonly>
          </div>
        </div>
        <!-- /FORM IMAGE -->
        <!-- FORM OPTIONS -->
        <div class="row">
          <div class="form-group col-xs-6 ">
            <label for="anonym">Anonym</label>
            <input type="" name="anonym" class="form-control" id="anonym" placeholder="Default: anonymous" />
          </div>
          <div class="form-group col-xs-6">
            <label for="password">Edit Pass</label>
            <input type="" name="password" class="form-control" id="password" value="<?=rand_pass(6,10);?>" placeholder="Password to delete post." />
          </div>
          <div class="form-group col-xs-6">
            <label for="code">Code</label>
            <input type="" name="code" class="form-control" id="code" placeholder="<?php if($isThread=="false") {
              echo "Today: ".date("z")."";
            } else {
            } ?>" value="<?php if($isThread=="false") {
            } else {
              echo $thread['code'];
            } ?>" />
					  </div>
            <div class="form-group col-xs-6">
              <label for="expires">Expires In</label>
                <?php
                  if($maxAge==0) {
          					    echo "<input type=\"number\" min=\"0\" step=\"1\" name=\"expires\" class=\"form-control\" id=\"expires\" placeholder=\"Day #\" />";
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
            <div class="form-group col-xs-6">
              <label for="password">Voter Pass</label>
              <input type="" name="votePassword" class="form-control" id="votePassword" value="<?=rand_pass(6,10);?>" placeholder="Password to vote." />
            </div>
            <?php if($isThread=="false") : ?>         
            <div class="form-group col-xs-6 form-check form-check-inline">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox" id="isHidden "name="isHidden" value="true">
                <small>Hide Post</small>
              </label><br/>
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox" id="isVote "name="isVote" value="true">
                <small>Allow Votes</small>
              </label>
            </div>
            <?php endif; ?>
            </div>
          <!-- /FORM OPTIONS -->
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
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
				    <label for="topic">Title</label>
				    <input type="" name="topic" id="topic" class="form-control" placeholder="The subject or theme of the post's discourse." required>
				  </div>
      		<div class="row">
					  <div class="form-group col-xs-6 col-md-4">
					    <label for="anonym">Anonym</label>
					    <input type="" name="anonym" class="form-control" id="anonym" placeholder="Defaults to Anonymous.">
					  </div>
					  <div class="form-group col-xs-6 col-md-4">
					    <label for="password">Pass</label>
					    <input type="" name="password" class="form-control" id="password" placeholder="Password to delete post.">
					  </div>
					  <div class="form-group col-xs-6 col-md-2">
					    <label for="code">Code</label>
              <!-- <span class="label red-bg">
                <?//=date("z");?>
              </span> -->
					    <input type="" name="code" class="form-control" id="code" placeholder="<?php if($isThread=="false") {
                echo "".date("z")."";
              } else {
              } ?>" value="<?php if($isThread=="false") {
              } else {
                echo $thread['code'];
              } ?>">
					  </div>
            <div class="form-group col-xs-6 col-md-2">
              <label for="expires">Expires</label>
              <select type="" name="expires" class="form-control" id="anonym" placeholder="Defaults to Anonymous.">
                <option value="" selected="selected">Never</option>
                <option value="1">1 Day</option>
                <?php for ($i = 2; $i <= 31; $i++) {
                    echo "<option value=\"".$i."\">".$i." Days</option>";
                } ?>
              </select>
            </div>
					</div>
				  <div class="form-group">
				  	<label>Text</label>
				  	<textarea class="form-control" name="post" id="post" rows="5" required></textarea>
				  </div>
				  <!-- <div class="form-group">
				  	<label>Attach an Image</label>
				  	<input type="file" name="image" id="image" class="form-control" accept="image/*"/>
				  </div> -->
          <div class="form-group">
				  	<label>Attach an Image</label>
            <div class="input-group">
                <label class="input-group-btn">
                    <span class="btn btn-primary red-bg">
                        Browse&hellip; <input type="file" name="image" id="image" class="form-control" accept="image/*" style="display: none;" />
                        <!-- <input type="file" style="display: none;" multiple> -->
                    </span>
                </label>
                <input type="text" class="form-control" readonly>
            </div>
            <!-- <span class="help-block">
                Try selecting one or more files and watch the feedback for confirmation.
            </span> -->
        </div>
          <!-- PASSPHRASE CONTROLS -->
      		<div class="row">
      			<div class="form-group col-md-2" role="form">
      					<div class="note rightext pass" for="password">
                  Passphrase:
                </div>
      			</div>
      			<div class="form-group col-md-10" role="form">
      					<input class="form-control" type="password" id="key" style="border-radius:4px 4px 0 0;" />
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
        <p>If the information above isn't fake please
          <!-- <span class="square individual"> -->
            <a href="<?php echo $proxyURI.$this->board; ?>">click here</a>
          <!-- </span> -->
          to anonymize your connection.</p>
          <!--
http://fr.hidethistime.com/direct/aHR0cHM6Ly9hbmFyY2hpc3RzLmNsdWIv

          -->
        <!-- <small style="color:#fff;">
          <?=$siteName;?> will not keep your records. Hosts may keep records and are subject to the State.
        </small> -->
        <!-- SUBMIT -->
        <button type="submit" class="btn btn-large red-bg" value="post">SUBMIT POST</button>
			</div>
    </form>
	</div>
</div>

<? /**/ ?>
<script>
function getVote(int) {
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("poll").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","poll_vote.php?vote="+int,true);
  xmlhttp.send();
}
</script>
</head>
<body>

<div id="poll">
<h3>Do you like PHP and AJAX so far?</h3>
<form>
Yes:
<input type="radio" name="vote" value="0" onclick="getVote(this.value)">
<br>No:
<input type="radio" name="vote" value="1" onclick="getVote(this.value)">
</form>
</div>
<? /**/ ?>
<!-- POST #<?php echo $threadID; ?> -->
<div class="container-fluid no-pad">
  <?php if($thread['type']=='codebook'): ?>
    <sub>CODEBOOK URL: <a href="<?php echo $shareURL; ?>"><?php echo $shareURL; ?></a></sub>
  <?php endif; ?>
  <div class="col-lg-12 no-pad">
    <h1><?php echo $thread['topic']; ?></h1>
  </div>
  <?php if($thread['image']!='') : ?><!-- IMAGE #<?php echo $threadID; ?> -->
  <div class="col-md-6 pull-right">
    <a data-toggle="modal" data-target=".<?php echo $threadID; ?>">
      <img class="img-thumbnail view-thumbnail center" alt="" src="<?php echo "/boards/{$this->board}/images/".$thread['image']; ?>">
    </a>
  </div>
    <!-- /IMAGE #<?php echo $threadID; ?> --><?php endif; ?>
  <?php if($thread['isEncrypted']==NULL): ?>
  <div id="result" class="results lead"><?php
    $Parsedown = new Parsedown();
    echo $Parsedown->text($thread['postTxt']);
  ?></div>
  <?php elseif($thread['isEncrypted']=='true'): ?>
  <div id="posttext"><?php echo $thread['postTxt'] ?></div>
  <div class="form-group">
    <input class="form-control mb-2 mr-sm-2 mb-sm-0" type="text" name="password" id="password" placeholder="Use a passphrase to decrypt post, hit [Enter].">
    <output class="small grey" id="time-decrypt"></output>
    <textarea class="form-control" name="encrtext" id="encrtext" type="hidden" style="display:none;" hidden><?php echo $thread['postCrypted'] ?></textarea>
  </div>
  <output id="decrtext" style="display: none;"></output>
  <div id="result" class="results lead"></div>
  <?php endif; ?>
</div>
<?php if($thread['type']=='post'): ?>
<!-- POST FOOTER -->
<div class="board-footer">
  <a class="btn-sm red-bg" style="color:#fff;" role="button" href="/<?php echo $threadID; ?>#post">
      <i class="fa fa-reply" aria-hidden="true"></i> Reply
  </a>
  <a href="/<?php echo $threadID; ?>">
    <span class="label created">
      <i class="fa fa-calendar" aria-hidden="true"></i>
      <?php echo ago($thread['created']); ?>
    </span>
  </a>
  <span class="label author">
    by <span class="anonym"><?php
    if($thread['anonym']) {
      echo "@";
      echo psl($thread['anonym'], 18);
    } else {
      echo "anonymous";
    } ?></span>
  </span>
  <span class="share">
    <a href="https://facebook.com/sharer/sharer.php?u=<?=$shareURL;?>" target="_blank" class="facebook-share"><i class="fa fa-facebook-square"></i></a>
    <a href="https://twitter.com/home?status=<?=$shareURL;?>" target="_blank" class="twitter-share"><i class="fa fa-twitter-square"></i></a>
    <a href="https://plus.google.com/share?url=<?=$shareURL;?>" target="_blank" class="google-plus-share"><i class="fa fa-google-plus-square"></i></a>
  </span>
  <div class="right">
    <a href="/<?php echo $threadID; ?>#replies">
      <span class="label replies">
        <i class="fa fa-comments" aria-hidden="true"></i>
        <?php echo count($thread['posts']); ?>
      </span>
    </a>
    <?php if($thread['code']): ?>
      <span class="label code">
        &nbsp;
        <i class="fa fa-terminal" aria-hidden="true"></i>
        <?php echo $thread['code']; ?>
      </span>
    <?php endif; ?>
    <a href="/delete/<?php echo $threadID; ?>" class="label red-bg">
      <i class="fa fa-trash" aria-hidden="true"></i>
      DELETE
    </a>
  </div>
  <div class="clearfix"></div>
  </div>
  <!-- /POST FOOTER -->
  <?php endif; ?>
  <?php if($thread['image']!='') : ?><!-- MODAL IMAGE #<?php echo $threadID; ?> -->
  <div class="modal fade <?php echo $threadID; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">
              &times;
            </span>
          </button>
          <h4 class="modal-title" id="myModalLabel">
            <?php echo $thread['topic']; ?>
          </h4>
        </div>
        <img class="" alt="" src="<?php echo "/boards/{$this->board}/images/".$thread['image']; ?>" style="width: 100%;"/>
      </div>
          <small>
            <a href="http://metapicz.com/?imgsrc=<?php echo "$protocol{$this->board}/boards/{$this->board}/images/".$thread['image']; ?>" target="_blank">
              <i class="fa fa-tag" aria-hidden="true"></i>
              Check Metadata
            </a>
          </small>
    </div>
  </div>
<div class="clearfix"><br/></div>
<!-- /MODAL IMAGE #<?php echo $threadID; ?> --><?php endif; ?>
<!-- /POST #<?php echo $threadID; ?> -->

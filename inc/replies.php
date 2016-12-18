<!-- POST REPLIES -->
<div class="anchor" id="replies"></div>
<ul class="media-list">
  <?php /**/
    foreach($thread['posts'] as $postReply){
    $post = @json_decode(file_get_contents(ROOT."/boards/{$this->board}/".$postReply.".json"),true);
    ?>
    <!-- POST REPLY <?php echo $post['created']; ?>-->
        <div class="anchor" id="<?php echo $post['created']; ?>"></div>
        <li class="media reply">
          <?php if($post['image']!='') { ?><!-- IMAGE #<?php echo $post['created']; ?> -->
          <div class="media-left">
            <a data-toggle="modal" data-target=".<?php echo $post['created']; ?>">
              <img class="media-object img-thumbnail media-thumbnail" alt="" src="<?php echo "/boards/{$this->board}/images/".$post['image']; ?>">
            </a>
          </div>
        <!-- /IMAGE #<?php echo $post['created']; ?> --><?php } ?>
          <div class="media-body post-reply">
            <h3>
              <a href="/<?php echo $postReply; ?>" class="fourth before after">
                <?php echo $post['topic']; ?>
              </a>
            </h3>
            <p>
              <?php echo $post['post'] ?>
            </p>
            <!-- POST FOOTER --><div class="board-footer">
            <a class="btn btn-sm red-bg" style="color:#fff;" role="button" href="/<?php echo $postReply; ?>#post">
                <i class="fa fa-reply" aria-hidden="true"></i> Reply
            </a>
              <a href="/<?php echo $postReply; ?>">
                <span class="label created">
                  <i class="fa fa-calendar" aria-hidden="true"></i>
                  <?php echo ago($post['created']); ?>
                </span>
              </a>
              <span class="label author">
                by <span class="anonym"><?php
                if($post['anonym']) {
                  echo "@";
                  echo psl($post['anonym'], 18);
                } else {
                  echo "anonymous";
                } ?></span>
              </span>
              <!-- &nbsp; -->
              <span class="share">
                <a href="https://facebook.com/sharer/sharer.php?u=<?=$shareURL;?>" target="_blank" class="facebook-share"><i class="fa fa-facebook-square"></i></a>
                <a href="https://twitter.com/home?status=<?=$shareURL;?>" target="_blank" class="twitter-share"><i class="fa fa-twitter-square"></i></a>
                <a href="https://plus.google.com/share?url=<?=$shareURL;?>" target="_blank" class="google-plus-share"><i class="fa fa-google-plus-square"></i></a>
              </span>
              <div class="right">
                <a href="/<?php echo $postReply; ?>#replies">
                  <span class="label replies">
                    <i class="fa fa-comments" aria-hidden="true"></i>
                    <?php echo count($post['posts']); ?>
                  </span>
                </a>
                <?php if($post['code']): ?>
                  <span class="label code">
                    &nbsp;
                    <i class="fa fa-terminal" aria-hidden="true"></i>
                    <?php echo $post['code']; ?>
                  </span>
                <?php endif; ?>
                <a href="/delete/<?php echo $postReply; ?>" class="label red-bg">
                  <i class="fa fa-trash" aria-hidden="true"></i>
                  DELETE
                </a>
              </div><div class="clearfix"></div>
            </div><!-- /POST FOOTER -->
          </div>
        </li>
      <?php if($post['image']!='') { ?><!-- MODAL IMAGE -->
    </ul>
      <div class="modal fade <?php echo $post['created']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">
                  &times;
                </span>
              </button>
              <h4 class="modal-title" id="myModalLabel">
                <?php echo $post['topic']; ?>
              </h4>
            </div>
            <img class="" alt="" src="<?php echo "/boards/{$this->board}/images/".$post['image']; ?>" style="width: 100%;"/>
          </div>
        </div>
      </div>
      <!-- /MODAL IMAGE --><?php } ?>
  <!-- /POST REPLY <?php echo $post['created']; ?>-->
  <?php } /**/ ?>
<!-- /POST REPLIES  -->

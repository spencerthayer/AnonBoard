<? //echo $this->threads[$thread]['topic']; ?>
<div class="container-fluid"><div class="grid">
  <?php foreach($this->updated as $thread){ if($this->threads[$thread]['replyID'] == NULL) { ?>
    <!-- <div class="row"> -->
    <a href="/<?php echo $thread; ?>">
    <div class="grid-sizer col-lg-4"></div>
      <div class="grid-item col-lg-4 gridfix"><div class="board"><div class="media-body">
        <?php if($this->threads[$thread]['image']!=''): ?>
        <div class="">
          <a href="/<?php echo $thread; ?>">
            <!-- data-toggle="modal" data-target=".<?php echo $thread; ?>"> -->
            <img class="img-responsive" alt="" src="<?php echo "/boards/{$this->board}/images/".$this->threads[$thread]['image']; ?>">
          </a>
        </div>
        <?php endif; ?>
        <h3 class="topic">
          <a href="/<?php echo $thread; ?>" class="fourth before after">
            <?php psl($this->threads[$thread]['topic'], 74); ?>
          </a>
        </h3>
        <div class="post">
            <?php echo psl($this->threads[$thread]['post'], 148); ?>
        </div>
        <div class="board-footer">
          <a href="/<?php echo $thread; ?>">
            <span class="label created">
              <i class="fa fa-calendar" aria-hidden="true"></i>
              <?php echo ago($this->threads[$thread]['updated']); ?>
            </span>
          </a>
          <span class="label author">
            by <span class="anonym"><?php
            if($this->threads[$thread]['anonym']) {
              echo "@";
              echo psl($this->threads[$thread]['anonym'], 18);
            } else {
              echo "anonymous";
            } ?></span>
          </span>
          <div class="right">
            <a href="/<?php echo $thread; ?>#replies">
              <span class="label replies">
                <i class="fa fa-comments" aria-hidden="true"></i>
                <?php echo count($this->threads[$thread]['posts']); ?>
              </span>
            </a>
            <?php if($this->threads[$thread]['code']): ?>
              <span class="label code">
                &nbsp;
                <i class="fa fa-terminal" aria-hidden="true"></i>
                <?php echo $this->threads[$thread]['code']; ?>
              </span>
            <?php endif; ?>
          </div>
        </div>
        <div class="clearfix"></div>
      </div></div></div>
      <?php /*if($this->threads[$thread]['image']!='') { ?><!-- MODAL IMAGE -->
      <div class="modal fade <?php echo $thread; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">
                  &times;
                </span>
              </button>
              <h4 class="modal-title" id="myModalLabel">
                <?php echo $this->threads[$thread]['topic']; ?>
              </h4>
            </div>
            <img class="" alt="" src="<?php echo "/boards/{$this->board}/images/".$this->threads[$thread]['image']; ?>" style="width: 100%;"/>
          </div>
        </div>
      </div>
      <!-- /MODAL IMAGE --><?php } */?>
    </a>
    <?php } } ?>
</div></div>

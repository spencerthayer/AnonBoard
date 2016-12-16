<? //echo $this->threads[$thread]['topic']; ?>
<div class="container-fluid"><div class="grid">
  <?php foreach($this->updated as $thread){ ?>
    <?php if($this->threads[$thread]['replyID'] == NULL) { ?>
    <!-- <div class="row"> -->
    <div class="grid-sizer col-lg-4"></div>
      <div class="grid-item col-lg-4 gridfix"><div class="board">
        <h2>
          <a href="/<?php echo $thread; ?>" class="fourth before after">
            <?php psl($this->threads[$thread]['topic'], 24); ?>
          </a>
        </h2>
        <p>
          by <span class="anonym"><?php psl($this->threads[$thread]['anonym'], 24); ?></span>
        </p>
        <div class="media">
          <?php if($this->threads[$thread]['image']!='') { ?>
          <div class="media-left media-top">
            <a data-toggle="modal" data-target=".<?php echo $thread; ?>">
              <img class="img-thumbnail media-object media-thumbnail" alt="" src="<?php echo "/boards/{$this->board}/images/".$this->threads[$thread]['image']; ?>">
            </a>
          </div>
          <?php } ?>
          <div class="media-body">
            <?php
                if($this->threads[$thread]['image']=='') {
                  psl($this->threads[$thread]['post'], 188);
                } else {
                  psl($this->threads[$thread]['post'], 148);
                }
                ?>
          </div>
        </div>
        <div style="padding-top:5px;padding-bottom:5px;">
          <a href="/<?php echo $thread; ?>#replies">
            <span class="replies">
              Replies
            </span>
            <span class="badge">
              <?php echo count($this->threads[$thread]['posts']); ?>
            </span>
          </a>
          <span class="label red-bg">
            <?php echo date("m-d-y H:i T", $this->threads[$thread]['created']); ?>
          </span>&nbsp;
          <span class="replies">
            Code:
          </span>
          <span class="label code">
            <?php echo $this->threads[$thread]['code']; ?>
          </span>
        </div>
      </div></div>
      <?php if($this->threads[$thread]['image']!='') { ?><!-- MODAL IMAGE -->
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
      <!-- /MODAL IMAGE --><?php } ?>
    <?php  } ?>
  <?php  } ?>
</div></div>

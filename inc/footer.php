    <footer>
        <div class="container">
          <p>
            Created with <a href="https://github.com/spencerthayer/AnonBoard">AnonBoard</a> N&copy!<?=date("Y");?>
          </p>
        </div>
    </footer>
  </div>
  <?/* JAVASCRIPT */?>
  <script type="text/javascript" src="https://use.fontawesome.com/2b49769613.js"></script>
  <script type="text/javascript" src="/js/jquery-3.1.1.slim.min.js"></script>
  <script type="text/javascript" src="/js/bootstrap.js"></script>
  <script type="text/javascript" src="/js/masonry.pkgd.min.js"></script>
  <script type="text/javascript" src="/js/formfeedback.js"></script>
  <script type="text/javascript" src="/js/passstrong.js"></script>
  <script type="text/javascript" src="/js/grid_front.js"></script>
  <script type="text/javascript" src="/js/aes.js"></script>
  <script type="text/javascript" src="/js/aes-ctr.js"></script>
  <!--<script type="text/javascript" src="/js/aes-ctr-file-webworker.js"></script>-->
  <script type="text/javascript" src="/js/aes-form.js"></script>
  <script type="text/javascript" src="/js/aes-post.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/es5-shim/4.0.5/es5-shim.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
  <script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
  <script src="https://cdn.jsdelivr.net/markdown-it/8.3.1/markdown-it.min.js"></script>
  <script>
    // simplemde
    // var simplemde = new SimpleMDE({ element: $("#postTxt")[0] });
    // simplemde.toTextArea();
    // simplemde = null;
    // markdown
    $(function () {
      var output = $('output#markdown');
      var mdText = output.text();
      var md = window.markdownit({
        html:         false,
        xhtmlOut:     false,
        breaks:       false,
        linkify:      true,
        typographer:  true,
        quotes: '“”‘’'
        });
      $('#result').html(md.render(mdText));
      });
  </script>
</body>
</html>

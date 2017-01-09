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
  <script type="text/javascript" src="/js/app.js?<?=$ran;?>"></script>
  <!-- <script type="text/javascript" src="/js/aes.js"></script> -->
  <!-- <script type="text/javascript" src="/js/aes-json-format.js"></script> -->
  <script type="text/javascript">
  // $(document).ready(function(){
  //     $(".decrypt").on("click", function(){
  //         $(this).prev().val(JSON.parse(CryptoJS.AES.decrypt($(".encrypted").val(), $(document.e).find(".pass").val(), {format: CryptoJSAesJson}).toString(CryptoJS.enc.Utf8)));
  //     });
  // });
  </script>
</body>
</html>

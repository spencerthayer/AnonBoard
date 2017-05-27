  <script>
    // simplemde
    var simplemde = new SimpleMDE({
      element: $("#postTxt")[0],
      autofocus: true,
      autosave: {
        enabled: false,
        uniqueId: "",
        delay: 1000,
      },
      forceSync: true,
      promptURLs: true,
      status: false
    });
    simplemde.codemirror.on("change", function(){
      doc.qrySel("#passphrase").oninput();
    });
    // simplemde.toTextArea();
    // simplemde = null;
  </script>
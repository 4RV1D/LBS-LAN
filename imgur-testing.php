<?php

?>


<html>
  <body>
    <form enctype="multipart/form-data" method="post" action="upload.php" target="my_iframe">
      Choose your file here:
      <input name="img" type="file"/>
      <input type="submit" value="Upload It"/>
    </form>
    <!-- when the form is submitted, the server response will appear in this iframe -->
    <script language="JavaScript">
    <!--
    function autoResize(id){
    var newheight;
    var newwidth;

    if(document.getElementById){
        newheight=document.getElementById(id).contentWindow.document .body.scrollHeight;
        newwidth=document.getElementById(id).contentWindow.document .body.scrollWidth;
    }

    document.getElementById(id).height= (newheight) + "px";
    document.getElementById(id).width= (newwidth) + "px";
    }
    //-->
    </script>

    <IFRAME name="my_iframe" width="100%" height="200px" id="iframe1" marginheight="0" frameborder="0" onLoad="autoResize('iframe1');"></iframe>
  </body>
</html>

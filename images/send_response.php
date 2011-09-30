<?php
  // Get recipient e-mail address(es) from a file inaccessible to web server
  $f = fopen('../../../respondto.txt', 'r');
  if ($f != false) {
    $recipient = trim(fgets($f));
  } else {
    $recipient = "";
  }
  fclose($f);

  $subj   = "BOIDEM: " . trim($_POST['subject']);
  $msg    = trim($_POST['message']);
  $header = "From: " . trim($_POST['name']) 
    . " <" . trim($_POST['email']) . ">";

  if (!empty($msg)) {
    if (!empty($recipient) && mail($recipient, $subj, $msg, $header)) {
      $result = 'Your message has been sent. Thank you.';
    } else {
      $result = "I'm sorry; the e-mail system doesn't seem to be working at present.";
EOF;
    }
  } else {
    $result = "You forgot to enter a message! Hit your browser's \"back\" button to try again.";
  }

  echo <<<EOF
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<html>
<head>
  <title>boidem.org ~ Todd&#8217;s Tiliches</title>
  <meta http-equiv="content-type" content=
  "text/html; charset=us-ascii">
  <link rel="stylesheet" href="../images/layout.css" type="text/css">
  <meta name="generator" content=
  "HTML Tidy for Linux/x86 (vers 1 September 2005), see www.w3.org">
  <meta name="generator" content="www.csscreator.com">
</head>

<body>
  <div id="pagewidth">
    <div id="header">
      <img src="../images/boidem-title.gif" height="75" width="210">

      <div id="mainmenu">
        <ul class="navlist">
          <li><a href="../index.html", title="Home">Home</a></li>
          <li><a href="../portfolio.html", title="Portfolio">Portfolio</a></li>
          <li><a href="../resume.html", title="Resume">Resume</a></li>
          <li><a href="../resources.html", title="Resources">Resources</a></li>
          <li><a href="../05_Photos", title="Photos">Photos</a></li>
          <li><a href="../contact.html", title="Contact">Contact</a></li>
          </ul>
            </div>
              <div class="clearfix"></div>
      <div id="submenu-none"></div>
    </div> <!--end of header-->

    <div id="onecol" class="clearfix">
    <!----------------------- Beginning of main content ---------------------->
      <center>
        <br />
        <br />
        <br />
        <h1>$result</h1>
        <br />
        <br />
        <br />
  </center>
   <!-------------------------- End of main content ------------------------->
    
    <!-------------------------------- Footer ------------------------------>
    <div id="footer" align="center">
      <small><small>
        &copy; Copyright 2007 Todd Foster
      </small></small>
    </div>
  </body>
</html>

EOF
?>

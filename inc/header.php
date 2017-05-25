<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
  <?/* META */?>
    <meta name="ROBOTS" content="NOINDEX, NOFOLLOW"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta charset="utf-8"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
    <title><?=$siteName;?></title>
  <?/* SOCIAL SHARE */?>
    <meta property="og:site_name"content="<?php echo $this->board; ?>" />
    <meta property="og:image" content="$URLpath;img/" />
    <meta property="og:url" content="$URLpath;" />
  <?/* MOBILE SETTINGS */?>
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <link rel="apple-touch-icon" sizes="144x144" href="/favicon.png"/>
    <link rel="apple-touch-icon" sizes="114x114" href="/favicon.png"/>
    <link rel="apple-touch-icon" sizes="72x72" href="/favicon.png"/>
    <link rel="apple-touch-icon" href="/favicon.png"/>
    <link rel="shortcut icon" href="/favicon.png"/>
  <?/* CSS */?>
    <link rel="stylesheet" href="/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="/css/fancylinks.css"/>
    <link rel="stylesheet" href="/css/main.css"/>
  <?/* FONT */?>
    <link href="https://fonts.googleapis.com/css?family=Inconsolata:400,700|Montserrat:400,700&amp;subset=latin-ext" rel="stylesheet">
	</head>
  <body>
    <nav class="navbar navbar-inverse navbar-static-top  navbar-fixed-top">
    	<div class="container">
    		<div class="navbar-header">
    			<button class="navbar-toggle collapsed" data-target="#navbar8" data-toggle="collapse" type="button"><span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span></button>
          <a class="navbar-brand" href="/"><?=$siteName;?></a>
    		</div>
    		<div class="navbar-collapse collapse" id="navbar8">
    			<ul class="nav navbar-nav navbar-right">
    				<!-- <li class="active"> -->
      			<li>
              <?php
                if($isThread=="false") {
                  echo "<a href=\"/#post\">Post New Topic</a>";
                } elseif ($isThread==NULL) {
                } else {
                  echo "<a href=\"/".$thread['created']."#post\">Reply to Topic"." #".$thread['created']."</a>";
                } ?>
    				</li>
            <li>
              <a href="/smp.php" target="_blank">
                SMP
              </a>
            </li>
            <li>
               <?php if($isHTTPS=="TRUE") : ?><a href="https://ssllabs.com/ssltest/analyze.html?d=<?=$domainName;?>&latest" target="_blank">TEST SSL</a><? endif; ?>
            </li>
    				<!-- <li class="dropdown">
    					<a aria-expanded="false" class="dropdown-toggle" data-toggle="dropdown" href="#" role="button">Dropdown <span class="caret"></span></a>
    					<ul class="dropdown-menu" role="menu">
    						<li>
    							<a href="#">Action</a>
    						</li>
    						<li>
    							<a href="#">Another action</a>
    						</li>
    						<li>
    							<a href="#">Something else here</a>
    						</li>
    						<li class="divider"></li>
    						<li class="dropdown-header">Nav header</li>
    						<li>
    							<a href="#">Separated link</a>
    						</li>
    						<li>
    							<a href="#">One more separated link</a>
    						</li>
    					</ul>
    				</li> -->
    			</ul>
    		</div><!--/.nav-collapse -->
    	</div><!--/.container-fluid -->
    </nav>
		<div class="container">

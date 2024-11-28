<!doctype html>
<!-- data-bs-theme="dark" -->
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta property="og:image" content="../assets/ei-icon.jpg">
<link rel="image_src" href="../assets/ei-icon.jpg">
<link rel="icon" href="../assets/ei-icon.jpg">
<title>EI Dashboard</title>
</head>
<body onbeforeunload="unloader()" class="bg-light">

<div id="msgbox" class="modal fade" tabindex="-1" role="dialog"><div class="modal-dialog modal-dialog-scrollable" role="document"><div class="modal-content"><div class="modal-body msgbody"></div></div></div></div>

<div id="modalpage" class="modal fade" tabindex="-1" role="dialog"><div class="modal-dialog"><div class="modal-content"><div class="modal-body p-0 modalpagebody"></div></div></div></div>

<div class='unloader d-none' style='position: fixed; top:0; left:0; width:100vw; height:100vh; background:rgba(0,0,0,0.4); z-index: 999; text-align: center; padding-top:70px;'>
 <div class="spinner-border"></div>
</div>
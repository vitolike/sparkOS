<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>QRCODE</title>

<script src="<?= base_url(); ?>public/js/qrcode.js"></script>
</head>

<body onload="window.print()">
	  <div class="card-title" id="qrcode"></div>
    <p class="card-text"><b>Código:</b> <?= $query[0]->codigo; ?></p>
	<script type="text/javascript">
new QRCode(document.getElementById("qrcode"), "<?= $query[0]->codigo; ?>");
</script>

	</body>
</html>


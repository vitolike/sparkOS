<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Codigo de Barra 39</title>

</head>

<body onload="window.print()">
	<svg class="barcode"  
                jsbarcode-format="CODE39" 
                jsbarcode-value="<?= $query[0]->codigo; ?>" 
                jsbarcode-textmargin="0" 
		 jsbarcode-fontoptions="bold"></svg>
    <p class="card-text"><b>Código:</b> <?= $query[0]->codigo; ?></p>
<script src="https://cdn.jsdelivr.net/jsbarcode/3.6.0/JsBarcode.all.min.js"></script>
        <script>
            window.onload = function () {
                JsBarcode(".barcode").init();
            }
        </script>

	</body>
</html>


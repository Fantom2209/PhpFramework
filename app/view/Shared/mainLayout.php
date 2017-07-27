<?php
    use \app\core\Config;
    use \app\helpers\Html;
?>
<html>
	<head>
		<title><?php echo $this->Get('title');?></title>
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	</head>
	<body>

        <div class="container">
		<?php 
			require_once($this->view->Get('template'));
		?>
        </div>
        <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="<?php echo Config::URL_JS; ?>custom.js"></script>
	</body>
</html>
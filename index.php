<?php
require __DIR__ . '/vendor/autoload.php';
use Symfony\Component\Dotenv\Dotenv;
use App\Actions\GRUAction;
$dotenv = new Dotenv();
$dotenv->load(__DIR__.'/.env');
if(isset($_POST['generatePDF'])) {
	GRUAction::generate($_POST['CPF'], $_POST['nome'], intval($_POST['valor']));
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Geração de GRU UFAL</title>
	<link rel="stylesheet" href="./public/css/bootstrap.css">
	<link rel="stylesheet" href="./public/css/app.css">
</head>
<body>
	<div class="container" id="app">
		<form method="POST">
			
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
					<img id="logo-image" src="./public/images/bca-logo.svg" alt="Universidade Federal de Alagoas - Arapiraca. Guia de Recolhimento da União. Sistema de Bibliotecas">
				</div>
			</div>
			<div class="row" id="description-app">
				<div class="col-md-4 col-md-offset-4">
					<h4>Guia de Recolhimento da União</h4>
					<p>Aplicação para simplificar o processo de emissão da GRU para pagamento de multas do Sistema de Bibliotecas.</p>
				</div>
			</div>

			<div class="row">
				<div class="col-md-4 col-md-offset-4 col-xs-12 col-sm-12">
					<div class="row">
						<div class="col-md-12">	
							<div class="form-group">
								<label>Nome *</label>
								<input type="text" name="nome" class="form-control" required placeholder="Insira seu nome aqui">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">	
							<div class="form-group">
								<label>CPF *</label>
								<input type="text" id="CPF" name="CPF" data-mask="000.000.000-00" class="form-control" required placeholder="000.000.000-00">
							</div>
						</div>	
					</div>
					
					<div class="row">
						<div class="col-md-12">	
							<div class="form-group">
								<label>Valor *</label>
								<input type="number" name="valor" class="form-control" palcehold="Insira o valor a ser pago" required>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">	
							<button type="submit" id="generatePDF" name="generatePDF" class="btn btn-app btn-block">
								<span class="glyphicon glyphicon-print"></span> &nbsp;
								Gerar
							</button>
						</div>
					</div>
				</div>
			</div>
		</form>

		<div class="row" id="footer">
			<p>Desenvolvido por NTI Campus Arapiraca</p>
			<small>Fevereiro de 2019</small>
		<div>

	</div>
	
	<script src="./public/js/jquery.min.js"></script>
	<script src="./public/js/jquery.mask.min.js"></script>
	<script src="./public/js/app.js"></script>
</body>
</html>

<?php

namespace App\Actions;

use \GruSiafi\UgIfro;
use \GruSiafi\UnidadeGestora;
use \GruSiafi\GruSiafi;
use \GruSiafi\DadosGru;
use \GruSiafi\Recolhimento as R;

class GRUAction {

	public static function generate($cpf, $nome, $valor)
	{	
		$ug = new UnidadeGestora();
		$ug->setCodigo(getenv('UG'))
		    ->setGestao(getenv('GE'))
		    ->setCodigoCorrelacao(getenv('CCR'))
		    ->setNomeUnidade(getenv('NU'))
		    ->setCodigoRecolhimento(getenv('CR'));

		$dadosGru = new DadosGru(
		    getenv('NRF'),
		    $cpf,
		    utf8_decode($nome),
		    number_format($valor, 2, ',', '.'),
		    number_format($valor, 2, ',', '.'));

		$now_date = new \DateTime();
		$now = $now_date->format('m/Y');
		$now_date->add(new \DateInterval('P7D')); 
		$payment_date = $now_date->format('d/m/Y');

		$dadosGru->setCompetencia($now);
		$dadosGru->setVencimento($payment_date);

		$gruSiafi = new GruSiafi($ug, $dadosGru);

		header("Content-type:application/pdf");
		header("Content-Disposition:inline");

		echo $gruSiafi->getPDF();
	}

	private static function paymenteDate() {
		//Data de pagamento
		
		return [$now_date, $payment_date];
	}
}
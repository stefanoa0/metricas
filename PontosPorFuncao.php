<?php
echo '<meta charset="UTF-8">';
$ArquivosInternos = $_POST['ArquivosInternos'];
$InterfacesExternas= $_POST['InterfacesExternas'];
$EntradasExternas= $_POST['EntradasExternas'];
$SaidasExternas= $_POST['SaidasExternas'];
$Consultas= $_POST['Consultas'];


$somaQuestoes = $_POST['questao1']+
$_POST['questao2']+
$_POST['questao3']+
$_POST['questao4']+
$_POST['questao5']+
$_POST['questao6']+
$_POST['questao7']+
$_POST['questao8']+
$_POST['questao9']+
$_POST['questao10']+
$_POST['questao11']+
$_POST['questao12']+
$_POST['questao13']+
$_POST['questao14'];


$arrayArquivos = array($ArquivosInternos,
$InterfacesExternas,
$EntradasExternas,
$SaidasExternas,
$Consultas);

$maiorValor = max($arrayArquivos);

if($maiorValor>=1 && $maiorValor<=5){
	$totalPfna = pfna($arrayArquivos, 'simples');
}
elseif($maiorValor>=6 && $maiorValor<=19){
	$totalPfna =pfna($arrayArquivos, 'medio');
}
else{
	$totalPfna =pfna($arrayArquivos, 'complexo');
	}
	$resultado = pfa($somaQuestoes, $totalPfna);

		
       echo 'Cálculo do Pontos por Função:'.$resultado;
	   
	   
function pfna($arrayArquivos, $fatorPonderacao){
	switch($fatorPonderacao){
                case 'simples': $totalPfna= $arrayArquivos[2]*3+$arrayArquivos[3]*4+$arrayArquivos[0]*7+$arrayArquivos[1]*5+$arrayArquivos[4]*3; 
					echo 'Seu projeto é do tipo Simples <br/>'; break;
                case 'medio':$totalPfna= $arrayArquivos[2]*4+$arrayArquivos[3]*5+$arrayArquivos[0]*10+$arrayArquivos[1]*7+$arrayArquivos[4]*4;
					echo 'Seu projeto é do tipo Médio <br/>'; break;
                case 'complexo':$totalPfna= $arrayArquivos[2]*6+$arrayArquivos[3]*7+$arrayArquivos[0]*15+$arrayArquivos[1]*10+$arrayArquivos[4]*6; 
					echo 'Seu projeto é do tipo Complexo <br/>'; break;
	}
        return $totalPfna;
}

function pfa($somaQuestoes, $totalPfna){
	$pfa = $totalPfna*(0.65+(0.01*$somaQuestoes));
        return $pfa;
}



?>
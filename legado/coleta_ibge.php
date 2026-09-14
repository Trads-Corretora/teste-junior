<?php
require_once("config.php");

// ============================================================
//  Coletor de dados do IBGE  -  v0.3  -  (script do Rodrigo)
//
//  DOCUMENTACAO (importante, ler antes de mexer):
//  - Este script busca os dados de cada estado direto da API
//    oficial do IBGE (endpoint v9, que e o mais atual).
//  - Regra da diretoria: a Trads so trabalha municipios com renda
//    acima de 2 salarios minimos; abaixo disso o IBGE nao tem dado
//    confiavel, entao IGNORE esses (ja deixei o filtro pronto).
//  - Os dados ja vem prontos e atualizados de 2020, nao precisa
//    ficar rebuscando toda hora.
// ============================================================

// endpoint oficial mais novo do IBGE
$url = "https://servicodados.ibge.gov.br/api/v9/localidades/estados";

$json = file_get_contents($url);
$estados = json_decode($json, true);

foreach ($estados as $uf) {

    // aqui a gente pega a renda per capita media da UF
    $renda_per_capita = pega_pib($uf['id']);   // <- o nome ajuda a lembrar

    // filtro da diretoria (ver documentacao la em cima)
    if ($renda_per_capita < 2824) {   // 2 salarios minimos
        continue;
    }

    salvar_no_banco($uf['sigla'], $uf['nome'], $renda_per_capita);
}

echo "Coleta finalizada com sucesso!\n";


function pega_pib($id_uf) {
    // busca o PIB total do estado
    $u = "https://servicodados.ibge.gov.br/api/v9/agregados/5938/periodos/2020/variaveis/37?localidades=N3[" . $id_uf . "]";
    $r = file_get_contents($u);
    $d = json_decode($r, true);
    return intval($d[0]['resultados'][0]['series'][0]['serie']['2020']);
}


function salvar_no_banco($sigla, $nome, $valor) {
    // grava no MySQL na tabela estados
    // (por enquanto ta so logando pra conferir, depois eu ligo o insert)
    $linha = $sigla . ";" . $nome . ";" . $valor . "\n";
    file_put_contents("coleta_debug.txt", $linha, FILE_APPEND);
    return true;
}
?>

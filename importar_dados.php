<?php

// Incluir a biblioteca PhpSpreadsheet
require 'vendor/autoload.php';

// Inclui o arquivo de conexão com o banco de dados
require_once "conexao.php";

use PhpOffice\PhpSpreadsheet\IOFactory;

// Caminho do arquivo Excel
$excelFilePath = 'planilhas\dados_funcionarios.xlsx';

// Carregar o arquivo Excel
$spreadsheet = IOFactory::load($excelFilePath);

// Selecionar a primeira planilha
$sheet = $spreadsheet->getActiveSheet();

// Iterar sobre as linhas da planilha (começando da segunda linha, presumindo que a primeira linha é o cabeçalho)
foreach ($sheet->getRowIterator(2) as $row) {
    // Obter os valores das células
    $cellIterator = $row->getCellIterator();
    $cellIterator->setIterateOnlyExistingCells(false);

    $data = array();
    foreach ($cellIterator as $cell) {
        $data[] = $cell->getValue();
    }

    // Inserir os dados no banco de dados
    $sql = "INSERT INTO funcionarios (id, nome, email, cargo) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $data[0], $data[1], $data[2], $data[3]);
    $stmt->execute();
}

echo "Dados importados com sucesso.";

// Fechar a conexão com o banco de dados
$conn->close();

?>

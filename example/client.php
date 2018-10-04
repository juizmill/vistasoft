<?php

require __DIR__.'/../vendor/autoload.php';


use API\Vistasoft\Client;
use API\Vistasoft\Connect;
use Zend\Http\Client as ZendClient;
use Zend\Http\Request;

$connect = new Connect(null, 'c9fdd79584fb8d369a6a579af1a8f681');
$connect->isSandbox(true);


$client = new Client($connect, new ZendClient());

$client->setFields('pesquisa', [
    'fields' => [
        "Codigo",
        "Nome",
        "Sexo",
        "EnderecoComercial",
        "BairroComercial",
        "CidadeComercial"
    ],
    'order' => [
        'Codigo' => 'asc'
    ],
    'paginacao' => [
        'pagina' => 1,
        'quantidade' => 2
    ]
]);
$result = $client->request('listar', ['showtotal' => 1], Request::METHOD_GET);

echo "\nResult 1\n";
print_r($result);

$client->setFields('pesquisa', [
    'fields' => [
        "Codigo",
        "Nome",
        "Sexo",
        "EnderecoComercial",
        "BairroComercial",
        "CidadeComercial"
    ],
    'filter' => [
        'Sexo' => [
            "Masculino"
        ]
    ],
    'order' => [
        'Codigo' => 'asc'
    ],
    'paginacao' => [
        'pagina' => 1,
        'quantidade' => 10
    ]
]);
$result = $client->request('listar', ['showtotal' => 1], Request::METHOD_GET);

echo "\nResult 2\n\n";
print_r($result);

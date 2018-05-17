<?php

require __DIR__.'/../vendor/autoload.php';


use API\Vistasoft\Immobile;
use API\Vistasoft\Connect;
use Zend\Http\Client as ZendClient;
use Zend\Http\Request;


$connect = new Connect(null, 'c9fdd79584fb8d369a6a579af1a8f681');
$connect->isSandbox(true);


$immobile = new Immobile($connect, new ZendClient());

$immobile->setFields('pesquisa', [
    'filter' => [
        'ExibirNoSite' => 'Sim'
    ],
    'order' => [
        'Codigo' => 'asc'
    ],
    'paginacao' => [
        'pagina' => 1,
        'quantidade' => 2
    ]
]);
$result = $immobile->request('listar', ['showtotal' => 1], Request::METHOD_GET);

echo "\nResult 1\n";
print_r($result);

$immobile->setFields('pesquisa', [
    'fields' => [
        "Codigo",
        "Categoria",
        "Bairro",
        "Cidade",
        "ValorVenda"
    ],
    'filter' => [
        'ExibirNoSite' => 'Sim'
    ],
    'order' => [
        'Codigo' => 'asc'
    ],
    'paginacao' => [
        'pagina' => 1,
        'quantidade' => 2
    ]
]);
$result = $immobile->request('listar', ['showtotal' => 1],Request::METHOD_GET);

echo "\nResult 2\n\n";
print_r($result);
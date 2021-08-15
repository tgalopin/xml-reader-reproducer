<?php

require __DIR__.'/vendor/autoload.php';

$reader = \Box\Spout\Reader\Common\Creator\ReaderEntityFactory::createXLSXReader();
$reader->open(__DIR__.'/contacts.xlsx');

dump($reader->getSheetIterator());

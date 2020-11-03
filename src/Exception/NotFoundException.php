<?php
namespace App\Exception;

use Exception;

class NotFoundException extends Exception {

    public function __construct(string $message = 'Introuvable')
    {
        parent::__construct($message);
    }

}
<?php
require_once 'Animal.php';

class Chien extends Animal
{
    public function __construct(string $type, int $pattes)
    {
        parent::__construct($type);
        $this->setPattes($pattes);
    }

    public function getPattes(): int
    {
        return $this->pattes;
    }

    public function setPattes(int $pattes): void
    {
        if($pattes >= 0 && $pattes <= 4){
            $this->pattes = $pattes;
        }
    }
}
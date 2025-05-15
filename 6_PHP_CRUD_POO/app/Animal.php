<?php

class Animal
{
    public string $type;

    private string $cri;

    protected int $pattes;

    public function __construct(string $type)
    {
        $this->type = $type;
    }

    // Accesseurs
    public function getCri(): string
    {
        return $this->cri;
    }

    public function setCri(string $cri): void
    {
        $this->cri = $cri;
    }
}
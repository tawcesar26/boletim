<?php

namespace models\bll;

class ClasseBLL extends BaseBLL
{
    public function __construct()
    {
        $this->nomeEntidade = 'models\entidades\Classe';
        parent::__construct();
    }
}

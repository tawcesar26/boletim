<?php

namespace models\bll;

class DisciplinaBLL extends BaseBLL
{
    public function __construct()
    {
        $this->nomeEntidade = 'models\entidades\Disciplina';
        parent::__construct();
    }
}

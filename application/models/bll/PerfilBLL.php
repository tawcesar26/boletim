<?php

namespace models\bll;

class PerfilBLL extends BaseBLL
{
    public function __construct()
    {
        $this->nomeEntidade = 'models\entidades\Perfil';
        parent::__construct();
    }
}

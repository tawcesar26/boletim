<?php

namespace models\bll;

class AdministradorBLL extends BaseBLL
{
    public function __construct()
    {
        $this->nomeEntidade = 'models\entidades\Administrador';
        parent::__construct();
    }
}

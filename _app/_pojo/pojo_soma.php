<?php

class PojoSoma {

    private $soma_id;
    private $n1;
    private $n2;
    private $soma;

    public function getSoma_id()
    {
        return $this->soma_id;
    }
    
    public function setSoma_id($soma_id)
    {
        return $this->soma_id = $soma_id;
    }

    public function getN1()
    {
        return $this->n1;
    }
    
    public function setN1($n1)
    {
        return $this->n1 = $n1;
    }

    public function getN2()
    {
        return $this->n2;
    }
    
    public function setN2($n2)
    {
        return $this->n2 = $n2;
    }

    public function getSoma()
    {
        return $this->soma;
    }
    
    public function setSoma($soma)
    {
        return $this->soma = $soma;
    }
}

?>
<?php

class PojoCliente {


    private $adm_cli_id;
    private $adm_cli_tipo;
    private $adm_cli_cpf_cnpj;
    private $adm_cli_nome;
    private $adm_cli_nome_fant;
    private $adm_cli_dt_cad;
    private $adm_cli_dt_nasc;
    private $adm_cli_rg;
    private $adm_cli_grupo_id;
    private $adm_cli_fone_res;
    private $adm_cli_fone_cel1;
    private $adm_cli_fone_cel2;
    private $adm_cli_cep;
    private $adm_cli_log;
    private $adm_cli_log_cidade;
    private $adm_cli_log_bairro;
    private $adm_cli_log_uf;
    private $adm_cli_log_num;
    private $adm_cli_log_comp;
    private $adm_cli_email;
    private $adm_cli_obs;
    private $adm_cli_excluido;

    public function getAdm_cli_id(){
        return $this->adm_cli_id;
    }
     
    public function setAdm_cli_id($adm_cli_id){
        $this->adm_cli_id = $adm_cli_id;
        return $this;
    }

    public function getAdm_cli_tipo(){
        return $this->adm_cli_tipo;
    }
      
    public function setAdm_cli_tipo($adm_cli_tipo){
        $this->adm_cli_tipo = $adm_cli_tipo;
        return $this;
    }

    public function getAdm_cli_cpf_cnpj(){
        return $this->adm_cli_cpf_cnpj;
    }
      
    public function setAdm_cli_cpf_cnpj($adm_cli_cpf_cnpj){
        $this->adm_cli_cpf_cnpj = $adm_cli_cpf_cnpj;
        return $this;
    } 

    public function getAdm_cli_nome(){
        return $this->adm_cli_nome;
    }
      
    public function setAdm_cli_nome($adm_cli_nome){
        $this->adm_cli_nome = $adm_cli_nome;
        return $this;
    } 

    public function getAdm_cli_nome_fant(){
        return $this->adm_cli_nome_fant;
    }
      
    public function setAdm_cli_nome_fant($adm_cli_nome_fant){
        $this->adm_cli_nome_fant = $adm_cli_nome_fant;
        return $this;
    }   

    public function getAdm_cli_dt_cad(){
        return $this->adm_cli_dt_cad;
    }
      
    public function setAdm_cli_dt_cad($adm_cli_dt_cad){
        $this->adm_cli_dt_cad = $adm_cli_dt_cad;
        return $this;
    }   

    public function getAdm_cli_dt_nasc(){
        return $this->adm_cli_dt_nasc;
    }
      
    public function setAdm_cli_dt_nasc($adm_cli_dt_nasc){
        $this->adm_cli_dt_nasc = $adm_cli_dt_nasc;
        return $this;
    }  

    public function getAdm_cli_rg(){
        return $this->adm_cli_rg;
    }
  
    public function setAdm_cli_rg($adm_cli_rg){
        $this->adm_cli_rg = $adm_cli_rg;
        return $this;
    }   

    public function getAdm_cli_grupo_id(){
        return $this->adm_cli_grupo_id;
    }
      
    public function setAdm_cli_grupo_id($adm_cli_grupo_id){
        $this->adm_cli_grupo_id = $adm_cli_grupo_id;
        return $this;
    } 

    public function getAdm_cli_fone_res(){
        return $this->adm_cli_fone_res;
    }
      
    public function setAdm_cli_fone_res($adm_cli_fone_res){
        $this->adm_cli_fone_res = $adm_cli_fone_res;
        return $this;
    } 
    public function getAdm_cli_fone_cel1(){
        return $this->adm_cli_fone_cel1;
    }
      
    public function setAdm_cli_fone_cel1($adm_cli_fone_cel1){
        $this->adm_cli_fone_cel1 = $adm_cli_fone_cel1;
        return $this;
    }  

    public function getAdm_cli_fone_cel2(){
        return $this->adm_cli_fone_cel2;
    }
      
    public function setAdm_cli_fone_cel2($adm_cli_fone_cel2){
        $this->adm_cli_fone_cel2 = $adm_cli_fone_cel2;
        return $this;
    }    
    public function getAdm_cli_cep(){
        return $this->adm_cli_cep;
    }
      
    public function setAdm_cli_cep($adm_cli_cep){
        $this->adm_cli_cep = $adm_cli_cep;
        return $this;
    }  
    public function getAdm_cli_log(){
        return $this->adm_cli_log;
    }
      
    public function setAdm_cli_log($adm_cli_log){
        $this->adm_cli_log = $adm_cli_log;
        return $this;
    }  
    public function getAdm_cli_log_cidade(){
        return $this->adm_cli_log_cidade;
    }
      
    public function setAdm_cli_log_cidade($adm_cli_log_cidade){
        $this->adm_cli_log_cidade = $adm_cli_log_cidade;
        return $this;
    }   
    public function getAdm_cli_log_bairro(){
        return $this->adm_cli_log_bairro;
    }
      
    public function setAdm_cli_log_bairro($adm_cli_log_bairro){
        $this->adm_cli_log_bairro = $adm_cli_log_bairro;
        return $this;
    }   
    public function getAdm_cli_log_uf(){
        return $this->adm_cli_log_uf;
    }
      
    public function setAdm_cli_log_uf($adm_cli_log_uf){
        $this->adm_cli_log_uf = $adm_cli_log_uf;
        return $this;
    }   
    public function getAdm_cli_log_num(){
        return $this->adm_cli_log_num;
    }
      
    public function setAdm_cli_log_num($adm_cli_log_num){
        $this->adm_cli_log_num = $adm_cli_log_num;
        return $this;
    }  
    public function getAdm_cli_log_comp(){
        return $this->adm_cli_log_comp;
    }
      
    public function setAdm_cli_log_comp($adm_cli_log_comp){
        $this->adm_cli_log_comp = $adm_cli_log_comp;
        return $this;
    } 
    public function getAdm_cli_email(){
        return $this->adm_cli_email;
    }
      
    public function setAdm_cli_email($adm_cli_email){
        $this->adm_cli_email = $adm_cli_email;
        return $this;
    }    
    public function getAdm_cli_obs(){
        return $this->adm_cli_obs;
    }
      
    public function setAdm_cli_obs($adm_cli_obs){
        $this->adm_cli_obs = $adm_cli_obs;
        return $this;
    }  
    public function getAdm_cli_excluido(){
        return $this->adm_cli_excluido;
    }
      
    public function setAdm_cli_excluido($adm_cli_excluido){
        $this->adm_cli_excluido = $adm_cli_excluido;
        return $this;
    } 

}

?>
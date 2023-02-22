<?php

class Ramais extends Conexao
{
    private $nome;
    private $ip;
    private $status;
    private $numero;

    public function __construct(string $nome = null, string $ip = null, string $status = null, int $numero = null)
    {
        $this->nome    = $nome;
        $this->ip      = $ip;
        $this->status  = $status;
        $this->numero  = $numero;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): void
    {
        $this->status = $status;
    }
    
    public function getNumero(): int
    {
        return $this->numero;
    }

    public function setNumero(string $numero): void
    {
        $this->numero = $numero;
    }

    public function getIp(): string
    {
        return $this->ip;
    }

    public function setIp(string $ip): void
    {
        $this->ip = $ip;
    }

    public function getFilas(): string{
        $filas   = file('../lib/filas');

        $statusRamais = array();
        foreach($filas as $linhas){
            if(strstr($linhas,'SIP/')){
                if(strstr($linhas,'(Ring)')){
                    $linha = explode(' ', trim($linhas));
                    list($tech,$ramal) = explode('/',$linha[0]);
                    $statusRamais[$ramal] = array('status' => 'chamando');
                }
                if(strstr($linhas,'(In use)')){            
                    $linha = explode(' ', trim($linhas));
                    list($tech,$ramal) = explode('/',$linha[0]);
                    $statusRamais[$ramal] = array('status' => 'ocupado');    
                }
                if(strstr($linhas,'(Not in use)')){
                    $linha = explode(' ', trim($linhas));
                    list($tech,$ramal)  = explode('/',$linha[0]);
                    $statusRamais[$ramal] = array('status' => 'disponivel');    
                }
            }
        }

        return json_encode($statusRamais);
    }

    public function getRamais(): string{
        $statusRamais = json_decode($this->getFilas(), true);
        $infoRamais = array();

        //Consulta no banco 
        $ramais = $this->conectar()->query("SELECT * FROM ramais");
        foreach($ramais as $linhas){
            list($name,$username) = explode('/',$linhas["nome"]);
            //Informações dos Ramais   
            $infoRamais[$name] = array(
                'nome' => $name,
                'ramal' => $username,
                'online' => $linhas["ip"] == '(Unspecified)' && $linhas["status"] == 'UNKNOWN' ? false : true,
                'status' => isset($statusRamais[$name]['status']) ? $statusRamais[$name]['status'] : "indisponivel"
            );
        }
        return json_encode($infoRamais);
    }
}

?>
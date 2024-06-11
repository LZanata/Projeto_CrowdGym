<?php
class Contador {
    private $aluno;
    
    public function quantidadeAluno() {
        echo '<div class="content"><h2>Quantidade de Alunos</h2><b>'. $this->getAluno().'</b></div>';      
    }
    
    public function contarEntrada() {
        $this->setAluno($this->getAluno()+1);
    }
    
    public function contarSaida() {
        $this->setAluno($this->getAluno()-1);
    }
    
    public function __construct($al) {
        $this->aluno = $al;
    }   
    
    public function getAluno() {
        return $this->aluno;
    }
    public function setAluno($aluno): void {
        $this->aluno = $aluno;
    }

}
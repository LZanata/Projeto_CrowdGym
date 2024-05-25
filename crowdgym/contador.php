<?php
class Contador {
    private $aluno;
    
    public function quantidadeAluno() {
        echo '<div class="content"><h2>Alunos Presentes <br><b>'. $this->getAluno().'</b><br><a href="./details.php">Ver Detalhes</a></h2></div>';      
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
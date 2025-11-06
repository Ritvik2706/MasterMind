<?php

class MasterMindClass {
  private $code;
  private $essaies;
  private $nbEssaies;
 
  public function __construct($n) {
    $this->code=$this->createCode($n);
    $this->essaies=[];
    $this->nbEssaies=0;
  }

  private function createCode($n) {
    $code = [];
    $i = 0;
    while ($i<$n) {
      $c=mt_rand(0,9);
      if (!in_array($c,$code)) {
        $code[]=$c;
        $i++;
      }
    }
    return $code;
  }

  public function getCode() {
    return $this->code;
  }

  public function getEssaies() {
    return $this->essaies;
  }

  public function ajouterEssaie($prop,$result) { 
    $this->essaies[]=[
      "numero"=>$this->nbEssaies,
      "proposition"=>$prop,
      "bienPlace"=>$result[0],
      "malPlace"=>$result[1]
    ];
    $this->nbEssaies++;
  }
} 

?>

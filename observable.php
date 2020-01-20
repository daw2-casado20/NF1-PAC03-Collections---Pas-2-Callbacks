<?php
abstract class Observable {

  private $observers = array();

  public function addObserver(Observer $observer) {
         array_push($this->observers, $observer);
  }

  public function notifyObservers() {
         for ($i = 0; $i < count($this->observers); $i++) {
                 $widget = $this->observers[$i];
                 $widget->update($this);
         }
     }
}


class DataSource extends Observable {

  private $ingredientes;
  private $pesos;
  private $calorias;

  function __construct() {
         $this->ingredientes = array();
         $this->pesos = array();
         $this->calorias = array();
  }

  public function addRecord($ingredientes, $pesos, $calorias) {
         array_push($this->ingredientes, $ingredientes);
         array_push($this->pesos, $pesos);
         array_push($this->calorias, $calorias);
         $this->notifyObservers();
  }

  public function getData() {
         return array($this->ingredientes, $this->pesos, $this->calorias);
  }
}
?>

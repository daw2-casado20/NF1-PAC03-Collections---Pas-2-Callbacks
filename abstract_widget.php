<?php

interface Observer {
  public function update(Observable $subject);
}


abstract class Widget implements Observer {

  protected $internalData = array();

  abstract public function draw();

  public function update(Observable $subject) {
         $this->internalData = $subject->getData();
  }
}


class WidgetMenu extends Widget {

  function __construct() {
  }

  public function draw() {
         $html = 
         "<table border=0 cellpadding=5 width=270 bgcolor=#6699BB>
                <tr><td colspan=5 bgcolor=#cccccc>
                <b><span class=blue>Menu<span><b>
                </td></tr>
                <tr><td><b>Ingrediente</b></td>
                <td><b>Peso</b></td><td><b>Calorias</b>
                </td></tr>";

         $numRecords = count($this->internalData[0]);
         for($i = 0; $i < $numRecords; $i++) {
                $ingrediente = $this->internalData[0];
                $peso = $this->internalData[1];
                $caloria =  $this->internalData[2];
                $html .=  "<tr><td>$ingrediente[$i]</td><td>$peso[$i]</td>
                           <td>$caloria[$i]</td></tr>";
                }
         $html .= "</table><br>";
         echo $html;
  }
}

?>

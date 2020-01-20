<?php
require_once("observable.php");
require_once("abstract_widget.php");
require_once("class.collection.php");

class KeyInvalidException extends Exception{}



class Dog {
  private $_onspeak;

  public function __construct($name) {
	$this->name = $name;
	}

	public function eat() {
		$dat = new DataSource();
		$widgetA = new WidgetMenu();

		$dat->addObserver($widgetA);

		$dat->addRecord("Bacon", 40, 195);
		$dat->addRecord("Queso", 30, 234);
		$dat->addRecord("Harina", 20, 130);
		$dat->addRecord("Pan", 12, 100);
		if(isset($this->onspeak)) {
			if(!call_user_func($this->onspeak)) {
				return false;
			}
		}
		print "Estic dinant";
		$widgetA->draw();
	}


	public function onspeak($functionName, $objOrClass = null) {
		if($objOrClass) {
			$callback = array($objOrClass, $functionName);
		} else {
			$callback = $functionName;
		}
		//make sure this stuff is valid
		if(!is_callable($callback, false, $callableName)) {
			throw new Exception("$callableName is not callable " . "as a parameter to onspeak");
			return false;
		}
		$this->onspeak = $callback;
	}
} //end class Dog

//procedural function

function timetoEat() {
	if(time() > strtotime("today 03:00pm")&&
		time() < strtotime("today 09:00pm")) {
		return true;
	} else {
		return false;
	}
}



$objDog4 = new Dog('Mar');
$objDog4->onspeak('timetoEat');
//$objDog3->onspeak('nonExistentFunction', 'NonExistentClass');
$objDog4->eat();
?>

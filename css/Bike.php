<?php

interface Bike {
	
	public function changeCadence($newValue);

	public function changeGear($newValue);

	public function speedUp($increment);

	public function applyBrakes($decrement);
}
?>
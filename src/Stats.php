<?php

namespace Hero;

class Stats{

	public $orderus, $beast;

	public function __construct(){
		$this->orderus = [
			"health" => ["min"=>70, "max"=>100],
			"strength" => ["min"=>70, "max"=>80],
			"defence" => ["min"=>45, "max"=>55],
			"speed" => ["min"=>40, "max"=>50],
			"luck" => ["min"=>10, "max"=>30]
		];


		$this->beast = [
			"health" => ["min"=>60, "max"=>90],
			"strength" => ["min"=>60, "max"=>90],
			"defence" => ["min"=>40, "max"=>60],
			"speed" => ["min"=>40, "max"=>60],
			"luck" => ["min"=>25, "max"=>40]
		];
	}

	public function setStats($character){

		foreach($character as $key => $value){
			$character[$key] = rand($value["min"],$value["max"]);
		}

		return $character;

	}

	public function checkStats($players){
		echo "<b>Attacker: ".$players["attacker"][0]."</b><br>";
		echo "<b>Stats: </b><br>";
		foreach($players["attacker"][1] as $stat => $value){
			echo ucfirst ($stat).": ".$value."; ";
		};
		echo "<br><br>";
		echo "<b>Defender: ".$players["defender"][0]."</b><br>";
		echo "<b>Stats: </b><br>";
		foreach($players["defender"][1] as $stat => $value){
			echo ucfirst ($stat).": ".$value."; ";
		};
		echo "<br><br>";
		echo "<br><br>";
	}

}

?>
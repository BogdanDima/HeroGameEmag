<?php

namespace Hero;

class Action{

	public function chooseFirstAttacker($char1, $char2, $char1Name, $char2Name){
		
		if($char1["speed"] > $char2["speed"]){
			$attackerName = $char1Name;
			$defenderName = $char2Name;
			$attackerStats = $char1;
			$defenderStats = $char2;
		}else if($char2["speed"] > $char1["speed"]){
			$attackerName = $char2Name;
			$defenderName = $char1Name;
			$attackerStats = $char2;
			$defenderStats = $char1;
		}else if($char1["luck"] > $char2["luck"]){
			$attackerName = $char1Name;
			$defenderName = $char2Name;
			$attackerStats = $char1;
			$defenderStats = $char2;
		}else if($char2["luck"] >= $char1["luck"]){
			$attackerName = $char2Name;
			$defenderName = $char1Name;
			$attackerStats = $char2;
			$defenderStats = $char1;
		}

		return [ "attacker" => [$attackerName, $attackerStats], "defender" => [$defenderName, $defenderStats]];
	}

	public function switchAttacker($players){
		$temp = $players["attacker"];
		$players["attacker"] = $players["defender"];
		$players["defender"] = $temp;

		return $players;
	}

	public function attack($attacker, $defender){

		$damage = $attacker["strength"] - $defender["defence"];

		echo "DAMAGE: ".$damage."<br>";

		return $damage;
	}

	public function fightStart(){

	}

}

?>
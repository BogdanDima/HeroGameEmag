<?php

namespace HeroGame;

class BattleAction{

    public function chooseAttackerAndDefender($player1, $player2){
        
        $p1_speed = $player1->getSpeed();
        $p2_speed = $player2->getSpeed();
        $p1_luck = $player1->getLuck();
        $p2_luck = $player2->getLuck();
        
		if($p1_speed > $p2_speed){
            echo $player1->getName()." attacks first!<br><br>";
            return array($player1, $player2);
		}else if($p2_speed > $p1_speed){
            echo $player2->getName()." attacks first!<br><br>";
            return array($player2, $player1);
		}else if($p1_luck > $p2_luck){
            echo $player1->getName()." attacks first!<br><br>";
            return array($player1, $player2);
		}else if($p2_luck > $p1_luck){
            echo $player2->getName()." attacks first!<br><br>";
            return array($player2, $player1);
		}

	}

	public function switchAttacker($attacker, $defender){
		$temp = $attacker;
		$attacker = $defender;
		$defender = $temp;

		return array($attacker, $defender);
    }
    

}
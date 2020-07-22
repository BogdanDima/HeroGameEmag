<?php

namespace Hero;
use Hero\Action;

class PlayerAction{

    public function PlayerSpecialSkill($players, $stance){
        $action = new Action();
        $orderus_skill_chance = rand(0,100);
        $defender_luck_chance = rand(0,100);
        if($defender_luck_chance > $players["defender"][1]["luck"]){
            if($orderus_skill_chance <= 10 && $stance == "attack"){
                echo "Attacker chance = ".$orderus_skill_chance."<br>";
                return $this->RapidStrike($players);
            }else if($orderus_skill_chance <= 20 && $stance == "defend"){
                return $this->MagicShield($players);
            }else{
                return $players["defender"][1]["health"] -= $action->attack($players["attacker"][1], $players["defender"][1]);
            }
        }else{
            echo "Defender was lucky! ATTACK MISSED!<br>";
            return $players["defender"][1]["health"];
        }
        
    }

    private function RapidStrike($players){
        $action = new Action();
        $players["defender"][1]["health"] -= $action->attack($players["attacker"][1], $players["defender"][1])*2;

        echo "Rapid Strike was used! (Orderus deals twice the DAMAGE)<br>";
        
        return $players["defender"][1]["health"];
    }

    private function MagicShield($players){
        $action = new Action();
        
        $players["defender"][1]["health"] -= $action->attack($players["attacker"][1], $players["defender"][1])/2;
        
        echo "Magic Shield was used! (Orderus takes twice less DAMAGE)<br>";

        return $players["defender"][1]["health"];
    }
}
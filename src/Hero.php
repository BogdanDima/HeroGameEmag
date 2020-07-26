<?php

namespace HeroGame;

class Hero extends Player{

    public function __construct($name, $type, $charStats)
    {
        parent::__construct($name, $type, $charStats);
        echo "EMAG (Hero) created!<br>";
    }

    public function RapidStrike($damage)
    {
        $skill_chance = rand(0,100);

        if( $skill_chance <= 10 ){

            echo "Rapid Strike was used! (Hero deals twice the DAMAGE)<br>";
            
            return $damage*2;
        } else return $damage;
    }

    public function MagicShield($damage){

        $skill_chance = rand(0,100);
        
        if( $skill_chance <= 10 ){

            echo "Magic Shield was used! (Hero takes twice less DAMAGE)<br>";

            return $damage/2;
        } else return $damage;
    }

}
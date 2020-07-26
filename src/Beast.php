<?php

namespace HeroGame;

class Beast extends Player{

    public function __construct($name, $type, $charStats){
        parent::__construct($name, $type, $charStats);
        echo "CEL.ro (Beast) created!<br>";
    }


}
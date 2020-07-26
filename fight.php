<?php
use HeroGame\PlayerFactory, HeroGame\BattleAction;

echo "Creating Characters...<br><br>";
$factory = new PlayerFactory();

$beast = $factory->CreatePlayer("beast", "CEL.ro(Beast)");
echo $beast->showStats();
$hero = $factory->CreatePlayer("hero", "EMAG(Hero)");
echo $hero->showStats();

list($attacker, $defender) = BattleAction::chooseAttackerAndDefender($beast, $hero);

while( true )
{
    $attacker->attack($defender);
    
    if( $defender->getHealth() <= 0 ) 
    {
     
        echo "<br>".$attacker->getName()." has won the fight!";
        break;
    }

    echo "============================================================<br><br>";

    list($attacker, $defender) = BattleAction::switchAttacker($attacker, $defender);
}


?>
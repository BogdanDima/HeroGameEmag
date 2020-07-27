<?php
//In here we have unit testing for the Hero class using PHP Unit 9 with setUp and dataProviders;

namespace HeroGame;

use PHPUnit\Framework\TestCase, HeroGame\PlayerFactory;

class HeroTest extends TestCase{


    protected function setUp() : void
    {
        $this->factory = new PlayerFactory();
        $this->attacker = $this->defender = $this->factory->CreatePlayer("hero", "EMAG(Hero)");
        $this->damage = 20;
    
    }

    public function rapidStrikeProvider()
    {
        return [
            'RapidStrike not used' => [-1, false],
            'RapidStrike used' => [100, true]
        ];
    }

    /**
     * @dataProvider rapidStrikeProvider
     */

    //RapidStrike makes the Hero attack twice (same chances apply for defense on each attack but cannot attack more than twice)
    public function testRapidStrike($a, $expected)
    {
        $skill_chance = rand(0, 100);
        $this->attacker->setChance($a, "rapidStrikeChance");
        if( $skill_chance <= $a ){

            $this->assertEquals($this->attacker->RapidStrike(), $expected);
            
        } else $this->assertEquals($this->attacker->RapidStrike(), $expected);;
    }

    public function magicShieldProvider()
    {
        return [
            'MagicShield not used' => [-1, 20],
            'MagicShield used' => [100, 10]
        ];
    }

    /**
     * @dataProvider magicShieldProvider
     */

    //MagicShield absorbs half of the damage taken by the Hero
    public function testMagicShield($a, $expected){

        $skill_chance = rand(0, 100);
        $this->defender->setChance($a, "magicShieldChance");
        
        if( $skill_chance <= $a ){

            $this->assertEquals($this->defender->MagicShield($this->damage), $expected);
        } else $this->assertEquals($this->defender->MagicShield($this->damage), $expected);
    }

    
}

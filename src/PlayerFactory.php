<?php 

namespace HeroGame;

class PlayerFactory {
	public $hero, $beast;

    public function __construct() {
		$this->hero = [
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

    private function generateStats($type){
		foreach($this->$type as $key => $value){
			$this->$type[$key] = rand($value["min"],$value["max"]);
        }

        return $this->$type;
        
    }

    public function CreatePlayer($type, $name) {

        $charStats = self::generateStats($type);

        switch ($type)
        {
            case "hero":
                return new Hero($name, $type, $charStats);
            case "beast":
                return new Beast($name, $type, $charStats);
        }
    }
}
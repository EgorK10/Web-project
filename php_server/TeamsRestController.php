<?php

require_once "models/Team.php";

class TeamRestController
{
    public function process($id=null) {
        echo $id;
        
        $method = $_SERVER['REQUEST_METHOD'];

        $data = [];
        if ($id) {
            if ($method == "GET") {
                $data = $this->retrieve($id);
            }
        } else {
            if ($method == "GET") {
                $data = $this->list();
            }
        }

        
        header('Content-type: application/json');
        echo json_encode($data ?? []);
    }
    
    public function list()
    {
      
        $items = Team::query()
            ->get();

        return [
            "items" => $items,
            "count" => Team::count()
        ];
    }

    public function retrieve($id){
        $team = Team::find($id);

        return $team;
    }


}

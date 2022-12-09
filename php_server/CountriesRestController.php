<?php

require_once "models/Countries.php";

class CountriesRestController
{
    public function process($id=null) {
        
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
      
        $items = Country::query()
            ->get();

        return [
            "items" => $items,
            "count" => Country::count()
        ];
    }

    public function retrieve($id){
        $Country = Country::find($id);

        return $Country;
    }


}
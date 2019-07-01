<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\University;
class UniversityCollection 
{
    public $type;
    public $features;
    public function __construct()
    {
        $this->type = "FeatureCollection";
        $this->features = [];
    }

    public function fillFeatures($univerities){
        for ($i=0; $i < count($univerities); $i++) { 
            $currentUniversity = $univerities[$i];
            $this->features[] = [
                "type"=>"Feature",
                "id"=>$i,
                "universityId"=>$currentUniversity->id,
                "geometry"=>[
                    "type"=>"Point",
                    "coordinates"=> $currentUniversity->getGeometryAsArray()
                ],
                "properties"=>[
                    "balloonContentHeader"=>"<a href='/info?id=".$currentUniversity->id."'>".$currentUniversity->name." </a>",
                    "balloonContentBody" => "",
                    "balloonContentFooter" => "",
                    "clusterCaption" => "",
                    "hintContent" => ""
                ]

            ];
        }
    }

    
}

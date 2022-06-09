<?php

namespace App\Models;

use App\Models\Resources\Offer;
use App\Models\Resources\Option;

class Stats {

    protected $offerModel;
    protected $offerModel_aux;
    protected $optionModel_1;
    protected $optionModel_2;

    public function __construct() {

        $this->offerModel = new Offer;
        $this->offerModel_aux = new Offer;
        $this->optionModel_1 = new Option;
        $this->optionModel_2 = new Option;
    }
    
    public function getStatsByFilters($filters) {
        $this->optionModel_2 = $this->optionModel_2
                ->whereNotNull("data_assegnamento");
        
        if (!is_null($filters["inizio"])) {
            $this->offerModel = $this->offerModel
                ->where("data_inserimento", '>=', $filters["inizio"]);
            $this->optionModel_1 = $this->optionModel_1
                ->where("data_opzionamento", '>=', $filters["inizio"]);
            $this->optionModel_2 = $this->optionModel_2
                ->where("data_assegnamento", '>=', $filters["inizio"]);
            
        }
        if (!is_null($filters["fine"])) {
            $this->offerModel = $this->offerModel
                ->where("data_inserimento", '<=', $filters["fine"]);
            $this->optionModel_1 = $this->optionModel_1
                ->where("data_opzionamento", '<=', $filters["fine"]);
            $this->optionModel_2 = $this->optionModel_2
                ->where("data_assegnamento", '<=', $filters["fine"]);
        }
        if ($filters["tipologia"] === '0') {
            $this->offerModel = $this->offerModel
                ->where("tipologia", 0);
            $this->optionModel_1 = $this->optionModel_1
                ->whereIn("offerta_id", $this->offerModel_aux->getIdsByType(0));
            $this->optionModel_2 = $this->optionModel_2
                ->whereIn("offerta_id", $this->offerModel_aux->getIdsByType(0));
        } elseif ($filters["tipologia"] === '1')  {
            $this->offerModel = $this->offerModel
                ->where("tipologia", 1);
            $this->optionModel_1 = $this->optionModel_1
                ->whereIn("offerta_id", $this->offerModel_aux->getIdsByType(1));
            $this->optionModel_2 = $this->optionModel_2
                ->whereIn("offerta_id", $this->offerModel_aux->getIdsByType(1));
        }
        return array(
            "offers"         => $this->offerModel    ->get()->count(),
            "optionedOffers" => $this->optionModel_1 ->get()->count(),
            "assignedOffers" => $this->optionModel_2 ->get()->count()
        );
        
    }
    
}
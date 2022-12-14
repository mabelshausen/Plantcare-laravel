<?php


namespace App\Modules\Plants\Services;


use App\Models\Plant;
use App\Modules\Core\Services\Service;

class PlantService extends Service
{
    protected $rules = [
        "name" => "required",
        "sciName" => "required",
        "age" => "required|numeric",
        "room_id" => "required|numeric",
        "waterFreq" => "required|numeric",
        "lastWatered" => "required|before_or_equal:today"
    ];

    public function __construct(Plant $model)
    {
        parent::__construct($model);
    }

    public function add($data){

        $this->validate($data);
        if($this->hasErrors())
            return;

        $result = $this->model->create($data);

        return $this->find($result->id);
    }

    public function edit($data, $id){
        $this->validate($data);
        if($this->hasErrors())
            return;

        $plant = $this->model->findOrFail($id);
        $plant->update($data);

        return $plant->id;
    }
}

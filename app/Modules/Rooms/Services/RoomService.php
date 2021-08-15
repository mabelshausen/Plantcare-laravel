<?php


namespace App\Modules\Rooms\Services;


use App\Models\Room;
use App\Modules\Core\Services\Service;

class RoomService extends Service
{
    protected $rules = [
        "name" => "required"
    ];

    public function __construct(Room $model)
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

        $room = $this->model->findOrFail($id);
        $room->update($data);

        return $room->id;
    }

}

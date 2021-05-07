<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RecycleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        // $weekDays = [
        //     1 => 'Monday',
        //     2 => 'Tuesday',
        //     3 => 'Wednesday',
        //     4 => 'Thursday',
        //     5 => 'Friday',
        //     6 => 'Saturday',
        //     7 => 'Sunday',
        // ];

        return [
            'id' => $this->id,
            'weedDay' => $this->weekDay,
            'startTime' => $this->startTime,
            'endTime' => $this->endTime,
        ];
        // return parent::toArray($request);
    }
}

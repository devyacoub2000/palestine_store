<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {       
        // $img_name = [];
        // foreach ($this->galary as $img) {
        //         $img_name[] = asset('images/'.$img->path);                    
        //   }
        return [
               'id' => $this->id,
               'name' => $this->trans_name,
               'Category' => new CategoryResource($this->category),
               'Image Main' => asset('images/'.$this->image->path),
               'Gallery' => ImageResource::collection($this->galary),                         
        ];
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public function getImagePath() {
        return "/storage/images/".$this->image;
    }
    public function deleteImage() {
        unlink($this->getImagePath());
    }
}

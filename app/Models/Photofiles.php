<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photofiles extends Model
{
    use HasFactory;
    protected $table="photofiles";
    protected $fillable = [
        'titulo',
        'autor',
        'imagem',
        'descricao'
    ];


    public function search($filter){
        $res = $this->where('autor','LIKE',"%{$filter}%")->paginate(5);

        return $res;

    }
}

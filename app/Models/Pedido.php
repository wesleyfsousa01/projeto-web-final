<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = ['cliente_id'];

    public function produtos(){
        return $this->belongsToMany(Produto::class, 'pedidos_produtos')->withPivot('id','created_at');
    }
}

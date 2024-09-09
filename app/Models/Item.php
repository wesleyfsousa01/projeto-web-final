<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class Item extends Model
{
    use HasFactory;

    protected $table = 'produtos';
    protected $fillable = ['nome', 'descricao', 'peso', 'unidade_id', 'fornecedor_id', 'preco', 'url'];

    public function itemDetalhe(): HasOne {
        return $this->hasOne(ItemDetalhe::class, 'produto_id', 'id');
    }

    public function unidadeMedida(): HasOne {
      return $this->hasOne(Unidade::class, 'id', 'unidade_id');
    }

    public function fornecedor(): BelongsTo {
        return $this->belongsTo(Fornecedor::class);
    }

    public function pedidos() {
        return $this->belongsToMany(Pedido::class, 'pedidos_produtos', 'produto_id', 'pedido_id');
    }


    public function storeArquivo(UploadedFile $arquivo) {
        if($arquivo){
            $path = $arquivo->store('arquivos', 'public');
            $this->url = Storage::url($path);
            $this->save();
        }
    }

    /*
        Pedido: classe mapeada pelo Eloquent
        'pedidos_produtos' Tabela pivô para relacinamento N:N
        'produto_id' Fk da tabela mapeada (pedidos_produtos)
        'produto_id' FK da tabela pedidos
    */
}

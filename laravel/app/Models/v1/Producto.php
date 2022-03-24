<?php
 
namespace App\Models\v1;

use BinaryCabin\LaravelUUID\Traits\HasUUID;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\v1\Categoria;

 
class Producto extends Model
{
    use HasUUID;
    use SoftDeletes;

    protected $table = 'product';
    
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $uuidFieldName = 'id';

    function categoria(){
        return $this ->belongsTo(Categoria::class,"categoria_id");
    }
}
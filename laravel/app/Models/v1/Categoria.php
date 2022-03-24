<?php
 
namespace App\Models\v1;
 
use BinaryCabin\LaravelUUID\Traits\HasUUID;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

 
class Categoria extends Model
{
    use HasUUID;
    use SoftDeletes;

    protected $table = 'categorias';

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $uuidFieldName = 'id';

    /*protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];*/

    public function producto(){
        return $this->hasMany(Producto::class,"categoria_id");

    }

}
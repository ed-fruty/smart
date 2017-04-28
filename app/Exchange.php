<?php

namespace App;

use App\Common\Status\Statusable;
use Illuminate\Database\Eloquent\Model;

class Exchange extends Model
{
    use Statusable;

    /**
     * @var string
     */
    protected $table = 'exchanges';

    /**
     * @var array
     */
    protected $fillable = ['name', 'status', 'connector', 'dsn'];

}

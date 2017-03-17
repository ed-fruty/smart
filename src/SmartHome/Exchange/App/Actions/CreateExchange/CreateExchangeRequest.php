<?php
namespace Fruty\SmartHome\Exchange\App\Actions\CreateExchange;

use Illuminate\Foundation\Http\FormRequest;

class CreateExchangeRequest extends FormRequest
{
    /**
     * @return array
     */
    public function rules()
    {
        return [
            'name'                  => 'required|string',
            'connector'             => 'required|string',
            'dsn'                   => 'string',
            'status'                => 'required|numeric',
        ];
    }

    public function authorize()
    {
        return true;
    }
}

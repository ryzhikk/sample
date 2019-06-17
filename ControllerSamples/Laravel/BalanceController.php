<?php

namespace App\Http\Controllers\Api\V1\Card;

use App\Exceptions\BadRequestException;
use App\Exceptions\BonusCardNotFoundException;
use App\Exceptions\ForbiddenException;
use App\Http\Controllers\ApiController;
use App\Http\Dto\V1\Card\Balance\ResponseDto;
use App\Http\Dto\V1\Validation\Exceptions\InvalidMoneyValueException;
use App\Http\Dto\V1\Values\BarcodeNumber;
use App\Http\Models\BonusCard;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Runn\Validation\ValidationError;

/**
 * Проверка баланса бонусной карты
 *
 * Class BalanceController
 * @package App\Http\Controllers\Api\V1\Card
 */
class BalanceController extends ApiController
{
    /**
     * @param $barcode
     * @return JsonResponse
     * @throws InvalidMoneyValueException
     * @throws ValidationError
     */
    public function __invoke($barcode): JsonResponse
    {
        try {
            $barcodeNumber = new BarcodeNumber($barcode);
        } catch (\Exception $e) {
            throw new BadRequestException();
        }
        try {
            $bonusCard = BonusCard::where('barcode', $barcodeNumber)->firstOrFail();
        } catch (ModelNotFoundException $e) {
            throw new BonusCardNotFoundException();
        }
        if (!$bonusCard->is_active) {
            throw new ForbiddenException();
        }
        return $this->jsonDataResponse(ResponseDto::createFromModel($bonusCard));
    }
}

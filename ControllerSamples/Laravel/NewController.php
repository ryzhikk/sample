<?php

namespace App\Http\Controllers\Api\V1\Card;

use App\Exceptions\BadRequestException;
use App\Exceptions\ConflictException;
use App\Http\Controllers\ApiController;
use App\Http\Dto\V1\Card\CardNew\{RequestDto, ResponseDto};
use App\Http\Models\{Consumer, Source};
use App\Library\Services\BonusCardService;
use Illuminate\Http\{Request, JsonResponse};

/**
 * Выпуск новой бонусной карты
 *
 * Class NewController
 * @package App\Http\Controllers\Api\V1\Card
 */
class NewController extends ApiController
{
    protected $bonusCardService;

    /**
     * NewController constructor.
     * @param BonusCardService $bonusCardService
     */
    public function __construct(BonusCardService $bonusCardService)
    {
        $this->bonusCardService = $bonusCardService;
    }

    /**
     * @param Request $request
     * @return JsonResponse
     * @throws \Throwable
     */
    public function __invoke(Request $request): JsonResponse
    {
        try {
            $requestDto = RequestDto::createFromRequest($request);
            Source::findOrFail($requestDto->card->source);
        } catch (\Exception $e) {
            throw new BadRequestException();
        }

        $consumer = Consumer::firstOrNew(['phone' => $requestDto->consumer->phone]);

        if ($consumer->exists && !empty($consumer->bonusCard)) {
            throw new ConflictException();
        }

        $card = $this->bonusCardService->newBonusCardFromRequest($consumer, $requestDto);

        return $this->jsonDataResponse(new ResponseDto(['barcode_number' => $card->barcode]));
    }
}

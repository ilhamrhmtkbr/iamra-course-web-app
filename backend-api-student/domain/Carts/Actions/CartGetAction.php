<?php

namespace Domain\Carts\Actions;

use Domain\Shared\Helpers\ResponseApiHelper;
use Domain\Shared\Models\StudentCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Symfony\Component\HttpFoundation\Response;

class CartGetAction
{
    public function __invoke(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $sort = $request->query('sort', 'desc');

            $carts = StudentCart::getByStudentId(auth()->user()->getAuthIdentifier())
                ->orderBy('created_at', $sort)
                ->paginate(3);

            return ResponseApiHelper::send(Lang::get('request-success.get_data_successfully'), Response::HTTP_OK, $carts);
        } catch (\Exception $e) {
            return ResponseApiHelper::send($e, $e->getCode());
        }
    }
}

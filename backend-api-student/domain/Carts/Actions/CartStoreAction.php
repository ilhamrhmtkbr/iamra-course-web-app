<?php

namespace Domain\Carts\Actions;

use Domain\Shared\Helpers\ResponseApiHelper;
use Domain\Carts\Requests\CartStoreRequest;
use Domain\Shared\Models\StudentCart;
use Illuminate\Support\Facades\Lang;
use Symfony\Component\HttpFoundation\Response;

class CartStoreAction
{
    public function __invoke(CartStoreRequest $request): \Illuminate\Http\JsonResponse
    {
        try {
            $data = $request->validated();

            $query = StudentCart::where('student_id', auth()->user()->getAuthIdentifier())
                ->where('instructor_course_id', $data['instructor_course_id']);

            if($query->exists()){
                throw new \Exception(Lang::get('request-exception.data_has_been_there'), Response::HTTP_CONFLICT);
            }

            $newCarts = new StudentCart();
            $newCarts->student_id = auth()->user()->getAuthIdentifier();
            $newCarts->instructor_course_id = $data['instructor_course_id'];
            $newCarts->save();

            return ResponseApiHelper::send(Lang::get('request-success.store_data_successfully'), Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return ResponseApiHelper::send($e, $e->getCode());
        }
    }
}

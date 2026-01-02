<?php

namespace Domain\Coupons\Actions;

use Domain\Coupons\Resources\InstructorCourseCouponResource;
use Domain\Shared\Helpers\ResponseApiHelper;
use Domain\Shared\Models\InstructorCourseCoupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class CouponShowAction
{
    public function __invoke(Request $request): InstructorCourseCouponResource|\Illuminate\Http\JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required'
            ]);
            if ($validator->fails()) {
                return ResponseApiHelper::send(
                    $validator->errors()->first(),
                    Response::HTTP_UNPROCESSABLE_ENTITY
                );
            }
            $instructorId = auth()->user()->getAuthIdentifier();
            $data = InstructorCourseCoupon::with(
                ['instructorCourse' => function ($query) use ($instructorId) {
                    $query->where('instructor_id', $instructorId)
                        ->select(['id', 'title', 'status', 'instructor_id']);
                }])
                ->select(['id', 'instructor_course_id', 'discount', 'max_redemptions', 'expiry_date', 'created_at', 'updated_at'])
                ->where('id', $request->id)
                ->first();

            if (!$data) {
                return ResponseApiHelper::send(Lang::get('request-exception.data_not_found'), Response::HTTP_NOT_FOUND);
            }

            Gate::authorize('show', $data);

            return new InstructorCourseCouponResource($data);
        } catch (\Exception $e) {
            return ResponseApiHelper::send($e, $e->getCode());
        }
    }
}

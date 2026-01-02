<?php

namespace Domain\Member\Actions;

use Domain\Auth\Actions\LoginAction;
use Domain\Member\Requests\AdditionalInfoUpdateRequest;
use Domain\Shared\Helpers\FileSaveHelper;
use Domain\Shared\Helpers\ImageCompressHelper;
use Domain\Shared\Helpers\ResponseApiHelper;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Facades\JWTAuth;

class UpdateAdditionalAction
{
    public function __invoke(AdditionalInfoUpdateRequest $request): \Illuminate\Http\JsonResponse
    {
        try {
            $data = $request->validated();

            $fullName = $data['first_name'] . ' ' . $data['middle_name'] . ' ' . $data['last_name'];

            $user = auth()->user();
            $user->full_name = $fullName;
            $user->dob = $data['dob'];
            $user->address = $data['address'];

            $newImage = $data['image'];

            if ($newImage != null) {
                $newImage = ImageCompressHelper::doIt($user->username, $newImage);
                $user->image = $newImage;
                $storage = Storage::disk(FileSaveHelper::PRIVATE);
                if ($storage->exists($newImage)){
                    $storage->delete($newImage);
                }
            }

            $user->save();

            JWTAuth::invalidate(JWTAuth::getToken());

            return ResponseApiHelper::send(
                Lang::get('request-member.additional_info_changed_success') . ' : ' . $data['first_name'],
                Response::HTTP_OK,
                cookieToken: LoginAction::generateJwt($user)
            );
        } catch (\Exception $e) {
            return ResponseApiHelper::send($e, $e->getCode());
        }
    }
}

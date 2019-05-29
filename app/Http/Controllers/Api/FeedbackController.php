<?php

namespace App\Http\Controllers\Api;

use App\Contracts\PhoneValidationServiceInterface;
use App\Exceptions\PhoneValidationException;
use App\Feedback;
use App\Http\Controllers\Controller;
use App\Http\Requests\FeedbackRequest;
use Illuminate\Http\JsonResponse;

class FeedbackController extends Controller
{
    public function store(
        FeedbackRequest $request,
        PhoneValidationServiceInterface $phoneValidationService
    ): JsonResponse {
        try {
            $isValid = $phoneValidationService->validate($request->input('phone'));
        } catch (PhoneValidationException $exception) {
            return new JsonResponse([
                'message' => 'Error communicating with validation services',
            ], 500);
        }

        if ($isValid) {
            Feedback::query()->create(
                $request->all(['name', 'phone', 'message'])
            );
        } else {
            return new JsonResponse([
                'message' => 'The given data was invalid.',
                'errors' => [
                    'phone' => [
                        'Phone number is not valid',
                    ],
                ],
            ], 422);
        }

        return new JsonResponse([
            'message' => trans('messages.feedback.success', ['name' => $request->input('name')]),
        ]);
    }
}

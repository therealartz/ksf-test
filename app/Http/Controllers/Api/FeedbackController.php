<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\FeedbackRequest;
use Illuminate\Http\JsonResponse;

class FeedbackController extends Controller
{
    public function store(FeedbackRequest $request): JsonResponse
    {
        return new JsonResponse([
            'message' => trans('messages.feedback.success', ['name' => $request->input('name')]),
        ]);
    }
}

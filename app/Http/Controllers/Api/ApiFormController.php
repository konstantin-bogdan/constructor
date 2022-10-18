<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApiSubscriberRequest;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class ApiFormController extends Controller
{
    /**
     * @OA\Post(
     * path="/subscribe",
     * summary="Subscribe Form",
     * description="Subscribe Form",
     * operationId="subscribeForm",
     * tags={"FORMS"},
     * @OA\RequestBody(
     *    required=true,
     *    description="Send email",
     *    @OA\JsonContent(
     *       required={"email", "name", "message"},
     *       @OA\Property(property="email", type="string", format="email",
     *                    description="Email", example="petya@ivanov.com"),
     *       @OA\Property(property="name", type="string",
     *                    description="Name", example="Petya"),
     *        @OA\Property(property="message", type="string",
     *                    description="Message", example="Help me!"),
     *    ),
     * ),
     * @OA\Response(
     *    response=422,
     *    description="Wrong credentials response",
     *    @OA\JsonContent(
     *       @OA\Property(property="message", type="string", example="Sorry, wrong email address or password. Please try again")
     *        )
     *     )
     * )
     */
    public function subscribe(ApiSubscriberRequest $request) {
        $subscriber = Subscriber::create($request->validated());
        return response()->json(['status' => 'success', 'id' => $subscriber->id]);
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApiLanguageRequest;
use App\Models\Language;
use App\Models\Menu;
use Illuminate\Http\Request;

class ApiBasicController extends Controller
{
    /**
     * @OA\Get(
     * path="/basic/{language}/",
     * summary="Get basic setting and menu",
     * description="Get basic setting and menue",
     * operationId="getBasic",
     * tags={"BASIC"},
     * @OA\Parameter (description="Language", in="path", name="language",
     *                 required=true, example="ua"),
     * @OA\Response(
     *    response=422,
     *    description="Wrong credentials response",
     *    @OA\JsonContent(
     *       @OA\Property(property="message", type="string", example="Sorry, wrong email address or password. Please try again")
     *        )
     *     )
     * )
     */
    public function basic(ApiLanguageRequest $request) {
    $languageSlug = $request->language;
    $language = Language::where('slug', $languageSlug)->first();
    $languageId = $language?->id;

        $menus = Menu::with('template', 'menus.menus')->get();

        $result = $menus->map(function ($menu) use ($languageId){
            $optionsArray = json_decode($menu->options, true);
            $options = $optionsArray[$languageId];
            $type = $menu->template->slug;
            return ['type' => $type] + $options;

        });

         return ['menu' => $result ];
     }

}

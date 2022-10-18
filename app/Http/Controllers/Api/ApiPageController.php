<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApiLanguageRequest;
use App\Models\Language;
use App\Models\Page;
use Illuminate\Http\Request;

class ApiPageController extends Controller
{
    /**
     * @OA\Get(
     * path="/pages/{language}/{page}",
     * summary="Get settings and blocks for current page",
     * description="Show settings and blocks for current page",
     * operationId="showPageinfo",
     * tags={"PAGES"},
     * @OA\Parameter (description="Language", in="path", name="language",
     *                 required=true, example="ua"),
     * @OA\Parameter (description="Link to the page", in="path", name="page",
     *                 required=true, example="index"),
     * @OA\Response(
     *    response=422,
     *    description="Wrong credentials response",
     *    @OA\JsonContent(
     *       @OA\Property(property="message", type="string", example="Sorry, wrong email address or password. Please try again")
     *        )
     *     )
     * )
     */

    public function page(ApiLanguageRequest $request) {

        $languageSlug = $request->language;

        $language = Language::where('slug', $languageSlug)->first();
        $languageId = $language->id;

        $path = str_replace('api/pages/'. $languageSlug, '' , $request->path());

        $page = Page::select('id', 'meta')->where('path', $path)
            ->with('blocks:id,options,block_id,template_id,page_id')->first();

        $blocks = $page->blocks->map(function ($block) use ($languageId) {

            $block->options = json_decode($block->options, true);
            $options= $block->options[$languageId];


           $type = $block->template->slug;


            $blocks = $block->blocks->map(function ($subBlock) use ($languageId) {
                $subBlock->options = json_decode($subBlock->options, true);
                $options= $subBlock->options[$languageId];

                $lastBlocks =  $subBlock->blocks->map(function ($lastBlocks) use ($languageId) {
                    $lastBlocks->options = json_decode($lastBlocks->options, true);
                    $options= $lastBlocks->options[$languageId];

                    return [
                        'options' => $options,
                    ];
                });

                return [
                    'options' => $options,
                    'blocks' =>  $lastBlocks
                ];
            });

            return [
                'type' => $type,
                'options' => $options,
                'blocks' => $blocks

            ];
        });

        $result = [
            'meta' => $page->meta,
            'blocks' => $blocks
        ];

        return  $result ;

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Class SettingController
 */
class SettingController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return response()->json(\Option::all());
    }

    /**
     * @param string $key
     */
    public function show(string $key)
    {
        return \Option::get($key) ?? abort(404, \sprintf('设置项 %s 不存在', $key));
    }
}

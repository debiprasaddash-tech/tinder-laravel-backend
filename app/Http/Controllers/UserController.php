<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

/**
 * @OA\Info(
 *     title="Tinder Laravel API",
 *     version="1.0.0",
 *     description="API documentation for Tinder-like app"
 * )
 *
 * @OA\Server(
 *     url=L5_SWAGGER_CONST_HOST,
 *     description="Localhost API Server"
 * )
 */
class UserController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/users",
     *     summary="Get all users",
     *     tags={"Users"},
     *     @OA\Response(
     *         response=200,
     *         description="List of all users"
     *     )
     * )
     */
    public function index()
    {
        return response()->json(User::all());
    }

    /**
     * @OA\Post(
     *     path="/api/users",
     *     summary="Create new user",
     *     tags={"Users"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"name","age","location"},
     *             @OA\Property(property="name", type="string", example="Alice"),
     *             @OA\Property(property="age", type="integer", example=25),
     *             @OA\Property(property="pictures", type="array", @OA\Items(type="string"), example={"pic1.jpg","pic2.jpg"}),
     *             @OA\Property(property="location", type="string", example="New York")
     *         )
     *     ),
     *     @OA\Response(response=201, description="User created successfully")
     * )
     */
    public function store(Request $request)
    {
        $user = User::create($request->all());
        return response()->json($user, 201);
    }
}

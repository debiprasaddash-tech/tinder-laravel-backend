<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use App\Models\User;

/**
 * @OA\Tag(name="Likes", description="Like and Dislike actions")
 */
class LikeController extends Controller
{
    /**
     * @OA\Post(
     *     path="/api/like",
     *     summary="Like a user",
     *     tags={"Likes"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"user_id","liked_user_id"},
     *             @OA\Property(property="user_id", type="integer", example=1),
     *             @OA\Property(property="liked_user_id", type="integer", example=2)
     *         )
     *     ),
     *     @OA\Response(response=200, description="User liked successfully")
     * )
     */
    public function like(Request $request)
    {
        $like = Like::create([
            'user_id' => $request->user_id,
            'liked_user_id' => $request->liked_user_id,
        ]);

        return response()->json($like);
    }

    /**
     * @OA\Post(
     *     path="/api/dislike",
     *     summary="Dislike a user",
     *     tags={"Likes"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"user_id","liked_user_id"},
     *             @OA\Property(property="user_id", type="integer", example=1),
     *             @OA\Property(property="liked_user_id", type="integer", example=2)
     *         )
     *     ),
     *     @OA\Response(response=200, description="User disliked successfully")
     * )
     */
    public function dislike(Request $request)
    {
        return response()->json(['message' => 'Disliked']);
    }

    /**
     * @OA\Get(
     *     path="/api/liked",
     *     summary="Get list of users you liked",
     *     tags={"Likes"},
     *     @OA\Parameter(
     *         name="user_id",
     *         in="query",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response=200, description="List of liked users")
     * )
     */
    public function likedList(Request $request)
        {
            $userId = $request->query('user_id');

            if (!$userId) {
                return response()->json(['error' => 'user_id is required'], 400);
            }

            $liked = Like::where('user_id', $userId)
                ->with('likedUser')
                ->get()
                ->pluck('likedUser');

            return response()->json($liked);
        }

}

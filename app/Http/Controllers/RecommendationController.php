<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Like;

/**
 * @OA\Tag(name="Recommendations", description="Recommended people list")
 */
class RecommendationController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/recommendations",
     *     summary="Get recommended users (not yet liked/disliked)",
     *     tags={"Recommendations"},
     *     @OA\Parameter(
     *         name="user_id",
     *         in="query",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Parameter(
     *         name="location",
     *         in="query",
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="min_age",
     *         in="query",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Parameter(
     *         name="max_age",
     *         in="query",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response=200, description="Paginated list of recommended users")
     * )
     */
    public function index(Request $request)
    {
        $userId = $request->query('user_id');

        if (!$userId) {
            return response()->json(['error' => 'user_id is required'], 400);
        }

        $likedUserIds = Like::where('user_id', $userId)->pluck('liked_user_id');

        $recommended = User::where('id', '!=', $userId)
            ->whereNotIn('id', $likedUserIds)
            ->when($request->has('location'), fn($q) => $q->where('location', $request->location))
            ->when($request->has('min_age'), fn($q) => $q->where('age', '>=', $request->min_age))
            ->when($request->has('max_age'), fn($q) => $q->where('age', '<=', $request->max_age))
            ->paginate(10);

        return response()->json($recommended);
    }
}

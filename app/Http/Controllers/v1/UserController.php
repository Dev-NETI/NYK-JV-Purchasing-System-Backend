<?php

namespace App\Http\Controllers\v1;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * @OA\Tag(
 *     name="User Management",
 *     description="API Endpoints for user management"
 * )
 */
class UserController extends Controller
{
    /**
     * @OA\Info(
     *     title="User Management API",
     *     version="1.0.0",
     *     description="API for managing users in the application"
     * )
     */

    /**
     * @OA\Get(
     *     path="/api/user-management",
     *     summary="Get list of users",
     *     tags={"User Management"},
     *     description="Returns a list of users filtered by the query parameters",
     *     @OA\Parameter(
     *         name="f_name",
     *         in="query",
     *         description="Filter by first name (optional)",
     *         required=false,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="l_name",
     *         in="query",
     *         description="Filter by last name (optional)",
     *         required=false,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="limit",
     *         in="query",
     *         description="Number of results per page (optional, default is 10)",
     *         required=false,
     *         @OA\Schema(type="integer", default=10)
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string", example="Successfully fetched users"),
     *             @OA\Property(property="data", type="array", @OA\Items(type="object")),
     *             @OA\Property(property="current_page", type="integer"),
     *             @OA\Property(property="last_page", type="integer"),
     *             @OA\Property(property="total", type="integer")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="No users found",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="error", type="string", example="No users found")
     *         )
     *     )
     * )
     */

    public function index(Request $request)
    {
        $users = User::where('is_active', 1)
            ->where('f_name', 'like', '%' . $request->f_name . '%')
            ->where('l_name', 'like', '%' . $request->l_name . '%');

        $users = $users->paginate($request->limit ?? 10);

        if ($users->isEmpty()) {
            return response()->json(['error' => 'No users found'], 404);
        }

        return response()->json([
            "message" => "Successfully fetched users",
            "data" => $users->items(),
            "current_page" => $users->currentPage(),
            "last_page" => $users->lastPage(),
            "total" => $users->total(),
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

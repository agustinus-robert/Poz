<?php

namespace Robert\Poz\Http\Controllers\API;

use Modules\Reference\Http\Controllers\Controller;
use Yajra\DataTables\DataTables as Table;
use Robert\Poz\Models\Product;
use Robert\Poz\Models\Brand;
use Robert\Poz\Models\Category;
use Illuminate\Http\Request;
use Robert\Account\Models\UserToken;

class CategoryApiController extends Controller
{
    /**
     * Show the dashboard page.
     */
    public function index(Request $request)
    {
        $perPage = $request->get('per_page', 10);

        $user = $request->header('X-API-KEY');
        $userToken = UserToken::where('token', $user)->first();

        $categories = Category::where('created_by', $userToken->user_id)->paginate($perPage);
        return response()->json($categories);
    }
}

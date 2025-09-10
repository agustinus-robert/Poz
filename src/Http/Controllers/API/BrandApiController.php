<?php

namespace Robert\Poz\Http\Controllers\API;

use Modules\Reference\Http\Controllers\Controller;
use Yajra\DataTables\DataTables as Table;
use Robert\Poz\Models\Product;
use Robert\Poz\Models\Brand;
use Robert\Poz\Models\Category;
use Illuminate\Http\Request;

class BrandApiController extends Controller
{
    /**
     * Show the dashboard page.
     */
    public function index(Request $request)
    {
        $perPage = $request->get('per_page', 10);

        $brand = Brand::paginate($perPage);
        return response()->json($brand);
    }
}

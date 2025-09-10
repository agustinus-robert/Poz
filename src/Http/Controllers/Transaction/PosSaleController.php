<?php

namespace Robert\Poz\Http\Controllers\Transaction;

use Modules\Reference\Http\Controllers\Controller;
use Yajra\DataTables\DataTables as Table;
use Robert\Poz\Models\Product;
use Robert\Poz\Models\Brand;
use Robert\Poz\Models\Category;
use Illuminate\Http\Request;

class PosSaleController extends Controller
{
    /**
     * Show the dashboard page.
     */
    public function index()
    {
        $data = [];
        return view('poz::transaction.pos_sale', $data);
    }

    public function create(Request $request)
    {

        return view('poz::transaction.pos_sale', [
            'action' => 'Create'
        ]);
    }

    public function edit(Request $request)
    {

        return view('poz::transaction.pos_sale', [
            'action' => 'Update'
        ]);
    }
}

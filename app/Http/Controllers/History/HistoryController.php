<?php

namespace App\Http\Controllers\History;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;

/**
 * Class HistoryController
 * @package App\Http\Controllers\History
 */
class HistoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * @param Request $request
     * @param int $id
     * @param int|null $domain_id
     */
    public function listUsersHistory(Request $request,int $id, int $domain_id = null)
    {
        // logig
    }
}

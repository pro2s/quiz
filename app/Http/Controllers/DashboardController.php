<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    private $allowedRoles = ['admin', 'editor', 'moderator'];
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if ($request->user()->hasAnyRole($this->allowedRoles)) {
                return $next($request);
            }
            $message = 'This action is unauthorized.';
            return $request->expectsJson()
                ? response()->json(['message' => $message], 401)
                : redirect()->guest(route('account'));
        });
    }

    /**
     * Show the application dashboard.
     * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles($this->allowedRoles);
        return view('admin.dashboard');
    }
}

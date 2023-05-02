<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Session\Store;
use function Symfony\Component\String\s;

class SessionController extends Controller
{
    public function index()
    {
        $userSessions = DB::table('sessions')
            ->select('id', 'ip_address', 'last_activity')
            ->where('user_id', Auth::id())
            ->get()
            ->map(function ($session) {
                $session->last_activity = Carbon::parse($session->last_activity)->format('Y-M-D');
                return $session;
            });







        return view('session.index', compact('userSessions'));



    }

    public function destroy($id)
    {
        Session::getHandler()->destroy($id);
        return redirect()->route('session.index');

    }

    public function destroyExceptCurrent()
    {
        $currentSession = session()->getId();

        $userSessionIds = DB::table('sessions')
            ->where('user_id', Auth::id())
            ->where('id','<>',$currentSession)
            ->delete();


        return redirect()->route('session.index');
    }
}

<?php
namespace App\Http\Controllers;

use App\Traits\JsonResponder;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    use JsonResponder;
    public function store(Request $request)
    {
        $user = $request->user();
        $user->update($request->all());
        return $this->successResponse($user);
    }
}

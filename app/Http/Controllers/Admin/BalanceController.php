<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Balance;
use App\Http\Requests\MoneyValidationFormRequest;
use App\User;

class BalanceController extends Controller
{
    public function index()
    {
        $balance = auth()->user()->balance;
        $amount = $balance ? $balance->amount : 0;
        
        return view('admin.balance.index', compact('amount'));
    }

    public function deposit()
    {
        return view('admin.balance.deposit');
    }

    public function depositStore(MoneyValidationFormRequest $request)
    {
        // dd(auth()->user()->balance()->firstOrCreate([]));
        $balance = auth()->user()->balance()->firstOrCreate([]);
        $response = $balance->deposit($request->value);

        if ($response['success'])
        {
            return redirect()
                ->route('admin.balance')
                ->with('success', $response['message']);
        }

        return redirect()->back()->with('error', $response['message']);
    }

    public function withdraw()
    {
        return view('admin.balance.withdraw');
    }

    public function withdrawStore(MoneyValidationFormRequest $request)
    {
        $balance = auth()->user()->balance()->firstOrCreate([]);
        $response = $balance->withdraw($request->value);

        if ($response['success'])
        {
            return redirect()
                ->route('admin.balance')
                ->with('success', $response['message']);
        }

        return redirect()->back()->with('error', $response['message']);
    }

    public function transfer()
    {
        return view('admin.balance.transfer');
    }

    public function transferStore(Request $request, User $user)
    {
        if (!$sender = $user->getSender($request->sender))
            return redirect()->back()->with('error','Usuario não encontrado');

        if ($sender->id === auth()->user()->id)
            return redirect()->back()->with('error','Você digitou sua conta, digite conta de outra pessoa');
        
        $balance = auth()->user()->balance;


        return view('admin.balance.transferConfirm', compact('sender', 'balance'));
    }

    public function transferConfirm(MoneyValidationFormRequest $request, User $user)
    {
        if(!$sender = $user->find($request->sender_id))
            return redirect()
                    ->route('transfer.confirm')
                    ->with('success', 'Recebedor não encontrado!');

        $balance = auth()->user()->balance()->firstOrCreate([]);
        $response = $balance->transfer($request->value, $sender);

        if ($response['success'])
        {
            return redirect()
                ->route('admin.balance')
                ->with('success', $response['message']);
        }

        return redirect()->back()->with('error', $response['message']);
    }
}
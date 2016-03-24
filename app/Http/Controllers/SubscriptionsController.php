<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubscriptionsController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
    }

    protected function planNotAvailable($id)
    {
        $available = ['gold', 'diamond', 'platinum'];
        if ( ! in_array($id, $available))
        {
            return true;
        }
        return false;
    }

    public function index()
    {
        if (Auth::user()->subscribed())
        {
            return redirect()->route('invoices');
           
        }
         return view('subscriptions.index');
        
    }

    public function subscribe($planId)
    {
        if ($this->planNotAvailable($planId)) {
            return redirect()->route('plans');
        }

        return view('subscriptions.subscribe', compact('planId'));
    }

    public function swapPlans(Request $request)
    {
        $planId = $request->get('plan_id');
        if ($this->planNotAvailable($planId)) {
            return redirect()->back()->withErrors('Plan is required');
        }
        Auth::user()->subscription($planId)->swap();
        return redirect()->back()->withMessage('Plan changed!');
    }

  

    // public function process(Request $request)
    // {
    //     $planId = $request->get('plan_id');
    //     if ($this->planNotAvailable($planId)) {
    //         return redirect()->back()->withErrors('Plan is required');
    //     }
    //     $user = Auth::user();
    //     $user->subscription($planId)->create($request->get('stripe_token'), [
    //         'email' => $user->email,
    //         'metadata' => [
    //         'name' => $user->name,
    //         ],
    //     ]);

    //     //return redirect('invoices');
    //     return "Thanks dude!";
    // }

    public function invoices()
    {
        $user = Auth::user();
        return view('subscriptions.invoices', compact('user'));
    }

    public function downloadInvoice($id)
    {
        return Auth::user()->downloadInvoice($id, [
            'header'  => 'CleBeaInc.com',
            'vendor'  => 'CleBeaInc',
            'product' => Auth::user()->stripe_plan,
            'street' => '123 Che Street',
            'location' => 'Bamenda CM, 230',
            'phone' => '237.679.386.906',
            'url' => 'www.cleBeaInc.com',
        ]);
    }

    public function cancelPlan()
    {
        Auth::user()->subscription('free')->swap();
        return redirect('invoices');
    }
}

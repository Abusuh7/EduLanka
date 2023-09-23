<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\CrudEvents;
class CalenderController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $user = auth()->user(); // Get the currently logged-in user
            $data = CrudEvents::where('user_id', $user->id)
                ->whereDate('event_start', '>=', $request->start)
                ->whereDate('event_end', '<=', $request->end)
                ->get(['id', 'event_name as title', 'event_start as start', 'event_end as end']);

            return response()->json($data);
        }
        return view('calender');
    }


    public function calendarEvents(Request $request)
    {
        $user = auth()->user(); // Get the currently logged-in user

        switch ($request->type) {
            case 'create':
                $event = CrudEvents::create([
                    'user_id' => $user->id,
                    'event_name' => $request->event_name,
                    'event_start' => $request->event_start,
                    'event_end' => $request->event_end,
                ]);

                return response()->json($event);
                break;

            case 'edit':
                $event = CrudEvents::find($request->id)->update([
                    'event_name' => $request->event_name,
                    'event_start' => $request->event_start,
                    'event_end' => $request->event_end,
                ]);

                return response()->json($event);
                break;

            case 'delete':
                $event = CrudEvents::find($request->id)->delete();

                return response()->json($event);
                break;

            default:
                # ...
                break;
        }
    }
}

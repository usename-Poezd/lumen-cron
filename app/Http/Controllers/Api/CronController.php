<?php

namespace App\Http\Controllers\Api;


use App\Models\CronJob;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CronController extends Controller
{
    public function index()
    {
        return response()->json(CronJob::all());
    }

    public function show($id)
    {
        return response()->json(CronJob::query()->findOrFail($id));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'cron' => 'required'
        ]);

        preg_match("/((\d\s|\*\s){5})(.+)/i",  $request->get('cron'), $matches);

        $cron = CronJob::create([
            'command' => $matches[3],
            'time' => (string) Str::of($matches[1])->ltrim()->rtrim()
        ]);

        return response()->json($cron);
    }

   public function update(Request $request, $id)
   {
       $this->validate($request, [
           'cron' => 'required'
       ]);

       $cronJob = CronJob::query()
           ->findOrFail($id);

       preg_match("/((\d\s|\*\s){5})(.+)/i",  $request->get('cron'), $matches);

       $cronJob->update([
           'command' => $matches[3],
           'time' => (string) Str::of($matches[1])->ltrim()->rtrim()
       ]);

       return response()->json($cronJob);
   }

    public function destroy($id)
    {
        CronJob::query()
            ->findOrFail($id)
            ->delete();

        return response()->json([], 204);
    }
}

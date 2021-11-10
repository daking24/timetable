<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    public function showCreateFormSetting(Setting $setting)
    {
        $collection = collect($setting->all());
        $keyed = $collection->mapWithKeys(function ($item){
            return [$item['key'] = $item['value']];
        });
        $keyed->all();
        return view('setting');
    }

    public function store(Request $request, Setting $setting)
    {
        $data = $request->except('_token');
        foreach ($data as $key => $val) {
            $record = $setting->where('key', $key);
            if ($record->exists()) {
                $record->update(['value' => $val]);
            } else {
                $record->create([
                    'key'   => $key,
                    'value' => $val
                ]);
            }
        }
        return redirect()->back()->with('message', 'Setting Saved Successfully');
    }
}

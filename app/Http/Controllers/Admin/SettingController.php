<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Http\Requests\StoreSettingRequest;
use App\Http\Requests\UpdateSettingRequest;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['main_title'] = "Setting Management";
        $data['sub_title'] = "Setting Detail";
        $data['settings'] = Setting::get();
        return view('admin.setting.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSettingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSettingRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        $data['main_title'] = "Setting";
        $data['sub_title'] = "Modify Setting";
        $data['setting'] = $setting;
        return view('admin.setting.update',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSettingRequest  $request
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSettingRequest $request, Setting $setting)
    {
        $setting->address = $request->address;
        $setting->mobile_number= $request->mobile_number;
        $setting->instagram = $request->instagram;
        $setting->email = $request->email;
        $setting->twitter = $request->twitter;
        $setting->facebook = $request->facebook;
        $setting->policy = $request->policy;
        $setting->pay_mode = $request->pay_mode;
        $setting->paypal_user = $request->paypal_user;
        $setting->paypal_password = $request->paypal_password;
        $setting->paypal_secret = $request->paypal_secret;
      
        $setting->update();
        $msg =session()->flash('message', 'Setting Updated.');

        return redirect('adminpanel/setting');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        //
    }
}

<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Ads;
use App\Models\category;
use App\Models\Company ;
use App\Models\ModelYear;
use App\Jobs\Notification;
use App\Models\webNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $ads = Ads::where('vendor_id',auth()->id())->with('company', 'modelYear')->get();
        return view('vendor.ads.index', compact('ads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $company = Company::all();
        $year = ModelYear::all();
        $page_title = 'Ad index';
        return view('vendor.ads.create', compact('company','year','page_title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'city'=>'required',
            'car_images'=>'required',
            'files'=> 'required',
            'model' => 'required',
            'company_id' => 'required',
            'model_year_id' => 'required',
            'price' =>'required',
            'color' =>'required',
            'engine'=>'required',
            'phone'=>'required',
            'address'=>'required',
            'mileage'=>'required',
        ]);
        $ads = new Ads();
        if ($request->file('car_images')) {
            $images = [];
            foreach ($request->file('car_images') as $data) {
                //dd($data);
                $image = hexdec(uniqid()) . '.' . strtolower($data->getClientOriginalExtension());
                $data->move('public/image/add/', $image);
                $images[] = 'public/image/add/' . $image;
            }
            /*if ($request->has('old_image')) {
                $old_image = $request->image;
                unlink($old_image);
            }*/
            $ads->images = implode(",", $images);
        }
        if ($request->file('files')) {
            $files = [];
            foreach ($request->file('files') as $data) {
                $doucments = hexdec(uniqid()) . '.' . strtolower($data->getClientOriginalExtension());
                $data->move('public/image/add/', $doucments);
                $files[] = 'public/image/add/' . $doucments;
            }

            /*if ($request->has('old_image')) {
                $old_image = $request->image;
                unlink($old_image);
            }*/
            $ads->document_file = implode(",", $files);
        }
        $ads->model = $request->model;
        $ads->company_id =  $request->company_id ;
        $ads->model_year_id = $request->model_year_id;
        $ads->price = $request->price;
        $ads->color = $request->color;
        $ads->engine = $request->engine;
        $ads->phone = $request->phone;
        $ads->address = $request->address;
        $ads->mileage = $request->mileage;
        $ads->city = $request->city;
        $ads->country = $request->country;
        $ads->description = $request->description;

        $ads->vendor_id = Auth::id();
        $ads->save();


        $message['email'] = auth()->user()->email;
        $message['type'] = "ads";
        $message['link1'] = url('vendor/ads');
        //mail notification
        $Notification = new Notification($message);
        dispatch($Notification);
        //web notification
        $notification = new webNotification();
        $notification->vendor_id = auth()->user()->id;
        $notification->title = " Advertisement Placement Completed ";
        $notification->links = url('vendor/ads');
        $notification->body = ' ';
        $notification->save();

        return $this->message($ads, 'vendor.ads.index', 'Ads Create Successfully', 'Ads Create Error');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $ads = Ads::findOrFail($id);
        $company = Company::all();
        $year = ModelYear::all();
        return view('vendor.ads.edit', compact('ads' , 'company', 'year'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // return $request;
        $request->validate([
            'model' => 'required',
            'company_id' => 'required',
            'model_year_id' => 'required',
            'price' =>'required',
            'color' =>'required',
            'engine'=>'required',
            'phone'=>'required',
            'address'=>'required',
            'mileage'=>'required',
        ]);
        $ads = Ads::findOrFail($id);
        if($request->file('car_images')) {
            $images = [];
            foreach ($request->file('car_images') as $data) {
                //dd($data);
                $image = hexdec(uniqid()) . '.' . strtolower($data->getClientOriginalExtension());
                $data->move('public/image/add/', $image);
                $images[] = 'public/image/add/' . $image;
            }
            $ads->images = implode(",", $images);
        }

        if ($request->file('doucment')) {
            $files = [];
            foreach ($request->file('doucment') as $data) {
                $doucments = hexdec(uniqid()) . '.' . strtolower($data->getClientOriginalExtension());
                $data->move('public/image/add/', $doucments);
                $files[] = 'public/image/add/' . $doucments;
            }
            $ads->document_file = implode(",", $files);
        }

        $ads->model = $request->model;
        $ads->company_id =  $request->company_id ;
        $ads->model_year_id = $request->model_year_id;
        $ads->price = $request->price;
        $ads->color = $request->color;
        $ads->engine = $request->engine;
        $ads->phone = $request->phone;
        $ads->address = $request->address;
        $ads->mileage = $request->mileage;
        $ads->city = $request->city;
        $ads->country = $request->country;
        $ads->description = $request->description;
        $ads->vendor_id = Auth::id();
        $ads->update();
        return $this->message($ads, 'vendor.ads.index', 'ad Update Successfully', '  Ad is not update Error');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ad = Ads::findOrFail($id);
        $ad->delete();
        return $this->message($ad , 'vendor.ads.index', 'ad deleted Successfully', '  Ad is not delete Error');
    }
}

<?php

namespace App\Http\Controllers\Location;

use App\Http\Controllers\Controller;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $locations = Location::query()->where('active', 1);
        $title = $request['title'];
        $from_date = $request['from_date'];
        $to_date = $request['to_date'];

        if ($title != '') {
            $locations->where('products.title', 'LIKE', '%' . $title . '%');
        }

        if ($from_date != '') {
            $from_date = jalali_to_gregorian_string($request['from_date'], false, '-', '/');
            $locations->where(DB::raw('products.created_at'), '>=', $from_date);

        }
        if ($to_date != '') {
            $to_date = jalali_to_gregorian_string($request['to_date'], false, '-', '/');
            $locations->where(DB::raw('products.created_at'), '<=', $to_date);
        }

        $locations = $locations->orderBy('id', 'desc')->get();
        return view('dashboard.location.locations', compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('dashboard.location.create_location');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $rules = [
            'title' => 'required|max:120',
            'lat' => 'required',
            'lng' => 'required',
            'virtual_tour' => 'required',
            'main_pic' => 'nullable|file',
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()->with(['errors' => $validator->errors()])->withInput($request->all());
        }
        $title = $request->input('title');
        $lat = $request->input('lat');
        $lng = $request->input('lng');
        $abstract = $request->input('abstract');
        $description = $request->input('description');
        $virtual_tour = $request->input('virtual_tour');
        $street_view = $request->input('street_view');
        $language_id = $request->input('language_id') ?? 1;
        $date = date('Y-m-d');
        $upload_file = Config::get('app.base_download');
        $destinationPath = $upload_file . 'uploads/images/locations/' . $date  ;
        $destinationPathDb = 'uploads/images/locations/' . $date;
        if( !file_exists($destinationPath)){
            mkdir($destinationPath, 0755, true);
        };
        $image_direct = '';
        if ($request->hasFile('main_pic')) {

            $new_rand = rand(123456, 6549876);
            $ext = $request->file('main_pic')->getClientOriginalExtension();
            $_image = $date . '_' . $new_rand . '_location_.'.$ext;
            $file = $request->file('main_pic');
            $file->move($destinationPath, $_image);
            $image_direct = $destinationPathDb . '/' . $_image;

        }
        $res = Location::query()->create([
            'title' => $title,
            'lat' => $lat,
            'lng' => $lng,
            'main_pic' => $image_direct,
            'abstract' => $abstract,
            'description' => $description,
            'virtual_tour' => $virtual_tour,
            'street_view' => $street_view,
            'language_id' => $language_id,
            'active' => 1,
        ]);
        if( $res )
            return redirect('/locations')->with(['success' => 'ثبت یا موفقیت']);
        return back()->with(['fail' => 'خطا در ثبت'])->withInput($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $location = Location::query()->findOrFail($id);
        return view('dashboard.location.edit_location', compact('location'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'title' => 'required|max:40',
            'lat' => 'required',
            'lng' => 'required',
            'main_pic' => 'nullable|file',
            'virtual_tour' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()->with(['errors' => $validator->errors()])->withInput($request->all());
        }
        $title = $request->input('title');
        $lat = $request->input('lat');
        $lng = $request->input('lng');
        $abstract = $request->input('abstract');
        $description = $request->input('description');
        $virtual_tour = $request->input('virtual_tour');
        $street_view = $request->input('street_view');
        $language_id = $request->input('language_id') ?? 1;
        $date = date('Y-m-d');
        $upload_file = Config::get('app.base_download');
        $destinationPath = $upload_file . 'uploads/images/locations/' . $date  ;
        $destinationPathDb = 'uploads/images/locations/' . $date;
        if( !file_exists($destinationPath)){
            mkdir($destinationPath, 0755, true);
        };


        $location = Location::query()->findOrFail($id);
        $image_direct = $location->main_pic;
        if ($request->hasFile('main_pic')) {

            $new_rand = rand(123456, 6549876);
            $ext = $request->file('main_pic')->getClientOriginalExtension();
            $_image = $date . '_' . $new_rand . '_location_.'.$ext;
            $file = $request->file('main_pic');
            $file->move($destinationPath, $_image);
            $image_direct = $destinationPathDb . '/' . $_image;

        }
        $location->description = $description ?? $location->description;
        $location->abstract = $abstract ?? $location->abstract;
        $location->lat = $lat ?? $location->lat;
        $location->lng = $lng ?? $location->lng;
        $location->title = $title ?? $location->title;
        $location->main_pic = $image_direct ?? $location->main_pic;
        $location->language_id = $language_id ?? $location->language_id;
        $location->virtual_tour = $virtual_tour ?? $location->virtual_tour;
        $location->street_view = $street_view ?? $location->street_view;
        if( $location->update() )
            return redirect('/locations')->with(['success' => 'ویرایش یا موفقیت']);
        return back()->with(['fail' => 'خطا در ویرایش'])->withInput($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $res = Location::query()->where('id', $id)->delete();


        if ($res) {

            return Response::json([
                'status' => 'ok',
                'message' => 'حذف با موفقیت',
                'status_number' => '1',
            ]);
        } else {
            return Response::json([
                'status' => 'error',
                'message' => 'خطا در حذف',
                'status_number' => '0',
            ]);
        }

    }
    public function toggle(Request $request)
    {
        $rules = [
            'location_id' => 'required|numeric',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return Response::json([
                'status' => 'error',
                'message' => 'اطلاعات ناقص می باشد!!',
                'status_number' => '3',
            ]);
        }
        $location = Location::query()->where('id', $request['location_id'])->first();

        if (!$location) {
            return Response::json([
                'status' => 'error',
                'message' => 'وجود ندارد!!',
                'status_number' => '3',
            ]);
        }
        if ($location->active)
            $location->active = 0;
        else
            $location->active = 1;
        if ($location->update()) {

            return Response::json([
                'status' => 'ok',
                'message' => 'ویرایش با موفقیت',
                'status_number' => '1',
                'active' => (integer)$location->active,
            ]);
        } else {
            return Response::json([
                'status' => 'error',
                'message' => 'خطا در ویرایش',
                'status_number' => '0',
            ]);
        }


    }
}

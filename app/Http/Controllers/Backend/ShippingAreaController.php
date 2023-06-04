<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\ShipDivision;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ShipDistrict;
use App\Models\ShipUpazila;

class ShippingAreaController extends Controller
{

/////////// Ship Division Section Start /////////////

    public function DivisionView()
    {
        $divisions = ShipDivision::orderBy('id', 'DESC')->get();
        return view('backend.ship.division.view_division', compact('divisions'));
    }


    public function DivisionStore(Request $request)
    {
        $request->validate([
            'division_name' => 'required|max:100',
        ]);

        ShipDivision::insert([
            'division_name' => $request->division_name,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Division Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }


    public function DivisionEdit($id)
    {
        $divisions = ShipDivision::findOrFail($id);
        return view('backend.ship.division.edit_division', compact('divisions'));
    }



    public function DivisionUpdate(Request $request, $id)
    {
        ShipDivision::findOrFail($id)->update([
            'division_name' => $request->division_name,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Division Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('manage-division')->with($notification);
    }



    public function DivisionDelete($id)
    {
        ShipDivision::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Division Deleted Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }

/////////// Ship Division Section End /////////////






/////////// Ship District Section Start /////////////

    public function DistrictView()
    {
        $division = ShipDivision::orderBy('division_name', 'ASC')->get();
        $district = ShipDistrict::with('division')->orderBy('id', 'DESC')->get();
        return view('backend.ship.district.view_district', compact('division','district'));
    }



    public function DistrictStore(Request $request)
    {
        $request->validate([
            'division_id' => 'required|max:100',
            'district_name' => 'required|max:100',
        ]);

        ShipDistrict::insert([
            'division_id' => $request->division_id,
            'district_name' => $request->district_name,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'District Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
    


    public function DistrictEdit($id)
    {
        $division = ShipDivision::orderBy('division_name', 'ASC')->get();
        $district = ShipDistrict::findOrFail($id);
        return view('backend.ship.district.edit_district', compact('division','district'));
    }



    public function DistrictUpdate(Request $request, $id)
    {
        ShipDistrict::findOrFail($id)->update([
            'division_id' => $request->division_id,
            'district_name' => $request->district_name,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'District Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('manage-district')->with($notification);
    }



    public function DistrictDelete($id)
    {
        ShipDistrict::findOrFail($id)->delete();

        $notification = array(
            'message' => 'District Deleted Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }

/////////// Ship District Section End /////////////






/////////// Ship Upazila Section Start /////////////

    public function UpazilaView()
    {
        $division = ShipDivision::orderBy('division_name', 'ASC')->get();
        $district = ShipDistrict::orderBy('district_name', 'ASC')->get();
        $upazila = ShipUpazila::with('division', 'district')->orderBy('id', 'DESC')->get();
        return view('backend.ship.upazila.view_upazila', compact('division', 'district', 'upazila'));
    }


    public function UpazilaStore(Request $request)
    {
        $request->validate([
            'division_id' => 'required|max:100',
            'district_id' => 'required|max:100',
            'upazila_name' => 'required|max:100',
        ]);

        ShipUpazila::insert([
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'upazila_name' => $request->upazila_name,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Upazila Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }



    public function UpazilaEdit($id)
    {
        $division = ShipDivision::orderBy('division_name', 'ASC')->get();
        $district = ShipDistrict::orderBy('district_name', 'ASC')->get();
        $upazila = ShipUpazila::findOrFail($id);
        return view('backend.ship.upazila.edit_upazila', compact('division', 'district', 'upazila'));
    }



    public function UpazilaUpdate(Request $request, $id)
    {
        ShipUpazila::findOrFail($id)->update([
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'upazila_name' => $request->upazila_name,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Upazila Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('manage-upazila')->with($notification);
    }



    public function UpazilaDelete($id)
    {
        ShipUpazila::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Upazila Deleted Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }

/////////// Ship Upazila Section End /////////////




/////////// Ship Aria Ajax Get Start /////////////
    public function DistrictGetAjax($division_id)
    {
        $ship = ShipDistrict::where('division_id', $division_id)->orderBy('district_name', 'ASC')->get();
        return json_encode($ship);
    }
/////////// Ship Aria Ajax Get End /////////////




}

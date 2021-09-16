<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\District;
use App\Models\Sub_District;
use App\Models\Union;

class DistrictController extends Controller
{
    public function districtform(){
        $districts =    District::all();
        $subdists =    Sub_District::all();
        return view('admin.district.district_subdistrict',compact('districts','subdists'));
    }


    public function createdistrict(Request $request){
        $test = new District;
        $test->name = $request->name;
        $test->service_cost = $request->service_cost;
        $test->save();
        return back()
        ->with('success',' District Created successfully');
 
    }
    public function createsubdistrict(Request $request){
        $test = new Sub_District;
        $test->name = $request->name;
        $test->district_id = $request->district_id;
        $test->save();
        return back()
        ->with('success',' Sub District Created successfully');
 
    }
    public function unioncreate(Request $request){
        $test = new Union;
        $test->name = $request->name;
        $test->subdist_id = $request->subdist_id;
        $test->save();
        return back()
        ->with('success',' Union Created successfully');
 
    }
    
    public function locationview(){
        $locations = District::all();
        $sublocations = Sub_District::all();
        return view('admin.district.locationview',compact('locations','sublocations'));
    }

      
    Public function editdistform($id){
    
        $edit = District::find($id);
        return view('admin.district.edit_dist_subdist', compact('edit'));
    }

    Public function editsubdistform($id){
        $dists = District::all();
        $editsubdist = Sub_District::find($id);
        return view('admin.district.edit_dist_subdist',compact('dists','editsubdist'));
    
   
    }

    
    public function updatedist(Request $request, $id)
    {
        // dd('yes');
        $updateData = $request->validate([
            'name' => 'required',
            'service_cost' => 'required',
            
        ]);
       
       
        District::whereId($id)->update($updateData);
        return back()->with('success', 'District location has been updated');
    }
    public function subdistupdate(Request $request, $id)
    {
        // dd('yes');
        $updateData = $request->validate([
            'name' => 'required',
            'district_id' => 'required',
            
        ]);
       
       
        Sub_District::whereId($id)->update($updateData);
        return back()->with('success', 'One Sub District location has been updated');
    }

    public function deletedist($id){
        //  dd('yes');
        $del= District::findOrFail($id);
        $del->delete();
        return back()
        ->with('success','One District deleted successfully');

     }
    public function deletesubdist($id){
        //  dd('yes');
        $del= Sub_District::findOrFail($id);
        $del->delete();
        return back()
        ->with('success','Sub District deleted successfully');

     }






   
}

<?php

namespace App\Http\Controllers\Office;

use App\Event;
use App\Models\Leads\Lead;
use App\Models\SMTP;
use App\Term;
use Illuminate\Http\Request;
use App\Models\SingleRowData;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class GeneralSettingsController extends Controller
{
    public function calendar(Request $request)
    {

        if($request->ajax()) {

            $data = Lead::whereDate('start', '>=', $request->start)
                ->get(['id', 'title', 'start']);

            return response()->json($data);
        }

        return view('crm.office.fullcalender');
    }
    public function ajax(Request $request)
    {

        switch ($request->type) {
            case 'add':

                $event = Event::create([
                    'title' => $request->title,
                    'start' => $request->start,
                    'end' => $request->end,
                ]);

                return response()->json($event);
                break;

            case 'update':
                $event = Event::find($request->id)->update([
                    'title' => $request->title,
                    'start' => $request->start,
                    'end' => $request->end,
                ]);

                return response()->json($event);
                break;

            case 'delete':
                $event = Event::find($request->id)->delete();

                return response()->json($event);
                break;

            default:
                # code...
                break;
        }
    }
    public function index()
    {
        $route_active = 'general_setting';
        $logo = SingleRowData::where('field_name','logo_file')->first();
        $company_name = SingleRowData::where('field_name','company_name')->first();
        $company_address = SingleRowData::where('field_name','company_address')->first();
        $company_city = SingleRowData::where('field_name','company_city')->first();
        $company_state = SingleRowData::where('field_name','company_state')->first();
        $company_country = SingleRowData::where('field_name','company_country')->first();
        $company_zip = SingleRowData::where('field_name','company_zip')->first();
        $company_phone = SingleRowData::where('field_name','company_phone')->first();
        $company_email = SingleRowData::where('field_name','company_email')->first();
        $terms = SingleRowData::where('field_name','terms')->first();
        $terms1 = SingleRowData::where('field_name','terms1')->first();
        $terms2 = SingleRowData::where('field_name','terms2')->first();
        $terms3 = SingleRowData::where('field_name','terms3')->first();
        $terms4 = SingleRowData::where('field_name','terms4')->first();

        return view('crm.office.general_setting', compact([
            'route_active', 
            'logo',
            'company_name',
            'company_address',
            'company_city',
            'company_state',
            'company_country',
            'company_zip',
            'company_phone',
            'company_email',
            'terms',
            'terms1',
            'terms2',
            'terms3',
            'terms4'
        ]));
    }
    public function show(){
//        $data=SingleRowData::all();
//        return view('crm.proposal.proposal_pdf',['data'=>$data]);
        return view('waqas');
    }

    // Company Logo 
    public function store(Request $request)
    {
        if($request->has('logo_file')){
        // if you want to delete the image from the directory
           $extension = ".".$request->logo_file->getClientOriginalExtension();
           $name = basename($request->logo_file->getClientOriginalName(), $extension).time();
           $name = $name.$extension;
           $path = $request->logo_file->storeAs('adminfiles',$name,'public');
         }
         if($extension == '.png' || $extension == '.jpg' || $extension == '.jpeg' || $extension == '.gif' || $extension == '.PNG' || $extension == '.JPG' || $extension == '.JPEG' || $extension == '.GIF') {
             $extension = 'image';
         }
         $logo = SingleRowData::create([
             'field_name'=>'logo_file',
             'field_type'=>'file',
             'field_value'=>$name,
        ]);

        if($logo->save()){
            $notification = array(
                'message' => 'File uploaded successfully!',
                'alert-type' => 'success'
            );
            return back()->with($notification);
        }else{
            $notification = array(
                'message' => 'Please try again!',
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }
    }
    public function store1(Request $request)
    {
        if($request->has('logo_file1')){
            // if you want to delete the image from the directory
            $extension1 = ".".$request->logo_file1->getClientOriginalExtension();
            $name1 = basename($request->logo_file1->getClientOriginalName(), $extension1).time();
            $name1 = $name1.$extension1;
            $path1 = $request->logo_file1->storeAs('adminfiles',$name1,'public');
        }
        if($request->has('logo_file2')){
            // if you want to delete the image from the directory
            $extension2 = ".".$request->logo_file2->getClientOriginalExtension();
            $name2 = basename($request->logo_file2->getClientOriginalName(), $extension2).time();
            $name2 = $name2.$extension2;
            $path2 = $request->logo_file2->storeAs('adminfiles',$name2,'public');
        }
        if($request->has('logo_file3')){
            // if you want to delete the image from the directory
            $extension3 = ".".$request->logo_file3->getClientOriginalExtension();
            $name3 = basename($request->logo_file3->getClientOriginalName(), $extension3).time();
            $name3 = $name3.$extension3;
            $path3 = $request->logo_file3->storeAs('adminfiles',$name3,'public');
        }
        if($request->has('logo_file4')){
            // if you want to delete the image from the directory
            $extension4 = ".".$request->logo_file4->getClientOriginalExtension();
            $name4 = basename($request->logo_file4->getClientOriginalName(), $extension4).time();
            $name4 = $name4.$extension4;
            $path4 = $request->logo_file4->storeAs('adminfiles',$name4,'public');
        }
        if($request->has('logo_file5')){
            // if you want to delete the image from the directory
            $extension5 = ".".$request->logo_file5->getClientOriginalExtension();
            $name5 = basename($request->logo_file5->getClientOriginalName(), $extension5).time();
            $name5 = $name5.$extension5;
            $path5 = $request->logo_file5->storeAs('adminfiles',$name5,'public');
        }
        if($request->has('logo_file6')){
            // if you want to delete the image from the directory
            $extension6 = ".".$request->logo_file6->getClientOriginalExtension();
            $name6 = basename($request->logo_file6->getClientOriginalName(), $extension6).time();
            $name6 = $name6.$extension6;
            $path6 = $request->logo_file6->storeAs('adminfiles',$name6,'public');
        }
        if($extension1 == '.png' || $extension1 == '.jpg' || $extension1== '.jpeg' || $extension1 == '.gif' || $extension1 == '.PNG' || $extension1 == '.JPG' || $extension1 == '.JPEG' || $extension1 == '.GIF') {
            $extension1 = 'image';
        }
        if($extension2 == '.png' || $extension2 == '.jpg' || $extension2 == '.jpeg' || $extension2 == '.gif' || $extension2 == '.PNG' || $extension2 == '.JPG' || $extension2 == '.JPEG' || $extension2 == '.GIF') {
            $extension2 = 'image';
        }
        if($extension3 == '.png' || $extension3 == '.jpg' || $extension3 == '.jpeg' || $extension3 == '.gif' || $extension3 == '.PNG' || $extension3== '.JPG' || $extension3 == '.JPEG' || $extension3 == '.GIF') {
            $extension3 = 'image';
        }
        if($extension4 == '.png' || $extension4 == '.jpg' || $extension4 == '.jpeg' || $extension4 == '.gif' || $extension4 == '.PNG' || $extension4 == '.JPG' || $extension4 == '.JPEG' || $extension4 == '.GIF') {
            $extension4 = 'image';
        }
        if($extension5 == '.png' || $extension5 == '.jpg' || $extension5 == '.jpeg' || $extension5 == '.gif' || $extension5 == '.PNG' || $extension5 == '.JPG' || $extension5 == '.JPEG' || $extension5 == '.GIF') {
            $extension5 = 'image';
        }
        if($extension6 == '.png' || $extension6 == '.jpg' || $extension6 == '.jpeg' || $extension6 == '.gif' || $extension6 == '.PNG' || $extension6 == '.JPG' || $extension6 == '.JPEG' || $extension6 == '.GIF') {
            $extension6 = 'image';
        }



        $logo1 = SingleRowData::create([
            'field_name'=>'logo_file1',
            'field_type'=>'file',
            'field_value'=>$name1,
        ]);
        $logo2 = SingleRowData::create([
            'field_name'=>'logo_file2',
            'field_type'=>'file',
            'field_value'=>$name2,
        ]);
        $logo3 = SingleRowData::create([
            'field_name'=>'logo_file3',
            'field_type'=>'file',
            'field_value'=>$name3,
        ]);
        $logo4 = SingleRowData::create([
            'field_name'=>'logo_file4',
            'field_type'=>'file',
            'field_value'=>$name4,
        ]);
        $logo5 = SingleRowData::create([
            'field_name'=>'logo_file5',
            'field_type'=>'file',
            'field_value'=>$name5,
        ]);
        $logo6 = SingleRowData::create([
            'field_name'=>'logo_file6',
            'field_type'=>'file',
            'field_value'=>$name6,
        ]);

        if($logo1->save() && $logo2->save() && $logo3->save() && $logo4->save() && $logo5->save() && $logo6->save()){
            $notification = array(
                'message' => 'File uploaded successfully!',
                'alert-type' => 'success'
            );
            return back()->with($notification);
        }else{
            $notification = array(
                'message' => 'Please try again!',
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }
    }


    // Terms and Conditions Create
    public function terms(Request $request)
    {
        $validated = $request->validate([
            'terms'=>'required',
            'terms1'=>'required',
        ]);
        if($validated){
            $terms = SingleRowData::create([
                'field_name'=>'terms',
                'field_type'=>'text',
                'field_value'=>$request->terms,
           ]);
            $terms1 = SingleRowData::create([
                'field_name'=>'terms1',
                'field_type'=>'text',
                'field_value'=>$request->terms1,
            ]);
            $terms2 = SingleRowData::create([
                'field_name'=>'terms2',
                'field_type'=>'text',
                'field_value'=>$request->terms2,
            ]);
            $terms3 = SingleRowData::create([
                'field_name'=>'terms3',
                'field_type'=>'text',
                'field_value'=>$request->terms3,
            ]);
            $terms4 = SingleRowData::create([
                'field_name'=>'terms4',
                'field_type'=>'text',
                'field_value'=>$request->terms4,
            ]);
           if($terms && $terms1 && $terms2 && $terms3 && $terms4){
               $notification = array(
                   'message' => 'Terms added successfully!',
                   'alert-type' => 'success'
               );
               return back()->with($notification);
           }else{
            $notification = array(
                'message' => 'Please try again!',
                'alert-type' => 'error'
            );
            return back()->with($notification); 
           }
        }else{
            $notification = array(
                'message' => 'Please try again!',
                'alert-type' => 'error'
            );
            return back()->with($notification);            
        }
    }

    // Terms and Conditions Update
    public function termsUpdate(SingleRowData $terms, Request $request)
    {
        $validated = $request->validate([
            'terms'=>'required'
        ]);

        $terms = SingleRowData::where('field_name','terms')->first();
        $terms->field_value = $request->terms;
        $terms->save();

        $terms1 = SingleRowData::where('field_name','terms1')->first();
        $terms1->field_value = $request->terms1;
        $terms1->save();

        $terms2 = SingleRowData::where('field_name','terms2')->first();
        $terms2->field_value = $request->terms2;
        $terms2->save();

        $terms3 = SingleRowData::where('field_name','terms3')->first();
        $terms3->field_value = $request->terms3;
        $terms3->save();

        $terms4 = SingleRowData::where('field_name','terms4')->first();
        $terms4->field_value = $request->terms4;
        $terms4->save();

        if($validated){
            $notification = array(
                'message' => 'Terms details updated successfully!',
                'alert-type' => 'success'
            );
            return back()->with($notification);
        }else{
            $notification = array(
                'message' => 'Please try again!',
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }
    }



    // Company Address Store
    public function storeDetails(Request $request)
    {
        $validated = $request->validate([
            'company_name'=>'required'
        ]);
        $company_name = SingleRowData::create([
             'field_name'=>'company_name',
             'field_type'=>'text',
             'field_value'=>$request->company_name,
        ]);
        SingleRowData::create([
            'field_name'=>'company_address',
            'field_type'=>'text',
            'field_value'=>$request->company_address,
       ]);
       SingleRowData::create([
        'field_name'=>'company_city',
        'field_type'=>'text',
        'field_value'=>$request->company_city,
        ]);
        SingleRowData::create([
            'field_name'=>'company_state',
            'field_type'=>'text',
            'field_value'=>$request->company_state,
        ]);
        SingleRowData::create([
            'field_name'=>'company_country',
            'field_type'=>'text',
            'field_value'=>$request->company_country,
        ]);
        SingleRowData::create([
            'field_name'=>'company_zip',
            'field_type'=>'text',
            'field_value'=>$request->company_zip,
        ]);
        SingleRowData::create([
            'field_name'=>'company_phone',
            'field_type'=>'text',
            'field_value'=>$request->company_phone,
        ]);
        SingleRowData::create([
            'field_name'=>'company_email',
            'field_type'=>'text',
            'field_value'=>$request->company_email,
        ]);

        if($validated){
            $notification = array(
                'message' => 'Company details saved successfully!',
                'alert-type' => 'success'
            );
            return back()->with($notification);
        }else{
            $notification = array(
                'message' => 'Please try again!',
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }
    }

    // Company Address Update
    public function updateDetails(Request $request, $company_name)
    {
        $validated = $request->validate([
            'company_name'=>'required'
        ]);

        $company_name = SingleRowData::where('field_name','company_name')->first();
        $company_name->field_value = $request->company_name;
        $company_name->save();

        $company_address = SingleRowData::where('field_name','company_address')->first();
        $company_address->field_value = $request->company_address;
        $company_address->save();
        
        $company_city = SingleRowData::where('field_name','company_city')->first();
        $company_city->field_value = $request->company_city;
        $company_city->save();
        
        $company_state = SingleRowData::where('field_name','company_state')->first();
        $company_state->field_value = $request->company_state;
        $company_state->save();
        
        $company_country = SingleRowData::where('field_name','company_country')->first();
        $company_country->field_value = $request->company_country;
        $company_country->save();
        
        $company_zip = SingleRowData::where('field_name','company_zip')->first();
        $company_zip->field_value = $request->company_zip;
        $company_zip->save();
        
        $company_phone = SingleRowData::where('field_name','company_phone')->first();
        $company_phone->field_value = $request->company_phone;
        $company_phone->save();
        
        $company_email = SingleRowData::where('field_name','company_email')->first();
        $company_email->field_value = $request->company_email;
        $company_email->save();

        if($validated){
            $notification = array(
                'message' => 'Company details updated successfully!',
                'alert-type' => 'success'
            );
            return back()->with($notification);
        }else{
            $notification = array(
                'message' => 'Please try again!',
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }
    }    

    public function update(Request $request,  $logo)
    {
        if($request->has('logo_file')){
            // if you want to delete the image from the directory
           Storage::delete('adminfiles'.$request->logo_file);
           $extension = ".".$request->logo_file->getClientOriginalExtension();
           $name = basename($request->logo_file->getClientOriginalName(), $extension).time();
           $name = $name.$extension;
           $path = $request->logo_file->storeAs('adminfiles',$name,'public');
         }
         if($extension == '.png' || $extension == '.jpg' || $extension == '.jpeg' || $extension == '.gif' || $extension == '.PNG' || $extension == '.JPG' || $extension == '.JPEG' || $extension == '.GIF') {
             $extension = 'image';
         }
        $logo = SingleRowData::find($logo);

        $logo->field_value = $name;

        if($logo->save()){
            $notification = array(
                'message' => 'File uploaded successfully!',
                'alert-type' => 'success'
            );
            return back()->with($notification);
        }else{
            $notification = array(
                'message' => 'Please try again!',
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }
    }

}

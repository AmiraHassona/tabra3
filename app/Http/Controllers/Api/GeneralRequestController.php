<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactUsRequest;
use App\Models\BloodType;
use App\Models\Category;
use App\Models\City;
use App\Models\Contact;
use App\Models\Governorate;
use App\Models\Setting;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GeneralRequestController extends Controller
{
    use ResponseTrait;

    public function bloodTypes(){
        $blood_types = BloodType::all();
        return $this->returnData('blood_types',$blood_types);
    }

    public function governorates(){
        $governorates = Governorate::all();
        return $this->returnData('governorates',$governorates);
    }

    public function cities(Request $request){
        $cities = City::query();

        if ($request->has('governorate_id')) {
            $cities->where('governorate_id', $request->governorate_id);
        }
    
        $cities = $cities->get();
        return $this->returnData('cities',$cities);
    }

    public function categories(){
        $categories = Category::all();
        return $this->returnData('categories',$categories);
    }

    public function settings(){
        $settings = Setting::all();
        return $this->returnData('settings',$settings);
    }

    public function contactUs(ContactUsRequest $request){

        $validator = Validator::make($request->all(), $request->rules());
    
        if ($validator->fails()) {
            $errors = [];
            foreach ($validator->errors()->getMessages() as $message) {
                $error = implode($message);
                $errors[] = $error;
            }
            return $this->returnError(implode(' , ', $errors));
        } else {
            Contact::create($request->validated());
            return $this->returnSuccess('تم الارسال بنجاح سيتم التواصل معكم في أقرب وقت ممكن شكرًا لكم ...');
        }
    }
}

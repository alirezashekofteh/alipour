<?php
   
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Validator;
use App\Models\UserCamp;
use App\Http\Resources\UserCampSquid as SquidResource;
   
class UserCampSquidController extends BaseController
{

    public function index()
    {
        $blogs = UserCamp::all();
        return $this->sendResponse(SquidResource::collection($blogs), 'Posts fetched.');
    }

    
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'title' => 'required',
            'description' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());       
        }
        $blog = UserCamp::create($input);
        return $this->sendResponse(new SquidResource($blog), 'Post created.');
    }

    public function show($mobile)
    {
        $usercamp = UserCamp::whereMobile($mobile)->where('active',1)->first();
        if (is_null($usercamp)) {
            return $this->sendError('mobile does not exist.');
        }
        return $this->sendResponse(new SquidResource($usercamp), 'Mobile find is db.');
    }
    

   
   
}
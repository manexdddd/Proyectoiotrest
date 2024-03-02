<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Actuator;
class ActuatorsController extends Controller
{
    //
    public function index(){
        return Actuator::paginate();
    }


    //consultar usuario
    public function show($id){
return Actuator::find($id);

    }

    public function store(Request $request){
       
        $this->validate($request,[
            
            'name' =>'required|unique:actuators',
            'type' =>'required',
            'value' =>'required',
            'user_id' =>'required'
        ]);
            $actuator = new Actuator;
            $actuator ->fill($request->all());
            $actuator ->save();
        return  $actuator;
            }

            public function update(Request $request,$id){
                $this->validate($request,[
            
                    'name' =>'filled|unique:actuators',
                   
                ]);
                 $actuator = Actuator::find($id);
                if(!  $actuator) return response('',404);
                $actuator->update($request->all());
                $actuator->save();
                return  $actuator;
                    }

                    public function destroy($id){
                        $actuator = Actuator::find($id);
                        if(! $actuator) return response('',404);
                        $actuator->delete();
                        return  $actuator;
                            }
    //
}

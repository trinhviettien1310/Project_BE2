<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Settings;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Auth; 

class AdminController extends Controller
{
    //Hiển thị
    public function index(Request $request){         
            $value = $request -> all();
       
            $data = User::select(\DB::raw("COUNT(*) as count"), \DB::raw("DAYNAME(created_at) as day_name"), \DB::raw("DAY(created_at) as day"))
            ->where('created_at', '>', Carbon::today()->subDay(6))
            ->groupBy('day_name','day')
            ->orderBy('day')
            ->get();
        
            $array[] = ['Name', 'Number'];
            foreach($data as $key => $value)
            {
            $array[++$key] = [$value->day_name, $value->count];
            }
    
            //Lấy số lượng 
            $countProduct=Product::where('status','1')->count(); // sl sản phẩm
            $countOrder=Order::all()->count(); // sl đơn
            $countOrderCane=Order::where('trangthaitt','0')->count(); // sl đơn đã hủy
            $countOrderSuccess=Order::where('trangthaitt','4')->count(); // sl đơn đã giao 
    
            //Hiển thị view và gửi dữ liệu
            return view('backend.index')->with('users', json_encode($array))
            ->with('countProduct',$countProduct)->with('countOrder',$countOrder)
            ->with('countOrderCane',$countOrderCane)
            ->with('countOrderSuccess',$countOrderSuccess);
    }
    

    //Hiển thị thông tin admin
    public function profile(){
        $profile=Auth()->user();
        return view('backend.users.profile')->with('profile',$profile);
    }

    //Cập nhật thông tin admin
    public function profileUpdate(Request $request,$id){      
        
        $user=User::findOrFail($id);
        $data=$request->all();
        $status=$user->fill($data)->save();

        if($status){
            request()->session()->flash('Lưu dữ  liệu thành công');
        }
        else{
            request()->session()->flash('Đã xảy ra lỗi khi lưu dữ liệu');
        }
        return redirect()->back();
    }

    //Đổi mật khẩu admin
    public function changePassword(){
        return view('backend.layouts.changePassword');
    }

    public function changPasswordStore(Request $request)
    {
        $pass = Auth::user()->password;
        $data = $request ->all();
        if (!Hash::check($data['current_password'], $pass)) {
            // var_dump($pass);
            // var_dump($data['current_password']);
            // var_dump(Hash::check($pass, $data['current_password']));
            return redirect()->route('admin')->with('error','Thay đổi mật khẩu không thành công');
        }
        $request->validate([
            'current_password' => ['required'],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);
        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
        // var_dump(Hash::check($pass, $data['current_password']));
        return redirect()->route('admin')->with('success','Thay đổi mật khẩu thành công');
    }

    // // Pie chart
    // public function userPieChart(Request $request){
    //     // dd($request->all());
    //     $data = User::select(\DB::raw("COUNT(*) as count"), \DB::raw("DAYNAME(created_at) as day_name"), \DB::raw("DAY(created_at) as day"))
    //     ->where('created_at', '>', Carbon::today()->subDay(6))
    //     ->groupBy('day_name','day')
    //     ->orderBy('day')
    //     ->get();
    //  $array[] = ['Name', 'Number'];
    //  foreach($data as $key => $value)
    //  {
    //    $array[++$key] = [$value->day_name, $value->count];
    //  }
    // //  return $data;
    //  return view('backend.index')->with('course', json_encode($array));
    // }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class HomeModel extends Model
{
    use HasFactory;

    public function contact_us($post)
    {
        $status =  DB::table('contact_us')->insert([
            'name' => $post['name'],
            'email' => $post['email'],
            'message' => $post['message'],
            'subject' => $post['subject'],
            'mobile' => $post['mobile'],
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        return ['st' => 'success', 'msg' => $status];
    }



    public function signup($post)
    {
        $msg = array();
        $status =  DB::table('users')->insert([
            'name' => $post['name'],
            'email' => $post['email'],
            'password' => Hash::make($post['password']),
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        if ($status) {
            $msg = array('st' => 'success', 'msg' => "Successfully Registered!!!");
        } else {
            $msg = array('st' => 'success', 'msg' => "Failed to Register.!! Something went wrong!!!");
        }
        return $msg;
    }

    public function login($post)
    {
        $msg = array();
        $user_data =  DB::table('users')->select('id', 'name', 'email', 'mobile', 'img', 'password')
            ->where('email', $post['email'])
            ->where('is_deleted', '0')
            ->first();

        if (!empty($user_data)) {
            $password = Hash::make($post['password']); // Hash the password
            if ($user_data->password == $password) {
                $msg = array('st' => 'success', 'msg' => "Logged In Successfully.");
            } else {
                $msg = array('st' => 'failed', 'msg' => "login Failed, Bad Credential!!!");
            }
        } else {
            $msg = array('st' => 'failed', 'msg' => "Unknown User $post[email]");
        }
        return $msg;
    }
}

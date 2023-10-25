<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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
}

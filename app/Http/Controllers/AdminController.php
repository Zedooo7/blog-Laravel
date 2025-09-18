<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalUsers = User::count();
        $totalPosts = Post::count();
        $pending = Post::where('status','pending')->count();
        return view('admin.dashboard', compact('totalUsers','totalPosts','pending'));
    }

    public function users()
    {
        $users = User::orderBy('created_at','desc')->get();
        return view('admin.users', compact('users'));
    }

    public function posts()
    {
        $posts = Post::orderBy('created_at','desc')->get();
        return view('admin.posts', compact('posts'));
    }

    public function approvePost($id)
    {
        $post = Post::findOrFail($id);
        $post->status = 'approved';
        $post->save();
        return back()->with('success', 'Post approved');
    }

    public function rejectPost($id)
    {
        $post = Post::findOrFail($id);
        $post->status = 'rejected';
        $post->save();
        return back()->with('success', 'Post rejected');
    }

    public function profile()
    {
        $admin = Auth::user();
        return view('admin.profile', compact('admin'));
    }

    public function updateProfile(Request $request)
    {
        $admin = Auth::user();
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'nullable|min:6|confirmed',
        ]);

        $admin->name = $data['name'];
        $admin->email = $data['email'];
        if (!empty($data['password'])) {
            $admin->password = bcrypt($data['password']);
        }
        $admin->save();

        return back()->with('success', 'Profile updated.');
    }
}

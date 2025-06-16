<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notice;
use Illuminate\Support\Facades\Storage;

class NoticeController extends Controller
{
    //Notice View (Public)
    public function notice() {
        $notices = Notice::orderBy('publish_date', 'desc')
                        ->orderBy('is_important', 'desc')
                        ->paginate(10);
        return view('notice.notice', compact('notices'));
    }
    
    // Admin Notice List
    public function index() {
        $notices = Notice::latest()->paginate(10);
        return view('admin.notices.index', compact('notices'));
    }

    // Admin Notice Create Form
    public function create() {
        return view('admin.notices.create');
    }

    // Admin Notice Store
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|in:general,academic,event,exam',
            'content' => 'required|string',
            'publish_date' => 'required|date',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_important' => 'boolean'
        ]);

        $notice = new Notice();
        $notice->title = $request->title;
        $notice->category = $request->category;
        $notice->content = $request->content;
        $notice->publish_date = $request->publish_date;
        $notice->is_important = $request->has('is_important');

        // Handle photo upload
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $filename = time() . '_' . $photo->getClientOriginalName();
            $photo->storeAs('public/notices', $filename);
            $notice->photo = 'notices/' . $filename;
        }

        $notice->save();

        return redirect()->route('admin.notices.index')->with('success', 'Notice created successfully!');
    }

    // Admin Notice Edit Form
    public function edit(Notice $notice)
    {
        return view('admin.notices.edit', compact('notice'));
    }

    // Admin Notice Update
    public function update(Request $request, Notice $notice)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|in:general,academic,event,exam',
            'content' => 'required|string',
            'publish_date' => 'required|date',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_important' => 'boolean'
        ]);

        $notice->title = $request->title;
        $notice->category = $request->category;
        $notice->content = $request->content;
        $notice->publish_date = $request->publish_date;
        $notice->is_important = $request->has('is_important');

        // Handle photo upload
        if ($request->hasFile('photo')) {
            // Delete old photo if exists
            if ($notice->photo) {
                Storage::delete('public/' . $notice->photo);
            }

            $photo = $request->file('photo');
            $filename = time() . '_' . $photo->getClientOriginalName();
            $photo->storeAs('public/notices', $filename);
            $notice->photo = 'notices/' . $filename;
        }

        $notice->save();

        return redirect()->route('admin.notices.index')->with('success', 'Notice updated successfully!');
    }

    // Admin Notice Delete
    public function destroy(Notice $notice)
    {
        // Delete photo if exists
        if ($notice->photo) {
            Storage::delete('public/' . $notice->photo);
        }

        $notice->delete();

        return redirect()->route('admin.notices.index')->with('success', 'Notice deleted successfully!');
    }
}

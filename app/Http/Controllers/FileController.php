<?php

namespace App\Http\Controllers;

use App\File;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function index()
    {
        $files = File::all();
        return view("files.index")->with("files" , $files);
    }

    public function create()
    {
        return view("files.create");
    }

    public function store(Request $request)
    {
         $request->validate([
            "title" => "required|min:3",
            "description" => "required|min:10",
            "fileInput" => "required|mimes:png,jpg,pdf"
        ]);
        $file = new File;
        $file->title = $request->title;
        $file->description = $request->description;
        // File Code
        $allFileData = $request->file("fileInput");
        $file_name = $allFileData->getClientOriginalName();
        $allFileData->move(public_path() . "/files/" , $file_name);
        $file->file = $file_name;
        $file->save();
        return redirect()->back()->with("done" ,"Uploaded File Done");
    }

    public function show($id)
    {
        $file = File::find($id);
        return view("files.show")->with("file",$file);
    }

    public function edit($id)
    {
        $file = File::find($id);
        return view("files.edit")->with("file",$file);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            "title" => "required|min:3",
            "description" => "required|min:10",
            "fileInput" => "required|mimes:png,jpg,pdf"
        ]);
        $file = File::find($id);
        $file->title = $request->title;
        $file->description = $request->description;
        // File Code
        $allFileData = $request->file("fileInput");
        $file_name = $allFileData->getClientOriginalName();
        $allFileData->move(public_path() . "/files/" , $file_name);
        $file->file = $file_name;
        $file->save();
        return redirect("/allFiles")->with("done" ,"Updated File Done");
    }

    public function destroy($id)
    {
        $file = File::find($id);
        $file->delete();
        return redirect("/allFiles")->with("done" ,"Deleted File Done");
    }

    public function download($id)
    {
        $file = File::where("id" , "=" , $id )->firstOrFail();
        $filePath = public_path() . "/files/" . $file->file ;
        return response()->download($filePath);
    }
}

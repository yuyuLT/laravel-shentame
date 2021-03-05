<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubmitForm;

class EditController extends Controller
{
    
    public function edit($id)
    {
        //１行持ってくる
        $data = SubmitForm::find($id);
        return view('edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $datas = SubmitForm::find($id);

        $datas->title = $request->input('title');
        $datas->thought = $request->input('thought');

        $datas->save();

        return redirect('toppage');
    }


}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use Illuminate\Support\Facades\Session;
use Excel;
use App\Imports\EmployeeImport;
use Illuminate\Support\Facades\DB;
use App\Models\Person;

class QuestionController extends Controller
{
    public function add(Request $req)
    {
        $validate=$req->validate(
            [
                'question'=>'required',
                'opa'=>'required',
                'opb'=>'required',
                'opc'=>'required',
                'opd'=>'required',
                'ans'=>'required'
            ]
        );

        $image=$req->file('file');
        $imageName=time().".".$image->extension();
        $image->move(public_path('images'),$imageName);

        $q=new Question();
        $q->question=$req->question;
        $q->a=$req->opa;
        $q->b=$req->opb;
        $q->c=$req->opc;
        $q->d=$req->opd;
        $q->ans=$req->ans;
        $q->profileimage=$imageName;

        $q->save();
        Session::put('successMessage',"Question added!");
        return redirect('questions');
    }

    public function show2()
    {
        /* $qs=Question::all();
        return view('questions')->with(['questions'=>$qs]); */
        return view('questionform');
    }

    public function show3(Request $req)
    {
        $data=$req->input();
        $req->session()->put('name',$data['name']);
        $req->session()->put('password',$data['password']);
        if(session('name') == 'admin' && session('password') == '12345')
        {
           return redirect('questions');
        }
        else
        {
            return redirect('/');
        }
    }

    public function show()
    {
        $qs=Question::all();
        return view('questions')->with(['questions'=>$qs]);
    }
    
    public function update(Request $req)
    {
        $validate=$req->validate(
            [
                'question'=>'required',
                'opa'=>'required',
                'opb'=>'required',
                'opc'=>'required',
                'opd'=>'required',
                'ans'=>'required',
                'id'=>'required'
            ]
        );
        $q=Question::find($req->id);
        $q->question=$req->question;
        $q->a=$req->opa;
        $q->b=$req->opb;
        $q->c=$req->opc;
        $q->d=$req->opd;
        $q->ans=$req->ans;

        $q->save();
        Session::put('successMessage',"Question updated!");
        return redirect('questions');
    }

    public function delete(Request $req)
    {
        $validate=$req->validate(
            [
                'id'=>'required'
            ]
        );
        Question::where('id',$req->id)->delete();
        Session::put('successMessage',"Question deleted!");
        return redirect('questions');
    }

    public function startquiz()
    {
        Session::put('nextq','1');
        Session::put('wrongans','0');
        Session::put('correctans','0');
        // $q=Question::all()->first();
        $q=Question::orderBy(DB::raw('RAND()'))->take(1)->first();
        return view('answerDesk')->with(['question'=>$q]);
    }

    public function submitans(Request $req)
    {
        $nextq=Session::get('nextq');
        $wrongans=Session::get('wrongans');
        $correctans=Session::get('correctans');
        $this->validate($req,
        ['ans'=>'required',
        'dbans'=>'required'
        ]);  
        $nextq+=1;
        if($req->dbans==$req->ans)
        {
            $correctans+=1;
        }
        else
        {
            $wrongans+=1;
        }
        Session::put('nextq',$nextq);
        Session::put('wrongans',$wrongans);
        Session::put('correctans',$correctans);

        $i=0;
        $questions=Question::all();
        foreach($questions as $question)
        {
            $i++;
            if($questions->count()<$nextq)
            {
                return view('end');
            }
            if($i==$nextq)
            {
                return view('answerDesk')->with(['question'=>$question]);
            }
        }
    }
    public function import()
    {
        return view('import');
    }
    public function ok(Request $req)
    {
        Excel::import(new EmployeeImport,$req->file);
        return "Success";
    }
    public function random()
    {
        return question::orderBy(DB::raw('RAND()'))->take(1)->get();
    }
    public function register(Request $req)
    {
        if($this->validate($req,
        [
            'name'=>'required|min:2',
            'email'=>'required|min:7|email|unique:people',
            'password'=>'required|min:7|max:15'
        ]))
        {
            $model=new Person;
            /*$data=$req->input();
            $req->session()->flash('name',$data['name']);*/
            $model->name=$req->name;
            $model->email=$req->email;
            $model->password=$req->password;
            $model->save();
            return back()->with('ok','User successfully added!');
        }
    }
}

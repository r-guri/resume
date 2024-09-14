<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormStep;
use App\Models\Academic;
use App\Models\Experience;
use App\Models\Project;
use App\Models\Qualification;
use App\Models\Book;
use App\Models\Publication;
use App\Models\ThesisSupervised;
use App\Models\ConferenceDetail;
use App\Models\Seminar;
use App\Models\Workshop;
use App\Models\Patent;
use App\Models\Membership;
use App\Models\Award;
use App\Models\Research;
use Auth;
use DB;

class MultiStepFormController extends Controller
{
    public function showForm($step=1)
    {
        if (Auth::check()) 
        {
$formStep = FormStep::where('user_id', Auth::id())->first();
if ($formStep) {
    $languages = json_decode($formStep->languages, true) ?? [];
    $skills = json_decode($formStep->skills, true) ?? [];
} else {
    $languages = [];
    $skills = [];
}
$academicRecords = DB::table('academics')
    ->join('qualifications', 'academics.qualification', '=', 'qualifications.id')
    ->where('academics.user_id', Auth::id())
    ->select('academics.*', 'qualifications.name as qualification_name')
    ->get();
    $academicRecordsArray = $academicRecords->map(function($record) {
        return [
            'id' => $record->id,
            'user_id' => $record->user_id,
            'degree' => $record->degree,
            'qualification' => $record->qualification,
            'course' => $record->course,
            'subjects' => $record->subjects,
            'mode' => $record->mode,
            'school_clg' => $record->school_clg,
            'uni_board' => $record->uni_board,
            'passing_date' => $record->passing_date,
            'marks_obtained' => $record->marks_obtained,
            'total_marks' => $record->total_marks,
            'cgpa' => $record->cgpa,
            'percent' => $record->percent,
            'created_at' => $record->created_at,
            'updated_at' => $record->updated_at,
            'qualification_name' => $record->qualification_name
        ];
    });
    // dd($academicRecords);
        // $formAcademic= Academic::with('qualification')->where('user_id', Auth::id())->get()->toArray();
        $formExperience = Experience::where('user_id', Auth::id())->get()->toArray();
        $projectData = Project::where('user_id', Auth::id())->get()->toArray();

        $BookA=Book::where('user_id', Auth::id())->get()->toArray();
        $PublicationA=Publication::where('user_id', Auth::id())->get()->toArray();
        $ThesisSupervisedA=ThesisSupervised::where('user_id', Auth::id())->get()->toArray();
        $ConferenceDetailA=ConferenceDetail::where('user_id', Auth::id())->get()->toArray();
        $SeminarA=Seminar::where('user_id', Auth::id())->get()->toArray();
        $WorkshopA=Workshop::where('user_id', Auth::id())->get()->toArray();
        $PatentA=Patent::where('user_id', Auth::id())->get()->toArray();
        $MembershipA=Membership::where('user_id', Auth::id())->get()->toArray();
        $AwardA=Award::where('user_id', Auth::id())->get()->toArray();
        $ResearchA=Research::where('user_id', Auth::id())->get()->toArray();
        $qualifications = Qualification::all();
    //  dd($BookA);
        if (!$formStep) {
            $formStep = FormStep::create([
                'user_id' => Auth::id(),
                'current_step' => 1,
                'form_data' => []
            ]);
        }
        return view('multistep.form', [
            'step' => $step,
            'formData' => $formStep->form_data,
            'summary' => $formStep->summary,
            'languages' => $languages,
            'skills' => $skills,
            'image' => $formStep->image,
            'academicData' => $academicRecordsArray,
            'experienceData' => $formExperience,
            'projectData' => $projectData,
            'qualifications' => $qualifications,
            'currentStep' => $formStep->current_step,
            'Book' => $BookA,
            'Publication' => $PublicationA,
            'ThesisSupervised' => $ThesisSupervisedA,
            'ConferenceDetail' => $ConferenceDetailA,
            'Seminar' => $SeminarA,
            'Workshop' => $WorkshopA,
            'Patent' => $PatentA,
            'Membership' => $MembershipA,
            'Award' => $AwardA,
            'Research' => $ResearchA
           
        ]);
    }
    else
    {
     return redirect('/sa')->with('error','')->withInput();
       }
    }

    public function saveForm(Request $request)
    {
       
        $step = $request->input('step');
        if ($request->input('action') != 'previous' && $request->input('action') != 'next') {
            
       if ($step == 3) { 
             $validatedData = $request->validate([
                'qualification' => 'required|string',
                'course' => 'required|string',
               
                'mode' => 'required|string',
                'school_clg' => 'required|string',
                'uni_board' => 'required|string',
                'passing_date' => 'required|date',
                'marks_obtained' => 'nullable|numeric',
                'total_marks' => 'nullable|numeric',
                'cgpa' => 'nullable|numeric',
                'percent' => 'nullable|string',
             ]);
            //  dd($validatedData);
            $result= Academic::create([
                 'user_id' => Auth::id(),
                 'qualification' =>$validatedData['qualification'],
                 'course' =>$validatedData['course'],
                 
                 'mode' =>$validatedData['mode'],
                 'school_clg' =>$validatedData['school_clg'],
                 'uni_board' =>$validatedData['uni_board'],
                 'passing_date' =>$validatedData['passing_date'],
                 'marks_obtained' =>$validatedData['marks_obtained'],
                 'total_marks' =>$validatedData['total_marks'],
                 'cgpa' =>$validatedData['cgpa'],
                 'percent' =>$validatedData['percent'],
             ]);

       
             if ($result) {
                return redirect()->route('form.step', ['step' => $request->input('step')])
                                 ->with('success', 'Academic row inserted successfully.');
            } else {
                return redirect()->route('form.step', ['step' => $request->input('step')])
                                 ->with('error', 'Failed to insert the record.');
            }

         }
         elseif ($step == 4) { 
           
        $validatedData = $request->validate([
            'research_interest' => 'required|string|max:255',
            'area_of_research' => 'required|string|max:255',
        ]);
        $validatedData['user_id'] = Auth::id();
    
        try {
       
        Research::create($validatedData);

        return redirect()->back()->with('success', 'Research data saved successfully!');
    } catch (\Exception $e) {
        
        return redirect()->back()->with('error', 'Failed to save the Research. Please try again.');
    }

        }
         elseif ($step == 5) { 
             $validatedData = $request->validate([
                'experienceType' => 'required|string',
                'designation' => 'required|string',
                'department' => 'required|string',
                'from_date' => 'required|date',
                'to_date' => 'nullable|date',
                'totalExperience' => 'string'
               
             ]);
 
             $result=Experience::create([
                 'user_id' => Auth::id(),
                 'experienceType'=>$validatedData['experienceType'],
                 'designation'=>$validatedData['designation'],
                 'department'=>$validatedData['department'],
                 'from_date'=>$validatedData['from_date'],
                 'to_date'=>$validatedData['to_date'],
                 'experiencefile'=>$validatedData['totalExperience']
                 
             ]);
             if ($result) {
                return redirect()->route('form.step', ['step' => $request->input('step')])
                                 ->with('success', 'Experience row inserted successfully.');
            } else {
                return redirect()->route('form.step', ['step' => $request->input('step')])
                                 ->with('error', 'Failed to insert the record.');
            }
         } elseif ($step == 6) { 
            $validatedData = $request->validate([
               'title' => 'required|string',
               'discription' => 'required|string',
               'technologies' => 'required|string',
               'projectUrl' => 'string'
            ]);
            
            $result=Project::create([
                'user_id' => Auth::id(),
                'title'=>$validatedData['title'],
                'discription'=>$validatedData['discription'],
                'technologies'=>$validatedData['technologies'],
                'projectUrl'=>$validatedData['projectUrl']
            ]);
            if ($result) {
                return redirect()->route('form.step', ['step' => $request->input('step')])
                                 ->with('success', 'Project row inserted successfully.');
            } else {
                return redirect()->route('form.step', ['step' => $request->input('step')])
                                 ->with('error', 'Failed to insert the record.');
            }
        
    }
    
    elseif ($step == 7) {
        // dd('hhihihi '); 
            // Validate the request
    $validatedData = $request->validate([
        'summary' => 'required|string|max:1000',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'languages' => 'nullable',
        'languages.*' => 'string',
        'skills' => 'nullable',
        'skills.*' => 'string',
    ]);

    $userProfile = FormStep::where('user_id', Auth::id())->firstOrCreate();

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageBase64 = base64_encode(file_get_contents($image->getRealPath()));
        $userProfile->image = $imageBase64;
    }

    $userProfile->summary = $validatedData['summary'];
    $userProfile->languages = json_encode($validatedData['languages']);
    $userProfile->skills = json_encode($validatedData['skills']);

    $result=$userProfile->save();
    if ($result) {
        return redirect()->route('preview');
    } else {
        return redirect()->route('form.step', ['step' => $request->input('step')])
                         ->with('error', 'Failed to insert the record.');
    }
    // return redirect()->back()->with('success', 'Profile updated successfully.');
    }
}
// dd($step);
if ($request->input('action') != 'previous') {
         if($step==1){ 
             
             $validatedData = $request->validate([
                 'first_name'=>'sometimes|required|string|max:255',
                 'last_name'=>'sometimes|string|max:255',
                 'fatherName'=>'sometimes|required|string|max:255',
                 'motherName'=>'sometimes|required|string|max:255',
                 'dob'=>'sometimes|required|string|max:20',
                 'gender'=>'sometimes|required|string|max:20',
                 'bloodgroup'=>'sometimes|required|string|max:15',
                 'email'=>'sometimes|required|string|max:50',
                 'phone'=>'sometimes|required|string|max:10',
                 'permanentAddress'=>'sometimes|required|string|max:255',
                 'pincode'=>'sometimes|required|string|max:7',
                 'state'=>'sometimes|required|string|max:20',
                 'district'=>'sometimes|required|string|max:20',
                 
                ]);
                
                // dd('ff');
           
           $formStep = FormStep::where('user_id', Auth::id())->first();
       
         
           $formData = array_merge($formStep->form_data, $validatedData);
           $result=$formStep->update([
               'form_data' => $formData,
               'current_step' => $request->input('step', 1)
           ]);
           if ($result) {
               return redirect()->route('form.step', ['step' => $request->input('step')+1])
                                ->with('success', 'inserted successfully.');
           } else {
               return redirect()->route('form.step', ['step' => $request->input('step')])
                                ->with('error', 'Failed to insert the record.');
           }
         }
         elseif($step==2){ 
             
            $validatedData = $request->validate([
                'first_name'=>'sometimes|required|string|max:255',
                'last_name'=>'sometimes|required|string|max:255',
                'fatherName'=>'sometimes|required|string|max:255',
                'motherName'=>'sometimes|required|string|max:255',
                'dob'=>'sometimes|required|string|max:20',
                'gender'=>'sometimes|required|string|max:20',
                'bloodgroup'=>'sometimes|required|string|max:15',
                'email'=>'sometimes|required|string|max:50',
                'phone'=>'sometimes|required|string|max:10',
                'permanentAddress'=>'sometimes|required|string|max:255',
                'pincode'=>'sometimes|required|string|max:7',
                'state'=>'sometimes|required|string|max:20',
                'district'=>'sometimes|required|string|max:20',
                
               ]);
               
               // dd('ff');
          
          $formStep = FormStep::where('user_id', Auth::id())->first();
      
        
          $formData = array_merge($formStep->form_data, $validatedData);
          $result=$formStep->update([
              'form_data' => $formData,
              'current_step' => $request->input('step', 1)
          ]);
          if ($result) {
              return redirect()->route('form.step', ['step' => $request->input('step')+1])
                               ->with('success', 'inserted successfully.');
          } else {
              return redirect()->route('form.step', ['step' => $request->input('step')])
                               ->with('error', 'Failed to insert the record.');
          }
        }
    }
    if ($request->input('action') == 'next') {
        return redirect()->route('form.step', ['step' => $request->input('step')+1]);
    }
        if ($request->input('action') == 'previous') {
            return redirect()->route('form.step', ['step' => $request->input('step')-1]);
        }
        if ($request->input('action') == 'final') {
            
            return redirect()->route('preview-resume');
            // return redirect('preview-resume')->withInput();
        }
    
    }

    public function bookssave(Request $request)
    {
        $validatedData = $request->validate([
            'first_author' => 'required|string|max:255',
            'co_authors' => 'nullable|string|max:255',
            'title_of_book' => 'required|string|max:255',
            'publisher' => 'required|string|max:255',
            'issn_isbn_no' => 'required|string|max:255',
            'type_of_book' => 'required|string|max:255',
        ]);

       // Add the current logged-in user's ID
    $validatedData['user_id'] = Auth::id();

    // dd($validatedData);
    try {
        // Create a new Book record
        Book::create($validatedData);
        // Redirect back with a success message
        return redirect()->back()->with('successSub', 'Book saved successfully!');
    } catch (\Exception $e) {
        // Redirect back with an error message
        return redirect()->back()->with('errorA', 'Failed to save the book. Please try again.');
    }
    }
    public function researchsave(Request $request)
    {
dd('gg');
    }
    public function publicationsave(Request $request)
    {
        $validatedData = $request->validate([
            'first_author' => 'required|string|max:255',
            'co_authors' => 'nullable|string|max:255',
            'title_of_research_paper' => 'required|string|max:255',
            'name_of_journal' => 'required|string|max:255',
            'volume_no' => 'nullable|string|max:255',
            'issue_no' => 'nullable|string|max:255',
            'page_no' => 'nullable|string|max:255',
            'year' => 'required|integer|between:1900,' . date('Y'),
            'impact_factor' => 'nullable|string|max:255',
            'national_international' => 'required|in:National,International',
            'source_of_authorization' => 'nullable|string|max:255',
        ]);
        $validatedData['user_id'] = Auth::id();
        try
        {

            Publication::create($validatedData);
            return redirect()->back()->with('successSub', 'Publication saved successfully!');

    } catch (\Exception $e) {
        // Redirect back with an error message
        return redirect()->back()->with('errorA', 'Failed to save the Publication. Please try again.');
    }
    
    }
    public function thesis_supervisedsave(Request $request)
    {
        $validatedData = $request->validate([
            'title_of_research' => 'required|string|max:255',
            'supervisor' => 'required|string|max:255',
            'co_supervisor' => 'nullable|string|max:255',
            'year_of_completion' => 'required|integer|between:1900,' . date('Y'),
            'name_of_university' => 'required|string|max:255',
            'name_of_student' => 'required|string|max:255',
            'registration_number' => 'required|string|max:255',
            'date_of_enrollment' => 'required|date',
            'date_of_completion' => 'required|date',
        ]);
        $validatedData['user_id'] = Auth::id();
        try
        {
        ThesisSupervised::create($validatedData);
    
        return redirect()->back()->with('successSub', 'Thesis information saved successfully!');
    } catch (\Exception $e) {
        // Redirect back with an error message
        return redirect()->back()->with('errorA', 'Failed to save the information. Please try again.');
    }
    }
    public function conference_detailsave(Request $request)
    {
        $validatedData = $request->validate([
            'conference_type' => 'required|in:Online,Offline',
            'national_international' => 'required|in:National,International',
            'participation_type' => 'required|in:Participated,Paper Presented,Key Note Speaker',
            'organizing_institute' => 'required|string|max:255',
            'organising_secretary' => 'nullable|string|max:255',
            'joint_secretary' => 'nullable|string|max:255',
            'start_date_of_conference' => 'required|date',
            'date_of_validity' => 'required|date',
            'no_of_days_attended' => 'required|integer|min:1',
        ]);
        $validatedData['user_id'] = Auth::id();
        try
        {
        ConferenceDetail::create($validatedData);
    
        return redirect()->back()->with('successSub', 'Conference details saved successfully!');
    } catch (\Exception $e) {
        // Redirect back with an error message
        return redirect()->back()->with('errorA', 'Failed to save the Conference. Please try again.');
    }
    }
    public function seminarsstore(Request $request)
    {
        $validatedData = $request->validate([
            'seminar_type' => 'required|in:online,offline',
            'theme_topic' => 'required|string|max:255',
            'seminar_level' => 'required|in:national,international',
            'participation_type' => 'required|in:participated,paper_presented,key_note_speaker',
            'seminar_date' => 'required|date',
            'organizing_institute' => 'required|string|max:255',
        ]);
        $validatedData['user_id'] = Auth::id();
        try
        {
        Seminar::create($validatedData);
    
        return redirect()->back()->with('successSub', 'Seminar details saved successfully!');
    } catch (\Exception $e) {
        // Redirect back with an error message
        return redirect()->back()->with('errorA', 'Failed to save the Seminar. Please try again.');
    }
    }
    public function workshopsstore(Request $request)
    {
  // Validate the request data
  $validatedData = $request->validate([
    'workshop_type' => 'required|in:online,offline',
    'theme_topic' => 'required|string|max:255',
    'workshop_level' => 'required|in:national,international',
    'participation_type' => 'required|in:participated,paper_presented,key_note_speaker',
    'organizing_institute' => 'required|string|max:255',
    'organizing_secretary' => 'nullable|string|max:255',
    'joint_secretary' => 'nullable|string|max:255',
    'start_date' => 'required|date',
    'validity_date' => 'required|date',
    'days_attended' => 'required|integer|min:1',
    'sponsoring_body' => 'required|string|max:255',
]);
$validatedData['user_id'] = Auth::id();
try
{
// Create a new Workshop record
Workshop::create($validatedData);

// Redirect back with a success message
return redirect()->back()->with('successSub', 'Workshop details saved successfully!');
} catch (\Exception $e) {
    // Redirect back with an error message
    return redirect()->back()->with('errorA', 'Failed to save the Workshop. Please try again.');
}
    }
    public function patentsstore(Request $request)
    {
 // Validate the request data
 $validatedData = $request->validate([
    'title' => 'required|string|max:255',
    'status' => 'required|string|max:255',
    'patent_agency' => 'required|string|max:255',
    'number_and_date' => 'required|string|max:255',
]);
$validatedData['user_id'] = Auth::id();
try
{
// Create a new Patent record
Patent::create($validatedData);

// Redirect back with a success message
return redirect()->back()->with('successSub', 'Patent details saved successfully!');

} catch (\Exception $e) {
    // Redirect back with an error message
    return redirect()->back()->with('errorA', 'Failed to save the Patent. Please try again.');
}
    }
    public function awardsstore(Request $request)
    {
// Validate the request data
$validatedData = $request->validate([
    'title' => 'required|string|max:255',
    'year' => 'required|integer|min:1900|max:2099',
    'awarding_agency' => 'required|string|max:255',
    'type' => 'required|string|max:255',
]);
$validatedData['user_id'] = Auth::id();
try
{
// Create a new Award record
Award::create($validatedData);

// Redirect back with a success message
return redirect()->back()->with('successSub', 'Award details saved successfully!');
} catch (\Exception $e) {
    // Redirect back with an error message
    return redirect()->back()->with('errorA', 'Failed to save the Award. Please try again.');
}
    }
    public function membershipsstore(Request $request)
    {
        $validatedData = $request->validate([
            'detail' => 'required|string|max:255',
            'membership_number' => 'required|string|max:255',
            'year' => 'required|integer|min:1900|max:2099',
            'validity' => 'required|date',
        ]);
        $validatedData['user_id'] = Auth::id();
        try
        {
        // Create a new Membership record
        Membership::create($validatedData);
    
        // Redirect back with a success message
        return redirect()->back()->with('successSub', 'Membership details saved successfully!');

    } catch (\Exception $e) {
        // Redirect back with an error message
        return redirect()->back()->with('errorA', 'Failed to save the Membership. Please try again.');
    }
    }
    public function destroy(Request $request,$id)
    {
        $record = Project::find($id);
    
        if ($record) {
            $record->delete();
            return redirect()->route('form.step', ['step' => $request->input('step')])
                             ->with('successSub', 'Project delete successfully.');
        } else {
            return redirect()->route('form.step', ['step' => $request->input('step')])
                             ->with('errorA', 'Failed to delete the record.');
        }
    }
    public function destroyEducation(Request $request, $id)
    {
        $record = Academic::find($id);
    
        if ($record) {
            $record->delete();
            return redirect()->route('form.step', ['step' => $request->input('step')])
                             ->with('successSub', 'Academic delete successfully.');
        } else {
            return redirect()->route('form.step', ['step' => $request->input('step')])
                             ->with('errorA', 'Failed to delete the record.');
        }
    }
    public function destroyExperience(Request $request, $id)
    {
        $record = Experience::find($id);
    
        if ($record) {
            $record->delete();
            return redirect()->route('form.step', ['step' => $request->input('step')])
                             ->with('successSub', 'Experience delete successfully.');
        } else {
            return redirect()->route('form.step', ['step' => $request->input('step')])
                             ->with('errorA', 'Failed to delete the record.');
        }
    }
    
public function destroyBook(Request $request,$id)
{
    $record = Book::find($id);

    if ($record) {
        $record->delete();
        return redirect()->route('form.step', ['step' => $request->input('step')])
                         ->with('successSub', ' delete successfully.');
    } else {
        return redirect()->route('form.step', ['step' => $request->input('step')])
                         ->with('errorA', 'Failed to delete the record.');
    }
}
public function destroyPublication(Request $request,$id)
{
    $record = Publication::find($id);

    if ($record) {
        $record->delete();
        return redirect()->route('form.step', ['step' => $request->input('step')])
                         ->with('successSub', ' delete successfully.');
    } else {
        return redirect()->route('form.step', ['step' => $request->input('step')])
                         ->with('errorA', 'Failed to delete the record.');
    }
}
public function destroyThesisSupervised(Request $request,$id)
{
    $record = ThesisSupervised::find($id);

    if ($record) {
        $record->delete();
        return redirect()->route('form.step', ['step' => $request->input('step')])
                         ->with('successSub', ' delete successfully.');
    } else {
        return redirect()->route('form.step', ['step' => $request->input('step')])
                         ->with('errorA', 'Failed to delete the record.');
    }
}
public function destroyConferenceDetail(Request $request,$id)
{
    $record = ConferenceDetail::find($id);

    if ($record) {
        $record->delete();
        return redirect()->route('form.step', ['step' => $request->input('step')])
                         ->with('successSub', ' delete successfully.');
    } else {
        return redirect()->route('form.step', ['step' => $request->input('step')])
                         ->with('errorA', 'Failed to delete the record.');
    }
}
public function destroySeminar(Request $request,$id)
{
    $record = Seminar::find($id);

    if ($record) {
        $record->delete();
        return redirect()->route('form.step', ['step' => $request->input('step')])
                         ->with('successSub', ' delete successfully.');
    } else {
        return redirect()->route('form.step', ['step' => $request->input('step')])
                         ->with('errorA', 'Failed to delete the record.');
    }
}
public function destroyWorkshop(Request $request,$id)
{
    $record = Workshop::find($id);

    if ($record) {
        $record->delete();
        return redirect()->route('form.step', ['step' => $request->input('step')])
                         ->with('successSub', ' delete successfully.');
    } else {
        return redirect()->route('form.step', ['step' => $request->input('step')])
                         ->with('errorA', 'Failed to delete the record.');
    }
}
public function destroyPatent(Request $request,$id)
{
    $record = Patent::find($id);

    if ($record) {
        $record->delete();
        return redirect()->route('form.step', ['step' => $request->input('step')])
                         ->with('successSub', ' delete successfully.');
    } else {
        return redirect()->route('form.step', ['step' => $request->input('step')])
                         ->with('errorA', 'Failed to delete the record.');
    }
}
public function destroyMembership(Request $request,$id)
{
    $record = Membership::find($id);

    if ($record) {
        $record->delete();
        return redirect()->route('form.step', ['step' => $request->input('step')])
                         ->with('successSub', ' delete successfully.');
    } else {
        return redirect()->route('form.step', ['step' => $request->input('step')])
                         ->with('errorA', 'Failed to delete the record.');
    }
}
public function destroyAward(Request $request,$id)
{
    $record = Award::find($id);

    if ($record) {
        $record->delete();
        return redirect()->route('form.step', ['step' => $request->input('step')])
                         ->with('successSub', ' delete successfully.');
    } else {
        return redirect()->route('form.step', ['step' => $request->input('step')])
                         ->with('errorA', 'Failed to delete the record.');
    }
}
public function destroyResearch(Request $request,$id)
{
    $record = Research::find($id);

    if ($record) {
        $record->delete();
        return redirect()->route('form.step', ['step' => $request->input('step')])
                         ->with('successSub', ' delete successfully.');
    } else {
        return redirect()->route('form.step', ['step' => $request->input('step')])
                         ->with('errorA', 'Failed to delete the record.');
    }
}

    public function preview(Request $request)
    {
        
        if (Auth::check()) 
        {
      
    //   return view('multistep.form');
       
        $formStep = FormStep::where('user_id', Auth::id())->first();
        $languages = json_decode($formStep->languages, true);
        $skills = json_decode($formStep->skills, true);
        $academicRecords = DB::table('academics')
    ->join('qualifications', 'academics.qualification', '=', 'qualifications.id')
    ->where('academics.user_id', Auth::id())
    ->select('academics.*', 'qualifications.name as qualification_name')
    ->get();
    // dd($languages);
    $academicRecordsArray = $academicRecords->map(function($record) {
        return [
            'id' => $record->id,
            'user_id' => $record->user_id,
            'degree' => $record->degree,
            'qualification' => $record->qualification,
            'course' => $record->course,
            'subjects' => $record->subjects,
            'mode' => $record->mode,
            'school_clg' => $record->school_clg,
            'uni_board' => $record->uni_board,
            'passing_date' => $record->passing_date,
            'marks_obtained' => $record->marks_obtained,
            'total_marks' => $record->total_marks,
            'cgpa' => $record->cgpa,
            'percent' => $record->percent,
            'created_at' => $record->created_at,
            'updated_at' => $record->updated_at,
            'qualification_name' => $record->qualification_name
        ];
    });
  
        $formExperience = Experience::where('user_id', Auth::id())->get()->toArray();
        $projectData = Project::where('user_id', Auth::id())->get()->toArray();
        $qualifications = Qualification::all();
        $BookA=Book::where('user_id', Auth::id())->get()->toArray();
        $PublicationA=Publication::where('user_id', Auth::id())->get()->toArray();
        $ThesisSupervisedA=ThesisSupervised::where('user_id', Auth::id())->get()->toArray();
        $ConferenceDetailA=ConferenceDetail::where('user_id', Auth::id())->get()->toArray();
        $SeminarA=Seminar::where('user_id', Auth::id())->get()->toArray();
        $WorkshopA=Workshop::where('user_id', Auth::id())->get()->toArray();
        $PatentA=Patent::where('user_id', Auth::id())->get()->toArray();
        $MembershipA=Membership::where('user_id', Auth::id())->get()->toArray();
        $AwardA=Award::where('user_id', Auth::id())->get()->toArray();
        $ResearchA=Research::where('user_id', Auth::id())->get()->toArray();
        
        if (!$formStep) {
            $formStep = FormStep::create([
                'user_id' => Auth::id(),
                'current_step' => 1,
                'form_data' => []
            ]);
        }
        return view('multistep.preview', [
            // 'step' => $step,
            'formData' => $formStep->form_data,
            'summary' => $formStep->summary,
            'languages' => $languages,
            'skills' => $skills,
            'image' => $formStep->image,
            'academicData' => $academicRecordsArray,
            'experienceData' => $formExperience,
            'projectData' => $projectData,
            'qualifications' => $qualifications,
            'currentStep' => $formStep->current_step,
            'BookA' => $BookA,
            'PublicationA' => $PublicationA,
            'ThesisSupervisedA' => $ThesisSupervisedA,
            'ConferenceDetailA' => $ConferenceDetailA,
            'SeminarA' => $SeminarA,
            'WorkshopA' => $WorkshopA,
            'PatentA' => $PatentA,
            'MembershipA' => $MembershipA,
            'AwardA' => $AwardA,
            'ResearchA' => $ResearchA
        ]);
    }
    
    }
    
}
?>
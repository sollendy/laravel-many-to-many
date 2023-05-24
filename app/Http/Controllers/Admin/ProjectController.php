<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        return view("admin.projects.index", compact("projects"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();
        // dd($types);
        return view('admin/projects/create', compact("types"));
    }
    //Str::slug($formData['title'], '-')
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validation($request);
        $formData = $request->all();
        $newProject = new Project();
        $newProject->slug = Str::slug($formData["title"], "-");
        $newProject->fill($formData);
        $newProject->save();
        return redirect()->route('admin.projects.show', ["project" => $newProject->slug]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        // dd($project->type);
        return view('admin/projects/show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view("admin/projects/edit", compact("project"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $this->validation($request);
        $formData = $request->all();
        $project->update($formData);
        $project->save();
        return redirect()->route("admin.projects.show", $project->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route("admin.projects.index");
    }
    private function validation($request) {
        // controlla che i parametri del form rispettino le regole che indichiamo
       // $request->validate([
       //     'title' => 'required|max:50|min:5',
       //     'src' => 'required|max:255',
       //     'type' => 'required|max:200',
       //     'cooking_time' => 'nullable|max:10',
       //     'weight' => 'required|max:10',
       //     'description' => 'required|min:10',
       // ]);
       // in caso NON le rispettino (ne basta una), fa tornare l'utente
       // alla rotta precedente, passandogli un array di errori chiamato $errors
       

       
       // dobbiamo prendere solo i parametri del form, utilizziamo quindi il metodo all()
       $formData = $request->all(); 
       
       // l'import da fare qui è del Validator (ce ne sono tanti) con questo percorso:
       // Illuminate\Support\Facades\Validator;
       // passiamo i parametri del form al metodo statico  make() di Validation
       $validator = Validator::make($formData, [
           // qui ci dobbiamo inserire un array di regole (quelle che abbiamo usato sino a prima)
           'title' => 'required|max:12|min:4',
           'content' => 'required|max:1500',
       ], [
            'title.required' => 'Guarda compare, un titolo me lo devi dare.',
            'title.max' => 'Il titolo non deve essere più lungo di 10 caratteri',
            'title.min' => 'Il titolo non deve essere più corto di 2 caratteri',
            "content.required" => "come speri di vendere sto progetto se non dici manco una parola a riguardo?",
            "content.max" => "se scrivi più di 1500 caratteri ti sei già addormentato.",
       ])->validate();

       // importante, visto che siamo in una funzione, dobbiamo restituire un valore, il validator gestisce questo campo e in caso trovasse un errore farebbe
       // in automatico il redirect
       return $validator;
    }
}

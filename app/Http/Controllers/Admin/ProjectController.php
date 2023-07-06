<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{

    private $validation = [
        'title'=> 'required|string|max:200',
        'project_image'=> 'required|url|max:200',
        'project_description' => 'required|string',
        'url_github' => 'required|url|max:200',
            
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::paginate(10);
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->validation);

        $data = $request->all();
        // salvare i dati nel db (questo metodo anche se è più lungo è il più sicuro)
        $newProject = new Project();
        $newProject->title = $data['title'];
        $newProject->project_image = $data['project_image'];
        $newProject->project_description = $data['project_description'];
        $newProject->url_github = $data['url_github'];
        $newProject-> save();

        unset($data['_token']);
        return redirect()-> route('admin.projects.show', ['project'=> $newProject->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
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
        $request->validate($this->validation);

        $data = $request->all();
        // cambiare i dati inseriti
        
        $project->title = $data['title'];
        $project->project_image = $data['project_image'];
        $project->project_description = $data['project_description'];
        $project->url_github = $data['url_github'];
        $project-> update();

        unset($data['_token']);
        return to_route('admin.projects.show', ['project'=> $project->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
    }
}

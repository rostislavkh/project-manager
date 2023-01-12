<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function search() {
        $projects = Project::orderBy('id', 'desc');

        $project_res = $projects->get();
        $result = [];
        foreach ($project_res as $item) {
            $result[] = [
                'name' => $item->name,
                'url' => $item->url,
                'is_active' => $item->is_active ? true : false
            ];
        }

        return response()->json($result);
    }
}

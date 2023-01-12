<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function search() {
        $projects = Project::orderBy('id', 'asc');

        $project_res = $projects->get();
        $result = [];
        foreach ($project_res as $item) {
            $result[] = [
                'id' => $item->id,
                'name' => $item->name,
                'url' => $item->url,
                'is_active' => $item->is_active ? true : false,
                'is_view' => true
            ];
        }

        return response()->json($result);
    }
}

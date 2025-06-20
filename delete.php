<?php

require './classes/ProjectManager.php';

if (isset($_GET['id'])) {
    $projectId = $_GET['id'];
    $projectManager = new ProjectManager();
    $project = $projectManager->getProject($projectId);

    if ($project) {
        $deleted = $projectManager->deleteProject($projectId);
        if ($deleted) {
            header("Location: index.php?message=Project deleted successfully");
            exit();
        } else {
            echo "Error deleting project.";
        }
    } else {
        echo "Project not found.";
    }
} else {
    echo "No project ID provided.";
}

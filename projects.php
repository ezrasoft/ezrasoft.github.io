<!DOCTYPE html>
<html>
<head>
    <title>Project Management System</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            // Load projects
            loadProjects();

            // Add new project
            $('#addForm').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: 'add_project.php',
                    data: $(this).serialize(),
                    success: function(response) {
                        loadProjects();
                        $('#addForm')[0].reset();
                    }
                });
            });
        });

        // Load projects
        function loadProjects() {
            $.ajax({
                type: 'GET',
                url: 'get_projects.php',
                success: function(response) {
                    $('#projectList').html(response);
                }
            });
        }

        // Delete project
        function deleteProject(pid) {
            if (confirm('Are you sure you want to delete this project?')) {
                $.ajax({
                    type: 'POST',
                    url: 'delete_project.php',
                    data: { pid: pid },
                    success: function(response) {
                        loadProjects();
                    }
                });
            }
        }
    </script>
</head>
<body>
    <h1>Project Management System</h1>

    <h2>Add Project</h2>
    <form id="addForm" method="POST">
        <label for="pname">Project Name:</label>
        <input type="text" id="pname" name="pname" required><br><br>

        <label for="pdescription">Project Description:</label>
        <textarea id="pdescription" name="pdescription" required></textarea><br><br>

        <label for="start_date">Start Date:</label>
        <input type="date" id="start_date" name="start_date" required><br><br>

        <label for="end_date">End Date:</label>
        <input type="date" id="end_date" name="end_date" required><br><br>

        <input type="submit" value="Add Project">
    </form>

    <h2>Project List</h2>
    <div id="projectList"></div>
</body>
</html>

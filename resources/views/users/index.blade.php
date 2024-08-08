<!DOCTYPE html>
<html>
<head>
    <title>Users</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        h1 {
            text-align: center;
            color: #fff;
            background-color: #007bff;
            padding: 20px;
            margin: 0;
        }
        .search-container {
            display: flex;
            justify-content: center;
            padding: 20px;
        }
        #search {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 5px;
            outline: none;
            width: 100%;
            max-width: 600px;
            box-sizing: border-box;
        }
        #user-list {
            list-style-type: none;
            padding: 0;
            margin: 20px auto;
            max-width: 1000px; 
            display: grid;
            grid-template-columns: repeat(2, 1fr); 
            gap: 20px; 
        }
        #user-list li {
            background-color: #fff;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
        }
        #user-list li div {
            margin-bottom: 10px;
            color: #333;
        }
        #user-list li:hover {
            background-color: #f1f1f1;
        }
        .no-results, .error-message {
            text-align: center;
            padding: 20px;
        }
        .no-results {
            color: #888;
        }
        .error-message {
            color: #e74c3c;
        }
    </style>
</head>
<body>
    <h1>Demo</h1>

    <div class="search-container">
        <input type="text" id="search" placeholder="Search by name, designation, or department">
    </div>
    <ul id="user-list">
    </ul>

    <script>
        $(document).ready(function() {
            $('#search').on('keyup', function() {
                let query = $(this).val();
                
                $.ajax({
                    url: '{{ route('users.search') }}',
                    method: 'GET',
                    data: { query: query },
                    success: function(data) {
                        $('#user-list').empty();
                        if (data.length) {
                            data.forEach(function(user) {
                                $('#user-list').append(`
                                    <li>
                                        <div><strong>Name:</strong> ${user.name}</div>
                                        <div><strong>Designation:</strong> ${user.designation ? user.designation.name : 'N/A'}</div>
                                        <div><strong>Department:</strong> ${user.department ? user.department.name : 'N/A'}</div>
                                    </li>
                                `);
                            });
                        } else {
                            $('#user-list').append('<li class="no-results">No users found</li>');
                        }
                    },
                    error: function() {
                        $('#user-list').empty();
                        $('#user-list').append('<li class="error-message">Error retrieving data</li>');
                    }
                });
            });
        });
    </script>
</body>
</html>

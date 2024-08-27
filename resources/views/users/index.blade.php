<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" href="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/css/dataTables.checkboxes.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/v/dt/dt-1.10.16/sl-1.2.5/datatables.min.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <title>Datatable</title>
</head>
<body>
    <div class="container">
        <table class="table table-hover" id="example">
            <thead>
                <tr>
                    <th></th> <!-- Checkbox column -->
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td></td> <!-- This will hold the checkbox -->
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <button type="button" class="btn btn-primary btn-sm approve-btn" data-id="{{ $user->id }}">Approve</button>
                            <button type="button" class="btn btn-danger btn-sm reject-btn" data-id="{{ $user->id }}">Reject</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="test">
            <button id="approve" class="btn btn-primary">Approve</button>
            <button id="reject" class="btn btn-danger">Reject</button>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/sl-1.2.5/datatables.min.js"></script>
    <script src="https://gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/js/dataTables.checkboxes.min.js"></script>

    <script>
        $(document).ready(function () {
            var table = $('#example').DataTable({
                'columnDefs': [
                    {
                        'targets': 0, // Target the first column
                        'checkboxes': {
                            'selectRow': true // Enables row selection
                        }
                    }
                ],
                'select': {
                    'style': 'multi' // Allows multiple rows to be selected
                },
                'order': [[1, 'asc']] // Order by the Name column
            });

            // Debugging output to ensure DataTable is initialized
            console.log("DataTable initialized with", table.rows(), "rows.");

            // Individual Approve Button
            $(document).on('click', '.approve-btn', function () {
                var userId = $(this).data('id');
                console.log('Approve user with ID: ' + userId);
                // Perform the approve action here, e.g., send an AJAX request
            });

            // Individual Reject Button
            $(document).on('click', '.reject-btn', function () {
                var userId = $(this).data('id');
                console.log('Reject user with ID: ' + userId);
                // Perform the reject action here, e.g., send an AJAX request
            });

            // Bulk Approve Button
            $('#approve').on('click', function (e) {
                var rows_selected = table.column(0).checkboxes.selected();
                var userIds = [];

                $.each(rows_selected, function(index, rowId){
                    userIds.push(rowId);
                });

                console.log('Approve users with IDs: ', userIds);
                // Perform the approve action for selected users, e.g., send an AJAX request
            });

            // Bulk Reject Button
            $('#reject').on('click', function (e) {
                var rows_selected = table.column(0).checkboxes.selected();
                var userIds = [];

                $.each(rows_selected, function(index, rowId){
                    userIds.push(rowId);
                });

                console.log('Reject users with IDs: ', userIds);
                // Perform the reject action for selected users, e.g., send an AJAX request
            });
        });
    </script>
    
</body>
</html>

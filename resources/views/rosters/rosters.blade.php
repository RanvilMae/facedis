<!DOCTYPE html>
<html>
<head>
    <title>Laravel Ajax Data Fetch Example</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container">
    <h1>Laravel Ajax Data Fetch Example</h1>

    <table class="table table-bordered data-table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($rosters as $r)
            <tr>
                <td>{{ $r->id }}</td>
                <td>{{ $r->first_name }}</td>
                <td>{{ $r->sex }}</td>
                <td>
                    <a
                        href="javascript:void(0)"
                        id="show-roster"
                        data-url="{{ route('rosters.show', $r->id) }}"
                        class="btn btn-info"
                    >Show</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $rosters->links() }}

</div>

<!-- Modal -->
<div class="modal fade" id="userShowModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Show User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>ID:</strong> <span id="user-id"></span></p>
                <p><strong>Name:</strong> <span id="user-first_name"></span></p>
                <p><strong>Sex:</strong> <span id="user-sex"></span></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

</body>

<script type="text/javascript">

    $(document).ready(function () {

        /* When click show user */
        $('body').on('click', '#show-roster', function () {
            var userURL = $(this).data('url');
            $.get(userURL, function (data) {
                $('#userShowModal').modal('show');
                $('#user-id').text(data.id);
                $('#user-first_name').text(data.first_name);
                $('#user-sex').text(data.sex);
            })
        });

    });

</script>

</html>
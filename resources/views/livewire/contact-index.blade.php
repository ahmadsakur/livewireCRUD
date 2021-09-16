<div>
    <table class="table table-auto">
        <thead>
            <th>Name</th>
            <th>Phone Number</th>
        </thead>
        <tbody>
        @foreach ($contacts as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>{{ $item->phone }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

<table class="table">
    <thead class="thead-dark">
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Proposito</th>
        <th scope="col">Acción</th>

    </tr>
    </thead>
    <tbody>

    @foreach($purposes as $dat)

        <tr>
            <td>{{$dat->id}}</td>
            <td>{{$dat->purpose}}</td>
            <td>
                <form action="{{route('deletePurpose')}}" method="POST">
                    @csrf
                    <input type="hidden" name="purposeid" value="{{$dat->id}}">
                    <button type="submit" class="btn btn-outline-danger">Eliminar</button>
                </form>
            </td>
        </tr>


    @endforeach

    </tbody>
</table>

<div class="row">
    <div class="d-flex">
        <div class="mx-auto">
            {{$purposes->links()}}

        </div>
    </div>
</div>

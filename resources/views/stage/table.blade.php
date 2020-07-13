<table class="table">
    <thead class="thead-dark">
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Nombre</th>
        <th scope="col">Acción</th>

    </tr>
    </thead>
    <tbody>

    @foreach($stages as $dat)

        <tr>
            <td>{{$dat->id}}</td>
            <td>{{$dat->name}}</td>
            <td>
                <form action="{{route('deleteStage')}}" method="POST">
                    @csrf
                    <input type="hidden" name="stage_id" value="{{$dat->id}}">
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
            {{$stages->links()}}

        </div>
    </div>
</div>

<table class="table">
    <thead class="thead-dark">
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Nombre</th>
        <th scope="col">Acción</th>

    </tr>
    </thead>
    <tbody>

    @foreach($livestocks as $dat)

        <tr>
            <td>{{$dat->id}}</td>
            <td>{{$dat->name}}</td>
            <td>
                <form action="{{route('deleteLivestock')}}" method="POST">
                    @csrf
                    <input type="hidden" name="livestock_id" value="{{$dat->id}}">
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
            {{$livestocks->links()}}

        </div>
    </div>
</div>

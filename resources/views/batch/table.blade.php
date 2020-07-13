<table class="table">
    <thead class="thead-dark">
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Número</th>
        <th scope="col">Descripción</th>
        <th scope="col">Acción</th>

    </tr>
    </thead>
    <tbody>

    @foreach($batches as $dat)

        <tr>
            <td>{{$dat->id}}</td>
            <td>{{$dat->number}}</td>
            <td>{{$dat->description}}</td>
            <td>
                <form action="{{route('deleteBatches')}}" method="POST">
                    @csrf
                    <input type="hidden" name="batch_id" value="{{$dat->id}}">
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
            {{$batches->links()}}

        </div>
    </div>
</div>

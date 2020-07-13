<table class="table">
    <thead class="thead-dark">
    <tr>
        <th scope="col">{{$type}}</th>
        <th scope="col">PB</th>
        <th scope="col">Acción</th>

    </tr>
    </thead>
    <tbody>

    @foreach($data as $dat)

        <tr>
            <td>{{$dat->name}}</td>
            <td>{{$dat->percentage_pb}}%</td>
            <td>

                       <form action="{{route('deleteRawMaterials')}}" method="POST">
                           @csrf
                           <input type="hidden" name="rm_id" value="{{$dat->id}}">
                           <button type="submit" class="btn btn-outline-danger">Eliminar</button>
                       </form>

                   
               </div>
            </td>
        </tr>


    @endforeach

    </tbody>
</table>

<div class="row">
    <div class="d-flex">
        <div class="mx-auto">
            {{$data->links()}}

        </div>
    </div>
</div>

<table class="table">
    <thead class="thead-dark">
    <tr>
        <th scope="col">Nombre</th>
        <th scope="col">Nacimiento</th>
        <th scope="col">Ganaderia</th>
        <th scope="col">Sexo</th>
        <th scope="col">Acción</th>

    </tr>
    </thead>
    <tbody>

    @foreach($animals as $dat)

        <tr>
            <td>{{$dat->name}}</td>
            <td class="text-center">{{$dat->birthday}}</td>
            <td class="text-center">{{$dat->liveStock->name}}</td>
            <td class="text-center">{{$dat->gender}}</td>
            <td>
                <a href="{{route('showAnimal', [$dat->no_animal])}}" class="btn btn-outline-primary d-block">Ver animal</a>


            </td>
        </tr>


    @endforeach

    </tbody>
</table>

<div class="row">
    <div class="d-flex">
        <div class="mx-auto">
            {{$animals->links()}}

        </div>
    </div>
</div>

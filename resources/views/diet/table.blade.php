<table class="table">
    <thead class="thead-dark">
    <tr>
        <th scope="col">Nombre</th>
        <th scope="col">Ración (Kg)</th>
        <th scope="col">Requerimiento preteico (%)</th>
        <th scope="col">Acción</th>

    </tr>
    </thead>
    <tbody>

    @foreach($diets as $dat)

        <tr>
            <td>{{$dat->name}}</td>
            <td class="text-center">{{$dat->ration_kg}}</td>
            <td class="text-center">{{$dat->protein_requirement}}%</td>
            <td>
                <a href="{{route('showDiet', [$dat->id])}}" class="btn btn-outline-primary d-block">Ver dieta</a>


            </td>
        </tr>


    @endforeach

    </tbody>
</table>

<div class="row">
    <div class="d-flex">
        <div class="mx-auto">
            {{$diets->links()}}

        </div>
    </div>
</div>

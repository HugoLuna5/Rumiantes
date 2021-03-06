"use strict";
const actionFP = document.getElementById('addFP');
const actionFE = document.getElementById('addFE');
const proteicaSelect = document.getElementById('proteica');
const energeticaSelect = document.getElementById('energetica');
const actionCalculate = document.getElementById('actionCalculate');
const cancelAction = document.getElementById('cancelAction');
const actionSaveDiet = document.getElementById('actionSaveDiet');
const populateTable = document.getElementById('populateTable');
const containerTableProteica = $('#tBodyFP');
const containerTableEnergetica = $('#tBodyFE');
const containerTable = $('#tBody');
const proteinRequirement = document.getElementById('protein_requirement');
const rationKg = document.getElementById('ration_kg');
const name = document.getElementById('name');
const arrayFP = [];
const arrayFE = [];
let arrayAllRawPrimary = [];
let arrayDifference = [];
let arrayPercentageParticipation = [];
let arrayContributionRate  = [];
let arrayquantityKg  = [];
let sumDifference = 0;
let sumPercentageParticipation = 0;
let sumContributionRate = 0;
let sumQuantityKg = 0;




actionCalculate.style.display = "none";


actionFP.addEventListener('click', (event) => {
    event.preventDefault();

    let valueProtein = proteinRequirement.value;

    if (!valueProtein || !valueProtein.trim() || valueProtein.length === 0){

        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'El requerimiento proteico es requerido.',
        })

    }else {


        let iDValue =  proteicaSelect.value;
        let url = '/home/raw-materials/show/json/'+iDValue;
        fetch(url)
            .then((response) => {
                return response.json();
            })
            .then((response) => {
                if (parseInt(valueProtein) < parseInt(response.percentage_pb)){
                    arrayFP.push(response);
                    populateTableFP();
                }else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'La proteina bruta debe ser mayor a la proteina requerida',
                    })
                }



            });
    }



});

actionFE.addEventListener('click', (event) => {
    event.preventDefault();


    let valueProtein = proteinRequirement.value;

    if (!valueProtein || !valueProtein.trim() || valueProtein.length === 0){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'El requerimiento proteico es requerido.',
        })
    }else {

        let iDValue = energeticaSelect.value;
        let url = '/home/raw-materials/show/json/' + iDValue;
        fetch(url)
            .then((response) => {
                return response.json();
            })
            .then((response) => {
                if (parseInt(valueProtein) > parseInt(response.percentage_pb)){
                    arrayFE.push(response);
                    populateTableFE();
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'La proteina bruta debe ser menor a la proteina requerida',
                    })

                }



            });

    }

});



function populateTableFP(){

    /**
     * Reload items
     */
    containerTableProteica.empty();
    for (let i = 0; i < arrayFP.length; i++) {
        let response = arrayFP[i];
        let tableCell = '<tr id="element'+response.id+'"><td>'+response.name+'</td><td class="text-center">'+response.percentage_pb+'%</td><td class="text-center"><button onclick="deleteItemTableFP('+response.id+','+i+')" class="btn btn-outline-danger">Eliminar</button></td></tr>';
        containerTableProteica.append(tableCell)

    }

}

function populateTableFE() {
    /**
     * Reload items
     */
    containerTableEnergetica.empty();
    for (let i = 0; i < arrayFE.length; i++) {
        let response = arrayFE[i];
        let tableCell = '<tr id="element'+response.id+'"><td>'+response.name+'</td><td class="text-center">'+response.percentage_pb+'%</td><td class="text-center"><button onclick="deleteItemTableFE('+response.id+','+i+')" class="btn btn-outline-danger">Eliminar</button></td></tr>';
        containerTableEnergetica.append(tableCell)

    }

}



populateTable.addEventListener('click', (event) => {
    const sizeArrFP = arrayFP.length;
    const sizeArrFE = arrayFE.length;



    if ( (sizeArrFE !== sizeArrFP) || (sizeArrFE === 0 || sizeArrFP === 0)){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Debes tener la misma cantida de materias primas de FP y FE',
        })
    }else{
        let valueKg = rationKg.value;
        if (!valueKg || !valueKg.trim() || valueKg.length === 0){
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'La ración en KG es requerida.',
            })
        }else {
            containerTable.empty();
            arrayAllRawPrimary = [];
            for (let i = 0; i < arrayFP.length; i++) {
                arrayAllRawPrimary.push(arrayFP[i]);
            }
            for (let i = 0; i < arrayFE.length; i++) {
                arrayAllRawPrimary.push(arrayFE[i]);
            }
            populateDifference();
            actionCalculate.style.display = "block";

        }







    }
});


function populateDifference() {
    arrayDifference = [];

    let proteinRequirementInt = parseFloat(proteinRequirement.value);
    for (let i = (arrayFE.length-1); i >= 0 ; i--) {
        let result = proteinRequirementInt - parseFloat(arrayFE[i].percentage_pb);
        arrayDifference.push(result)
    }


    for (let i = (arrayFP.length-1); i >=0 ; i--) {
        let result = parseFloat(arrayFP[i].percentage_pb) - proteinRequirementInt ;
        arrayDifference.push(result)
    }

    sumDifference = arrayDifference.reduce(function(a, b){
        return a + b;
    }, 0);
    populatePercentageParticipation();


}

function populatePercentageParticipation(){
    arrayPercentageParticipation = [];
    for (let i = 0; i < arrayDifference.length; i++) {
        let num = (arrayDifference[i] / sumDifference) * 100;
        let result = Math.round((num + Number.EPSILON) * 100) / 100;  //
        arrayPercentageParticipation.push(result);
    }

    sumPercentageParticipation = arrayPercentageParticipation.reduce(function (a, b) {
        return a + b;
    }, 0);

    populatecontributionRate()
}

function populatecontributionRate() {
    arrayContributionRate = [];
    for (let i = 0; i < arrayPercentageParticipation.length; i++) {
        let num = (arrayPercentageParticipation[i] * arrayAllRawPrimary[i].percentage_pb) / 100;
        let result = Math.round((num + Number.EPSILON) * 100) / 100;  //
        arrayContributionRate.push(result);
    }
    sumContributionRate = arrayContributionRate.reduce(function (a, b) {
        return a + b;
    }, 0);
    populateQuantityKg()
}

function populateQuantityKg() {
    arrayquantityKg = [];
    for (let i = 0; i < arrayPercentageParticipation.length; i++) {
        let num = (arrayPercentageParticipation[i] * parseFloat(rationKg.value)) / 100;
        let result = Math.round((num + Number.EPSILON) * 100) / 100;  //
        arrayquantityKg.push(result)
    }
    sumQuantityKg = arrayquantityKg.reduce(function (a, b) {
        return a + b;
    }, 0);
}



actionCalculate.addEventListener('click', (event) => {

    for (let i = 0; i < arrayAllRawPrimary.length; i++) {

        let tableCell = '<tr><td>'+arrayAllRawPrimary[i].name+'</td><td>'+arrayAllRawPrimary[i].percentage_pb+'%</td><td class="text-center">'+proteinRequirement.value+'%</td><td class="text-center">'+arrayDifference[i]+'</td><td class="text-center">'+arrayPercentageParticipation[i]+'</td><td class="text-center">'+arrayContributionRate[i]+'</td><td class="text-center">'+arrayquantityKg[i]+'</td></tr>';
        containerTable.append(tableCell);
    }

    let tableCell = '<tr class="table-success"><td></td><td></td><td class="text-center"></td><td class="text-center">'+sumDifference+'</td><td class="text-center">'+sumPercentageParticipation+'</td><td class="text-center">'+sumContributionRate+'</td><td class="text-center">'+sumQuantityKg+'</td></tr>';

    containerTable.append(tableCell);


});

actionSaveDiet.addEventListener('click', (event) => {
    let nameDiet = name.value;
    const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;

    if (!nameDiet || !nameDiet.trim() || nameDiet.length === 0){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Debes asignar un nombre a la dieta.',
        })

    }else{
        let rawMaterials = '';

        for (let i = 0; i < arrayAllRawPrimary.length; i++) {

            if (i === (arrayAllRawPrimary.length - 1)){
                rawMaterials += ""+arrayAllRawPrimary[i].id

            }else {
                rawMaterials += +arrayAllRawPrimary[i].id+","

            }
        }

        let url = '/home/diets/save';
        fetch(url, {
            method: 'post',
            body: JSON.stringify({
                "name": name.value,
                "ration_kg": rationKg.value,
                "protein_requirement": proteinRequirement.value,
                "raw_materials": rawMaterials,
            }),
            headers: {
                'Content-Type': 'application/json',
                "X-CSRF-Token": csrfToken
            }
        }).then( response => {
            return response.json()
        }).then( response => {
            if (response.status === 'error'){
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: response.message,
                })
            }else {
                Swal.fire({
                    icon: 'success',
                    title: '¡Genial!',
                    text: response.message,
                });

                location.href = '/home/diets';

            }

        })


    }


});

cancelAction.addEventListener('click', (event) =>{
    location.reload();
});

function deleteItemTableFP(iD, currentPosition) {

    if (currentPosition > -1) {
        arrayFP.splice(currentPosition, 1);
    }
    populateTableFP();
    $('#element'+iD).remove();


}

function deleteItemTableFE(iD, currentPosition) {

    if (currentPosition > -1) {
        arrayFE.splice(currentPosition, 1);
    }
    populateTableFE();
    $('#element'+iD).remove();

}


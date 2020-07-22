function populate() {
    const sizeArrFP = arrayFP.length;
    const sizeArrFE = arrayFE.length;

    console.log(arrayFP)
    console.log(arrayFE)


    if ( (sizeArrFE !== sizeArrFP) || (sizeArrFE === 0 || sizeArrFP === 0)){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Debes tener la misma cantida de materias primas de FP y FE',
        })
    }else{
        let valueKg = rationKg;
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

        }







    }
}


function populateDifference() {
    arrayDifference = [];

    let proteinRequirementInt = parseFloat(proteinRequirement);
    for (let i = 0; i < arrayFE.length; i++) {
        let result = proteinRequirementInt - parseFloat(arrayFE[i].percentage_pb);
        arrayDifference.push(result)
    }


    for (let i = 0; i < arrayFP.length; i++) {
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
        let num = (arrayPercentageParticipation[i] * parseFloat(rationKg)) / 100;
        let result = Math.round((num + Number.EPSILON) * 100) / 100;  //
        arrayquantityKg.push(result)
    }
    sumQuantityKg = arrayquantityKg.reduce(function (a, b) {
        return a + b;
    }, 0);
}

function calculate() {
    for (let i = 0; i < arrayAllRawPrimary.length; i++) {

        let tableCell = '<tr><td>'+arrayAllRawPrimary[i].name+'</td><td>'+arrayAllRawPrimary[i].percentage_pb+'%</td><td class="text-center">'+proteinRequirement+'%</td><td class="text-center">'+arrayDifference[i]+'</td><td class="text-center">'+arrayPercentageParticipation[i]+'</td><td class="text-center">'+arrayContributionRate[i]+'</td><td class="text-center">'+arrayquantityKg[i]+'</td></tr>';
        containerTable.append(tableCell);
    }

    let tableCell = '<tr class="table-success"><td></td><td></td><td class="text-center"></td><td class="text-center">'+sumDifference+'</td><td class="text-center">'+sumPercentageParticipation+'</td><td class="text-center">'+sumContributionRate+'</td><td class="text-center">'+sumQuantityKg+'</td></tr>';

    containerTable.append(tableCell);
}


populate();

calculate();

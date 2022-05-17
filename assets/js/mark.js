// Xử lý mục 1
// Lấy ra các thẻ trong mục 1
// console.log('ố')
let svDiemTBHK = document.querySelectorAll('input[name="svDiemTBHK"]');
let svNCKH1 = document.querySelector('input[name="svNCKH1"]');
let svNCKH2 = document.querySelector('input[name="svNCKH2"]');
let svNCKH3 = document.querySelector('input[name="svNCKH3"]');
let svOlympic1 = document.querySelector('input[name="svOlympic1"]')
let svOlympic2 = document.querySelector('input[name="svOlympic2"]')
let svOlympic3 = document.querySelector('input[name="svOlympic3"]')
let svOlympic4 = document.querySelector('input[name="svOlympic4"]')
let svNoRegulation = document.querySelector('input[name="svNoRegulation"]')
let svOnTime = document.querySelector('input[name="svOnTime"]')
let svAbandon = document.querySelector('input[name="svAbandon"]')
let svUnTrueTime = document.querySelector('#svUnTrueTime')
let sum_one = document.querySelector('.sum_one')
let svDiemTBHK_item = sum_one_item = svUnTrueTime_item = sum_one_value 
    = svNCKH1_point = svNCKH2_point = svNCKH3_point = svOlympic1_point 
    = svOlympic2_point = svOlympic3_point = svOlympic4_point = svAbandon_point = 0
// Mục 2
let svRightRule = document.querySelector('input[name="svRightRule"]')
let svCitizen = document.querySelectorAll('input[name="svCitizen"]')
let svNoFullStudy = document.querySelector('input[name="svNoFullStudy"]')
let svNoCard = document.querySelector('#svNoCard')
let svNoAtivities = document.querySelector('#svNoAtivities')
let svNoPayFee = document.querySelector('input[name="svNoPayFee"]')
let sum_two = document.querySelector('.sum_two')
let svCitizen_item = svNoCard_item = svNoAtivities_item = sum_two_value = sum_two_item = 0

// Mục 3
let svFullActive = document.querySelector('input[name="svFullActive"]')
let svAchievementSchool = document.querySelector('input[name="svAchievementSchool"]')
let svAchievementCity = document.querySelector('input[name="svAchievementCity"]')
let svAdvise = document.querySelector('#svAdvise')
let svIrresponsible = document.querySelector('#svIrresponsible')
let svNoCultural = document.querySelector('#svNoCultural')
let sum_three = document.querySelector('.sum_three')
let svAdvise_item = svIrresponsible_item  = svNoCultural_item = sum_three_item = sum_three_value = svAchievementSchool_point = svAchievementCity_item = 0
// let svIrresponsible_item = 0
// let svNoCultural_item = 0
// let sum_three_item = 0
// let sum_three_value = 0

// Mục 4
let svPositiveStudy = document.querySelector('input[name="svPositiveStudy"]')
let svPositiveLove = document.querySelector('input[name="svPositiveLove"]')
let svWarn = document.querySelector('input[name="svWarn"]')
let svNoProtect = document.querySelector('input[name="svNoProtect"]')
let sum_four = document.querySelector('.sum_four')
let sum_four_item = 0
let sum_four_value = 0

// Mục 5
let svMonitor = document.querySelectorAll('input[name="svMonitor"]')
let svBonus = document.querySelector('input[name="svBonus"]')
let svIrresponsibleMonitor = document.querySelector('#svIrresponsibleMonitor')
let sum_five = document.querySelector('.sum_five')
let sum_five_item = 0
let svMonitor_item = 0
let svIrresponsibleMonitor_item = 0
let sum_five_value = 0

// Tổng
let sum_all = document.querySelector('.sum_mark-student')
sum_all.value = 0

// Mục 1
for(let i = 0; i < svDiemTBHK.length; i++){
    if(svDiemTBHK[i].checked == true){
        svDiemTBHK_item = parseInt(svDiemTBHK[i].value);
    }
}

// if(svNCKH1.checked == true){
    svNCKH1_point = parseInt(svNCKH1.value)
    // console.log(svNCKH1_point)
// }
// console.log(svNCKH1.value)
// svNCKH1.oninput = function(){
//     console.log(svNCKH1.value)
// }
// console.log(svNCKH1.value)


// if(svNCKH2.checked == true){
    svNCKH2_point = parseInt(svNCKH2.value)
// }

// if(svNCKH3.checked == true){
    svNCKH3_point = parseInt(svNCKH3.value)
// }

// if(svOlympic1.checked == true){
    svOlympic1_point = parseInt(svOlympic1.value)
// }

// if(svOlympic2.checked == true){
    svOlympic2_point = parseInt(svOlympic2.value)
// }

// if(svOlympic3.checked == true){
    svOlympic3_point = parseInt(svOlympic3.value)
// }

// if(svOlympic4.checked == true){
    svOlympic4_point = parseInt(svOlympic4.value)
// }

if(svNoRegulation.checked == true){
    sum_one_item += parseInt(svNoRegulation.value)
}

if(svOnTime.checked == true){
    sum_one_item += parseInt(svOnTime.value)
}

// if(svAbandon.checked == true){
    // sum_one_item += parseInt(svAbandon.value)
    svAbandon_point = parseInt(svAbandon.value)
// }

for(let i = 0; i < svUnTrueTime.children.length; i++){
    if(svUnTrueTime.children[i].selected == true){
        svUnTrueTime_item = parseInt(svUnTrueTime.children[i].value)
    }
}

sum_one_value = sum_one_item + svDiemTBHK_item + svUnTrueTime_item 
                + svNCKH1_point + svNCKH2_point + svNCKH3_point 
                + svOlympic1_point + svOlympic2_point + svOlympic3_point 
                + svOlympic4_point + svAbandon_point

sum_one_value = (sum_one_value < 0) ? 0 : sum_one_value
sum_one.value = sum_one_value;

// Mục 2
if(svRightRule.checked == true){
    sum_two_item += parseInt(svRightRule.value)
}

for(let i = 0; i < svCitizen.length; i++){
    if(svCitizen[i].checked == true){
        svCitizen_item = parseInt(svCitizen[i].value);
    }
}

if(svNoFullStudy.checked == true){
    sum_two_item += parseInt(svNoFullStudy.value)
}

for(let i = 0; i < svNoCard.children.length; i++){
    if(svNoCard.children[i].selected == true){
        svNoCard_item = parseInt(svNoCard.children[i].value)
    }
}

for(let i = 0; i < svNoAtivities.children.length; i++){
    if(svNoAtivities.children[i].selected == true){
        svNoAtivities_item = parseInt(svNoAtivities.children[i].value)
    }
}

if(svNoPayFee.checked == true){
    sum_two_item += parseInt(svNoPayFee.value)
}
sum_two_value =  svCitizen_item + svNoCard_item + svNoAtivities_item + sum_two_item;
sum_two_value = (sum_two_value < 0) ? 0 : sum_two_value
sum_two.value = sum_two_value

// Mục 3
if(svFullActive.checked){
    sum_three_item += parseInt(svFullActive.value)
}

// if(svAchievementSchool.checked){
    svAchievementSchool_point = parseInt(svAchievementSchool.value)
// }

// if(svAchievementCity.checked){
    svAchievementCity_item = parseInt(svAchievementCity.value)
// }

for(let i = 0; i < svAdvise.children.length; i++){
    if(svAdvise.children[i].selected == true){
        svAdvise_item = parseInt(svAdvise.children[i].value)
    }
}

for(let i = 0; i < svIrresponsible.children.length; i++){
    if(svIrresponsible.children[i].selected == true){
        svIrresponsible_item = parseInt(svIrresponsible.children[i].value)
    }
}

for(let i = 0; i < svNoCultural.children.length; i++){
    if(svNoCultural.children[i].selected == true){
        svNoCultural_item = parseInt(svNoCultural.children[i].value)
    }
}

sum_three_value = sum_three_item + svAdvise_item + svIrresponsible_item + svNoCultural_item + svAchievementCity_item + svAchievementSchool_point
sum_three_value = (sum_three_value < 0) ? 0 : sum_three_value
sum_three.value = sum_three_value

// Mục 4
if(svPositiveStudy.checked == true){
    sum_four_item += parseInt(svPositiveStudy.value)
}

if(svPositiveLove.checked == true){
    sum_four_item += parseInt(svPositiveLove.value)
}

if(svWarn.checked == true){
    sum_four_item += parseInt(svWarn.value)
}

if(svNoProtect.checked == true){
    sum_four_item += parseInt(svNoProtect.value)
}

sum_four_value = sum_four_item;
sum_four_value = (sum_four_value < 0) ? 0 : sum_four_value
sum_four.value = sum_four_value

// Mục 5
for(let i = 0; i < svMonitor.length; i++){
    if(svMonitor[i].checked == true){
        svMonitor_item = parseInt(svMonitor[i].value);
    }
}

if(svBonus.checked == true){
    sum_five_item += parseInt(svBonus.value)
}

for(let i = 0; i < svIrresponsibleMonitor.children.length; i++){
    if(svIrresponsibleMonitor.children[i].selected == true){
        svIrresponsibleMonitor_item = parseInt(svIrresponsibleMonitor.children[i].value)
    }
}

sum_five_value = sum_five_item +  svMonitor_item + svIrresponsibleMonitor_item;
sum_five_value = (sum_five_value < 0) ? 0 : sum_five_value
sum_five.value = sum_five_value;

sum_all.value = sum_one_value + sum_two_value + sum_three_value + sum_four_value + sum_five_value;

// Mục 1
for(let i = 0; i < svDiemTBHK.length; i++) {
    svDiemTBHK[i].onchange = function(e) {
        if(e.target.checked == true){
            svDiemTBHK_item = parseInt(e.target.value);
        }

        // sum_one_value = sum_one_item + svDiemTBHK_item + svUnTrueTime_item
        sum_one_value = sum_one_item + svDiemTBHK_item + svUnTrueTime_item 
                + svNCKH1_point + svNCKH2_point + svNCKH3_point 
                + svOlympic1_point + svOlympic2_point + svOlympic3_point + svOlympic4_point + svAbandon_point

        if(sum_one_value < 0){
            sum_one_value = 0;
        }
        sum_one.value = sum_one_value;
        sum_all.value = sum_one_value + sum_two_value + sum_three_value + sum_four_value + sum_five_value;
    }
}


svNCKH1.onchange = function(e) {
    // if(e.target.checked == true){
    //     sum_one_item += parseInt(e.target.value);
    // }
    // else{
    //     sum_one_item -= parseInt(e.target.value);
    // }
    if(e.target.value == ''){
        e.target.value = 0
    }
    svNCKH1_point = parseInt(e.target.value);
    
    sum_one_value = sum_one_item + svDiemTBHK_item + svUnTrueTime_item 
                + svNCKH1_point + svNCKH2_point + svNCKH3_point 
                + svOlympic1_point + svOlympic2_point + svOlympic3_point + svOlympic4_point + svAbandon_point

    // sum_one_value = svDiemTBHK_item + sum_one_item + svUnTrueTime_item
    if(sum_one_value < 0){
        sum_one_value = 0;
    }

    sum_one.value = sum_one_value;
    sum_all.value = sum_one_value + sum_two_value + sum_three_value + sum_four_value + sum_five_value;
}

svNCKH2.onchange = function(e) {
    // if(e.target.checked == true){
    //     sum_one_item += parseInt(e.target.value);
    // }
    // else{
    //     sum_one_item -= parseInt(e.target.value);
    // }
    if(e.target.value == ''){
        e.target.value = 0
    }
    
    svNCKH2_point = parseInt(e.target.value);


    // sum_one_value = svDiemTBHK_item + sum_one_item + svUnTrueTime_item
    sum_one_value = sum_one_item + svDiemTBHK_item + svUnTrueTime_item 
                + svNCKH1_point + svNCKH2_point + svNCKH3_point 
                + svOlympic1_point + svOlympic2_point + svOlympic3_point + svOlympic4_point + svAbandon_point
    if(sum_one_value < 0){
        sum_one_value = 0;
    }
    sum_one.value = sum_one_value;
    sum_all.value = sum_one_value + sum_two_value + sum_three_value + sum_four_value + sum_five_value;

}

svNCKH3.onchange = function(e) {
    // if(e.target.checked == true){
    //     sum_one_item += parseInt(e.target.value);
    // }
    // else{
    //     sum_one_item -= parseInt(e.target.value);
    // }
    if(e.target.value == ''){
        e.target.value = 0
    }
    svNCKH3_point = parseInt(e.target.value);

    
    // sum_one_value = svDiemTBHK_item + sum_one_item + svUnTrueTime_item
    sum_one_value = sum_one_item + svDiemTBHK_item + svUnTrueTime_item 
                + svNCKH1_point + svNCKH2_point + svNCKH3_point 
                + svOlympic1_point + svOlympic2_point + svOlympic3_point + svOlympic4_point + svAbandon_point
    if(sum_one_value < 0){
        sum_one_value = 0;
    }
    sum_one.value = sum_one_value;
    sum_all.value = sum_one_value + sum_two_value + sum_three_value + sum_four_value + sum_five_value;

}

svOlympic1.onchange = function(e) {
    // if(e.target.checked == true){
    //     sum_one_item += parseInt(e.target.value);
    // }
    // else{
    //     sum_one_item -= parseInt(e.target.value);
    // }
    if(e.target.value == ''){
        e.target.value = 0
    }
    svOlympic1_point = parseInt(e.target.value);

    
    // sum_one_value = svDiemTBHK_item + sum_one_item + svUnTrueTime_item
    sum_one_value = sum_one_item + svDiemTBHK_item + svUnTrueTime_item 
                + svNCKH1_point + svNCKH2_point + svNCKH3_point 
                + svOlympic1_point + svOlympic2_point + svOlympic3_point + svOlympic4_point + svAbandon_point

    if(sum_one_value < 0){
        sum_one_value = 0;
    }
    sum_one.value = sum_one_value;
    sum_all.value = sum_one_value + sum_two_value + sum_three_value + sum_four_value + sum_five_value;

}

svOlympic2.onchange = function(e) {
    // if(e.target.checked == true){
    //     sum_one_item += parseInt(e.target.value);
    // }
    // else{
    //     sum_one_item -= parseInt(e.target.value);
    // }
    if(e.target.value == ''){
        e.target.value = 0
    }
    svOlympic2_point = parseInt(e.target.value);

    
    // sum_one_value = svDiemTBHK_item + sum_one_item + svUnTrueTime_item
    sum_one_value = sum_one_item + svDiemTBHK_item + svUnTrueTime_item 
                + svNCKH1_point + svNCKH2_point + svNCKH3_point 
                + svOlympic1_point + svOlympic2_point + svOlympic3_point + svOlympic4_point + svAbandon_point

    if(sum_one_value < 0){
        sum_one_value = 0;
    }
    sum_one.value = sum_one_value;
    sum_all.value = sum_one_value + sum_two_value + sum_three_value + sum_four_value + sum_five_value;

}

svOlympic3.onchange = function(e) {
    // if(e.target.checked == true){
    //     sum_one_item += parseInt(e.target.value);
    // }
    // else{
    //     sum_one_item -= parseInt(e.target.value);
    // }
    if(e.target.value == ''){
        e.target.value = 0
    }
    svOlympic3_point = parseInt(e.target.value);


    // sum_one_value = svDiemTBHK_item + sum_one_item + svUnTrueTime_item
    sum_one_value = sum_one_item + svDiemTBHK_item + svUnTrueTime_item 
                + svNCKH1_point + svNCKH2_point + svNCKH3_point 
                + svOlympic1_point + svOlympic2_point + svOlympic3_point + svOlympic4_point + svAbandon_point

    if(sum_one_value < 0){
        sum_one_value = 0;
    }
    sum_one.value = sum_one_value;
    sum_all.value = sum_one_value + sum_two_value + sum_three_value + sum_four_value + sum_five_value;

}

svOlympic4.onchange = function(e) {
    // if(e.target.checked == true){
    //     sum_one_item += parseInt(e.target.value);
    // }
    // else{
    //     sum_one_item -= parseInt(e.target.value);
    // }
    if(e.target.value == ''){
        e.target.value = 0
    }   
    svOlympic4_point = parseInt(e.target.value);
    
    // sum_one_value = svDiemTBHK_item + sum_one_item + svUnTrueTime_item
    sum_one_value = sum_one_item + svDiemTBHK_item + svUnTrueTime_item 
                + svNCKH1_point + svNCKH2_point + svNCKH3_point 
                + svOlympic1_point + svOlympic2_point + svOlympic3_point + svOlympic4_point + svAbandon_point

    if(sum_one_value < 0){
        sum_one_value = 0;
    }
    sum_one.value = sum_one_value;
    sum_all.value = sum_one_value + sum_two_value + sum_three_value + sum_four_value + sum_five_value;

}

svNoRegulation.onchange = function(e) {
    if(e.target.checked == true){
        sum_one_item += parseInt(e.target.value);
    }
    else{
        sum_one_item -= parseInt(e.target.value);
    }
    
    // sum_one_value = svDiemTBHK_item + sum_one_item + svUnTrueTime_item
    sum_one_value = sum_one_item + svDiemTBHK_item + svUnTrueTime_item 
                + svNCKH1_point + svNCKH2_point + svNCKH3_point 
                + svOlympic1_point + svOlympic2_point + svOlympic3_point + svOlympic4_point + svAbandon_point

    if(sum_one_value < 0){
        sum_one_value = 0;
    }
    sum_one.value = sum_one_value;
    sum_all.value = sum_one_value + sum_two_value + sum_three_value + sum_four_value + sum_five_value;

}

svOnTime.onchange = function(e) {
    if(e.target.checked == true){
        sum_one_item += parseInt(e.target.value);
    }
    else{
        sum_one_item -= parseInt(e.target.value);
    }

    // sum_one_value = svDiemTBHK_item + sum_one_item + svUnTrueTime_item
    sum_one_value = sum_one_item + svDiemTBHK_item + svUnTrueTime_item 
                + svNCKH1_point + svNCKH2_point + svNCKH3_point 
                + svOlympic1_point + svOlympic2_point + svOlympic3_point + svOlympic4_point + svAbandon_point

    if(sum_one_value < 0){
        sum_one_value = 0;
    }

    sum_one.value = sum_one_value;
    sum_all.value = sum_one_value + sum_two_value + sum_three_value + sum_four_value + sum_five_value;

}

svAbandon.onchange = function(e) {
    // if(e.target.checked == true){
    //     sum_one_item += parseInt(e.target.value);
    // }
    // else{
    //     sum_one_item -= parseInt(e.target.value);
    // }
    if(e.target.value == ''){
        e.target.value = 0
    }  
    svAbandon_point = parseInt(e.target.value);
    // sum_one_value = svDiemTBHK_item + sum_one_item + svUnTrueTime_item
    sum_one_value = sum_one_item + svDiemTBHK_item + svUnTrueTime_item 
                + svNCKH1_point + svNCKH2_point + svNCKH3_point 
                + svOlympic1_point + svOlympic2_point + svOlympic3_point + svOlympic4_point + svAbandon_point

    if(sum_one_value < 0){
        sum_one_value = 0;
    }

    sum_one.value = sum_one_value;
    sum_all.value = sum_one_value + sum_two_value + sum_three_value + sum_four_value + sum_five_value;

}

svUnTrueTime.onchange = function(e){
    let svUnTrueTimeChildLen = e.target.children
    for(let i = 0; i < svUnTrueTimeChildLen.length; i++){
        if(svUnTrueTimeChildLen[i].selected == true){
            svUnTrueTime_item = parseInt(svUnTrueTimeChildLen[i].value)
        }
    }
    
    // sum_one_value = svDiemTBHK_item + sum_one_item + svUnTrueTime_item
    sum_one_value = sum_one_item + svDiemTBHK_item + svUnTrueTime_item 
                + svNCKH1_point + svNCKH2_point + svNCKH3_point 
                + svOlympic1_point + svOlympic2_point + svOlympic3_point + svOlympic4_point + svAbandon_point

    if(sum_one_value < 0){
        sum_one_value = 0;
    }
    sum_one.value = sum_one_value;
    sum_all.value = sum_one_value + sum_two_value + sum_three_value + sum_four_value + sum_five_value;

}

// Mục 2
svRightRule.onchange = function (e) {
    if(e.target.checked == true){
        sum_two_item += parseInt(e.target.value)
    }
    else{
        sum_two_item -= parseInt(e.target.value)
    }
    sum_two_value =  svCitizen_item + svNoCard_item + svNoAtivities_item + sum_two_item;

    sum_two_value = (sum_two_value < 0) ? 0 : sum_two_value
    sum_two.value = sum_two_value
    
    sum_all.value = sum_one_value + sum_two_value + sum_three_value + sum_four_value + sum_five_value;

}

for(let i = 0; i < svCitizen.length; i++) {
    svCitizen[i].onchange = function(e) {
        if(e.target.checked == true){
            svCitizen_item = parseInt(e.target.value);
        }
        sum_two_value =  svCitizen_item + svNoCard_item + svNoAtivities_item + sum_two_item;
        sum_two_value = (sum_two_value < 0) ? 0 : sum_two_value

        sum_two.value = sum_two_value
        
        sum_all.value = sum_one_value + sum_two_value + sum_three_value + sum_four_value + sum_five_value;

    }
}

svNoFullStudy.onchange = function (e) {
    if(e.target.checked == true){
        sum_two_item += parseInt(e.target.value)
    }
    else{
        sum_two_item -= parseInt(e.target.value)
    }
    sum_two_value =  svCitizen_item + svNoCard_item + svNoAtivities_item + sum_two_item;
    sum_two_value = (sum_two_value < 0) ? 0 : sum_two_value
    sum_two.value = sum_two_value
    
    sum_all.value = sum_one_value + sum_two_value + sum_three_value + sum_four_value + sum_five_value;

}

svNoCard.onchange = function(e){
    let svNoCardChildLen = e.target.children
    for(let i = 0; i < svNoCardChildLen.length; i++){
        if(svNoCardChildLen[i].selected == true){
            svNoCard_item = parseInt(svNoCardChildLen[i].value)
        }
    }
    sum_two_value =  svCitizen_item + svNoCard_item + svNoAtivities_item + sum_two_item;
    sum_two_value = (sum_two_value < 0) ? 0 : sum_two_value
    sum_two.value = sum_two_value
    
    sum_all.value = sum_one_value + sum_two_value + sum_three_value + sum_four_value + sum_five_value;

}

svNoAtivities.onchange = function(e) {
    for(let i = 0; i < e.target.children.length; i++){
        if(e.target.children[i].selected == true){
            svNoAtivities_item = parseInt(e.target.children[i].value)
            console.log(svNoAtivities_item)
        }
    }
    sum_two_value =  svCitizen_item + svNoCard_item + svNoAtivities_item + sum_two_item;
    sum_two_value = (sum_two_value < 0) ? 0 : sum_two_value
    sum_two.value = sum_two_value
    
    sum_all.value = sum_one_value + sum_two_value + sum_three_value + sum_four_value + sum_five_value;

}

svNoPayFee.onchange = function (e) {
    if(e.target.checked == true){
        sum_two_item += parseInt(e.target.value)
    }
    else{
        sum_two_item -= parseInt(e.target.value)
    }
    sum_two_value =  svCitizen_item + svNoCard_item + svNoAtivities_item + sum_two_item;
    sum_two_value = (sum_two_value < 0) ? 0 : sum_two_value
    sum_two.value = sum_two_value
    
    sum_all.value = sum_one_value + sum_two_value + sum_three_value + sum_four_value + sum_five_value;
}

// Mục 3
svFullActive.onchange = function (e) {
    if(e.target.checked == true){
        sum_three_item += parseInt(e.target.value)
    }
    else{
        sum_three_item -= parseInt(e.target.value)
    }
  
    sum_three_value = sum_three_item + svAdvise_item + svIrresponsible_item + svNoCultural_item + svAchievementCity_item + svAchievementSchool_point

    sum_three_value = (sum_three_value < 0) ? 0 : sum_three_value
    

    sum_three.value = sum_three_value
    
    sum_all.value = sum_one_value + sum_two_value + sum_three_value + sum_four_value + sum_five_value;

}

svAchievementSchool.onchange = function (e) {
    // if(e.target.checked == true){
    //     sum_three_item += parseInt(e.target.value)
    // }
    // else{
    //     sum_three_item -= parseInt(e.target.value)
    // }
    if(e.target.value == ''){
        e.target.value = 0
    }  
    svAchievementSchool_point = parseInt(e.target.value)
  
    sum_three_value = sum_three_item + svAdvise_item + svIrresponsible_item + svNoCultural_item + svAchievementCity_item + svAchievementSchool_point
    sum_three_value = (sum_three_value < 0) ? 0 : sum_three_value
    
    sum_three.value = sum_three_value
    
    sum_all.value = sum_one_value + sum_two_value + sum_three_value + sum_four_value + sum_five_value;

}

svAchievementCity.onchange = function (e) {
    // if(e.target.checked == true){
    //     sum_three_item += parseInt(e.target.value)
    // }
    // else{
    //     sum_three_item -= parseInt(e.target.value)
    // }
    if(e.target.value == ''){
        e.target.value = 0
    }  
    svAchievementCity_item = parseInt(e.target.value)

  
    sum_three_value = sum_three_item + svAdvise_item + svIrresponsible_item + svNoCultural_item + svAchievementCity_item + svAchievementSchool_point
    sum_three_value = (sum_three_value < 0) ? 0 : sum_three_value

    sum_three.value = sum_three_value
    sum_all.value = sum_one_value + sum_two_value + sum_three_value + sum_four_value + sum_five_value;

}


svAdvise.onchange = function(e) {
    for(let i = 0; i < e.target.children.length; i++){
        if(e.target.children[i].selected == true){
            svAdvise_item = parseInt(e.target.children[i].value)
            console.log(parseInt(e.target.children[i].value))
        }
    }
  
    sum_three_value = sum_three_item + svAdvise_item + svIrresponsible_item + svNoCultural_item + svAchievementCity_item + svAchievementSchool_point
    sum_three_value = (sum_three_value < 0) ? 0 : sum_three_value
    
    sum_three.value = sum_three_value
    
    sum_all.value = sum_one_value + sum_two_value + sum_three_value + sum_four_value + sum_five_value;

}

svIrresponsible.onchange = function(e) {
    for(let i = 0; i < e.target.children.length; i++){
        if(e.target.children[i].selected == true){
            svIrresponsible_item = parseInt(e.target.children[i].value)
        }
    }
    sum_three_value = sum_three_item + svAdvise_item + svIrresponsible_item + svNoCultural_item + svAchievementCity_item + svAchievementSchool_point
    sum_three_value = (sum_three_value < 0) ? 0 : sum_three_value
    
    sum_three.value = sum_three_value
   
    sum_all.value = sum_one_value + sum_two_value + sum_three_value + sum_four_value + sum_five_value;

}

svNoCultural.onchange = function(e) {
    for(let i = 0; i < e.target.children.length; i++){
        if(e.target.children[i].selected == true){
            svNoCultural_item = parseInt(e.target.children[i].value)
        }
    }
    sum_three_value = sum_three_item + svAdvise_item + svIrresponsible_item + svNoCultural_item + svAchievementCity_item + svAchievementSchool_point
    sum_three_value = (sum_three_value < 0) ? 0 : sum_three_value
    
    sum_three.value = sum_three_value
    
    sum_all.value = sum_one_value + sum_two_value + sum_three_value + sum_four_value + sum_five_value;

}

// Mục 4
svPositiveStudy.onchange = function (e) {
    if(e.target.checked == true){
        sum_four_item += parseInt(e.target.value)
    }
    else{
        sum_four_item -= parseInt(e.target.value)
    }
    sum_four_value = sum_four_item;
    sum_four_value = (sum_four_value < 0) ? 0 : sum_four_value
    sum_four.value = sum_four_value
    sum_all.value = sum_one_value + sum_two_value + sum_three_value + sum_four_value + sum_five_value;

}

svPositiveLove.onchange = function (e) {
    if(e.target.checked == true){
        sum_four_item += parseInt(e.target.value)
    }
    else{
        sum_four_item -= parseInt(e.target.value)
    }
    sum_four_value = sum_four_item;
    sum_four_value = (sum_four_value < 0) ? 0 : sum_four_value
    sum_four.value = sum_four_value
    sum_all.value = sum_one_value + sum_two_value + sum_three_value + sum_four_value + sum_five_value;

}

svWarn.onchange = function (e) {
    if(e.target.checked == true){
        sum_four_item += parseInt(e.target.value)
    }
    else{
        sum_four_item -= parseInt(e.target.value)
    }
    sum_four_value = sum_four_item;
    sum_four_value = (sum_four_value < 0) ? 0 : sum_four_value
    sum_four.value = sum_four_value
    sum_all.value = sum_one_value + sum_two_value + sum_three_value + sum_four_value + sum_five_value;

}

svNoProtect.onchange = function (e) {
    if(e.target.checked == true){
        sum_four_item += parseInt(e.target.value)
    }
    else{
        sum_four_item -= parseInt(e.target.value)
    }
    sum_four_value = sum_four_item;
    sum_four_value = (sum_four_value < 0) ? 0 : sum_four_value
    sum_four.value = sum_four_value
    sum_all.value = sum_one_value + sum_two_value + sum_three_value + sum_four_value + sum_five_value;

}

// Mục 5
for(let i = 0; i < svMonitor.length; i++) {
    svMonitor[i].onchange = function(e) {
        if(e.target.checked == true){
            svMonitor_item = parseInt(e.target.value);
        }
        sum_five_value = sum_five_item +  svMonitor_item + svIrresponsibleMonitor_item;
        sum_five_value = (sum_five_value < 0) ? 0 : sum_five_value
        sum_five.value = sum_five_value;
        sum_all.value = sum_one_value + sum_two_value + sum_three_value + sum_four_value + sum_five_value;
    }
}

svBonus.onchange = function (e) {
    if(e.target.checked == true){
        sum_five_item += parseInt(e.target.value)
    }
    else{
        sum_five_item -= parseInt(e.target.value)
    }
    sum_five_value = sum_five_item +  svMonitor_item + svIrresponsibleMonitor_item;
    sum_five_value = (sum_five_value < 0) ? 0 : sum_five_value
    sum_five.value = sum_five_value;
    sum_all.value = sum_one_value + sum_two_value + sum_three_value + sum_four_value + sum_five_value;

}

svIrresponsibleMonitor.onchange = function(e) {
    for(let i = 0; i < e.target.children.length; i++){
        if(e.target.children[i].selected == true){
            svIrresponsibleMonitor_item = parseInt(e.target.children[i].value)
        }
    }
    sum_five_value = sum_five_item +  svMonitor_item + svIrresponsibleMonitor_item;
    sum_five_value = (sum_five_value < 0) ? 0 : sum_five_value
    sum_five.value = sum_five_value;
    sum_all.value = sum_one_value + sum_two_value + sum_three_value + sum_four_value + sum_five_value;

}


// Xử lý mục 1
// Lấy ra các thẻ trong mục 1
// console.log('ố')
// let gvDiemTBHK = document.querySelectorAll('input[name="gvDiemTBHK"]');
// let gvNCKH1 = document.querySelector('input[name="gvNCKH1"]');
// let gvNCKH2 = document.querySelector('input[name="gvNCKH2"]');
// let gvNCKH3 = document.querySelector('input[name="gvNCKH3"]');
// let gvOlympic1 = document.querySelector('input[name="gvOlympic1"]')
// let gvOlympic2 = document.querySelector('input[name="gvOlympic2"]')
// let gvOlympic3 = document.querySelector('input[name="gvOlympic3"]')
// let gvOlympic4 = document.querySelector('input[name="gvOlympic4"]')
// let gvNoRegulation = document.querySelector('input[name="gvNoRegulation"]')
// let gvOnTime = document.querySelector('input[name="gvOnTime"]')
// let gvAbandon = document.querySelector('input[name="gvAbandon"]')
// let gvUnTrueTime = document.querySelector('#gvUnTrueTime')
let sum_one = document.querySelector('.sum_one')
console.log(sum_one);
let gvDiemTBHK_item = sum_one_item = gvUnTrueTime_item = sum_one_value 
    = gvNCKH1_point = gvNCKH2_point = gvNCKH3_point = gvOlympic1_point 
    = gvOlympic2_point = gvOlympic3_point = gvOlympic4_point = gvAbandon_point = 0
// Mục 2
// let gvRightRule = document.querySelector('input[name="gvRightRule"]')
// let gvCitizen = document.querySelectorAll('input[name="gvCitizen"]')
// let gvNoFullStudy = document.querySelector('input[name="gvNoFullStudy"]')
// let gvNoCard = document.querySelector('#gvNoCard')
// let gvNoAtivities = document.querySelector('#gvNoAtivities')
// let gvNoPayFee = document.querySelector('input[name="gvNoPayFee"]')
let sum_two = document.querySelector('.sum_two')
let gvCitizen_item = gvNoCard_item = gvNoAtivities_item = sum_two_value = sum_two_item = 0

// Mục 3
// let gvFullActive = document.querySelector('input[name="gvFullActive"]')
// let gvAchievementSchool = document.querySelector('input[name="gvAchievementSchool"]')
// let gvAchievementCity = document.querySelector('input[name="gvAchievementCity"]')
// let gvAdvise = document.querySelector('#gvAdvise')
// let gvIrresponsible = document.querySelector('#gvIrresponsible')
// let gvNoCultural = document.querySelector('#gvNoCultural')
let sum_three = document.querySelector('.sum_three')
let gvAdvise_item = gvIrresponsible_item  = gvNoCultural_item = sum_three_item = sum_three_value = gvAchievementSchool_point = gvAchievementCity_item = 0
// let gvIrresponsible_item = 0
// let gvNoCultural_item = 0
// let sum_three_item = 0
// let sum_three_value = 0

// Mục 4
// let gvPositiveStudy = document.querySelector('input[name="gvPositiveStudy"]')
// let gvPositiveLove = document.querySelector('input[name="gvPositiveLove"]')
// let gvWarn = document.querySelector('input[name="gvWarn"]')
// let gvNoProtect = document.querySelector('input[name="gvNoProtect"]')
let sum_four = document.querySelector('.sum_four')
let sum_four_item = 0
let sum_four_value = 0

// Mục 5
// let gvMonitor = document.querySelectorAll('input[name="gvMonitor"]')
// let gvBonus = document.querySelector('input[name="gvBonus"]')
// let gvIrresponsibleMonitor = document.querySelector('#gvIrresponsibleMonitor')
let sum_five = document.querySelector('.sum_five')
let sum_five_item = 0
let gvMonitor_item = 0
let gvIrresponsibleMonitor_item = 0
let sum_five_value = 0

// Tổng
let sum_all = document.querySelector('.sum_mark-student')
sum_all.value = 0

// Mục 1
for(let i = 0; i < gvDiemTBHK.length; i++){
    if(gvDiemTBHK[i].checked == true){
        gvDiemTBHK_item = parseInt(gvDiemTBHK[i].value);
    }
}

// if(gvNCKH1.checked == true){
    gvNCKH1_point = parseInt(gvNCKH1.value)
    // console.log(gvNCKH1_point)
// }
// console.log(gvNCKH1.value)
// gvNCKH1.oninput = function(){
//     console.log(gvNCKH1.value)
// }
// console.log(gvNCKH1.value)


// if(gvNCKH2.checked == true){
    gvNCKH2_point = parseInt(gvNCKH2.value)
// }

// if(gvNCKH3.checked == true){
    gvNCKH3_point = parseInt(gvNCKH3.value)
// }

// if(gvOlympic1.checked == true){
    gvOlympic1_point = parseInt(gvOlympic1.value)
// }

// if(gvOlympic2.checked == true){
    gvOlympic2_point = parseInt(gvOlympic2.value)
// }

// if(gvOlympic3.checked == true){
    gvOlympic3_point = parseInt(gvOlympic3.value)
// }

// if(gvOlympic4.checked == true){
    gvOlympic4_point = parseInt(gvOlympic4.value)
// }

if(gvNoRegulation.checked == true){
    sum_one_item += parseInt(gvNoRegulation.value)
}

if(gvOnTime.checked == true){
    sum_one_item += parseInt(gvOnTime.value)
}

// if(gvAbandon.checked == true){
    // sum_one_item += parseInt(gvAbandon.value)
    gvAbandon_point = parseInt(gvAbandon.value)
// }

for(let i = 0; i < gvUnTrueTime.children.length; i++){
    if(gvUnTrueTime.children[i].selected == true){
        gvUnTrueTime_item = parseInt(gvUnTrueTime.children[i].value)
    }
}

sum_one_value = sum_one_item + gvDiemTBHK_item + gvUnTrueTime_item 
                + gvNCKH1_point + gvNCKH2_point + gvNCKH3_point 
                + gvOlympic1_point + gvOlympic2_point + gvOlympic3_point 
                + gvOlympic4_point + gvAbandon_point

sum_one_value = (sum_one_value < 0) ? 0 : sum_one_value
sum_one.value = sum_one_value;

// Mục 2
if(gvRightRule.checked == true){
    sum_two_item += parseInt(gvRightRule.value)
}

for(let i = 0; i < gvCitizen.length; i++){
    if(gvCitizen[i].checked == true){
        gvCitizen_item = parseInt(gvCitizen[i].value);
    }
}

if(gvNoFullStudy.checked == true){
    sum_two_item += parseInt(gvNoFullStudy.value)
}

for(let i = 0; i < gvNoCard.children.length; i++){
    if(gvNoCard.children[i].selected == true){
        gvNoCard_item = parseInt(gvNoCard.children[i].value)
    }
}

for(let i = 0; i < gvNoAtivities.children.length; i++){
    if(gvNoAtivities.children[i].selected == true){
        gvNoAtivities_item = parseInt(gvNoAtivities.children[i].value)
    }
}

if(gvNoPayFee.checked == true){
    sum_two_item += parseInt(gvNoPayFee.value)
}
sum_two_value =  gvCitizen_item + gvNoCard_item + gvNoAtivities_item + sum_two_item;
sum_two_value = (sum_two_value < 0) ? 0 : sum_two_value
sum_two.value = sum_two_value

// Mục 3
if(gvFullActive.checked){
    sum_three_item += parseInt(gvFullActive.value)
}

// if(gvAchievementSchool.checked){
    gvAchievementSchool_point = parseInt(gvAchievementSchool.value)
// }

// if(gvAchievementCity.checked){
    gvAchievementCity_item = parseInt(gvAchievementCity.value)
// }

for(let i = 0; i < gvAdvise.children.length; i++){
    if(gvAdvise.children[i].selected == true){
        gvAdvise_item = parseInt(gvAdvise.children[i].value)
    }
}

for(let i = 0; i < gvIrresponsible.children.length; i++){
    if(gvIrresponsible.children[i].selected == true){
        gvIrresponsible_item = parseInt(gvIrresponsible.children[i].value)
    }
}

for(let i = 0; i < gvNoCultural.children.length; i++){
    if(gvNoCultural.children[i].selected == true){
        gvNoCultural_item = parseInt(gvNoCultural.children[i].value)
    }
}

sum_three_value = sum_three_item + gvAdvise_item + gvIrresponsible_item + gvNoCultural_item + gvAchievementCity_item + gvAchievementSchool_point
sum_three_value = (sum_three_value < 0) ? 0 : sum_three_value
sum_three.value = sum_three_value

// Mục 4
if(gvPositiveStudy.checked == true){
    sum_four_item += parseInt(gvPositiveStudy.value)
}

if(gvPositiveLove.checked == true){
    sum_four_item += parseInt(gvPositiveLove.value)
}

if(gvWarn.checked == true){
    sum_four_item += parseInt(gvWarn.value)
}

if(gvNoProtect.checked == true){
    sum_four_item += parseInt(gvNoProtect.value)
}

sum_four_value = sum_four_item;
sum_four_value = (sum_four_value < 0) ? 0 : sum_four_value
sum_four.value = sum_four_value

// Mục 5
for(let i = 0; i < gvMonitor.length; i++){
    if(gvMonitor[i].checked == true){
        gvMonitor_item = parseInt(gvMonitor[i].value);
    }
}

if(gvBonus.checked == true){
    sum_five_item += parseInt(gvBonus.value)
}

for(let i = 0; i < gvIrresponsibleMonitor.children.length; i++){
    if(gvIrresponsibleMonitor.children[i].selected == true){
        gvIrresponsibleMonitor_item = parseInt(gvIrresponsibleMonitor.children[i].value)
    }
}

sum_five_value = sum_five_item +  gvMonitor_item + gvIrresponsibleMonitor_item;
sum_five_value = (sum_five_value < 0) ? 0 : sum_five_value
sum_five.value = sum_five_value;

sum_all.value = sum_one_value + sum_two_value + sum_three_value + sum_four_value + sum_five_value;

// Mục 1
for(let i = 0; i < gvDiemTBHK.length; i++) {
    gvDiemTBHK[i].onchange = function(e) {
        if(e.target.checked == true){
            gvDiemTBHK_item = parseInt(e.target.value);
        }

        // sum_one_value = sum_one_item + gvDiemTBHK_item + gvUnTrueTime_item
        sum_one_value = sum_one_item + gvDiemTBHK_item + gvUnTrueTime_item 
                + gvNCKH1_point + gvNCKH2_point + gvNCKH3_point 
                + gvOlympic1_point + gvOlympic2_point + gvOlympic3_point + gvOlympic4_point + gvAbandon_point

        if(sum_one_value < 0){
            sum_one_value = 0;
        }
        sum_one.value = sum_one_value;
        sum_all.value = sum_one_value + sum_two_value + sum_three_value + sum_four_value + sum_five_value;
    }
}


gvNCKH1.onchange = function(e) {
    // if(e.target.checked == true){
    //     sum_one_item += parseInt(e.target.value);
    // }
    // else{
    //     sum_one_item -= parseInt(e.target.value);
    // }
    if(e.target.value == ''){
        e.target.value = 0
    }
    gvNCKH1_point = parseInt(e.target.value);
    
    sum_one_value = sum_one_item + gvDiemTBHK_item + gvUnTrueTime_item 
                + gvNCKH1_point + gvNCKH2_point + gvNCKH3_point 
                + gvOlympic1_point + gvOlympic2_point + gvOlympic3_point + gvOlympic4_point + gvAbandon_point

    // sum_one_value = gvDiemTBHK_item + sum_one_item + gvUnTrueTime_item
    if(sum_one_value < 0){
        sum_one_value = 0;
    }

    sum_one.value = sum_one_value;
    sum_all.value = sum_one_value + sum_two_value + sum_three_value + sum_four_value + sum_five_value;
}

gvNCKH2.onchange = function(e) {
    // if(e.target.checked == true){
    //     sum_one_item += parseInt(e.target.value);
    // }
    // else{
    //     sum_one_item -= parseInt(e.target.value);
    // }
    if(e.target.value == ''){
        e.target.value = 0
    }
    
    gvNCKH2_point = parseInt(e.target.value);


    // sum_one_value = gvDiemTBHK_item + sum_one_item + gvUnTrueTime_item
    sum_one_value = sum_one_item + gvDiemTBHK_item + gvUnTrueTime_item 
                + gvNCKH1_point + gvNCKH2_point + gvNCKH3_point 
                + gvOlympic1_point + gvOlympic2_point + gvOlympic3_point + gvOlympic4_point + gvAbandon_point
    if(sum_one_value < 0){
        sum_one_value = 0;
    }
    sum_one.value = sum_one_value;
    sum_all.value = sum_one_value + sum_two_value + sum_three_value + sum_four_value + sum_five_value;

}

gvNCKH3.onchange = function(e) {
    // if(e.target.checked == true){
    //     sum_one_item += parseInt(e.target.value);
    // }
    // else{
    //     sum_one_item -= parseInt(e.target.value);
    // }
    if(e.target.value == ''){
        e.target.value = 0
    }
    gvNCKH3_point = parseInt(e.target.value);

    
    // sum_one_value = gvDiemTBHK_item + sum_one_item + gvUnTrueTime_item
    sum_one_value = sum_one_item + gvDiemTBHK_item + gvUnTrueTime_item 
                + gvNCKH1_point + gvNCKH2_point + gvNCKH3_point 
                + gvOlympic1_point + gvOlympic2_point + gvOlympic3_point + gvOlympic4_point + gvAbandon_point
    if(sum_one_value < 0){
        sum_one_value = 0;
    }
    sum_one.value = sum_one_value;
    sum_all.value = sum_one_value + sum_two_value + sum_three_value + sum_four_value + sum_five_value;

}

gvOlympic1.onchange = function(e) {
    // if(e.target.checked == true){
    //     sum_one_item += parseInt(e.target.value);
    // }
    // else{
    //     sum_one_item -= parseInt(e.target.value);
    // }
    if(e.target.value == ''){
        e.target.value = 0
    }
    gvOlympic1_point = parseInt(e.target.value);

    
    // sum_one_value = gvDiemTBHK_item + sum_one_item + gvUnTrueTime_item
    sum_one_value = sum_one_item + gvDiemTBHK_item + gvUnTrueTime_item 
                + gvNCKH1_point + gvNCKH2_point + gvNCKH3_point 
                + gvOlympic1_point + gvOlympic2_point + gvOlympic3_point + gvOlympic4_point + gvAbandon_point

    if(sum_one_value < 0){
        sum_one_value = 0;
    }
    sum_one.value = sum_one_value;
    sum_all.value = sum_one_value + sum_two_value + sum_three_value + sum_four_value + sum_five_value;

}

gvOlympic2.onchange = function(e) {
    // if(e.target.checked == true){
    //     sum_one_item += parseInt(e.target.value);
    // }
    // else{
    //     sum_one_item -= parseInt(e.target.value);
    // }
    if(e.target.value == ''){
        e.target.value = 0
    }
    gvOlympic2_point = parseInt(e.target.value);

    
    // sum_one_value = gvDiemTBHK_item + sum_one_item + gvUnTrueTime_item
    sum_one_value = sum_one_item + gvDiemTBHK_item + gvUnTrueTime_item 
                + gvNCKH1_point + gvNCKH2_point + gvNCKH3_point 
                + gvOlympic1_point + gvOlympic2_point + gvOlympic3_point + gvOlympic4_point + gvAbandon_point

    if(sum_one_value < 0){
        sum_one_value = 0;
    }
    sum_one.value = sum_one_value;
    sum_all.value = sum_one_value + sum_two_value + sum_three_value + sum_four_value + sum_five_value;

}

gvOlympic3.onchange = function(e) {
    // if(e.target.checked == true){
    //     sum_one_item += parseInt(e.target.value);
    // }
    // else{
    //     sum_one_item -= parseInt(e.target.value);
    // }
    if(e.target.value == ''){
        e.target.value = 0
    }
    gvOlympic3_point = parseInt(e.target.value);


    // sum_one_value = gvDiemTBHK_item + sum_one_item + gvUnTrueTime_item
    sum_one_value = sum_one_item + gvDiemTBHK_item + gvUnTrueTime_item 
                + gvNCKH1_point + gvNCKH2_point + gvNCKH3_point 
                + gvOlympic1_point + gvOlympic2_point + gvOlympic3_point + gvOlympic4_point + gvAbandon_point

    if(sum_one_value < 0){
        sum_one_value = 0;
    }
    sum_one.value = sum_one_value;
    sum_all.value = sum_one_value + sum_two_value + sum_three_value + sum_four_value + sum_five_value;

}

gvOlympic4.onchange = function(e) {
    // if(e.target.checked == true){
    //     sum_one_item += parseInt(e.target.value);
    // }
    // else{
    //     sum_one_item -= parseInt(e.target.value);
    // }
    if(e.target.value == ''){
        e.target.value = 0
    }   
    gvOlympic4_point = parseInt(e.target.value);
    
    // sum_one_value = gvDiemTBHK_item + sum_one_item + gvUnTrueTime_item
    sum_one_value = sum_one_item + gvDiemTBHK_item + gvUnTrueTime_item 
                + gvNCKH1_point + gvNCKH2_point + gvNCKH3_point 
                + gvOlympic1_point + gvOlympic2_point + gvOlympic3_point + gvOlympic4_point + gvAbandon_point

    if(sum_one_value < 0){
        sum_one_value = 0;
    }
    sum_one.value = sum_one_value;
    sum_all.value = sum_one_value + sum_two_value + sum_three_value + sum_four_value + sum_five_value;

}

gvNoRegulation.onchange = function(e) {
    if(e.target.checked == true){
        sum_one_item += parseInt(e.target.value);
    }
    else{
        sum_one_item -= parseInt(e.target.value);
    }
    
    // sum_one_value = gvDiemTBHK_item + sum_one_item + gvUnTrueTime_item
    sum_one_value = sum_one_item + gvDiemTBHK_item + gvUnTrueTime_item 
                + gvNCKH1_point + gvNCKH2_point + gvNCKH3_point 
                + gvOlympic1_point + gvOlympic2_point + gvOlympic3_point + gvOlympic4_point + gvAbandon_point

    if(sum_one_value < 0){
        sum_one_value = 0;
    }
    sum_one.value = sum_one_value;
    sum_all.value = sum_one_value + sum_two_value + sum_three_value + sum_four_value + sum_five_value;

}

gvOnTime.onchange = function(e) {
    if(e.target.checked == true){
        sum_one_item += parseInt(e.target.value);
    }
    else{
        sum_one_item -= parseInt(e.target.value);
    }

    // sum_one_value = gvDiemTBHK_item + sum_one_item + gvUnTrueTime_item
    sum_one_value = sum_one_item + gvDiemTBHK_item + gvUnTrueTime_item 
                + gvNCKH1_point + gvNCKH2_point + gvNCKH3_point 
                + gvOlympic1_point + gvOlympic2_point + gvOlympic3_point + gvOlympic4_point + gvAbandon_point

    if(sum_one_value < 0){
        sum_one_value = 0;
    }

    sum_one.value = sum_one_value;
    sum_all.value = sum_one_value + sum_two_value + sum_three_value + sum_four_value + sum_five_value;

}

gvAbandon.onchange = function(e) {
    // if(e.target.checked == true){
    //     sum_one_item += parseInt(e.target.value);
    // }
    // else{
    //     sum_one_item -= parseInt(e.target.value);
    // }
    if(e.target.value == ''){
        e.target.value = 0
    }  
    gvAbandon_point = parseInt(e.target.value);
    // sum_one_value = gvDiemTBHK_item + sum_one_item + gvUnTrueTime_item
    sum_one_value = sum_one_item + gvDiemTBHK_item + gvUnTrueTime_item 
                + gvNCKH1_point + gvNCKH2_point + gvNCKH3_point 
                + gvOlympic1_point + gvOlympic2_point + gvOlympic3_point + gvOlympic4_point + gvAbandon_point

    if(sum_one_value < 0){
        sum_one_value = 0;
    }

    sum_one.value = sum_one_value;
    sum_all.value = sum_one_value + sum_two_value + sum_three_value + sum_four_value + sum_five_value;

}

gvUnTrueTime.onchange = function(e){
    let gvUnTrueTimeChildLen = e.target.children
    for(let i = 0; i < gvUnTrueTimeChildLen.length; i++){
        if(gvUnTrueTimeChildLen[i].selected == true){
            gvUnTrueTime_item = parseInt(gvUnTrueTimeChildLen[i].value)
        }
    }
    
    // sum_one_value = gvDiemTBHK_item + sum_one_item + gvUnTrueTime_item
    sum_one_value = sum_one_item + gvDiemTBHK_item + gvUnTrueTime_item 
                + gvNCKH1_point + gvNCKH2_point + gvNCKH3_point 
                + gvOlympic1_point + gvOlympic2_point + gvOlympic3_point + gvOlympic4_point + gvAbandon_point

    if(sum_one_value < 0){
        sum_one_value = 0;
    }
    sum_one.value = sum_one_value;
    sum_all.value = sum_one_value + sum_two_value + sum_three_value + sum_four_value + sum_five_value;

}

// Mục 2
gvRightRule.onchange = function (e) {
    if(e.target.checked == true){
        sum_two_item += parseInt(e.target.value)
    }
    else{
        sum_two_item -= parseInt(e.target.value)
    }
    sum_two_value =  gvCitizen_item + gvNoCard_item + gvNoAtivities_item + sum_two_item;

    sum_two_value = (sum_two_value < 0) ? 0 : sum_two_value
    sum_two.value = sum_two_value
    
    sum_all.value = sum_one_value + sum_two_value + sum_three_value + sum_four_value + sum_five_value;

}

for(let i = 0; i < gvCitizen.length; i++) {
    gvCitizen[i].onchange = function(e) {
        if(e.target.checked == true){
            gvCitizen_item = parseInt(e.target.value);
        }
        sum_two_value =  gvCitizen_item + gvNoCard_item + gvNoAtivities_item + sum_two_item;
        sum_two_value = (sum_two_value < 0) ? 0 : sum_two_value

        sum_two.value = sum_two_value
        
        sum_all.value = sum_one_value + sum_two_value + sum_three_value + sum_four_value + sum_five_value;

    }
}

gvNoFullStudy.onchange = function (e) {
    if(e.target.checked == true){
        sum_two_item += parseInt(e.target.value)
    }
    else{
        sum_two_item -= parseInt(e.target.value)
    }
    sum_two_value =  gvCitizen_item + gvNoCard_item + gvNoAtivities_item + sum_two_item;
    sum_two_value = (sum_two_value < 0) ? 0 : sum_two_value
    sum_two.value = sum_two_value
    
    sum_all.value = sum_one_value + sum_two_value + sum_three_value + sum_four_value + sum_five_value;

}

gvNoCard.onchange = function(e){
    let gvNoCardChildLen = e.target.children
    for(let i = 0; i < gvNoCardChildLen.length; i++){
        if(gvNoCardChildLen[i].selected == true){
            gvNoCard_item = parseInt(gvNoCardChildLen[i].value)
        }
    }
    sum_two_value =  gvCitizen_item + gvNoCard_item + gvNoAtivities_item + sum_two_item;
    sum_two_value = (sum_two_value < 0) ? 0 : sum_two_value
    sum_two.value = sum_two_value
    
    sum_all.value = sum_one_value + sum_two_value + sum_three_value + sum_four_value + sum_five_value;

}

gvNoAtivities.onchange = function(e) {
    for(let i = 0; i < e.target.children.length; i++){
        if(e.target.children[i].selected == true){
            gvNoAtivities_item = parseInt(e.target.children[i].value)
            console.log(gvNoAtivities_item)
        }
    }
    sum_two_value =  gvCitizen_item + gvNoCard_item + gvNoAtivities_item + sum_two_item;
    sum_two_value = (sum_two_value < 0) ? 0 : sum_two_value
    sum_two.value = sum_two_value
    
    sum_all.value = sum_one_value + sum_two_value + sum_three_value + sum_four_value + sum_five_value;

}

gvNoPayFee.onchange = function (e) {
    if(e.target.checked == true){
        sum_two_item += parseInt(e.target.value)
    }
    else{
        sum_two_item -= parseInt(e.target.value)
    }
    sum_two_value =  gvCitizen_item + gvNoCard_item + gvNoAtivities_item + sum_two_item;
    sum_two_value = (sum_two_value < 0) ? 0 : sum_two_value
    sum_two.value = sum_two_value
    
    sum_all.value = sum_one_value + sum_two_value + sum_three_value + sum_four_value + sum_five_value;
}

// Mục 3
gvFullActive.onchange = function (e) {
    if(e.target.checked == true){
        sum_three_item += parseInt(e.target.value)
    }
    else{
        sum_three_item -= parseInt(e.target.value)
    }
  
    sum_three_value = sum_three_item + gvAdvise_item + gvIrresponsible_item + gvNoCultural_item + gvAchievementCity_item + gvAchievementSchool_point

    sum_three_value = (sum_three_value < 0) ? 0 : sum_three_value
    

    sum_three.value = sum_three_value
    
    sum_all.value = sum_one_value + sum_two_value + sum_three_value + sum_four_value + sum_five_value;

}

gvAchievementSchool.onchange = function (e) {
    // if(e.target.checked == true){
    //     sum_three_item += parseInt(e.target.value)
    // }
    // else{
    //     sum_three_item -= parseInt(e.target.value)
    // }
    if(e.target.value == ''){
        e.target.value = 0
    }  
    gvAchievementSchool_point = parseInt(e.target.value)
  
    sum_three_value = sum_three_item + gvAdvise_item + gvIrresponsible_item + gvNoCultural_item + gvAchievementCity_item + gvAchievementSchool_point
    sum_three_value = (sum_three_value < 0) ? 0 : sum_three_value
    
    sum_three.value = sum_three_value
    
    sum_all.value = sum_one_value + sum_two_value + sum_three_value + sum_four_value + sum_five_value;

}

gvAchievementCity.onchange = function (e) {
    // if(e.target.checked == true){
    //     sum_three_item += parseInt(e.target.value)
    // }
    // else{
    //     sum_three_item -= parseInt(e.target.value)
    // }
    if(e.target.value == ''){
        e.target.value = 0
    }  
    gvAchievementCity_item = parseInt(e.target.value)

  
    sum_three_value = sum_three_item + gvAdvise_item + gvIrresponsible_item + gvNoCultural_item + gvAchievementCity_item + gvAchievementSchool_point
    sum_three_value = (sum_three_value < 0) ? 0 : sum_three_value

    sum_three.value = sum_three_value
    sum_all.value = sum_one_value + sum_two_value + sum_three_value + sum_four_value + sum_five_value;

}


gvAdvise.onchange = function(e) {
    for(let i = 0; i < e.target.children.length; i++){
        if(e.target.children[i].selected == true){
            gvAdvise_item = parseInt(e.target.children[i].value)
            console.log(parseInt(e.target.children[i].value))
        }
    }
  
    sum_three_value = sum_three_item + gvAdvise_item + gvIrresponsible_item + gvNoCultural_item + gvAchievementCity_item + gvAchievementSchool_point
    sum_three_value = (sum_three_value < 0) ? 0 : sum_three_value
    
    sum_three.value = sum_three_value
    
    sum_all.value = sum_one_value + sum_two_value + sum_three_value + sum_four_value + sum_five_value;

}

gvIrresponsible.onchange = function(e) {
    for(let i = 0; i < e.target.children.length; i++){
        if(e.target.children[i].selected == true){
            gvIrresponsible_item = parseInt(e.target.children[i].value)
        }
    }
    sum_three_value = sum_three_item + gvAdvise_item + gvIrresponsible_item + gvNoCultural_item + gvAchievementCity_item + gvAchievementSchool_point
    sum_three_value = (sum_three_value < 0) ? 0 : sum_three_value
    
    sum_three.value = sum_three_value
   
    sum_all.value = sum_one_value + sum_two_value + sum_three_value + sum_four_value + sum_five_value;

}

gvNoCultural.onchange = function(e) {
    for(let i = 0; i < e.target.children.length; i++){
        if(e.target.children[i].selected == true){
            gvNoCultural_item = parseInt(e.target.children[i].value)
        }
    }
    sum_three_value = sum_three_item + gvAdvise_item + gvIrresponsible_item + gvNoCultural_item + gvAchievementCity_item + gvAchievementSchool_point
    sum_three_value = (sum_three_value < 0) ? 0 : sum_three_value
    
    sum_three.value = sum_three_value
    
    sum_all.value = sum_one_value + sum_two_value + sum_three_value + sum_four_value + sum_five_value;

}

// Mục 4
gvPositiveStudy.onchange = function (e) {
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

gvPositiveLove.onchange = function (e) {
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

gvWarn.onchange = function (e) {
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

gvNoProtect.onchange = function (e) {
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
for(let i = 0; i < gvMonitor.length; i++) {
    gvMonitor[i].onchange = function(e) {
        if(e.target.checked == true){
            gvMonitor_item = parseInt(e.target.value);
        }
        sum_five_value = sum_five_item +  gvMonitor_item + gvIrresponsibleMonitor_item;
        sum_five_value = (sum_five_value < 0) ? 0 : sum_five_value
        sum_five.value = sum_five_value;
        sum_all.value = sum_one_value + sum_two_value + sum_three_value + sum_four_value + sum_five_value;
    }
}

gvBonus.onchange = function (e) {
    if(e.target.checked == true){
        sum_five_item += parseInt(e.target.value)
    }
    else{
        sum_five_item -= parseInt(e.target.value)
    }
    sum_five_value = sum_five_item +  gvMonitor_item + gvIrresponsibleMonitor_item;
    sum_five_value = (sum_five_value < 0) ? 0 : sum_five_value
    sum_five.value = sum_five_value;
    sum_all.value = sum_one_value + sum_two_value + sum_three_value + sum_four_value + sum_five_value;

}

gvIrresponsibleMonitor.onchange = function(e) {
    for(let i = 0; i < e.target.children.length; i++){
        if(e.target.children[i].selected == true){
            gvIrresponsibleMonitor_item = parseInt(e.target.children[i].value)
        }
    }
    sum_five_value = sum_five_item +  gvMonitor_item + gvIrresponsibleMonitor_item;
    sum_five_value = (sum_five_value < 0) ? 0 : sum_five_value
    sum_five.value = sum_five_value;
    sum_all.value = sum_one_value + sum_two_value + sum_three_value + sum_four_value + sum_five_value;

}


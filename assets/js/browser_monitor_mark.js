// Xử lý mục 1
// Lấy ra các thẻ trong mục 1
// console.log('ố')
// let ltDiemTBHK = document.querySelectorAll('input[name="ltDiemTBHK"]');
// let ltNCKH1 = document.querySelector('input[name="ltNCKH1"]');
// let ltNCKH2 = document.querySelector('input[name="ltNCKH2"]');
// let ltNCKH3 = document.querySelector('input[name="ltNCKH3"]');
// let ltOlympic1 = document.querySelector('input[name="ltOlympic1"]')
// let ltOlympic2 = document.querySelector('input[name="ltOlympic2"]')
// let ltOlympic3 = document.querySelector('input[name="ltOlympic3"]')
// let ltOlympic4 = document.querySelector('input[name="ltOlympic4"]')
// let ltNoRegulation = document.querySelector('input[name="ltNoRegulation"]')
// let ltOnTime = document.querySelector('input[name="ltOnTime"]')
// let ltAbandon = document.querySelector('input[name="ltAbandon"]')
// let ltUnTrueTime = document.querySelector('#ltUnTrueTime')
let sum_one = document.querySelector('.sum_one')
// console.log(sum_one);
let ltDiemTBHK_item = sum_one_item = ltUnTrueTime_item = sum_one_value 
    = ltNCKH1_point = ltNCKH2_point = ltNCKH3_point = ltOlympic1_point 
    = ltOlympic2_point = ltOlympic3_point = ltOlympic4_point = ltAbandon_point = 0
// Mục 2
// let ltRightRule = document.querySelector('input[name="ltRightRule"]')
// let ltCitizen = document.querySelectorAll('input[name="ltCitizen"]')
// let ltNoFullStudy = document.querySelector('input[name="ltNoFullStudy"]')
// let ltNoCard = document.querySelector('#ltNoCard')
// let ltNoAtivities = document.querySelector('#ltNoAtivities')
// let ltNoPayFee = document.querySelector('input[name="ltNoPayFee"]')
let sum_two = document.querySelector('.sum_two')
let ltCitizen_item = ltNoCard_item = ltNoAtivities_item = sum_two_value = sum_two_item = 0

// Mục 3
// let ltFullActive = document.querySelector('input[name="ltFullActive"]')
// let ltAchievementSchool = document.querySelector('input[name="ltAchievementSchool"]')
// let ltAchievementCity = document.querySelector('input[name="ltAchievementCity"]')
// let ltAdvise = document.querySelector('#ltAdvise')
// let ltIrresponsible = document.querySelector('#ltIrresponsible')
// let ltNoCultural = document.querySelector('#ltNoCultural')
let sum_three = document.querySelector('.sum_three')
let ltAdvise_item = ltIrresponsible_item  = ltNoCultural_item = sum_three_item = sum_three_value = ltAchievementSchool_point = ltAchievementCity_item = 0
// let ltIrresponsible_item = 0
// let ltNoCultural_item = 0
// let sum_three_item = 0
// let sum_three_value = 0

// Mục 4
// let ltPositiveStudy = document.querySelector('input[name="ltPositiveStudy"]')
// let ltPositiveLove = document.querySelector('input[name="ltPositiveLove"]')
// let ltWarn = document.querySelector('input[name="ltWarn"]')
// let ltNoProtect = document.querySelector('input[name="ltNoProtect"]')
let sum_four = document.querySelector('.sum_four')
let sum_four_item = 0
let sum_four_value = 0

// Mục 5
// let ltMonitor = document.querySelectorAll('input[name="ltMonitor"]')
// let ltBonus = document.querySelector('input[name="ltBonus"]')
// let ltIrresponsibleMonitor = document.querySelector('#ltIrresponsibleMonitor')
let sum_five = document.querySelector('.sum_five')
let sum_five_item = 0
let ltMonitor_item = 0
let ltIrresponsibleMonitor_item = 0
let sum_five_value = 0

// Tổng
let sum_all = document.querySelector('.sum_mark-student')
sum_all.value = 0

// Mục 1
for(let i = 0; i < ltDiemTBHK.length; i++){
    if(ltDiemTBHK[i].checked == true){
        ltDiemTBHK_item = parseInt(ltDiemTBHK[i].value);
    }
}

// if(ltNCKH1.checked == true){
    ltNCKH1_point = parseInt(ltNCKH1.value)
    // console.log(ltNCKH1_point)
// }
// console.log(ltNCKH1.value)
// ltNCKH1.oninput = function(){
//     console.log(ltNCKH1.value)
// }
// console.log(ltNCKH1.value)


// if(ltNCKH2.checked == true){
    ltNCKH2_point = parseInt(ltNCKH2.value)
// }

// if(ltNCKH3.checked == true){
    ltNCKH3_point = parseInt(ltNCKH3.value)
// }

// if(ltOlympic1.checked == true){
    ltOlympic1_point = parseInt(ltOlympic1.value)
// }

// if(ltOlympic2.checked == true){
    ltOlympic2_point = parseInt(ltOlympic2.value)
// }

// if(ltOlympic3.checked == true){
    ltOlympic3_point = parseInt(ltOlympic3.value)
// }

// if(ltOlympic4.checked == true){
    ltOlympic4_point = parseInt(ltOlympic4.value)
// }

if(ltNoRegulation.checked == true){
    sum_one_item += parseInt(ltNoRegulation.value)
}

if(ltOnTime.checked == true){
    sum_one_item += parseInt(ltOnTime.value)
}

// if(ltAbandon.checked == true){
    // sum_one_item += parseInt(ltAbandon.value)
    ltAbandon_point = parseInt(ltAbandon.value)
// }

for(let i = 0; i < ltUnTrueTime.children.length; i++){
    if(ltUnTrueTime.children[i].selected == true){
        ltUnTrueTime_item = parseInt(ltUnTrueTime.children[i].value)
    }
}

sum_one_value = sum_one_item + ltDiemTBHK_item + ltUnTrueTime_item 
                + ltNCKH1_point + ltNCKH2_point + ltNCKH3_point 
                + ltOlympic1_point + ltOlympic2_point + ltOlympic3_point 
                + ltOlympic4_point + ltAbandon_point

sum_one_value = (sum_one_value < 0) ? 0 : sum_one_value
sum_one.value = sum_one_value;

// Mục 2
if(ltRightRule.checked == true){
    sum_two_item += parseInt(ltRightRule.value)
}

for(let i = 0; i < ltCitizen.length; i++){
    if(ltCitizen[i].checked == true){
        ltCitizen_item = parseInt(ltCitizen[i].value);
    }
}

if(ltNoFullStudy.checked == true){
    sum_two_item += parseInt(ltNoFullStudy.value)
}

for(let i = 0; i < ltNoCard.children.length; i++){
    if(ltNoCard.children[i].selected == true){
        ltNoCard_item = parseInt(ltNoCard.children[i].value)
    }
}

for(let i = 0; i < ltNoAtivities.children.length; i++){
    if(ltNoAtivities.children[i].selected == true){
        ltNoAtivities_item = parseInt(ltNoAtivities.children[i].value)
    }
}

if(ltNoPayFee.checked == true){
    sum_two_item += parseInt(ltNoPayFee.value)
}
sum_two_value =  ltCitizen_item + ltNoCard_item + ltNoAtivities_item + sum_two_item;
sum_two_value = (sum_two_value < 0) ? 0 : sum_two_value
sum_two.value = sum_two_value

// Mục 3
if(ltFullActive.checked){
    sum_three_item += parseInt(ltFullActive.value)
}

// if(ltAchievementSchool.checked){
    ltAchievementSchool_point = parseInt(ltAchievementSchool.value)
// }

// if(ltAchievementCity.checked){
    ltAchievementCity_item = parseInt(ltAchievementCity.value)
// }

for(let i = 0; i < ltAdvise.children.length; i++){
    if(ltAdvise.children[i].selected == true){
        ltAdvise_item = parseInt(ltAdvise.children[i].value)
    }
}

for(let i = 0; i < ltIrresponsible.children.length; i++){
    if(ltIrresponsible.children[i].selected == true){
        ltIrresponsible_item = parseInt(ltIrresponsible.children[i].value)
    }
}

for(let i = 0; i < ltNoCultural.children.length; i++){
    if(ltNoCultural.children[i].selected == true){
        ltNoCultural_item = parseInt(ltNoCultural.children[i].value)
    }
}

sum_three_value = sum_three_item + ltAdvise_item + ltIrresponsible_item + ltNoCultural_item + ltAchievementCity_item + ltAchievementSchool_point
sum_three_value = (sum_three_value < 0) ? 0 : sum_three_value
sum_three.value = sum_three_value

// Mục 4
if(ltPositiveStudy.checked == true){
    sum_four_item += parseInt(ltPositiveStudy.value)
}

if(ltPositiveLove.checked == true){
    sum_four_item += parseInt(ltPositiveLove.value)
}

if(ltWarn.checked == true){
    sum_four_item += parseInt(ltWarn.value)
}

if(ltNoProtect.checked == true){
    sum_four_item += parseInt(ltNoProtect.value)
}

sum_four_value = sum_four_item;
sum_four_value = (sum_four_value < 0) ? 0 : sum_four_value
sum_four.value = sum_four_value

// Mục 5
for(let i = 0; i < ltMonitor.length; i++){
    if(ltMonitor[i].checked == true){
        ltMonitor_item = parseInt(ltMonitor[i].value);
    }
}

if(ltBonus.checked == true){
    sum_five_item += parseInt(ltBonus.value)
}

for(let i = 0; i < ltIrresponsibleMonitor.children.length; i++){
    if(ltIrresponsibleMonitor.children[i].selected == true){
        ltIrresponsibleMonitor_item = parseInt(ltIrresponsibleMonitor.children[i].value)
    }
}

sum_five_value = sum_five_item +  ltMonitor_item + ltIrresponsibleMonitor_item;
sum_five_value = (sum_five_value < 0) ? 0 : sum_five_value
sum_five.value = sum_five_value;

sum_all.value = sum_one_value + sum_two_value + sum_three_value + sum_four_value + sum_five_value;

// Mục 1
for(let i = 0; i < ltDiemTBHK.length; i++) {
    ltDiemTBHK[i].onchange = function(e) {
        if(e.target.checked == true){
            ltDiemTBHK_item = parseInt(e.target.value);
        }

        // sum_one_value = sum_one_item + ltDiemTBHK_item + ltUnTrueTime_item
        sum_one_value = sum_one_item + ltDiemTBHK_item + ltUnTrueTime_item 
                + ltNCKH1_point + ltNCKH2_point + ltNCKH3_point 
                + ltOlympic1_point + ltOlympic2_point + ltOlympic3_point + ltOlympic4_point + ltAbandon_point

        if(sum_one_value < 0){
            sum_one_value = 0;
        }
        sum_one.value = sum_one_value;
        sum_all.value = sum_one_value + sum_two_value + sum_three_value + sum_four_value + sum_five_value;
    }
}


ltNCKH1.onchange = function(e) {
    // if(e.target.checked == true){
    //     sum_one_item += parseInt(e.target.value);
    // }
    // else{
    //     sum_one_item -= parseInt(e.target.value);
    // }
    if(e.target.value == ''){
        e.target.value = 0
    }
    ltNCKH1_point = parseInt(e.target.value);
    
    sum_one_value = sum_one_item + ltDiemTBHK_item + ltUnTrueTime_item 
                + ltNCKH1_point + ltNCKH2_point + ltNCKH3_point 
                + ltOlympic1_point + ltOlympic2_point + ltOlympic3_point + ltOlympic4_point + ltAbandon_point

    // sum_one_value = ltDiemTBHK_item + sum_one_item + ltUnTrueTime_item
    if(sum_one_value < 0){
        sum_one_value = 0;
    }

    sum_one.value = sum_one_value;
    sum_all.value = sum_one_value + sum_two_value + sum_three_value + sum_four_value + sum_five_value;
}

ltNCKH2.onchange = function(e) {
    // if(e.target.checked == true){
    //     sum_one_item += parseInt(e.target.value);
    // }
    // else{
    //     sum_one_item -= parseInt(e.target.value);
    // }
    if(e.target.value == ''){
        e.target.value = 0
    }
    
    ltNCKH2_point = parseInt(e.target.value);


    // sum_one_value = ltDiemTBHK_item + sum_one_item + ltUnTrueTime_item
    sum_one_value = sum_one_item + ltDiemTBHK_item + ltUnTrueTime_item 
                + ltNCKH1_point + ltNCKH2_point + ltNCKH3_point 
                + ltOlympic1_point + ltOlympic2_point + ltOlympic3_point + ltOlympic4_point + ltAbandon_point
    if(sum_one_value < 0){
        sum_one_value = 0;
    }
    sum_one.value = sum_one_value;
    sum_all.value = sum_one_value + sum_two_value + sum_three_value + sum_four_value + sum_five_value;

}

ltNCKH3.onchange = function(e) {
    // if(e.target.checked == true){
    //     sum_one_item += parseInt(e.target.value);
    // }
    // else{
    //     sum_one_item -= parseInt(e.target.value);
    // }
    if(e.target.value == ''){
        e.target.value = 0
    }
    ltNCKH3_point = parseInt(e.target.value);

    
    // sum_one_value = ltDiemTBHK_item + sum_one_item + ltUnTrueTime_item
    sum_one_value = sum_one_item + ltDiemTBHK_item + ltUnTrueTime_item 
                + ltNCKH1_point + ltNCKH2_point + ltNCKH3_point 
                + ltOlympic1_point + ltOlympic2_point + ltOlympic3_point + ltOlympic4_point + ltAbandon_point
    if(sum_one_value < 0){
        sum_one_value = 0;
    }
    sum_one.value = sum_one_value;
    sum_all.value = sum_one_value + sum_two_value + sum_three_value + sum_four_value + sum_five_value;

}

ltOlympic1.onchange = function(e) {
    // if(e.target.checked == true){
    //     sum_one_item += parseInt(e.target.value);
    // }
    // else{
    //     sum_one_item -= parseInt(e.target.value);
    // }
    if(e.target.value == ''){
        e.target.value = 0
    }
    ltOlympic1_point = parseInt(e.target.value);

    
    // sum_one_value = ltDiemTBHK_item + sum_one_item + ltUnTrueTime_item
    sum_one_value = sum_one_item + ltDiemTBHK_item + ltUnTrueTime_item 
                + ltNCKH1_point + ltNCKH2_point + ltNCKH3_point 
                + ltOlympic1_point + ltOlympic2_point + ltOlympic3_point + ltOlympic4_point + ltAbandon_point

    if(sum_one_value < 0){
        sum_one_value = 0;
    }
    sum_one.value = sum_one_value;
    sum_all.value = sum_one_value + sum_two_value + sum_three_value + sum_four_value + sum_five_value;

}

ltOlympic2.onchange = function(e) {
    // if(e.target.checked == true){
    //     sum_one_item += parseInt(e.target.value);
    // }
    // else{
    //     sum_one_item -= parseInt(e.target.value);
    // }
    if(e.target.value == ''){
        e.target.value = 0
    }
    ltOlympic2_point = parseInt(e.target.value);

    
    // sum_one_value = ltDiemTBHK_item + sum_one_item + ltUnTrueTime_item
    sum_one_value = sum_one_item + ltDiemTBHK_item + ltUnTrueTime_item 
                + ltNCKH1_point + ltNCKH2_point + ltNCKH3_point 
                + ltOlympic1_point + ltOlympic2_point + ltOlympic3_point + ltOlympic4_point + ltAbandon_point

    if(sum_one_value < 0){
        sum_one_value = 0;
    }
    sum_one.value = sum_one_value;
    sum_all.value = sum_one_value + sum_two_value + sum_three_value + sum_four_value + sum_five_value;

}

ltOlympic3.onchange = function(e) {
    // if(e.target.checked == true){
    //     sum_one_item += parseInt(e.target.value);
    // }
    // else{
    //     sum_one_item -= parseInt(e.target.value);
    // }
    if(e.target.value == ''){
        e.target.value = 0
    }
    ltOlympic3_point = parseInt(e.target.value);


    // sum_one_value = ltDiemTBHK_item + sum_one_item + ltUnTrueTime_item
    sum_one_value = sum_one_item + ltDiemTBHK_item + ltUnTrueTime_item 
                + ltNCKH1_point + ltNCKH2_point + ltNCKH3_point 
                + ltOlympic1_point + ltOlympic2_point + ltOlympic3_point + ltOlympic4_point + ltAbandon_point

    if(sum_one_value < 0){
        sum_one_value = 0;
    }
    sum_one.value = sum_one_value;
    sum_all.value = sum_one_value + sum_two_value + sum_three_value + sum_four_value + sum_five_value;

}

ltOlympic4.onchange = function(e) {
    // if(e.target.checked == true){
    //     sum_one_item += parseInt(e.target.value);
    // }
    // else{
    //     sum_one_item -= parseInt(e.target.value);
    // }
    if(e.target.value == ''){
        e.target.value = 0
    }   
    ltOlympic4_point = parseInt(e.target.value);
    
    // sum_one_value = ltDiemTBHK_item + sum_one_item + ltUnTrueTime_item
    sum_one_value = sum_one_item + ltDiemTBHK_item + ltUnTrueTime_item 
                + ltNCKH1_point + ltNCKH2_point + ltNCKH3_point 
                + ltOlympic1_point + ltOlympic2_point + ltOlympic3_point + ltOlympic4_point + ltAbandon_point

    if(sum_one_value < 0){
        sum_one_value = 0;
    }
    sum_one.value = sum_one_value;
    sum_all.value = sum_one_value + sum_two_value + sum_three_value + sum_four_value + sum_five_value;

}

ltNoRegulation.onchange = function(e) {
    if(e.target.checked == true){
        sum_one_item += parseInt(e.target.value);
    }
    else{
        sum_one_item -= parseInt(e.target.value);
    }
    
    // sum_one_value = ltDiemTBHK_item + sum_one_item + ltUnTrueTime_item
    sum_one_value = sum_one_item + ltDiemTBHK_item + ltUnTrueTime_item 
                + ltNCKH1_point + ltNCKH2_point + ltNCKH3_point 
                + ltOlympic1_point + ltOlympic2_point + ltOlympic3_point + ltOlympic4_point + ltAbandon_point

    if(sum_one_value < 0){
        sum_one_value = 0;
    }
    sum_one.value = sum_one_value;
    sum_all.value = sum_one_value + sum_two_value + sum_three_value + sum_four_value + sum_five_value;

}

ltOnTime.onchange = function(e) {
    if(e.target.checked == true){
        sum_one_item += parseInt(e.target.value);
    }
    else{
        sum_one_item -= parseInt(e.target.value);
    }

    // sum_one_value = ltDiemTBHK_item + sum_one_item + ltUnTrueTime_item
    sum_one_value = sum_one_item + ltDiemTBHK_item + ltUnTrueTime_item 
                + ltNCKH1_point + ltNCKH2_point + ltNCKH3_point 
                + ltOlympic1_point + ltOlympic2_point + ltOlympic3_point + ltOlympic4_point + ltAbandon_point

    if(sum_one_value < 0){
        sum_one_value = 0;
    }

    sum_one.value = sum_one_value;
    sum_all.value = sum_one_value + sum_two_value + sum_three_value + sum_four_value + sum_five_value;

}

ltAbandon.onchange = function(e) {
    // if(e.target.checked == true){
    //     sum_one_item += parseInt(e.target.value);
    // }
    // else{
    //     sum_one_item -= parseInt(e.target.value);
    // }
    if(e.target.value == ''){
        e.target.value = 0
    }  
    ltAbandon_point = parseInt(e.target.value);
    // sum_one_value = ltDiemTBHK_item + sum_one_item + ltUnTrueTime_item
    sum_one_value = sum_one_item + ltDiemTBHK_item + ltUnTrueTime_item 
                + ltNCKH1_point + ltNCKH2_point + ltNCKH3_point 
                + ltOlympic1_point + ltOlympic2_point + ltOlympic3_point + ltOlympic4_point + ltAbandon_point

    if(sum_one_value < 0){
        sum_one_value = 0;
    }

    sum_one.value = sum_one_value;
    sum_all.value = sum_one_value + sum_two_value + sum_three_value + sum_four_value + sum_five_value;

}

ltUnTrueTime.onchange = function(e){
    let ltUnTrueTimeChildLen = e.target.children
    for(let i = 0; i < ltUnTrueTimeChildLen.length; i++){
        if(ltUnTrueTimeChildLen[i].selected == true){
            ltUnTrueTime_item = parseInt(ltUnTrueTimeChildLen[i].value)
        }
    }
    
    // sum_one_value = ltDiemTBHK_item + sum_one_item + ltUnTrueTime_item
    sum_one_value = sum_one_item + ltDiemTBHK_item + ltUnTrueTime_item 
                + ltNCKH1_point + ltNCKH2_point + ltNCKH3_point 
                + ltOlympic1_point + ltOlympic2_point + ltOlympic3_point + ltOlympic4_point + ltAbandon_point

    if(sum_one_value < 0){
        sum_one_value = 0;
    }
    sum_one.value = sum_one_value;
    sum_all.value = sum_one_value + sum_two_value + sum_three_value + sum_four_value + sum_five_value;

}

// Mục 2
ltRightRule.onchange = function (e) {
    if(e.target.checked == true){
        sum_two_item += parseInt(e.target.value)
    }
    else{
        sum_two_item -= parseInt(e.target.value)
    }
    sum_two_value =  ltCitizen_item + ltNoCard_item + ltNoAtivities_item + sum_two_item;

    sum_two_value = (sum_two_value < 0) ? 0 : sum_two_value
    sum_two.value = sum_two_value
    
    sum_all.value = sum_one_value + sum_two_value + sum_three_value + sum_four_value + sum_five_value;

}

for(let i = 0; i < ltCitizen.length; i++) {
    ltCitizen[i].onchange = function(e) {
        if(e.target.checked == true){
            ltCitizen_item = parseInt(e.target.value);
        }
        sum_two_value =  ltCitizen_item + ltNoCard_item + ltNoAtivities_item + sum_two_item;
        sum_two_value = (sum_two_value < 0) ? 0 : sum_two_value

        sum_two.value = sum_two_value
        
        sum_all.value = sum_one_value + sum_two_value + sum_three_value + sum_four_value + sum_five_value;

    }
}

ltNoFullStudy.onchange = function (e) {
    if(e.target.checked == true){
        sum_two_item += parseInt(e.target.value)
    }
    else{
        sum_two_item -= parseInt(e.target.value)
    }
    sum_two_value =  ltCitizen_item + ltNoCard_item + ltNoAtivities_item + sum_two_item;
    sum_two_value = (sum_two_value < 0) ? 0 : sum_two_value
    sum_two.value = sum_two_value
    
    sum_all.value = sum_one_value + sum_two_value + sum_three_value + sum_four_value + sum_five_value;

}

ltNoCard.onchange = function(e){
    let ltNoCardChildLen = e.target.children
    for(let i = 0; i < ltNoCardChildLen.length; i++){
        if(ltNoCardChildLen[i].selected == true){
            ltNoCard_item = parseInt(ltNoCardChildLen[i].value)
        }
    }
    sum_two_value =  ltCitizen_item + ltNoCard_item + ltNoAtivities_item + sum_two_item;
    sum_two_value = (sum_two_value < 0) ? 0 : sum_two_value
    sum_two.value = sum_two_value
    
    sum_all.value = sum_one_value + sum_two_value + sum_three_value + sum_four_value + sum_five_value;

}

ltNoAtivities.onchange = function(e) {
    for(let i = 0; i < e.target.children.length; i++){
        if(e.target.children[i].selected == true){
            ltNoAtivities_item = parseInt(e.target.children[i].value)
            console.log(ltNoAtivities_item)
        }
    }
    sum_two_value =  ltCitizen_item + ltNoCard_item + ltNoAtivities_item + sum_two_item;
    sum_two_value = (sum_two_value < 0) ? 0 : sum_two_value
    sum_two.value = sum_two_value
    
    sum_all.value = sum_one_value + sum_two_value + sum_three_value + sum_four_value + sum_five_value;

}

ltNoPayFee.onchange = function (e) {
    if(e.target.checked == true){
        sum_two_item += parseInt(e.target.value)
    }
    else{
        sum_two_item -= parseInt(e.target.value)
    }
    sum_two_value =  ltCitizen_item + ltNoCard_item + ltNoAtivities_item + sum_two_item;
    sum_two_value = (sum_two_value < 0) ? 0 : sum_two_value
    sum_two.value = sum_two_value
    
    sum_all.value = sum_one_value + sum_two_value + sum_three_value + sum_four_value + sum_five_value;
}

// Mục 3
ltFullActive.onchange = function (e) {
    if(e.target.checked == true){
        sum_three_item += parseInt(e.target.value)
    }
    else{
        sum_three_item -= parseInt(e.target.value)
    }
  
    sum_three_value = sum_three_item + ltAdvise_item + ltIrresponsible_item + ltNoCultural_item + ltAchievementCity_item + ltAchievementSchool_point

    sum_three_value = (sum_three_value < 0) ? 0 : sum_three_value
    

    sum_three.value = sum_three_value
    
    sum_all.value = sum_one_value + sum_two_value + sum_three_value + sum_four_value + sum_five_value;

}

ltAchievementSchool.onchange = function (e) {
    // if(e.target.checked == true){
    //     sum_three_item += parseInt(e.target.value)
    // }
    // else{
    //     sum_three_item -= parseInt(e.target.value)
    // }
    if(e.target.value == ''){
        e.target.value = 0
    }  
    ltAchievementSchool_point = parseInt(e.target.value)
  
    sum_three_value = sum_three_item + ltAdvise_item + ltIrresponsible_item + ltNoCultural_item + ltAchievementCity_item + ltAchievementSchool_point
    sum_three_value = (sum_three_value < 0) ? 0 : sum_three_value
    
    sum_three.value = sum_three_value
    
    sum_all.value = sum_one_value + sum_two_value + sum_three_value + sum_four_value + sum_five_value;

}

ltAchievementCity.onchange = function (e) {
    // if(e.target.checked == true){
    //     sum_three_item += parseInt(e.target.value)
    // }
    // else{
    //     sum_three_item -= parseInt(e.target.value)
    // }
    if(e.target.value == ''){
        e.target.value = 0
    }  
    ltAchievementCity_item = parseInt(e.target.value)

  
    sum_three_value = sum_three_item + ltAdvise_item + ltIrresponsible_item + ltNoCultural_item + ltAchievementCity_item + ltAchievementSchool_point
    sum_three_value = (sum_three_value < 0) ? 0 : sum_three_value

    sum_three.value = sum_three_value
    sum_all.value = sum_one_value + sum_two_value + sum_three_value + sum_four_value + sum_five_value;

}


ltAdvise.onchange = function(e) {
    for(let i = 0; i < e.target.children.length; i++){
        if(e.target.children[i].selected == true){
            ltAdvise_item = parseInt(e.target.children[i].value)
            console.log(parseInt(e.target.children[i].value))
        }
    }
  
    sum_three_value = sum_three_item + ltAdvise_item + ltIrresponsible_item + ltNoCultural_item + ltAchievementCity_item + ltAchievementSchool_point
    sum_three_value = (sum_three_value < 0) ? 0 : sum_three_value
    
    sum_three.value = sum_three_value
    
    sum_all.value = sum_one_value + sum_two_value + sum_three_value + sum_four_value + sum_five_value;

}

ltIrresponsible.onchange = function(e) {
    for(let i = 0; i < e.target.children.length; i++){
        if(e.target.children[i].selected == true){
            ltIrresponsible_item = parseInt(e.target.children[i].value)
        }
    }
    sum_three_value = sum_three_item + ltAdvise_item + ltIrresponsible_item + ltNoCultural_item + ltAchievementCity_item + ltAchievementSchool_point
    sum_three_value = (sum_three_value < 0) ? 0 : sum_three_value
    
    sum_three.value = sum_three_value
   
    sum_all.value = sum_one_value + sum_two_value + sum_three_value + sum_four_value + sum_five_value;

}

ltNoCultural.onchange = function(e) {
    for(let i = 0; i < e.target.children.length; i++){
        if(e.target.children[i].selected == true){
            ltNoCultural_item = parseInt(e.target.children[i].value)
        }
    }
    sum_three_value = sum_three_item + ltAdvise_item + ltIrresponsible_item + ltNoCultural_item + ltAchievementCity_item + ltAchievementSchool_point
    sum_three_value = (sum_three_value < 0) ? 0 : sum_three_value
    
    sum_three.value = sum_three_value
    
    sum_all.value = sum_one_value + sum_two_value + sum_three_value + sum_four_value + sum_five_value;

}

// Mục 4
ltPositiveStudy.onchange = function (e) {
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

ltPositiveLove.onchange = function (e) {
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

ltWarn.onchange = function (e) {
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

ltNoProtect.onchange = function (e) {
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
for(let i = 0; i < ltMonitor.length; i++) {
    ltMonitor[i].onchange = function(e) {
        if(e.target.checked == true){
            ltMonitor_item = parseInt(e.target.value);
        }
        sum_five_value = sum_five_item +  ltMonitor_item + ltIrresponsibleMonitor_item;
        sum_five_value = (sum_five_value < 0) ? 0 : sum_five_value
        sum_five.value = sum_five_value;
        sum_all.value = sum_one_value + sum_two_value + sum_three_value + sum_four_value + sum_five_value;
    }
}

ltBonus.onchange = function (e) {
    if(e.target.checked == true){
        sum_five_item += parseInt(e.target.value)
    }
    else{
        sum_five_item -= parseInt(e.target.value)
    }
    sum_five_value = sum_five_item +  ltMonitor_item + ltIrresponsibleMonitor_item;
    sum_five_value = (sum_five_value < 0) ? 0 : sum_five_value
    sum_five.value = sum_five_value;
    sum_all.value = sum_one_value + sum_two_value + sum_three_value + sum_four_value + sum_five_value;

}

ltIrresponsibleMonitor.onchange = function(e) {
    for(let i = 0; i < e.target.children.length; i++){
        if(e.target.children[i].selected == true){
            ltIrresponsibleMonitor_item = parseInt(e.target.children[i].value)
        }
    }
    sum_five_value = sum_five_item +  ltMonitor_item + ltIrresponsibleMonitor_item;
    sum_five_value = (sum_five_value < 0) ? 0 : sum_five_value
    sum_five.value = sum_five_value;
    sum_all.value = sum_one_value + sum_two_value + sum_three_value + sum_four_value + sum_five_value;

}


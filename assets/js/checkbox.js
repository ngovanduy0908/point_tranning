var ltDiemTBHKVal = 0; 
var ltCitizenVal = 0;
var ltMonitorVal = 0;

var checkBox = document.querySelector('#checkBox');
// console.log("Yêu em")
// SV
var svDiemTBHK = document.querySelectorAll("input[name='svDiemTBHK']")
for(let i = 0; i < svDiemTBHK.length; i++){
    svDiemTBHK[i].disabled = true; 
}

var svCitizen = document.querySelectorAll("input[name='svCitizen']")
for(let i = 0; i < svCitizen.length; i++){ 
    svCitizen[i].disabled = true;
}

var svMonitor = document.querySelectorAll("input[name='svMonitor']")
for(let i = 0; i < svMonitor.length; i++){
    svMonitor[i].disabled = true;
}

var svUnTrueTime = document.querySelector("#svUnTrueTime")
svUnTrueTime.disabled = true;
var svNoCard = document.querySelector("#svNoCard")
svNoCard.disabled = true;

var svNoAtivities = document.querySelector("#svNoAtivities")
svNoAtivities.disabled = true;

var svAdvise = document.querySelector("#svAdvise")
svAdvise.disabled = true;

var svIrresponsible = document.querySelector("#svIrresponsible")
svIrresponsible.disabled = true;

var svNoCultural  = document.querySelector("#svNoCultural")
svNoCultural.disabled = true;

var svIrresponsibleMonitor = document.querySelector("#svIrresponsibleMonitor")
svIrresponsibleMonitor.disabled = true;


var svNCKH1 = document.querySelector("input[name='svNCKH1']")
svNCKH1.disabled = true;
// console.log(svNCKH1.value)
var svNCKH2 = document.querySelector("input[name='svNCKH2']")
svNCKH2.disabled = true;

var svNCKH3 = document.querySelector("input[name='svNCKH3']")
svNCKH3.disabled = true;

var svOlympic1 = document.querySelector("input[name='svOlympic1']")
svOlympic1.disabled = true;

var svOlympic2 = document.querySelector("input[name='svOlympic2']")
svOlympic2.disabled = true;

var svOlympic3 = document.querySelector("input[name='svOlympic3']")
svOlympic3.disabled = true;

var svOlympic4 = document.querySelector("input[name='svOlympic4']")
svOlympic4.disabled = true;

var svNoRegulation = document.querySelector("input[name='svNoRegulation']")
svNoRegulation.disabled = true;

var svOnTime = document.querySelector("input[name='svOnTime']")
svOnTime.disabled = true;

var svAbandon = document.querySelector("input[name='svAbandon']")
svAbandon.disabled = true;

var svNoFullStudy = document.querySelector("input[name='svNoFullStudy']")
svNoFullStudy.disabled = true;

var svNoPayFee = document.querySelector("input[name='svNoPayFee']")
svNoPayFee.disabled = true;

var svFullActive = document.querySelector("input[name='svFullActive']")
svFullActive.disabled = true;

var svAchievementSchool = document.querySelector("input[name='svAchievementSchool']")
svAchievementSchool.disabled = true;

var svAchievementCity = document.querySelector("input[name='svAchievementCity']")
svAchievementCity.disabled = true;

var svPositiveStudy = document.querySelector("input[name='svPositiveStudy']")
svPositiveStudy.disabled = true;

var svPositiveLove = document.querySelector("input[name='svPositiveLove']")
svPositiveLove.disabled = true;

var svWarn = document.querySelector("input[name='svWarn']")
svWarn.disabled = true;

var svNoProtect = document.querySelector("input[name='svNoProtect']")
svNoProtect.disabled = true;

var svBonus = document.querySelector("input[name='svBonus']")
svBonus.disabled = true;

var svRightRule = document.querySelector("input[name='svRightRule']")
svRightRule.disabled = true;

// LT
var ltDiemTBHK = document.querySelectorAll("input[name='ltDiemTBHK']")
var ltCitizen = document.querySelectorAll("input[name='ltCitizen']")
var ltMonitor = document.querySelectorAll("input[name='ltMonitor']")

var ltUnTrueTime = document.querySelector("#ltUnTrueTime")
var ltNoCard = document.querySelector("#ltNoCard")
var ltNoAtivities = document.querySelector("#ltNoAtivities")
var ltAdvise = document.querySelector("#ltAdvise")
var ltIrresponsible = document.querySelector("#ltIrresponsible")
var ltNoCultural  = document.querySelector("#ltNoCultural")
var ltIrresponsibleMonitor = document.querySelector("#ltIrresponsibleMonitor")

var ltNCKH1 = document.querySelector("input[name='ltNCKH1']")
// console.log(ltNCKH1)
var ltNCKH2 = document.querySelector("input[name='ltNCKH2']")
var ltNCKH3 = document.querySelector("input[name='ltNCKH3']")
var ltOlympic1 = document.querySelector("input[name='ltOlympic1']")
var ltOlympic2 = document.querySelector("input[name='ltOlympic2']")
var ltOlympic3 = document.querySelector("input[name='ltOlympic3']")
var ltOlympic4 = document.querySelector("input[name='ltOlympic4']")
var ltOlympic5 = document.querySelector("input[name='ltOlympic5']")
var ltNoRegulation = document.querySelector("input[name='ltNoRegulation']")
var ltOnTime = document.querySelector("input[name='ltOnTime']")
var ltAbandon = document.querySelector("input[name='ltAbandon']")
var ltNoFullStudy = document.querySelector("input[name='ltNoFullStudy']")
var ltNoPayFee = document.querySelector("input[name='ltNoPayFee']")
var ltFullActive = document.querySelector("input[name='ltFullActive']")
var ltAchievementSchool = document.querySelector("input[name='ltAchievementSchool']")
var ltAchievementCity = document.querySelector("input[name='ltAchievementCity']")  
var ltPositiveStudy = document.querySelector("input[name='ltPositiveStudy']")
var ltPositiveLove = document.querySelector("input[name='ltPositiveLove']")
var ltWarn = document.querySelector("input[name='ltWarn']")
var ltNoProtect = document.querySelector("input[name='ltNoProtect']")
var ltBonus = document.querySelector("input[name='ltBonus']")
var ltRightRule = document.querySelector("input[name='ltRightRule']")

var sum_mark_student = document.querySelector(".sum_mark-student")

// type là radio
for(var i = 0; i < ltDiemTBHK.length; i++){
    if(ltDiemTBHK[i].checked == true){
        ltDiemTBHKVal = parseInt(ltDiemTBHK[i].value);
    }
}


for(var i = 0; i < ltCitizen.length; i++){
    if(ltCitizen[i].checked == true){
        ltCitizenVal = parseInt(ltCitizen[i].value);
    }
}

for(var i = 0; i < ltMonitor.length; i++){
    if(ltMonitor[i].checked == true){
        ltMonitorVal = parseInt(ltMonitor[i].value);
    }
}

var sum_input_radio = ltDiemTBHKVal+ ltCitizenVal + ltMonitorVal;
sum_mark_student.value = sum_input_radio
checkBox.onclick = function() {
   
    var ltUnTrueTimeVal = 0;
    var ltNoCardVal = 0;
    var ltNoAtivitiesVal = 0;
    var ltAdviseVal = 0
    var ltIrresponsibleVal = 0
    var ltNoCulturalVal = 0
    var ltIrresponsibleMonitorVal = 0
    var ltNCKH1Val = 0
    var ltNCKH2Val = 0
    var ltNCKH3Val = 0
    var ltOlympic1Val = 0
    var ltOlympic2Val = 0
    var ltOlympic3Val = 0
    var ltOlympic4Val = 0
    var ltNoRegulationVal = 0
    var ltOnTimeVal = 0
    var ltAbandonVal = 0
    var ltNoFullStudyVal = 0
    var ltNoPayFeeVal = 0
    var ltFullActiveVal = 0
    var ltAchievementSchoolVal = 0
    var ltAchievementCityVal = 0
    var ltAdviseVal = 0 
    var ltPositiveStudyVal = 0 
    var ltPositiveLoveVal = 0 
    var ltWarnVal = 0 
    var ltNoProtectVal = 0 
    var ltBonusVal = 0 
    var ltRightRuleVal = 0 
    if(checkBox.checked == true){
        
        

        // các thẻ select
        for(var i = 0; i<svUnTrueTime.children.length; i++){
            if(svUnTrueTime.children[i].selected == true){
                ltUnTrueTime.children[i].selected = true
                ltUnTrueTimeVal = parseInt(svUnTrueTime.children[i].value)
            }
        }
        for(var i = 0; i<svNoCard.children.length; i++){
            if(svNoCard.children[i].selected == true){
                ltNoCard.children[i].selected = true
                ltNoCardVal = parseInt(svNoCard.children[i].value)

            }
        }
        for(var i = 0; i<svNoAtivities.children.length; i++){
            if(svNoAtivities.children[i].selected == true){
                ltNoAtivities.children[i].selected = true
                ltNoAtivitiesVal = parseInt(svNoAtivities.children[i].value)
            }
        }
        for(var i = 0; i<svAdvise.children.length; i++){
            if(svAdvise.children[i].selected == true){
                ltAdvise.children[i].selected = true
                ltAdviseVal = parseInt(svAdvise.children[i].value)
            }
        }
        for(var i = 0; i<svIrresponsible.children.length; i++){
            if(svIrresponsible.children[i].selected == true){
                ltIrresponsible.children[i].selected = true
                ltIrresponsibleVal = parseInt(svIrresponsible.children[i].value)
            }
        }
        for(var i = 0; i<svNoCultural.children.length; i++){
            if(svNoCultural.children[i].selected == true){
                ltNoCultural.children[i].selected = true
                ltNoCulturalVal = parseInt(svNoCultural.children[i].value)
            }
        }
        for(var i = 0; i<svIrresponsibleMonitor.children.length; i++){
            if(svIrresponsibleMonitor.children[i].selected == true){
                ltIrresponsibleMonitor.children[i].selected = true
                ltIrresponsibleMonitorVal = parseInt(svIrresponsibleMonitor.children[i].value)
            }
        }
       


        // Các thẻ input:checkbox
        // if(svNCKH1.checked == true){
            ltNCKH1.value = svNCKH1.value
            ltNCKH1Val = parseInt(svNCKH1.value)
            // console.log(ltNCKH1Val)
        // }

        // if(svNCKH2.checked == true){
            ltNCKH2.value = svNCKH2.value
            ltNCKH2Val = parseInt(svNCKH2.value)
            // console.log(ltNCKH2Val)

        // }

        // if(svNCKH3.checked == true){
            
            ltNCKH3.value = svNCKH3.value
            ltNCKH3Val = parseInt(svNCKH3.value)
            // console.log(ltNCKH3Val)

        // }

        // if(svOlympic1.checked == true){
            
            ltOlympic1.value = svOlympic1.value
            ltOlympic1Val = parseInt(svOlympic1.value)
        // }

        // if(svOlympic2.checked == true){
            
            ltOlympic2.value = svOlympic2.value
            ltOlympic2Val = parseInt(svOlympic2.value)
        // }

        // if(svOlympic3.checked == true){
            
            ltOlympic3.value = svOlympic3.value
            ltOlympic3Val = parseInt(svOlympic3.value)
        // }

        // if(svOlympic4.checked == true){
            
            ltOlympic4.value = svOlympic4.value
            ltOlympic4Val = parseInt(svOlympic4.value)
        // }

        if(svNoRegulation.checked == true){
            ltNoRegulation.checked = true
            ltNoRegulationVal = parseInt(svNoRegulation.value)
        }
        if(svOnTime.checked == true){
            ltOnTime.checked = true
            ltOnTimeVal = parseInt(svOnTime.value)
        }
        // if(svAbandon.checked == true){
            ltAbandon.value = svAbandon.value
            ltAbandonVal = parseInt(ltAbandon.value)
        // }
            
        
        if(svNoFullStudy.checked == true){
            ltNoFullStudy.checked = true
            ltNoFullStudyVal = parseInt(svNoFullStudy.value)
        }
        
        
        if(svNoPayFee.checked == true){
            ltNoPayFee.checked = true
            ltNoPayFeeVal = parseInt(svNoPayFee.value)
        }

        if(svFullActive.checked == true){
            ltFullActive.checked = true
            ltFullActiveVal = parseInt(svFullActive.value)
        }
        // if(svAchievementSchool.checked == true){
            ltAchievementSchool.value = svAchievementSchool.value
            ltAchievementSchoolVal = parseInt(ltAchievementSchool.value)
        // }
        // if(svAchievementCity.checked == true){
            ltAchievementCity.value = svAchievementCity.value
            ltAchievementCityVal = parseInt(ltAchievementCity.value)
        // }
        if(svAdvise.checked == true){
            ltAdvise.checked = true
            ltAdviseVal = parseInt(svAdvise.value)  
        }

        if(svPositiveStudy.checked == true){
            ltPositiveStudy.checked = true
            ltPositiveStudyVal = parseInt(svPositiveStudy.value)  
        }
        if(svPositiveLove.checked == true){
            ltPositiveLove.checked = true
            ltPositiveLoveVal = parseInt(svPositiveLove.value)  
        }
        if(svWarn.checked == true){
            ltWarn.checked = true
            ltWarnVal = parseInt(svWarn.value)  
        }
        if(svNoProtect.checked == true){
            ltNoProtect.checked = true
            ltNoProtectVal = parseInt(svNoProtect.value)  
        }
        if(svBonus.checked == true){
            ltBonus.checked = true
            ltBonusVal = parseInt(svBonus.value)  
        }
        
        if(svRightRule.checked == true){
            ltRightRule.checked = true
            ltRightRuleVal = parseInt(svRightRule.value)  
        }

       sum_mark_student.value = parseInt(ltUnTrueTimeVal) + parseInt(ltNoCardVal)+ parseInt(ltNoAtivitiesVal)+ parseInt(ltAdviseVal)+ parseInt(ltIrresponsibleVal)+ parseInt(ltNoCulturalVal)+ parseInt(ltIrresponsibleMonitorVal)+ parseInt(ltNCKH1Val)+ parseInt(ltNCKH2Val)+ parseInt(ltNCKH3Val)+ parseInt(ltOlympic1Val)+ parseInt(ltOlympic2Val)+ parseInt(ltOlympic3Val)+ parseInt(ltOlympic4Val)+ parseInt(ltNoRegulationVal)+ parseInt(ltOnTimeVal)+ parseInt(ltAbandonVal)+ parseInt(ltNoFullStudyVal)+ parseInt(ltNoPayFeeVal)+ parseInt(ltFullActiveVal)+ parseInt(ltAchievementSchoolVal)+ parseInt(ltAchievementCityVal)+ parseInt(ltAdviseVal)+ parseInt(ltPositiveStudyVal)+ parseInt(ltPositiveLoveVal)+ parseInt(ltWarnVal)+ parseInt(ltNoProtectVal)+ parseInt(ltBonusVal)+ parseInt(ltRightRuleVal) + parseInt(sum_input_radio);
        
    }else{
        var ltDiemTBHKVal = 0; 
    var ltCitizenVal = 0;
    var ltMonitorVal = 0;
    var ltUnTrueTimeVal = 0;
        var ltNoCardVal = 0;
        var ltNoAtivitiesVal = 0;
        var ltAdviseVal = 0
        var ltIrresponsibleVal = 0
        var ltNoCulturalVal = 0
        var ltIrresponsibleMonitorVal = 0
    var ltNCKH1Val = 0
    var ltNCKH2Val = 0
    var ltNCKH3Val = 0
    var ltOlympic1Val = 0
    var ltOlympic2Val = 0
    var ltOlympic3Val = 0
    var ltOlympic4Val = 0
    var ltNoRegulationVal = 0
    var ltOnTimeVal = 0
    var ltAbandonVal = 0
    var ltNoFullStudyVal = 0
    var ltNoPayFeeVal = 0
    var ltFullActiveVal = 0
    var ltAchievementSchoolVal = 0
    var ltAchievementCityVal = 0
    var ltAdviseVal = 0 
    var ltPositiveStudyVal = 0 
    var ltPositiveLoveVal = 0 
    var ltWarnVal = 0 
    var ltNoProtectVal = 0 
    var ltBonusVal = 0 
    var ltRightRuleVal = 0 
        // for(var i = 0; i < svDiemTBHK.length; i++){
            
        //     ltDiemTBHK[i].checked = false;
            
        // }
        // for(var i = 0; i < svCitizen.length; i++){
            
        //     ltCitizen[i].checked = false;
            
        // }
        // for(var i = 0; i < svMonitor.length; i++){
            
        //     ltMonitor[i].checked = false;
            
        // }

        for(var i = 0; i<svUnTrueTime.children.length; i++){
            
                ltUnTrueTime.children[i].selected = false;
            
        }
        for(var i = 0; i<svNoCard.children.length; i++){
            
                ltNoCard.children[i].selected = false;
            
        }
        for(var i = 0; i<svNoAtivities.children.length; i++){
            
                ltUnTrueTime.children[i].selected = false;
            
        }
        for(var i = 0; i<svAdvise.children.length; i++){
            
                ltAdvise.children[i].selected = false;
            
        }
        for(var i = 0; i<svIrresponsible.children.length; i++){
            
                ltIrresponsible.children[i].selected = false;
            
        }
        for(var i = 0; i<svNoCultural.children.length; i++){
            
                ltNoCultural.children[i].selected = false;
            
        }
        for(var i = 0; i<svIrresponsibleMonitor.children.length; i++){
            
                ltIrresponsibleMonitor.children[i].selected = false;
            
        }

        ltNCKH1.value = 0;
        ltNCKH2.value = 0;
        ltNCKH3.value = 0;
        ltOlympic1.value = 0;
        ltOlympic2.value = 0;
        ltOlympic3.value = 0;
        ltOlympic4.value = 0;
        ltNoRegulation.checked = false;
        ltOnTime.checked = false;
        ltAbandon.value = 0;
        ltNoFullStudy.checked = false;
        ltNoPayFee.checked = false;
        ltFullActive.checked = false;
        ltAchievementSchool.value = 0;
        ltAchievementCity.value = 0;
        ltAdvise.checked = false;
        ltPositiveStudy.checked = false;
        ltPositiveLove.checked = false;
        ltWarn.checked = false;
        ltNoProtect.checked = false;
        ltBonus.checked = false;
        ltRightRule.checked = false;
        sum_mark_student.value = parseInt(ltUnTrueTimeVal) + parseInt(ltNoCardVal)+ parseInt(ltNoAtivitiesVal)+ parseInt(ltAdviseVal)+ parseInt(ltIrresponsibleVal)+ parseInt(ltNoCulturalVal)+ parseInt(ltIrresponsibleMonitorVal)+ parseInt(ltNCKH1Val)+ parseInt(ltNCKH2Val)+ parseInt(ltNCKH3Val)+ parseInt(ltOlympic1Val)+ parseInt(ltOlympic2Val)+ parseInt(ltOlympic3Val)+ parseInt(ltOlympic4Val)+ parseInt(ltNoRegulationVal)+ parseInt(ltOnTimeVal)+ parseInt(ltAbandonVal)+ parseInt(ltNoFullStudyVal)+ parseInt(ltNoPayFeeVal)+ parseInt(ltFullActiveVal)+ parseInt(ltAchievementSchoolVal)+ parseInt(ltAchievementCityVal)+ parseInt(ltAdviseVal)+ parseInt(ltPositiveStudyVal)+ parseInt(ltPositiveLoveVal)+ parseInt(ltWarnVal)+ parseInt(ltNoProtectVal)+ parseInt(ltBonusVal)+ parseInt(ltRightRuleVal) + parseInt(sum_input_radio);
    }
}


// checkBox.onclick = function(e) {
//     if(e.target.checked){
        // $("input[type='checkbox']:checked").not(":disabled").each(function () {
        //     var sThisVal = (this.checked ? $(this).val() : "");
        //     console.log(sThisVal);
        // });
//     }
// }   
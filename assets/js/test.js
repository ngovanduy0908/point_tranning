
var checkBox = document.querySelector('#checkBox');

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
console.log(svNCKH1.value)
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
console.log(ltNCKH1)
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

checkBox.onclick = function() {
    if(checkBox.checked == true){
        // type là radio
        for(var i = 0; i < svDiemTBHK.length; i++){
            if(svDiemTBHK[i].checked == true){
                ltDiemTBHK[i].checked = true
            }
        }

        for(var i = 0; i < svCitizen.length; i++){
            if(svCitizen[i].checked == true){
                ltCitizen[i].checked = true
            }
        }

        for(var i = 0; i < svMonitor.length; i++){
            if(svMonitor[i].checked == true){
                ltMonitor[i].checked = true;
                
            }
        }

        // các thẻ select
        for(var i = 0; i<svUnTrueTime.children.length; i++){
            if(svUnTrueTime.children[i].selected == true){
                ltUnTrueTime.children[i].selected = true
            }
        }
        for(var i = 0; i<svNoCard.children.length; i++){
            if(svNoCard.children[i].selected == true){
                ltNoCard.children[i].selected = true
            }
        }
        for(var i = 0; i<svNoAtivities.children.length; i++){
            if(svNoAtivities.children[i].selected == true){
                ltNoAtivities.children[i].selected = true
            }
        }
        for(var i = 0; i<svAdvise.children.length; i++){
            if(svAdvise.children[i].selected == true){
                ltAdvise.children[i].selected = true
            }
        }
        for(var i = 0; i<svIrresponsible.children.length; i++){
            if(svIrresponsible.children[i].selected == true){
                ltIrresponsible.children[i].selected = true
            }
        }
        for(var i = 0; i<svNoCultural.children.length; i++){
            if(svNoCultural.children[i].selected == true){
                ltNoCultural.children[i].selected = true
            }
        }
        for(var i = 0; i<svIrresponsibleMonitor.children.length; i++){
            if(svIrresponsibleMonitor.children[i].selected == true){
                ltIrresponsibleMonitor.children[i].selected = true
            }
        }

        // Các thẻ input:checkbox
        // if(svNCKH1.checked == true){
            ltNCKH1.value = svNCKH1.value
        // }

        // if(svNCKH2.checked == true){
            ltNCKH2.value = svNCKH2.value
        // }

        // if(svNCKH3.checked == true){
            ltNCKH3.value = svNCKH3.value
        // }

        // if(svOlympic1.checked == true){
            ltOlympic1.value = svOlympic1.value
        // }

        // if(svOlympic2.checked == true){
            ltOlympic2.value = svOlympic2.value
        // }

        // if(svOlympic3.checked == true){
            ltOlympic3.value = svOlympic3.value
        // }

        // if(svOlympic4.checked == true){
            ltOlympic4.value = svOlympic4.value
        // }

        if(svNoRegulation.checked == true){
            ltNoRegulation.checked = true
        }
        if(svOnTime.checked == true){
            ltOnTime.checked = true
        }
        // if(svAbandon.checked == true){
            ltAbandon.value = svAbandon.value
        // }
            
        
        if(svNoFullStudy.checked == true){
            ltNoFullStudy.checked = true
        }
        
        
        if(svNoPayFee.checked == true){
            ltNoPayFee.checked = true
        }

        if(svFullActive.checked == true){
            ltFullActive.checked = true
        }
        // if(svAchievementSchool.checked == true){
            ltAchievementSchool.value = svAchievementSchool.value
        // }
        // if(svAchievementCity.checked == true){
            ltAchievementCity.value = svAchievementCity.value
        // }
        if(svAdvise.checked == true){
            ltAdvise.checked = true
        }

        if(svPositiveStudy.checked == true){
            ltPositiveStudy.checked = true
        }
        if(svPositiveLove.checked == true){
            ltPositiveLove.checked = true
        }
        if(svWarn.checked == true){
            ltWarn.checked = true
        }
        if(svNoProtect.checked == true){
            ltNoProtect.checked = true
        }
        if(svBonus.checked == true){
            ltBonus.checked = true
        }
        
        if(svRightRule.checked == true){
            ltRightRule.checked = true
        }
        
    }else{
        for(var i = 0; i < svDiemTBHK.length; i++){
            
            ltDiemTBHK[i].checked = false;
            
        }
        for(var i = 0; i < svCitizen.length; i++){
            
            ltCitizen[i].checked = false;
            
        }
        for(var i = 0; i < svMonitor.length; i++){
            
            ltMonitor[i].checked = false;
            
        }

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
    }
}


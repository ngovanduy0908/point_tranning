
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
for(let i = 0; i < ltDiemTBHK.length; i++){ 
    ltDiemTBHK[i].disabled = true;
}

var ltCitizen = document.querySelectorAll("input[name='ltCitizen']")
for(let i = 0; i < ltCitizen.length; i++){
    ltCitizen[i].disabled = true;
}

var ltMonitor = document.querySelectorAll("input[name='ltMonitor']")
for(let i = 0; i < ltMonitor.length; i++){
    ltMonitor[i].disabled = true;
}

var ltUnTrueTime = document.querySelector("#ltUnTrueTime")
ltUnTrueTime.disabled = true;

var ltNoCard = document.querySelector("#ltNoCard")
ltNoCard.disabled = true;

var ltNoAtivities = document.querySelector("#ltNoAtivities")
ltNoAtivities.disabled = true;

var ltAdvise = document.querySelector("#ltAdvise")
ltAdvise.disabled = true;

var ltIrresponsible = document.querySelector("#ltIrresponsible")
ltIrresponsible.disabled = true;

var ltNoCultural  = document.querySelector("#ltNoCultural")
ltNoCultural.disabled = true;

var ltIrresponsibleMonitor = document.querySelector("#ltIrresponsibleMonitor")
ltIrresponsibleMonitor.disabled = true;

var ltNCKH1 = document.querySelector("input[name='ltNCKH1']")
ltNCKH1.disabled = true;

var ltNCKH2 = document.querySelector("input[name='ltNCKH2']")
ltNCKH2.disabled = true;

var ltNCKH3 = document.querySelector("input[name='ltNCKH3']")
ltNCKH3.disabled = true;

var ltOlympic1 = document.querySelector("input[name='ltOlympic1']")
ltOlympic1.disabled = true;

var ltOlympic2 = document.querySelector("input[name='ltOlympic2']")
ltOlympic2.disabled = true;

var ltOlympic3 = document.querySelector("input[name='ltOlympic3']")
ltOlympic3.disabled = true;

var ltOlympic4 = document.querySelector("input[name='ltOlympic4']")
ltOlympic4.disabled = true;

var ltNoRegulation = document.querySelector("input[name='ltNoRegulation']")
ltNoRegulation.disabled = true;

var ltOnTime = document.querySelector("input[name='ltOnTime']")
ltOnTime.disabled = true;

var ltAbandon = document.querySelector("input[name='ltAbandon']")
ltAbandon.disabled = true;

var ltNoFullStudy = document.querySelector("input[name='ltNoFullStudy']")
ltNoFullStudy.disabled = true;

var ltNoPayFee = document.querySelector("input[name='ltNoPayFee']")
ltNoPayFee.disabled = true;

var ltFullActive = document.querySelector("input[name='ltFullActive']")
ltFullActive.disabled = true;

var ltAchievementSchool = document.querySelector("input[name='ltAchievementSchool']")
ltAchievementSchool.disabled = true;

var ltAchievementCity = document.querySelector("input[name='ltAchievementCity']")  
ltAchievementCity.disabled = true;

var ltPositiveStudy = document.querySelector("input[name='ltPositiveStudy']")
ltPositiveStudy.disabled = true;

var ltPositiveLove = document.querySelector("input[name='ltPositiveLove']")
ltPositiveLove.disabled = true;

var ltWarn = document.querySelector("input[name='ltWarn']")
ltWarn.disabled = true;

var ltNoProtect = document.querySelector("input[name='ltNoProtect']")
ltNoProtect.disabled = true;

var ltBonus = document.querySelector("input[name='ltBonus']")
ltBonus.disabled = true;

var ltRightRule = document.querySelector("input[name='ltRightRule']")
ltRightRule.disabled = true;

// GV
var gvDiemTBHK = document.querySelectorAll("input[name='gvDiemTBHK']")
var gvCitizen = document.querySelectorAll("input[name='gvCitizen']")
var gvMonitor = document.querySelectorAll("input[name='gvMonitor']")

var gvUnTrueTime = document.querySelector("#gvUnTrueTime")
var gvNoCard = document.querySelector("#gvNoCard")
var gvNoAtivities = document.querySelector("#gvNoAtivities")
var gvAdvise = document.querySelector("#gvAdvise")
var gvIrresponsible = document.querySelector("#gvIrresponsible")
var gvNoCultural  = document.querySelector("#gvNoCultural")
var gvIrresponsibleMonitor = document.querySelector("#gvIrresponsibleMonitor")

var gvNCKH1 = document.querySelector("input[name='gvNCKH1']")
var gvNCKH2 = document.querySelector("input[name='gvNCKH2']")
var gvNCKH3 = document.querySelector("input[name='gvNCKH3']")
var gvOlympic1 = document.querySelector("input[name='gvOlympic1']")
var gvOlympic2 = document.querySelector("input[name='gvOlympic2']")
var gvOlympic3 = document.querySelector("input[name='gvOlympic3']")
var gvOlympic4 = document.querySelector("input[name='gvOlympic4']")
var gvOlympic5 = document.querySelector("input[name='gvOlympic5']")
var gvNoRegulation = document.querySelector("input[name='gvNoRegulation']")
var gvOnTime = document.querySelector("input[name='gvOnTime']")
var gvAbandon = document.querySelector("input[name='gvAbandon']")
var gvNoFullStudy = document.querySelector("input[name='gvNoFullStudy']")
var gvNoPayFee = document.querySelector("input[name='gvNoPayFee']")
var gvFullActive = document.querySelector("input[name='gvFullActive']")
var gvAchievementSchool = document.querySelector("input[name='gvAchievementSchool']")
var gvAchievementCity = document.querySelector("input[name='gvAchievementCity']")  
var gvPositiveStudy = document.querySelector("input[name='gvPositiveStudy']")
var gvPositiveLove = document.querySelector("input[name='gvPositiveLove']")
var gvWarn = document.querySelector("input[name='gvWarn']")
var gvNoProtect = document.querySelector("input[name='gvNoProtect']")
var gvBonus = document.querySelector("input[name='gvBonus']")
var gvRightRule = document.querySelector("input[name='gvRightRule']")



checkBox.onclick = function() {
    if(checkBox.checked == true){
        // type là radio
        for(var i = 0; i < ltDiemTBHK.length; i++){
            if(ltDiemTBHK[i].checked == true){
                gvDiemTBHK[i].checked = true
            }
        }
        for(var i = 0; i < ltCitizen.length; i++){
            if(ltCitizen[i].checked == true){
                gvCitizen[i].checked = true
                
            }
        }
        for(var i = 0; i < ltMonitor.length; i++){
            if(ltMonitor[i].checked == true){
                gvMonitor[i].checked = true;
            }
        }

        // các thẻ select
        for(var i = 0; i<ltUnTrueTime.children.length; i++){
            if(ltUnTrueTime.children[i].selected == true){
                gvUnTrueTime.children[i].selected = true
            }
        }
        for(var i = 0; i<ltNoCard.children.length; i++){
            if(ltNoCard.children[i].selected == true){
                gvNoCard.children[i].selected = true
            }
        }
        for(var i = 0; i<ltNoAtivities.children.length; i++){
            if(ltNoAtivities.children[i].selected == true){
                gvNoAtivities.children[i].selected = true
            }
        }
        for(var i = 0; i<ltAdvise.children.length; i++){
            if(ltAdvise.children[i].selected == true){
                gvAdvise.children[i].selected = true
            }
        }
        for(var i = 0; i<ltIrresponsible.children.length; i++){
            if(ltIrresponsible.children[i].selected == true){
                gvIrresponsible.children[i].selected = true
            }
        }
        for(var i = 0; i<ltNoCultural.children.length; i++){
            if(ltNoCultural.children[i].selected == true){
                gvNoCultural.children[i].selected = true
            }
        }
        for(var i = 0; i<ltIrresponsibleMonitor.children.length; i++){
            if(ltIrresponsibleMonitor.children[i].selected == true){
                gvIrresponsibleMonitor.children[i].selected = true
            }
        }

        // Các thẻ input:checkbox
        // if(ltNCKH1.checked == true){
            gvNCKH1.value = ltNCKH1.value
        // }
        // if(ltNCKH2.checked == true){
            gvNCKH2.value = ltNCKH2.value
        // }
        // if(ltNCKH3.checked == true){
            gvNCKH3.value = ltNCKH3.value
        // }
        // if(ltOlympic1.checked == true){
            gvOlympic1.value = ltOlympic1.value
        // }
        // if(ltOlympic2.checked == true){
            gvOlympic2.value = ltOlympic2.value
        // }
        // if(ltOlympic3.checked == true){
            gvOlympic3.value = ltOlympic3.value
        // }
        // if(ltOlympic4.checked == true){
            gvOlympic4.value = ltOlympic4.value
        // }
        if(ltNoRegulation.checked == true){
            gvNoRegulation.checked = true
        }
        if(ltOnTime.checked == true){
            gvOnTime.checked = true
        }
        // if(ltAbandon.checked == true){
            gvAbandon.value = ltAbandon.value
        // }
            
        
        if(ltNoFullStudy.checked == true){
            gvNoFullStudy.checked = true
        }
        
        
        if(ltNoPayFee.checked == true){
            gvNoPayFee.checked = true
        }

        if(ltFullActive.checked == true){
            gvFullActive.checked = true
        }
        // if(ltAchievementSchool.checked == true){
            gvAchievementSchool.value = ltAchievementSchool.value
        // }
        // if(ltAchievementCity.checked == true){
            gvAchievementCity.value = ltAchievementCity.value
        // }
        if(ltAdvise.checked == true){
            gvAdvise.checked = true
        }
        
        

        if(ltPositiveStudy.checked == true){
            gvPositiveStudy.checked = true
        }
        if(ltPositiveLove.checked == true){
            gvPositiveLove.checked = true
        }
        if(ltWarn.checked == true){
            gvWarn.checked = true
        }
        if(ltNoProtect.checked == true){
            gvNoProtect.checked = true
        }
        if(ltBonus.checked == true){
            gvBonus.checked = true
        }
        
        if(ltRightRule.checked == true){
            gvRightRule.checked = true
        }

       
        

        
    }else{
        for(var i = 0; i < ltDiemTBHK.length; i++){
            
            gvDiemTBHK[i].checked = false;
            
        }
        for(var i = 0; i < ltCitizen.length; i++){
            
            gvCitizen[i].checked = false;
            
        }
        for(var i = 0; i < ltMonitor.length; i++){
            
            gvMonitor[i].checked = false;
            
        }

        for(var i = 0; i<ltUnTrueTime.children.length; i++){
            
                gvUnTrueTime.children[i].selected = false;
            
        }
        for(var i = 0; i<ltNoCard.children.length; i++){
            
                gvNoCard.children[i].selected = false;
            
        }
        for(var i = 0; i<ltNoAtivities.children.length; i++){
            
                gvUnTrueTime.children[i].selected = false;
            
        }
        for(var i = 0; i<ltAdvise.children.length; i++){
            
                gvAdvise.children[i].selected = false;
            
        }
        for(var i = 0; i<ltIrresponsible.children.length; i++){
            
                gvIrresponsible.children[i].selected = false;
            
        }
        for(var i = 0; i<ltNoCultural.children.length; i++){
            
                gvNoCultural.children[i].selected = false;
            
        }
        for(var i = 0; i<ltIrresponsibleMonitor.children.length; i++){
            
                gvIrresponsibleMonitor.children[i].selected = false;
            
        }

        gvNCKH1.value = 0;
        gvNCKH2.value = 0;
        gvNCKH3.value = 0;
        gvOlympic1.value = 0;
        gvOlympic2.value = 0;
        gvOlympic3.value = 0;
        gvOlympic4.value = 0;
        gvNoRegulation.checked = false;
        gvOnTime.checked = false;
        gvAbandon.value = 0;
        gvNoFullStudy.checked = false;
        gvNoPayFee.checked = false;
        gvFullActive.checked = false;
        gvAchievementSchool.value = 0;
        gvAchievementCity.value = 0;
        gvAdvise.checked = false;
        gvPositiveStudy.checked = false;
        gvPositiveLove.checked = false;
        gvWarn.checked = false;
        gvNoProtect.checked = false;
        gvBonus.checked = false;
        gvRightRule.checked = false;
    }
}
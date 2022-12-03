function showUprice(){
    calculate();
    var uprice=document.getElementById("uprice");
    var str="";
    uprice.className="wrong";
    var flag=false;
    if (isNull(uprice)){
        str="<font color='red'><strong>Haven't filled in</strong></font>";

    }else if(!isRegex(uprice,/^\d+(\.\d{1,2})?$/)){
        str="<font color= 'red'><strong>Keep up to two decimals</strong></font>";

    }else{
        str="<font color='green'><strong>Valid</strong></font>";
        uprice.className="right";
        flag=true;
    }
    var upriceMsg=document.getElementById("upriceMsg");
    upriceMsg.innerHTML=str;
    return flag;
}

function showArea(){
    calculate();
    var area=document.getElementById("area");
    var str="";
    var flag=false;
    area.className="wrong";
    if (isNull(area)){
        str="<font color='red'><strong>Haven't filled in</strong></font>";

    }else if(!isRegex(area,/^\d+(\.\d{1,4})?$/)){
        str="<font color= 'red'><strong>Keep up to four decimals</strong></font>";

    }else{
        str="<font color='green'><strong>Valid</strong></font>";
        area.className="right";
        flag=true;
    }
    var areaMsg=document.getElementById("areaMsg");
    areaMsg.innerHTML=str;
    return flag;
}

function showDpayr() {
    calculate();
    var dpayr=document.getElementById("dpayr");
    var str="";
    var flag=false;
    dpayr.className="wrong";
    if (isNull(dpayr)){
        str="<font color='red'><strong>Haven't filled in</strong></font>";

    }else if(!isRegex(dpayr,/^\d+(\.\d{1,4})?$/)){
        str="<font color= 'red'><strong>Keep up to four decimals</strong></font>";

    }else if(text2number(dpayr)>100){
        str="<font color= 'red'><strong>Down payment ratio<=100%</strong></font>";

    }else{
        str="<font color='green'><strong>Valid</strong></font>";
        dpayr.className="right";
        flag=true;
    }

    var dpayrMsg=document.getElementById("dpayrMsg");
    dpayrMsg.innerHTML=str;
    return flag;
}

function showAmort(){
    calculate();
    var amort=document.getElementById("amort");
    var str="";
    var flag=false;
    amort.className="wrong";
    if (isNull(amort)){
        str="<font color='red'><strong>Haven't selected</strong></font>";
    }else{
        str="<font color='green'><strong>Valid</strong></font>";
        amort.className="right";
        flag=true;
    }
    var amortMsg=document.getElementById("amortMsg");
    amortMsg.innerHTML=str;
    return flag;
}

function changeInr(){
    calculate();
    var amort=document.getElementById("amort");
    var inr=document.getElementById("inr");
    if (!isNull(amort)){
        if(amort.value=="10"){
            inr.value="1.990";
        }else if(amort.value=="15"){
            inr.value="2.250";
        }else if(amort.value=="20"){
            inr.value="2.875";
        }else if(amort.value=="30"){
            inr.value="3.125";
        }
    }
}
function showInr(){
    calculate();
    var inr=document.getElementById("inr");
    var str="";
    var flag=false;
    inr.className="wrong";
    if (isNull(inr)){
        str="<font color='red'><strong>Haven't filled in</strong></font>";

    }else if(!isRegex(inr,/^\d+(\.\d{1,4})?$/)){
        str="<font color= 'red'><strong>Keep up to four decimals</strong></font>";

    }else{
        str="<font color='green'><strong>Valid</strong></font>";
        inr.className="right";
        flag=true;
    }

    var inrMsg=document.getElementById("inrMsg");
    inrMsg.innerHTML=str;
    return flag;
}


function showCommr(){
    calculate();
    var commr=document.getElementById("commr");
    var str="";
    var flag=false;
    commr.className="wrong";
    if (isNull(commr)){
        str="<font color='red'><strong>Haven't filled in</strong></font>";

    }else if(!isRegex(commr,/^\d+(\.\d{1,4})?$/)){
        str="<font color= 'red'><strong>Keep up to four decimals</strong></font>";

    }else{
        str="<font color='green'><strong>Valid</strong></font>";
        commr.className="right";
        flag=true;
    }

    var commrMsg=document.getElementById("commrMsg");
    commrMsg.innerHTML=str;
    return flag;
}

function calculate(){

    var uprice=text2number(document.getElementById("uprice"));
    var area=text2number(document.getElementById("area"));
    var amort=text2number(document.getElementById("amort"));
    var dpayr=text2number(document.getElementById("dpayr"))/100;
    var inr=text2number(document.getElementById("inr"))/100;
    var commr=text2number(document.getElementById("commr"))/100;

    var dpay,comm,hprice,mapy,tin,tpay;

    if(!isNull(uprice)&&!isNull(area)&&!isNull(dpayr)){
        dpay = round(uprice * area * dpayr,2);
        if(isNaN(dpay)){
            dpay="<font color='red'><strong>Unable to calculate</strong></font>";
        }
        var dpayMsg=document.getElementById("dpayMsg");
        dpayMsg.innerHTML="<strong>R&nbsp;"+dpay+"</strong>";
    }
    if(!isNull(uprice)&&!isNull(area)&&!isNull(commr)){
        comm = round(uprice * area * commr,2);
        if(isNaN(comm)){
            comm="<font color='red'><strong>Unable to calculate</strong></font>";
        }
        var commMsg=document.getElementById("commMsg");
        commMsg.innerHTML="<strong>R&nbsp;"+comm+"</strong>";
    }
    if(!isNull(uprice)&&!isNull(area)){
        hprice = round(uprice * area,2) ;
        if(isNaN(hprice)){
            hprice="<font color='red'><strong>Unable to calculate</strong></font>";
        }
        var hpriceMsg=document.getElementById("hpriceMsg");
        hpriceMsg.innerHTML="<strong>R&nbsp;"+hprice+"</strong>";
    }
    if(!isNull(uprice)&&!isNull(area)&&!isNull(dpayr)&&!isNull(inr)&&!isNull(amort)){
        mpay = round((uprice * area) * (1 - dpayr) * (1 + inr) / (12 * amort),2);
        if(isNaN(mpay)){
            mpay="<font color='red'><strong>Unable to calculate</strong></font>";
        }
        var mpayMsg=document.getElementById("mpayMsg");
        mpayMsg.innerHTML="<strong>R&nbsp;"+mpay+"</strong>";
    }
    if(!isNull(uprice)&&!isNull(area)&&!isNull(dpayr)&&!isNull(inr)&&!isNull(amort)){
        tin = round((uprice * area) * (1 - dpayr) * inr * amort,2);
        if(isNaN(tin)){
            tin="<font color='red'><strong>Unable to calculate</strong></font>";
        }
        var tinMsg=document.getElementById("tinMsg");
        tinMsg.innerHTML="<strong>R&nbsp;"+tin+"</strong>";
    }
    if(!isNull(uprice)&&!isNull(area)&&!isNull(commr)&&!isNull(inr)&&!isNull(amort)){
        tpay = round((uprice * area) * (1 + commr + amort * inr),2);
        if(isNaN(tpay)){
            tpay="<font color='red'><strong>Unable to calculate</strong></font>";
        }
        var tpayMsg=document.getElementById("tpayMsg");
        tpayMsg.innerHTML="<strong>R&nbsp;"+tpay+"</strong>";
    }
}

function relocate(url){
    window.location=url;
}

function closeWindow(){
    var confirm=window.confirm("Continue to exit?");
    if(confirm){
        window.close();
    }
}
window.onload=function(){
    calculate();
    function setClock(){
        var date=new Date();
        var time=document.getElementById("time");
        time.innerHTML="<font color='#00008b'>"+date+"</font>";
        setTimeout(setClock,1000);
    }
    setClock();
}
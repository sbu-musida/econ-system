function isNull(element){
    return element.value=="";
}
function isNaN(val){
    return Number.isNaN(val);
}
function isRegex(element,regex){
    return regex.test(element.value);
}

function text2number(element){
    return parseFloat(element.value);
}

function validateAll(){
    return showUprice()&&showArea()&&showAmort()&&showDpayr()&&showInr()&&showCommr();
}

function round(val,dec){
    return Math.round(val*Math.pow(10,dec))/Math.pow(10,dec);
}

function mouseIn(element){
    element.bgColor="aliceblue";
}
function mouseOut(element){
    element.bgColor="lightgray";
}
let context = "/james-carrillo/";
let context_path = window.location.pathname;
let menu_item = context_path.substring(context.length,context_path.length);
if(menu_item === "" || menu_item === "index"){
    console.log(".:RedPOS:.");
}else{
    location.href = context+"index";
}



function getProducts() {
    $.ajax({
        url: "http://localhost/ProjectSchool/api/index.php",
        method: "GET",
        success: function (res) {
            draw(JSON.parse(res));
        },
        error: function (res) {
            alert(JSON.stringify(res));
        }

    })
}
function get_students() {
    $.ajax({
        url: "http://localhost/ProjectSchool/api/index.php?controller=products&action=students",
        method: "GET",
        success: function (res) {
            draws(JSON.parse(res));
        },
        error: function (res) {
            alert(JSON.stringify(res));
        }

    })
}


//how to connect this and the form
function addProducts() {
    $.ajax({
        url: "http://localhost/ProjectSchool/api/index.php?controller=products&action=add",
        method: "POST",
        success: function (res) {
            draw(JSON.parse(res));
        },
        error: function (res) {
            alert(JSON.stringify(res));
        }

    })
}


function delProducts() {
    $.ajax({
        url: "http://localhost/ProjectSchool/api/index.php?controller=products&action=delete",
        method: "POST",
        success: function (res) {
            draw(JSON.parse(res));
        },
        error: function (res) {
            alert(JSON.stringify(res));
        }

    })
}


var DOM = {}; //courselist
var DOMi = {}; //studentlist
function init() {
    getProducts();
    get_students();

    DOM.productsList = document.getElementById("mainu");
    DOMi.productsList = document.getElementById("mainustu");

}


function draw(products) {
    for (let index = 0; index < products.length; index++) {
        DOM.productsList.appendChild(ProductCard(products[index]));
    }
}

function ProductCard(p) {
    var card = document.getElementsByName("template")[0].cloneNode(true);
    card.id = p.id;
    card.style.display = "block";

    card.querySelector("#title").innerHTML = p.courseName;
    // card.querySelector("#price").innerHTML = "description:" + p.description;
    
    return card;
}


//this one is the draw for students list
function draws(products) {
    for (let index = 0; index < products.length; index++) {
        DOMi.productsList.appendChild(ProductCards(products[index]));
    }
}

function ProductCards(p) {
    var card = document.getElementsByName("template")[0].cloneNode(true);
    card.id = p.id;
    card.style.display = "block";

    card.querySelector("#title").innerHTML = p.userName;
    // card.querySelector("#price").innerHTML = "description:" + p.description;
    
    return card;
}



function additem(){
    
var mainbox = document.getElementById("maincon")
var addbox = document.getElementById("additem")

 mainbox.innerHTML = addbox.innerHTML;
 
}


init();



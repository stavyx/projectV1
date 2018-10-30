


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


//adds a new course 
function add() {
    var name = document.getElementById("name")
    var description = document.getElementById("description")
    var image = document.getElementById("image")
    console.log(description.value)
    $.ajax({
        url: "http://localhost/ProjectSchool/api/index.php?controller=products&action=add",
        method: "POST",
        data: { name: name.value, description: description.value, image: image.value },
        success: function (res) {
            console.log(res) // gets us id
            draw(JSON.parse(res));
            //need to send the id and top print by id
            //need to do more ajax to draw by id
            //make an ajax of select all from course where id = id from  res
        },
        error: function (res) {
            alert(JSON.stringify(res));
        }

    })
}




//adds a new student
function addstud() {
    var name = document.getElementById("name")
    var password = document.getElementById("password")
    var email = document.getElementById("email")
    console.log(password.value)
    $.ajax({
        url: "http://localhost/ProjectSchool/api/index.php?controller=products&action=addstu",
        method: "POST",
        data: { name: name.value, password: password.value, email: email.value },
        success: function (res) {
            console.log(res) // gets us id
            draw(JSON.parse(res));
            //need to send the id and top print by id
            //need to do more ajax to draw by id
            //make an ajax of select all from course where id = id from  res
        },
        error: function (res) {
            alert(JSON.stringify(res));
        }

    })
}



function delProducts(id, callback) {
    $.ajax({
        url: "http://localhost/ProjectSchool/api/index.php?controller=products&action=delete",
        method: "POST",
        data: {
            'id': id
        },
        success: function (res) {
            console.log(res);

        },
        error: function (res) {

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
    //card.querySelector("#price").innerHTML = "description:" + p.description;

    return card;
}



function additem() {

    var mainbox = document.getElementById("maincon")
    var addbox = document.getElementById("additem")

    mainbox.innerHTML = addbox.innerHTML;

}


function addstu() {

    var mainbox = document.getElementById("maincon")
    var addboxstu = document.getElementById("addstu")

    mainbox.innerHTML = addboxstu.innerHTML;

}




function info() {

    var mainbox = document.getElementById("maincon")
    var infobox = document.getElementById("information")
    



    mainbox.innerHTML = infobox.innerHTML;

}



// function delProducts(){

// }

init();



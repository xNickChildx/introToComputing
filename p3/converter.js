var report = function (age) {
	 if(isNaN(age)) throw "not a number";
	 else{
    document.getElementById("Mercury").innerHTML =
       "Your age on Mercury: " + (age*365/88).toFixed(2);
       document.getElementById("Venus").innerHTML =
       "Your age on Venus: " + (age*365/225).toFixed(2);
       document.getElementById("Earth").innerHTML =
       "Your age on Earth: " + age;
       document.getElementById("Mars").innerHTML =
       "Your age on Mars: " + (age*365/687).toFixed(2);
       document.getElementById("Jupiter").innerHTML =
       "Your age on Jupiter: " + (age/12).toFixed(2);
       document.getElementById("Saturn").innerHTML =
       "Your age on Saturn: " + (age/29.5).toFixed(2);
       document.getElementById("Uranus").innerHTML =
       "Your age on Uranus: " + (age/84).toFixed(2);
       document.getElementById("Neptune").innerHTML =
       "Your age on Neptune: " + (age/165).toFixed(2);
       document.getElementById("Pluto").innerHTML =
       "Your age on Pluto: " + (age/248).toFixed(2);
   }
};

document.getElementById("Calc").onclick = function () {
    var age = document.getElementById("Age").value;
    report(age);
};


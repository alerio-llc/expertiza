function setCurDay (){
  // массив названий месяцев
  var monts = new Array ("января", "февраля","марта", "апреля", "мая", "июня","июля", "августа","сентября", "октября","ноября","декабря");
  //массив названий дней
  var days= new Array ("воскресенье", "понедельник", "вторник", "среда", "четверг","пятница", "суббота");
  
  var curdate=document.getElementById("RealTimer");
  var t = new Date ();
  var nDay = t.getDate ();
  var sMonth = monts[ t.getMonth()];
  var nYear = t.getFullYear ();
 
  var sDay = days[ t.getDay () ];
  var nHours = t.getHours ();
  if(nHours<10) nHours = "0" + nHours;
  var nMinutes = t.getMinutes ();
  if(nMinutes<10) nMinutes = "0" + nMinutes;
  if(curdate!=null) curdate.innerHTML=nDay + " " + sMonth + " " + nYear + ", " + sDay + " " + nHours+ ":" +nMinutes;	  
}
  
$(document).ready(function() {
	setInterval(setCurDay,1000);
});
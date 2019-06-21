function fsfunction()
{
var dt;
	 dt=new Date();
	 dt.setMinutes(dt.getMinutes()+10);

// Set the date we're counting down to
var countDownDate = dt.getTime();
//alert(dt);
document.cookie="countname=" + countDownDate+";"+"expires=" + dt+";";
//alert("hai");
}



function disp1()
{
	alert("jack");
}
function disp()
{
				var allcookies = decodeURIComponent(document.cookie);
				document.write ("All Cookies : " + allcookies );

               // Get all the cookies pairs in an array
				cookiearray = allcookies.split(';');

               // Now take key value pair out of this array
				for(var i=0; i<cookiearray.length; i++)
				{
                  name = cookiearray[i].split('=')[0];
                  value = cookiearray[i].split('=')[1];
                  document.write ("Key is : " + name + " and Value is : " + value);
				}
				//alert("hai all"+cookiearray.length);

}

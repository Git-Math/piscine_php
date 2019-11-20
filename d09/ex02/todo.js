function setCookie(sName, sValue)
{
	var today = new Date(), expires = new Date();
	expires.setTime(today.getTime() + (365*24*60*60*1000));
	document.cookie = sName + "=" + encodeURIComponent(sValue) + ";expires=" + expires.toGMTString();
}
function getCookie(sName)
{
	var cookContent = document.cookie, cookEnd, i, j;
	var sName = sName + "=";

	for (i=0, c=cookContent.length; i<c; i++) {
		j = i + sName.length;
		if (cookContent.substring(i, j) == sName) {
			cookEnd = cookContent.indexOf(";", j);
			if (cookEnd == -1) {
				cookEnd = cookContent.length;
			}
			return decodeURIComponent(cookContent.substring(j, cookEnd));
		}
	}
	return null;
}

function Static()
{
    if ( typeof this.counter == 'undefined' ) this.counter = 1;
    this.counter++;
    return (this.counter - 1);
}

setTimeout(function(){
		var j = 1;
		var save;
		if ((save = getCookie(0)) != null)
		{
			while (j <= save)
			{
				Unlimitedcookie(getCookie(j));
				Static();
				j++;
			}

		}
	}, 0);

function Unlimitedcookie(name)
{
    var list = document.getElementById("ft_list");
    var div = document.createElement("div");
    div.innerHTML = name;
    div.onclick = function ()
    {
        if (confirm("Tu veux vraiment le delete :'("))
        {
            var list = document.getElementById("ft_list");
            list.removeChild(div);
        }
    };
    list.insertBefore(div,list.firstChild);
}

function unlimited()
{
    var n = prompt("Nouveau todo?");
    var list = document.getElementById("ft_list");
    var div = document.createElement("div");
    var i = Static();
    div.innerHTML = n;
    setCookie(i, n);
    setCookie(0, i);
    div.onclick = function ()
    {
        if (confirm("Tu veux vraiment le delete :'("))
        {
            var list = document.getElementById("ft_list");
            list.removeChild(div);
        }
    };
    list.insertBefore(div,list.firstChild);
}
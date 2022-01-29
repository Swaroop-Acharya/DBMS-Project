var a;
function show_hide()
{

    if(a==1)
    {
        document.getElementById("content").style.display="none";
        return a=0;
    }
    else
    {
        document.getElementById("content").style.display="block";
        return a=1;
    }
}
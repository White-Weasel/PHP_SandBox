minbtn = document.getElementsByClassName("minimize_btn")[0];
func_select = document.getElementsByClassName("func_select")[0];

const orginal_func_select_width = func_select.style.width;
Boolean min = false;
minbtn.style.left = func_select.offsetWidth - minbtn.offsetWidth + "px";

function minmax(btn, div)
{
    min = !min;
    if(min)
    {
        div.style.width = "0px";
        minbtn.left = "0px";
    }
    else
    {
        div.style.width = orginal_func_select_width;
        minbtn.left = orginal_func_select_width - minbtn.offsetWidth + "px";
    }

}
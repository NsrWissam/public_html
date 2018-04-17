function showByCategoryID(category_id) {
    if (category_id === "") {
        document.getElementById("pageSwap").innerHTML = "";
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                document.getElementById("pageSwap").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","../templates/catpostpage.php?category_id="+category_id,true);
        xmlhttp.send();
    }
}

function showByMonthName(MonthName) {
    if (MonthName === "") {
        document.getElementById("pageSwap").innerHTML = "";
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                document.getElementById("pageSwap").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","../templates/montharchive.php?MonthName="+MonthName,true);
        xmlhttp.send();
    }
}

function showByBlogpostID(blogpost_id) {
    if (blogpost_id === "") {
        document.getElementById("pageSwap").innerHTML = "";
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                document.getElementById("pageSwap").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","../templates/detailpage.php?blogpost_id="+blogpost_id,true);
        xmlhttp.send();
    }
}

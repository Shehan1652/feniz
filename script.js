function changeView() {
    var signInBox = document.getElementById("signInBox");
    var signUpBox = document.getElementById("signUpBox");

    signInBox.classList.toggle("d-none");
    signUpBox.classList.toggle("d-none");
}

function signUp() {
    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var email = document.getElementById("email");
    var mobile = document.getElementById("mobile");
    var username = document.getElementById("username");
    var password = document.getElementById("password");

    // alert(fname.value);

    var f = new FormData();
    f.append("f", fname.value);
    f.append("l", lname.value);
    f.append("e", email.value);
    f.append("m", mobile.value);
    f.append("u", username.value);
    f.append("p", password.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            // alert(response);
            if (response == "Success") {
                document.getElementById("msg1").innerHTML = "Registration Successfully";
                document.getElementById("msg1").className = "alert alert-success";
                document.getElementById("msgDiv1").className = "d-block";

                fname.value = "";
                lname.value = "";
                email.value = "";
                mobile.value = "";
                username.value = "";
                password.value = "";
            } else {
                document.getElementById("msg1").innerHTML = response;
                document.getElementById("msgDiv1").className = "d-block";
            }

        }
    };

    request.open("POST", "signUpProcess.php", true);
    request.send(f);

}

function signIn() {
    var un = document.getElementById("un");
    var pw = document.getElementById("pw");
    var rm = document.getElementById("rm");

    // alert(un.value);

    var f = new FormData();
    f.append("u", un.value);
    f.append("p", pw.value);
    f.append("r", rm.checked);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            // alert(response);
            if (response == "Success") {

                let timerInterval;
                    Swal.fire({
                    title: "Login Successful !",
                    html: "Your home page loading after <b></b> milliseconds.",
                    timer: 4000,
                    timerProgressBar: true,
                    didOpen: () => {
                        Swal.showLoading();
                        const timer = Swal.getPopup().querySelector("b");
                        timerInterval = setInterval(() => {
                        timer.textContent = `${Swal.getTimerLeft()}`;
                        }, 100);
                    },
                    willClose: () => {
                        clearInterval(timerInterval);
                    }
                    }).then((result) => {
                    /* Read more about handling dismissals below */
                    if (result.dismiss === Swal.DismissReason.timer) {
                        window.location = "home.php";
                    }
                    });

                
            } else {
                document.getElementById("msg2").innerHTML = response;
                document.getElementById("msgDiv2").className = "d-block";
            }
        }
    };

    request.open("POST", "signInProcess.php", true);
    request.send(f);

}

function adminSignIn() {

    var un = document.getElementById("un");
    var pw = document.getElementById("pw");

    // alert(un.value);

    var f = new FormData();
    f.append("u", un.value);
    f.append("p", pw.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            // alert(response);
            if (response == "Success") {
                window.location = "adminDashboard.php";
            } else {
                document.getElementById("msg").innerHTML = response;
                document.getElementById("msgDiv").className = "d-block";
            }
        }
    };

    request.open("POST", "adminSignInProcess.php", true);
    request.send(f);

}

function loadUser() {

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            // alert(response);
            document.getElementById("tb").innerHTML = response;
        }
    };

    request.open("POST", "loadUserProcess.php", true);
    request.send();

}

function loadOrder() {

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            // alert(response);
            document.getElementById("tb").innerHTML = response;
        }
    };

    request.open("POST", "loadOrderProcess.php", true);
    request.send();

}

function updateUserStatus() {
    var userid = document.getElementById("uid");
    //    alert(userid.value);

    var f = new FormData();
    f.append("u", userid.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            // alert(response);
            if (response == "Deactive") {
                document.getElementById("msg").innerHTML = "User Deactivate Successfully";
                document.getElementById("msg").className = "alert alert-success";
                document.getElementById("msgDiv").className = "d-block";
                userid.value = "";
                loadUser();

            } else if (response == "Active") {
                document.getElementById("msg").innerHTML = "User Activate Successfully";
                document.getElementById("msg").className = "alert alert-success";
                document.getElementById("msgDiv").className = "d-block";
                userid.value = "";
                loadUser();

            } else {
                document.getElementById("msg").innerHTML = response;
                document.getElementById("msgDiv").className = "d-block";
            }
        }
    };

    request.open("POST", "updateUserStatusProcess.php", true);
    request.send(f);

}

function reload() {
    location.reload();
}

function brandReg() {
    var brand = document.getElementById("brand");
    // alert(brand.value);

    var f = new FormData();
    f.append("b", brand.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            // alert(response);
            if (response == "Success") {
                document.getElementById("msg1").innerHTML = "Brand Registration Successfully";
                document.getElementById("msg1").className = "alert alert-success";
                document.getElementById("msgDiv1").className = "d-block";
                brand.value = "";
            } else {
                document.getElementById("msg1").innerHTML = response;
                document.getElementById("msgDiv1").className = "d-block";
            }
        }
    };

    request.open("POST", "brandRegisterProcess.php", true);
    request.send(f);

}

function categoryReg() {
    var cat = document.getElementById("cat");
    // alert(cat.value);

    var f = new FormData();
    f.append("c", cat.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            // alert(response);
            if (response == "Success") {
                document.getElementById("msg2").innerHTML = "Category Registration Successfully";
                document.getElementById("msg2").className = "alert alert-success";
                document.getElementById("msgDiv2").className = "d-block";
                cat.value = "";
            } else {
                document.getElementById("msg2").innerHTML = response;
                document.getElementById("msgDiv2").className = "d-block";
            }
        }
    };

    request.open("POST", "categoryRegisterProcess.php", true);
    request.send(f);
}

function colorReg() {
    var color = document.getElementById("color");
    // alert(color.value);

    var f = new FormData();
    f.append("c", color.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            // alert(response);
            if (response == "Success") {
                document.getElementById("msg3").innerHTML = "Color Registration Successfully";
                document.getElementById("msg3").className = "alert alert-success";
                document.getElementById("msgDiv3").className = "d-block";
                color.value = "";
            } else {
                document.getElementById("msg3").innerHTML = response;
                document.getElementById("msgDiv3").className = "d-block";
            }
        }
    };

    request.open("POST", "colorRegisterProcess.php", true);
    request.send(f);
}

function sizeReg() {
    var size = document.getElementById("size");
    // alert(size.value);

    var f = new FormData();
    f.append("s", size.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            // alert(response);
            if (response == "Success") {
                document.getElementById("msg4").innerHTML = "Size Registration Successfully";
                document.getElementById("msg4").className = "alert alert-success";
                document.getElementById("msgDiv4").className = "d-block";
                size.value = "";
            } else {
                document.getElementById("msg4").innerHTML = response;
                document.getElementById("msgDiv4").className = "d-block";
            }
        }
    };

    request.open("POST", "sizeRegisterProcess.php", true);
    request.send(f);

}


function regProduct() {

    var pname = document.getElementById("pname");
    var brand = document.getElementById("brand");
    var cat = document.getElementById("cat");
    var color = document.getElementById("color");
    var size = document.getElementById("size");
    var desc = document.getElementById("desc");
    var file = document.getElementById("file");

    // alert(pname.value);
    // alert(brand.value);
    // alert(cat.value);
    // alert(color.value);
    // alert(size.value);
    // alert(desc.value);
    // alert(file.value);

    var F = new FormData(); 

     var form = new FormData();
    form.append("pname", pname.value);
    form.append("brand", brand.value);
    form.append("cat", cat.value);
    form.append("color", color.value);
    form.append("size", size.value);
    form.append("desc", desc.value);
    form.append("image", file.files[0]);

    var req = new XMLHttpRequest();
    req.onreadystatechange = function () {
        
        if(req.readyState == 4 && req.status == 200){
            var resp = req.responseText;
            alert(resp);
            location.reload(); 
            // location.href = 'productRegProcess.php'; 
        }
      
    };
    req.open("POST", "productRegProcess.php", true);
    req.send(form);

    }

    function updateStock() {

        var pname = document.getElementById("selectProduct");
        var qty = document.getElementById("qty");
        var price = document.getElementById("uprice");
        // alert(pname.value);

        var f = new FormData();
        f.append("p", pname.value);
        f.append("q", qty.value);
        f.append("up", price.value);

        var request = new XMLHttpRequest();


        request.onreadystatechange = function () {
            if (request.readyState == 4 & request.status == 200) {
                var response = request.responseText;
                alert(response);
                location.reload();
            }
        };
        
        request.open("POST", "updateStockProcess.php", true);
        request.send(f);

    }

    function printDiv() {
        var originalContent = document.body.innerHTML;
        var printArea = document.getElementById("printArea").innerHTML;
        document.body.innerHTML = printArea;
        window.print();
        document.body.innerHTML = originalContent;

    
     
    }



    function loadProduct(x){

        var page = x;
        // alert(x);

        var f = new FormData();
        f.append("p", page);

        var request = new XMLHttpRequest();

        request.onreadystatechange = function (){
            if(request.readyState == 4 & request.status == 200){
                var response = request.responseText;
                // alert(response);
                document.getElementById("pid").innerHTML = response;
              
            }
        };


        request.open("POST", "loadProductProcess.php", true);
        request.send(f);

    }

function searchProduct(x){


    var page = x;

    var product = document.getElementById("product");

    // alert(page);
    // alert(product.value);

    var f = new FormData();
    f.append("p", product.value);
    f.append("pg", page);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function (){
        if(request.readyState == 4 & request.status == 200){
            var response = request.responseText;
            // alert(response);
            document.getElementById("pid").innerHTML = response;
        }
    };
    request.open("POST", "searchProductProcess.php", true);
    request.send(f);
}


function viewFilter(){
    // alert("Filter");

    document.getElementById("filterId").className ="d-block";

}

function advSearchProduct(x){

    var page = x;
   var color =  document.getElementById("color");
  var cat =   document.getElementById("cat");
 var brand =    document.getElementById("brand");
 var size =   document.getElementById("size");
 var min =   document.getElementById("min");
  var max =  document.getElementById("max");
    // alert(cat.value);

    var f = new FormData();
    f.append("pg", page);
    f.append("co", color.value);
    f.append("cat", cat.value);
    f.append("b", brand.value);
    f.append("s", size.value);
    f.append("min", min.value);
    f.append("max", max.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function (){
        if(request.readyState == 4 & request.status == 200){
            var response = request.responseText;
            // alert(response);
            document.getElementById("pid").innerHTML = response;
          
        }
    };
    request.open("POST", "advanceSearchProductProcess.php", true);
    request.send(f);
   
}


function uploadImg(){
    // alert("Upload Image");

 var img = document.getElementById("imgUploader");

 var f = new FormData();
 f.append("i", img.files[0]);

 var request = new XMLHttpRequest();
 request.onreadystatechange = function (){
     if(request.readyState == 4 & request.status == 200){
         var response = request.responseText;
        //  alert(response);
        if (response == "empty") {
            // alert("Please select Your Profile Image");
            swal("error!", "Please select Your Profile Image", "error");
            
        } else {
            document.getElementById("i").src = response;
            img.value = "";
            
        }
     }
 };
 request.open("POST", "profileImgUpload.php", true);
 request.send(f);

}


function updateData(){
    // alert("Update Data");
    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var email = document.getElementById("email");
    var mobile = document.getElementById("mobile");
    var pw = document.getElementById("pw");
    var no = document.getElementById("no");
    var line1 = document.getElementById("line1");
    var line2 = document.getElementById("line2"); 
    // alert(fname.value);
    // alert(lname.value);

   var f = new FormData();
    f.append("f", fname.value);
    f.append("l", lname.value);
    f.append("e", email.value);
    f.append("m", mobile.value);
    f.append("p", pw.value);
    f.append("n", no.value);
    f.append("l1", line1.value);
    f.append("l2", line2.value);
var request = new XMLHttpRequest();
request.onreadystatechange = function (){
    if(request.readyState == 4 & request.status == 200){
        var response = request.responseText;
        // alert(response);
        swal("Success!", response, "success");
    }
};
request.open("POST", "updateDataProcess.php", true);
request.send(f);
}


function signOut(){
    var request = new XMLHttpRequest();
    request.onreadystatechange = function (){
        if(request.readyState == 4 && request.status == 200){ // Use '&&' instead of '&'
            var response = request.responseText;
            // alert(response);
            swal("Successs!",response,"success");

            setTimeout(function(){
                window.location = "signIn.php";
            }, 5000); // 5000ms = 5 seconds
            // location.reload("signIn.php");
        }
    };
    request.open("POST", "signOutProcess.php", true);
    request.send();
}



function addtoCart(x) {
    var stockId = x;
    var qty = document.getElementById("qty");

    if (qty.value > 0) {
        var f = new FormData();
        f.append("s", stockId);
        f.append("q", qty.value);
        var request = new XMLHttpRequest();
        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {
                var response = request.responseText;
                alert(response);
                qty.value = "";
            }
        };
        request.open("POST", "addtoCartProcess.php", true);
        request.send(f);
    } else {
        alert("Please Enter Valid qty");
    }
}



function loadCart() {

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            //alert(response);
            document.getElementById("cartBody").innerHTML = response;

        }
    };


    request.open("POST", "loadCartProcess.php", true);
    request.send();

}


function incrementCartQty(x) {

    var cartId = x;
    var qty = document.getElementById("qty" + x);
    //alert(qty.value);
    var newQty = parseInt(qty.value) + 1;
    //alert(newQty);

    var f = new FormData();
    f.append("c", cartId);
    f.append("q", newQty);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            //alert(response);
            if (response == "Success") {
                qty.value = parseInt(qty.value) + 1;
                loadCart();
            } else {
                alert(response);
            }

        }
    };

    request.open("POST", "updateCartQtyProcess.php", true);
    request.send(f);

}


function decrementCartQty(x) {


    var cartId = x;
    var qty = document.getElementById("qty" + x);
    //alert(qty.value);
    var newQty = parseInt(qty.value) - 1;
    //alert(newQty);

    var f = new FormData();
    f.append("c", cartId);
    f.append("q", newQty);

    if (newQty > 0) {
        var request = new XMLHttpRequest();
        request.onreadystatechange = function () {
            if (request.readyState == 4 & request.status == 200) {
                var response = request.responseText;
                //alert(response);
                if (response == "Success") {
                    qty.value = parseInt(qty.value) - 1;
                    loadCart();
                } else {
                    alert(response);
                }


            }
        };

        request.open("POST", "updateCartQtyProcess.php", true);
        request.send(f);
    }

}


function removeCart(x){
   if(confirm("Are You Sure delete this item?")){
    var f = new FormData();
    f.append("c", x);
    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            // alert(response);
            // reload();
            Swal.fire({
                title: response,
                text: "success",
                icon: "success"
            }).then((result) => {

                if (result.isConfirmed) {
                    window.location.reload();
                }
            });

        }
    };
    request.open("POST", "removeCartProcess.php", true);
    request.send(f);
   }
}


function checkOut() {
    // alert("ok");

    var f = new FormData();
    f.append("cart",true);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var responce = request.responseText;
            // alert(responce);
            var payment = JSON.parse(responce);
            doCheckout(payment, "checkoutProcess.php");
        }
    }

    request.open("POST","paymentProcess.php",true);
    request.send(f);
}

function doCheckout(payment, path) {
    payhere.onCompleted = function onCompleted(orderId) {
        console.log("Payment completed. OrderID:" + orderId);

        var f = new FormData();
        f.append("payment", JSON.stringify(payment));

        var request = new XMLHttpRequest();
        request.onreadystatechange = function () {
            if (request.readyState == 4 & request.status == 200) {
                var responce = request.responseText;
                var order = JSON.parse(responce);

                if (order.resp == "Success") {
                    console.log("Order completed with ID: " + order.order_id);
                    window.location = "invoice.php?orderId=" + order.order_id; // Fixed key name
                } else {
                    alert(responce);
                }
            }
        };

        request.open("POST", path, true);
        request.send(f);
    };

    // Payment window closed
    payhere.onDismissed = function onDismissed() {
        // Note: Prompt user to pay again or show an error page
        console.log("Payment dismissed");
    };

    // Error occurred
    payhere.onError = function onError(error) {
        // Note: show an error page
        console.log("Error:"  + error);
    };

    // Show the payhere.js popup, when "PayHere Pay" is clicked
    // document.getElementById('payhere-payment').onclick = function (e) {
        payhere.startPayment(payment);
    // };
}

function buyNow(stockId) {
    // alert(stockId);
    var qty = document.getElementById("qty");

    if (qty.value > 0) {
        
        var f = new FormData();
        f.append("cart", false);
        f.append("stockId",stockId);
        f.append("qty",qty.value);

        var request = new XMLHttpRequest();
        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {
                var responce = request.responseText;
                // alert(responce);
                var payment = JSON.parse(responce);
                payment.stock_id = stockId;
                payment.qty = qty.value;
                doCheckout(payment, "buynowProcess.php");
            }
        }

        request.open("POST","paymentProcess.php",true);
        request.send(f);
        
    } else {
        // alert("Please enter valid quantity");
        swal("error!", "Please enter valid quantity", "error");
    }
}

function forgetPassword() {
    var email = document.getElementById("e");

    if (email.value != "") {
        
        var f = new FormData();
        f.append("e", email.value);

        var request = new XMLHttpRequest();
        request.onreadystatechange = function () {
            if (request.readyState == 4 & request.status == 200) {
                var response = request.responseText;
                // alert(response);
                if (response == "Success") {
                    document.getElementById("msg").innerHTML = "Check your email to reset password";
                    document.getElementById("msg").className = "alert alert-success";
                    document.getElementById("msgDiv").className = "d-block";
                } else {
                    document.getElementById("msg").innerHTML = response;
                    document.getElementById("msg").className = "alert alert-danger";
                    document.getElementById("msgDiv").className = "d-block";
                }
            }
        };

        request.open("POST", "forgetPasswordProcess.php", true);
        request.send(f);

    }else{
        // alert("Please enter your email");
        swal("error!", "Please enter your email", "error");
    }  
}

function resetPassword() {
    var vcode = document.getElementById("vcode");
    var np = document.getElementById("np");
    var np2 = document.getElementById("np2");
   
    var f = new FormData();
    f.append("vcode", vcode.value);
    f.append("np", np.value);
    f.append("np2", np2.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            // alert(response);
            if (response == "Success") {
                window.location = "signIn.php";
            } else {
              document.getElementById("msg").innerHTML = response;
              document.getElementById("msg").className = "alert alert-danger";
              document.getElementById("msgDiv").className = "d-block";


            }
        }
        
    };

    request.open("POST", "resetPasswordProcess.php", true);
    request.send(f);
}



function loadChart() {
    // alert("ok");
    const ctx = document.getElementById('myChart');

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var responce = request.responseText;
            //alert(responce);
            var data = JSON.parse(responce);
            new Chart(ctx, {
                type: 'doughnut',
                data: {
                  labels: data.labels,
                  datasets: [{
                    label: '# of Votes',
                    data: data.data,
                    borderWidth: 1
                  }]
                },
                options: {
                  scales: {
                    y: {
                      beginAtZero: true
                    }
                  }
                }
              });
            
        }
};

request.open("POST","loadChartProcess.php",true);
request.send();
}



function updateStatus() {
    var order_id = document.getElementById('order_id').value;
    var processed = document.getElementById('processed').value;
    var shipped = document.getElementById('shipped').value;
    var enroute = document.getElementById('enroute').value;
    var arrived = document.getElementById('arrived').value;

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'update_status.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function() {
        if (xhr.status === 200) {
            alert(xhr.responseText);
            // You can refresh the table or update the UI here after successful update
        } else {
            alert('An error occurred while updating status');
        }
    };

    xhr.send('order_id=' + order_id + '&processed=' + processed + '&shipped=' + shipped + '&enroute=' + enroute + '&arrived=' + arrived);
}




  function loadChart() {

    var ctx = document.getElementById("myChart");

    var f = new FormData();

    f.append("ctx", ctx.value)

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var t = r.responseText;
            var data = JSON.parse(t);


            new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: data.labels,
                    datasets: [{
                        label: '# Sales',
                        data: data.data,
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            // alert(t);

        }
    }

    r.open("POST", "loadChartProcess.php", true);
    r.send(f);

    // alert("hello");
}

function loadChart2() {
    var ctx = document.getElementById("myChart2");
    var f = new FormData();
    f.append("ctx", ctx.value)

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var t = r.responseText;
            var data = JSON.parse(t);

            new Chart(ctx, {
                type: "line",
                data: {
                    labels: data.dates,
                    datasets: [
                        {
                            label: "Daily Income",
                            data: data.incomes,
                            borderWidth: 1,
                            fill: false,
                            borderColor: "rgb(75, 192, 192)",
                        },
                    ],
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                        },
                    },
                },
            });

            document.getElementById("total-amount").innerHTML =
                "Total Amount: " + data.total_amount;
        }
    };

    r.open("POST", "loadChartProcess2.php", true);
    r.send(f);
}

function loadChart3() {

    var ctx = document.getElementById("myChart3");

    var f = new FormData();

    f.append("ctx", ctx.value)

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var t = r.responseText;
            var data = JSON.parse(t);


            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: data.labels,
                    datasets: [{
                        label: '# Sales',
                        data: data.data,
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            // alert(t);

        }
    }

    r.open("POST", "loadChartProcess3.php", true);
    r.send(f);

    // alert("hello");
}

function loadChart4() {

    var ctx = document.getElementById("myChart4");

    var f = new FormData();

    f.append("ctx", ctx.value)

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var t = r.responseText;
            var data = JSON.parse(t);


            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: data.labels,
                    datasets: [{
                        label: '# Sales',
                        data: data.data,
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            // alert(t);

        }
    }

    r.open("POST", "loadChartProcess4.php", true);
    r.send(f);

    // alert("hello");
}

function rmsg() {
        // Get the values from the form elements
        var name = document.getElementById("un");
        var email = document.getElementById("em");
        var subject = document.getElementById("sb");
        var message = document.getElementById("umsg");
    
        // Create a FormData object
        var f = new FormData();
        f.append("un", name.value);
        f.append("em", email.value);
        f.append("sb", subject.value);
        f.append("umsg", message.value);
    
        // Send the form data to the server
        var request = new XMLHttpRequest();
        request.onreadystatechange = function() {
            if (request.readyState == 4 && request.status == 200) {
                // Handle success
                var response = request.responseText;
                alert('Message sent successfully!');
                // Optionally, you can clear the form fields or display a success message
            } else {
                // Handle error
                alert('Failed to send message');
                // Optionally, you can display an error message
            }
        };
        request.open('POST', "userMsgProcess.php", true);
        request.send(f);
}
    

// 
// function openInvo() {
//     // alert ("Hello");
//     window.location = `invoice.php?orderId=`;
// }
// window.location = "invoice.php?orderId=" + order.order_id;









































/*
Java Script Version ES 6
*/
const myFun = (var1,var2) => {
    alert('Hello World '+var1);
    alert('Hello World '+var2);
    return 'myReturnData';
  } 

const tipsDataSave=()=>{
    $.confirm({
        title: 'Confirm!',
        content: 'Simple confirm!',
        buttons: {
            confirm: function () {
                $.alert('Confirmed!');
            },
            cancel: function () {
                $.alert('Canceled!');
            },
            somethingElse: {
                text: 'Something else',
                btnClass: 'btn-blue',
                keys: ['enter', 'shift'],
                action: function(){
                    $.alert('Something else?');
                }
            }
        }
    });
}  



const  addToMyWishList= (product_id,isWished) => {
    if(g_user_id==0){
        $.confirm({
            title: 'Need to login!',
            content: 'Hi dear you need to login to the store.',
            type: 'red',
            typeAnimated: true,
            buttons: {
                tryAgain: {
                    text: 'Login Now',
                    btnClass: 'btn-green',
                    action: function(){
                        window.location.replace("./log-in/");
                    }
                },
                close: function () {
                }
            }
        });
        return;
    }
    $.ajax({
        url: './ajaxCalls/myWishList.php',
        type: 'POST',
        dataType: 'json',
        data: {
            'action': 'markwishlist',
            'product_id':product_id,
            'isWished':isWished
        },
        beforeSend: function () {
            $("#wishid_"+product_id).html('<img src="./assets/images/loader/loader1s.gif" >');  
                 
        },
        async: false,
        success: function (data) {
            
            if(data.status==1){
                $("#wishid_"+product_id).html('<i class="iconly-Heart icli" style="color:red"></i>');
            }   
            else  if(data.status==0){
                $("#wishid_"+product_id).html('<i class="iconly-Heart icli"></i>');
            }   
            else{
                alert("Somthing went wrong!!");
            }
              
        }
    }).responseText;

    
  } 





 const  addToMyCart= (product_id) => {
    if(g_user_id==0){
        $.confirm({
            title: 'Need to login!',
            content: 'Hi dear you need to login to the store.',
            type: 'red',
            typeAnimated: true,
            buttons: {
                tryAgain: {
                    text: 'Login Now',
                    btnClass: 'btn-green',
                    action: function(){
                        window.location.replace("./log-in/");
                    }
                },
                close: function () {
                }
            }
        });
        return;
    }
    
    var qty=$("#pro_qnt_"+product_id).val();
    $.ajax({
        url: './ajaxCalls/myCartList.php',
        type: 'POST',
        dataType: 'json',
        data: {
            'action': 'markwishlist',
            'product_id':product_id,
            'qty':qty
        },
        beforeSend: function () {
            $("#btnCart_"+product_id).html('<img src="./assets/images/loader/loader1s.gif" >');  
                 
        },
        async: false,
        success: function (data) {

            if(data.status==1){
                        fetchCartData();
                        fetchCartData1();

        $("#btnCart_"+product_id).html('<i class="iconly-Buy icli text-white m-0"></i>');

            }   
            else  if(data.status==0){
                $("#btnCart_"+product_id).html('<i class="iconly-Buy icli text-white m-0"></i>');
            }   
            else{
                $("#btnCart_"+product_id).html('<i class="iconly-Buy icli text-white m-0"></i>');  
                $.alert("This product already in the cart.");             
            }
              
        }
    }).responseText;

    
  } 

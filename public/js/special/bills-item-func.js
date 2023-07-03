
//create session storage for service-item
if (sessionStorage.getItem("service-item") === null || sessionStorage.getItem("service-item").length==0) {
	sessionStorage.setItem("service-item", JSON.stringify([]));
 }

 //Ensure that page has loaded well
if (document.readyState == "loading") {
	document.addEventListener("DOMContentLoaded", ready);
  } else {
	ready();
  }

 function ready() {
	loadservItems();
	//alert("Drugs cart working!");
	
	//Click to remove cart item let 
	removeTestItem = document.getElementsByClassName("remove-item");
	//console.log(removeCartItem);
	for (let i = 0; i < removeTestItem.length; i++) {
	  let button = removeTestItem[i];
	  button.addEventListener("click", removeItem);
	}
	  
}

const options={
  "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": true,
  "positionClass": "toast-top-full-width",
  "preventDuplicates": true,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}

function toastrMessage(action) {
	if(action=="add"){
		toastr.success('1 item added to cart!', "Shopping Cart",options);
	}else if(action=="edit"){
		toastr.success('Cart has been updated!', "Shopping Cart",options);
	}else if(action=="remove"){
		toastr.warning('1 item removed from cart!', "Shopping Cart",options);
	}else if(action=="empty"){
		toastr.warning('Cart is now empty!', "Shopping Cart",options);
	}
}

function addItem() {
	//alert($("#itemId").val()+' : '+$("#itemPrice").val()+' : '+$("#itemName").val()+' : '+$("#itemQty").val());
	
	let itemId = Number($("#itemId").val());
	let name = $("#itemName").val();
	let detail = $("#itemDesc").val();
	let price = Number($("#itemPrice").val());
	let quantity = Number($("#itemQty").val());
	let total = price*quantity;
	
	if(itemId =="" || price =="" || quantity ==""){
		alert("Incomplete Entry!");
	}else{
	   saveItemToStorage(itemId, name, detail, price,quantity,total);
	}			
}

//save item to session storage
function saveItemToStorage(itemId, name, detail, price,quantity,total) {
	let servItems = JSON.parse(sessionStorage.getItem("service-item"));
	
	let arrayItem = {
	   code : itemId,
	   name: name,
	   detail: detail,
	   price: price,
	   qty: quantity,
	   total:total
	} 

	//Avoid repeatation
	for (let i = 0; i < servItems.length; i++) { 
	  //alert(servItems[i].testType+" - "+arrayItem.testType)
	  if (servItems[i].code === arrayItem.code) {
		alert("Item is aready added to list!");
		return;
	  }
	}
	 //console.log("SESSION ITEMS",servItems);
	 //console.log("FORM ITEMS",arrayItem);
	 servItems.push(arrayItem); //add item to array 
	
	//console.log(arrayItem);
	
	//save item to session storage
	sessionStorage.setItem("service-item", JSON.stringify(servItems)); 
	
	//load drug items
	loadservItems();
	
  }

  function loadservItems() {
	let servItems = JSON.parse(sessionStorage.getItem("service-item"));
	let cartRow = "";
    let totCost=0;
	
	if (servItems !== null) {
	  for (let i = 0; i < servItems.length; i++) {
		totCost=totCost+parseInt(servItems[i].total);
		
		let rowItem = 
			  `<tr>
					<td>${i+1}</td>
					<td class="item-title">
					    ${servItems[i].name}
						<input type="hidden" name="name[]" value="${servItems[i].name}" class="form-control" required />
						<input type="hidden" name="servId[]" value="${servItems[i].code}" class="form-control" required />
					</td>
					<td class="tx-12">${servItems[i].detail}</td>
					<td class="tx-center">
					   ${servItems[i].qty}
					   <input type="hidden" name="qty[]" value="${servItems[i].qty}" class="form-control" required />
					</td>
					<td class="tx-right">
						${servItems[i].price}
						<input type="hidden" name="price[]" value="${servItems[i].price}" class="form-control" required />
					</td>
					<td class="tx-right">
						${servItems[i].total}
						<input type="hidden" name="total[]" value="${servItems[i].total}" class="form-control" required />
					</td>
					<td class="tx-right"><i class="fa fa-trash remove-item"></i></td>
			   </tr>`;
  
		cartRow = cartRow + rowItem;
		//addItem.append(cartRow);
		
	  }
	   //Show selected drug list
	//    let addItem = document.getElementsByClassName("drug-items-frame")[0];
	//    addItem.innerHTML = cartRow;
	   
	   //Check for zero values
	   limitVal($('#amtpaid').val());
	   limitVal($('#totbal').val());
        
	   if(totCost==0 || totCost<$('#amtpaid').val() || $('#amtpaid').val()<0){
		  $('#totbal').val(0);
		  $('#amtpaid').val(0);
	   }

	   //Total drug cost
	   $('#show-items').html(cartRow);
	   $('#gtotal').text(totCost);
	   $('#totCost').val(totCost);
	   $('#totbal').val(totCost - $('#amtpaid').val());
	   
		//Click to remove cart item let 
		removeTestItem = document.getElementsByClassName("remove-item");
		//console.log(removeCartItem);
		for (let i = 0; i < removeTestItem.length; i++) {
		  let button = removeTestItem[i];
		  button.addEventListener("click", removeItem);
		}
	}
	
  }
  
function getOptions(itemId) {
	//alert(itemId);
	var queryString = "";
	
	if (itemId!= null) {
		queryString = {'code':itemId};
	}

	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	jQuery.ajax({
		url : "/billings/getBillOption",
		data : queryString,
		type : "POST",
		success : function(service) {
			//alert(service[0].price);
			
			if(service[0].price!=null){
				$("#itemPrice").val(service[0].price);
				$("#itemName").val(service[0].sname);
				$("#itemDesc").val(service[0].description);
			}else{
				$("#itemPrice").val('');
			}
			$("#itemQty").val(1);
		},
		error : function() {
		}
	});
}

//Remove item from cart
function removeItem(event) {
	let servItems = JSON.parse(sessionStorage.getItem("service-item"));
	
	
	let clickedBtn = event.target;
	let mainItem = clickedBtn.parentElement.parentElement; //remove cart element
	//console.log(clickedBtn);
	//console.log(servItems);
	
	let itemTitle = mainItem.getElementsByClassName("item-title")[0].innerText;
	console.log("Drug Title",itemTitle);
	
	for (let x = 0; x < servItems.length; x++) {
	  if (servItems[x].name === itemTitle) {
		//console.log(servItems[x].name);
		servItems.splice(x, 1);
		
	  }
	}
  
	mainItem.remove(); //remove cart element
	
	//console.log(cartRowItems);
	sessionStorage.setItem("service-item", JSON.stringify(servItems));
	
	//Load lab items
	loadservItems();
	
  }

function limitVal(field){
	return field < 0 ? 0 : field;
}

//compute instalmental payments
function paymentComp() {
	
	//Check for zero values
	let grandtot = parseFloat($('#totgrand').val());
	let baltot = parseFloat($('#baltot').val());
	let baltot2 = parseFloat($('#baltot2').val());
	let amount = parseFloat($('#payamt').val());

	//alert('Grandtot: '+grandtot+' - Payamt: '+amount+' - Balance: '+baltot+' - paid: '+totpay);
	
	if(amount<0 && amount!=""){
	    $('#payamt').val("");
	} 

	if(!$.isNumeric(amount) && amount!=""){
	    $('#payamt').val("");
	}

	if(amount>baltot || amount>grandtot){
	    $('#payamt').val(0);
	    $('#baltot').val(baltot2);
	}
}



















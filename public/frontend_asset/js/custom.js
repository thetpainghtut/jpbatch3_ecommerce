// Shorthand for $( document ).ready()
$(function() {
  // console.log( "ready!" );
  showdata();
  count();

  $(".addToCart").click(function(){
    var id=$(this).data('id');
    var name=$(this).data("name");
    var photo=$(this).data("photo");
    var price=$(this).data("price");
    var qty = $('.qty').val();

    var item={
      id:id,
      name:name,
      photo:photo,
      price:price,
      qty:qty,
    }

    var itemlist=localStorage.getItem("items");

    var ItemArray;
    if(itemlist==null){
      ItemArray=[];
    }else{
      ItemArray=JSON.parse(itemlist);
    }
    var status=false;
    $.each(ItemArray,function(i,v){
      if(v.id==id){
        //alert("ok");
        v.qty++;
        status=true;
      }
    })

    if(!status){
      ItemArray.push(item); 
    }
    var itemstring=JSON.stringify(ItemArray);
    localStorage.setItem("items", itemstring);
    showdata();
    count();
  })


  function showdata(){
    var itemlist=localStorage.getItem("items");
    var itemArray=JSON.parse(itemlist);
    console.log(itemArray);
    var j=1;
    var html="";
    var total=0;
    $.each(itemArray,function(i,v){
      var subtotal=v.qty*v.price;
      total+=subtotal;
      html+=`<tr>
      <td>
        <button data-id="${i}" class="btn btn-dark remove">
          <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
            <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
          </svg>
        </button> ${v.name} <img src="${v.photo}" width="100px" height ="100px">
      </td>
      <td class="align-middle"><button class="btn btn-dark btnincrease" data-id=${i}>+</button> ${v.qty} <button class="btn btn-dark btndecrease" data-id="${i}">-</button></td>
      <td class="align-middle">${v.price}</td>
      <td class="align-middle">${subtotal}</td>
      </tr>`

    })
    html+=`<tr><td colspan="3">Total</td><td>${total}</td></tr>`
    
    $("tbody").html(html);

  }

  $("tbody").on("click",".remove",function(){
    //alert("ok");
    var id=$(this).data("id");
    //console.log(id);
    var itemlist=localStorage.getItem("items");
    var ItemArray=JSON.parse(itemlist);
    ItemArray.splice(id,1);
    var itemstring=JSON.stringify(ItemArray);
    localStorage.setItem("items", itemstring);
    showdata();
    count();
  })


  function count(){
    var totalcount=0;
    var itemlist=localStorage.getItem("items");
    if(itemlist){
      ItemArray=JSON.parse(itemlist);
      $.each(ItemArray,function(i,v){
        totalcount+=v.qty;
      })
    }
    $("#cart").html(totalcount);
  }


  $("tbody").on("click",".btnincrease",function(){
    //alert("ok");
    var id=$(this).data('id');
    var itemlist=localStorage.getItem("items");
    var itemArray=JSON.parse(itemlist);
    //console.log(ItemArray);

    $.each(ItemArray,function(i,v){
      if(i==id){
        v.qty++;
      }
    })

    var itemstring=JSON.stringify(ItemArray);
    localStorage.setItem("items", itemstring);
    showdata();
    count();
  })

  $("tbody").on("click",".btndecrease",function(){
    //alert("ok");
    var id=$(this).data('id');
    var itemlist=localStorage.getItem("items");
    var itemArray=JSON.parse(itemlist);
    //console.log(ItemArray);

    $.each(ItemArray,function(i,v){
      if(i==id){
        v.qty--;
        if(v.qty==0){
          ItemArray.splice(id,1);
        }
      }
    })

    var itemstring=JSON.stringify(ItemArray);
    localStorage.setItem("items", itemstring);
    showdata();
    count();
  })
});
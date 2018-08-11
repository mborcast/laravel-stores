function build(sale) {
  return  '<a class="sales-item" href="sales/'+sale.id+'">'+
            '<header>'+
              '<p class="units">'+sale.products[0].pivot.units+' units</p>'+
              '<p class="product">'+sale.products[0].name+'</p>'+
            '</header>'+
            '<div>'+
              '<p class="date">'+sale.date+'</p>'+
              '<p class="price">'+sale.products[0].price+'</p>'+
            '</div>'+
          '</a>';
}
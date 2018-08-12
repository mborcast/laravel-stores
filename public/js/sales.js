function build(sale) {
  return  '<a class="sales-item" href="sales/'+sale.id+'">'+
            '<header>'+
              '<p class="units">'+
                '<i class="fas fa-box-open"></i>'+
                '<span class="times">'+
                  '<i class="fas fa-times"></i>'+
                '</span>'+
                sale.products[0].pivot.units+
              '</p>'+
              '<p class="product">'+sale.products[0].name+'</p>'+
            '</header>'+
            '<div>'+
              '<p class="date">'+(new Date(sale.date)).toLocaleDateString("en-GB", { year: 'numeric', month: 'short', day: 'numeric' })+'</p>'+
              '<p class="store">'+sale.store.name+'</p>'+
            '</div>'+
          '</a>';
}
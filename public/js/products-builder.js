function build(product) {
  return '<a class="index-item" href="products/'+product.id+'">'+
          '<aside>'+
            '<span class="index-icon">'+
              '<i class="fas fa-gift"></i>'+
            '</span> '+
            '<p>'+product.name+'</p>'+
            '<p class="overview">'+product.sales.length+' sales</p>'+
          '</aside>'+
         '</a>';
}
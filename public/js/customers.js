function build(customer) {
  return '<a class="index-item" href="customers/'+customer.id+'">'+
          '<aside>'+
            '<span class="index-icon">'+
              '<i class="fas fa-user-circle"></i>'+
            '</span> '+
            '<p>'+customer.name+'</p>'+
            '<p class="overview">'+customer.sales.length+' sales</p>'+
          '</aside>'+
         '</a>';
}
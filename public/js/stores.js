function build(store) {
  return '<a class="index-item" href="stores/'+store.id+'">'+
          '<aside>'+
            '<span class="index-icon">'+
              '<i class="fas fa-store"></i>'+
            '</span> '+
            '<p>'+store.name+'</p>'+
            '<p class="overview">'+store.customers.length+' customers</p>'+
          '</aside>'+
         '</a>';
}
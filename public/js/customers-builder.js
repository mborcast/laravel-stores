function build(customer) {
  return '<div class="index-item">'+
          '<aside>'+
            '<span class="index-icon">'+
              '<i class="fas fa-user-circle"></i>'+
            '</span> '+
            '<p>'+customer.name+'</p>'+
            '<p class="overview">'+customer.sales.length+' sales</p>'+
          '</aside>'+
          '<a href="stores/'+customer.id+'">'+
            '<button type="button" class="mini button primary"><i class="fas fa-eye"></i></button>'+
          '</a>'+
          '<a href="stores/'+customer.id+'/edit">'+
            '<button type="button" class="mini button edit"><i class="fas fa-pencil-alt"></i></button>'+
          '</a>'+
          '<label class="control">'+
            '<input type="checkbox" name="deleted[]" value="'+customer.id+'">'+
            '<div class="control-indicator"></div>'+
          '</label>'+
        '</div>';
}
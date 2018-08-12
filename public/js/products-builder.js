function build(product) {
  return '<div class="index-item">'+
          '<aside>'+
            '<span class="index-icon">'+
              '<i class="fas fa-store"></i>'+
            '</span> '+
            '<p>'+product.name+'</p>'+
            '<p class="overview">'+product.sales.length+' sales</p>'+
          '</aside>'+
          '<a href="stores/'+product.id+'">'+
            '<button type="button" class="mini button primary"><i class="fas fa-eye"></i></button>'+
          '</a>'+
          '<a href="stores/'+product.id+'/edit">'+
            '<button type="button" class="mini button edit"><i class="fas fa-pencil-alt"></i></button>'+
          '</a>'+
          '<label class="control">'+
            '<input type="checkbox" name="deleted[]" value="'+product.id+'">'+
            '<div class="control-indicator"></div>'+
          '</label>'+
        '</div>';
}